<?php
namespace RockHopSoft\BuckyStats\Controllers;

use Illuminate\Http\Request;
use App\Models\BSDatasets;
use App\Models\BSMortWeeklyUs;
use App\Models\BSPopulationUs;
use App\Models\SLTables;
use RockHopSoft\Survloop\Controllers\Stats\SurvGraphDataType;
use RockHopSoft\Survloop\Controllers\Stats\SurvGraphLine;
use RockHopSoft\BuckyStats\Controllers\BuckyDatasetInterfaceDataTypes;

class BuckyDatasetInterface extends BuckyDatasetInterfaceDataTypes
{

    protected function wwdGraphLoadRequests()
    {
        $this->wwdGraphLoadStates();
        $this->wwdGraphLoadTimescale();
        $this->loadDataTypes();
        $this->wwdGraphLoadDataRequests();
        $this->checkReportRedir();
        $this->getAllDataSlugsToGraph();
        $this->loadShareURLs();
    }

    protected function initDatasetGraph($title = '', $axisTitleX = '')
    {
        $this->v["graph"] = new SurvGraphLine($title);
        if ($axisTitleX == '') {
            $axisTitleX = 'Years';
            if (in_array($this->v["timescale"], ['weeks', 'weeks-for-years'])) {
                $axisTitleX = 'Weeks of the Year';
            } elseif ($this->v["timescale"] == 'days') {
                $axisTitleX = 'Days';
            }
        }
        $this->v["graph"]->axisX->label = $axisTitleX;
        $this->v["dataFld"] = $this->getRequiredDataField();
    }

    private function wwdGraphLoadTimescale()
    {
        $this->v["timescale"] = 'years';
        if (isset($GLOBALS["timescale"]) && trim($GLOBALS["timescale"]) != '') {
            $this->v["timescale"] = $GLOBALS["timescale"];
        } elseif ($GLOBALS["SL"]->REQ->has('timescale')) {
            $this->v["timescale"] = trim($GLOBALS["SL"]->REQ->get('timescale'));
        }
        if (!in_array($this->v["timescale"], ['years', 'weeks-for-years', 'weeks', 'days'])) {
            $this->v["timescale"] = 'years';
        }
    }

    private function wwdGraphLoadDataRequests()
    {
        $this->v["reqDataSlugs"] = $GLOBALS["SL"]->reqExplode(',', 'data');
        if (sizeof($this->v["reqDataSlugs"]) > 0) {
            foreach ($this->v["reqDataSlugs"] as $i => $dataSlug) {
                if ($this->v["timescale"] == 'days'
                    && $dataSlug == 'covid-economic-max') {
                    $this->v["reqDataSlugs"][$i] = 'covid-economic-avg';
                }
            }
        }
        if (sizeof($this->v["reqDataSlugs"]) == 1
            && $this->v["reqDataSlugs"][0] == 'standardized-by-age-state'
            && $this->v["states"][0] == 'US') {
            $this->v["reqDataSlugs"][0] = 'standardized-by-age-us';
        }
        if (sizeof($this->v["reqDataSlugs"]) == 0
            && in_array($GLOBALS["CUST"]->loadType, ['/multi', '/all-states'])) {
            $this->v["reqDataSlugs"][0] = 'standardized-by-age-us';
        }
    }

    private function wwdGraphLoadStates()
    {
        $this->v["states"] = [];
        if (isset($GLOBALS["states"]) && trim($GLOBALS["states"]) != '') {
            $this->v["states"] = [$GLOBALS["states"]];
        } elseif ($GLOBALS["SL"]->REQ->has('states')
            && trim($GLOBALS["SL"]->REQ->get('states')) != '') {
            $this->v["states"] = $GLOBALS["SL"]->reqExplode(',', 'states');
        } elseif ($GLOBALS["SL"]->REQ->has('state')
            && trim($GLOBALS["SL"]->REQ->get('state')) != '') {
            $this->v["states"] = [ trim($GLOBALS["SL"]->REQ->get('state')) ];
        }
        if (sizeof($this->v["states"]) == 0
            && in_array($GLOBALS["CUST"]->loadType, ['/one', '/all-lines'])) {
            $this->v["states"] = ['US'];
        }
        $this->v["stateName"] = '';
        if (sizeof($this->v["states"]) > 0) {
            $this->v["stateName"] = $GLOBALS["SL"]->getState($this->v["states"][0]);
            if ($this->v["stateName"] == 'Federal') {
                $this->v["stateName"] = 'United States';
            }
        }
    }

    private function addDataSlugsToGraph($dataSlug)
    {
        if (!in_array($dataSlug, $this->v["graphDataSlugs"])) {
            $this->v["graphDataSlugs"][] = $dataSlug;
        }
    }

    private function getAllDataSlugsToGraph()
    {
        $this->v["graphDataSlugs"] = $deleted = [];
        if (sizeof($this->v["reqDataSlugs"]) > 0) {
            foreach ($this->v["reqDataSlugs"] as $dataSlug) {
                foreach (['', 'avg-'] as $prefix) {
                    if ($dataSlug == $prefix . 'pop-by-age-group') {
                        $this->addAgeStack($prefix . 'pop-by-age-');
                    } elseif ($dataSlug == $prefix . 'perc-by-age-group') {
                        $this->addAgeStack($prefix . 'perc-by-age-');
                    } elseif ($dataSlug == $prefix . 'mort-by-age-group') {
                        $this->addAgeStack($prefix . 'mort-by-age-');
                    } elseif ($dataSlug == $prefix . 'mort-perc-by-age-group') {
                        $this->addAgeStack($prefix . 'mort-perc-by-age-');

                    } elseif ($prefix == '') {
                        if ($dataSlug == 'covid-all-avg') {
                            $this->addCovidStack('-avg');
                        } elseif ($dataSlug == 'covid-all-max') {
                            $this->addCovidStack('-max');
                        } elseif (strpos($dataSlug, 'by-age-group') === false) {
                            $this->addDataSlugsToGraph($dataSlug);
                        }
                    }
                }
            }
        }
        for ($i = sizeof($this->v["graphDataSlugs"])-1; $i >= 0; $i--) {
            if ($this->v["dataTypes"]->getDataPointTitle($this->v["graphDataSlugs"][$i]) == '') {
                $deleted[] = $this->v["graphDataSlugs"][$i];
                unset($this->v["graphDataSlugs"][$i]);
            }
        }
        if (sizeof($deleted) > 0) {
            foreach ($deleted as $del) {
                // find suitable replacement?
            }
        }
        $this->v["currGraphUrl"] = '?'
            . ((sizeof($this->v["states"]) > 0)
                ? 'states=' . implode(',', $this->v["states"]) . '&' : '')
            . ((sizeof($this->v["reqDataSlugs"]) > 0)
                ? 'data=' . implode(',', $this->v["reqDataSlugs"]) . '&' : '');
    }

    protected function checkReportRedir()
    {
        $redir = '';
        $stateUrl = '';
        if (sizeof($this->v["states"]) == 1 && $this->v["states"][0] != 'US') {
            $stateUrl = $this->v["states"][0] . '/';
        }
        $dataPar = implode(',', $this->v["reqDataSlugs"]);
        if ($GLOBALS["CUST"]->loadType == '/one') {
            if (sizeof($this->v["reqDataSlugs"]) == 0) {
                $redir = '/all-lines/US/' . $this->v["timescale"];
            } elseif (sizeof($this->v["states"]) == 0) {
                $redir = '/all-states/US/' . $this->v["timescale"] . '?data=' . $dataPar;
            } elseif (sizeof($this->v["states"]) > 1) {
                $redir = '/multi/US/' . $this->v["timescale"] . '?states='
                    . implode(',', $this->v["states"]) . '&data=' . $dataPar;
            }

        } elseif ($GLOBALS["CUST"]->loadType == '/multi') {
            if (sizeof($this->v["states"]) == 0) {
                $redir = '/all-states/US/' . $this->v["timescale"] . '?data=' . $dataPar;
            } elseif (sizeof($this->v["states"]) == 1) {
                $redir = '/one/US/' . $stateUrl . $this->v["timescale"] . '?data=' . $dataPar;
            }

        } elseif ($GLOBALS["CUST"]->loadType == '/all-states') {
            if (sizeof($this->v["states"]) == 1) {
                $redir = '/one/US/' . $stateUrl . $this->v["timescale"] . '?data=' . $dataPar;
            } elseif (sizeof($this->v["states"]) > 0) {
                $redir = '/multi/US/' . $this->v["timescale"] . '?states='
                    . implode(',', $this->v["states"]) . '&data=' . $dataPar;
            }

        } elseif ($GLOBALS["CUST"]->loadType == '/all-lines') {
            /* if (sizeof($this->v["states"]) > 1) {
                $redir = '/multi/US/' . $this->v["timescale"] . '?states='
                    . implode(',', $this->v["states"]) . '&data=' . $dataPar;
            } */
        }
        if ($redir != '') {
            echo $GLOBALS["SL"]->jsRedir($redir);
            exit;
        }
    }

    protected function loadShareURLs()
    {
        $url = $GLOBALS["SL"]->appUrl()
            . $GLOBALS["CUST"]->loadType . '/US'
            . ((sizeof($this->v["states"]) == 1) ? '/' . $this->v["states"][0] : '')
            . '/' . $this->v["timescale"] . '?'
            . ((sizeof($this->v["states"]) > 0)
                ? 'states=' . implode(',', $this->v["states"]) . '&' : '')
            . ((sizeof($this->v["reqDataSlugs"]) > 0)
                ? 'data=' . implode(',', $this->v["reqDataSlugs"]) . '&' : '');
        $GLOBALS["SL"]->x["share-url"] = substr($url, 0, (strlen($url)-1));
        $GLOBALS["SL"]->x["share-embed"] = '&lt;iframe src="' . $url . 'frame=1" '
            . 'frameborder="0" scrolling="no" width="100%" height="550"&gt;&lt;/iframe&gt;';
    }

    protected function addRangeToTitle()
    {
        if ($this->v["timescale"] == 'years') {
            if ($this->isAllLifeExpect()) {
                return ', ' . $this->v["graph"]->getAxisMinX() . '-2018';
            }
            return ', ' . $this->v["graph"]->getAxisMinX()
                . '-' . $this->v["graph"]->getAxisMaxX();
        } elseif ($this->v["timescale"] == 'weeks') {
            return ', 2020 Weeks 1-52';
        } elseif ($this->v["timescale"] == 'weeks-for-years') {
            return ', Weeks '
                . str_replace(' ', '', $this->v["graph"]->getAxisMinX()) . ' - '
                . str_replace(' ', '', $this->v["graph"]->getAxisMaxX());
        }
        return ', 2020';
    }

    private function isAllLifeExpect()
    {
        $foundOther = false;
        if (sizeof($this->v["graphDataSlugs"]) > 0) {
            foreach ($this->v["graphDataSlugs"] as $dataSlug) {
                if (strpos($dataSlug, 'life-expect-') === false) {
                    $foundOther = true;
                }
            }
        }
        return !$foundOther;
    }

    private function addAgeStack($prefix = 'pop-by-age-')
    {
        $this->addDataSlugsToGraph($prefix . '24');
        $this->addDataSlugsToGraph($prefix . '25-44');
        $this->addDataSlugsToGraph($prefix . '45-64');
        $this->addDataSlugsToGraph($prefix . '65-74');
        $this->addDataSlugsToGraph($prefix . '75-84');
        $this->addDataSlugsToGraph($prefix . '85');
    }

    private function addCovidStack($suffix = '-avg')
    {
        foreach ($this->getCovidVars() as $var) {
            $this->addDataSlugsToGraph($var[2] . $suffix);
        }
    }

    private function getRequiredDataField()
    {
        $ret = 'us_pop_mortality';
        if ($this->v["timescale"] == 'years') {
            if (sizeof($this->v["reqDataSlugs"]) > 0) {
                if (strpos($this->v["reqDataSlugs"][0], '-by-age-') !== false) {
                    $ret = 'us_pop_mort_85_years';

                } elseif ($this->v["reqDataSlugs"][0] == 'mort-perc-all-ages-avg-5yr') {
                    $ret = 'us_pop_mort_perc_avg_inc';

                } elseif ($this->v["reqDataSlugs"][0] == 'standardized-by-age-us-avg-5yr') {
                    $ret = 'us_pop_mort_std_dist_us_avg_inc';
                }
            }
        } elseif (in_array($this->v["timescale"], ['weeks', 'weeks-for-years'])) {
            $ret = 'mrt_week_us_mortality';
        } else { // days
            $ret = 'mrt_day_us_mortality';
        }
        return $ret;
    }

    protected function getDataPointValue($row, $dataSlug = '')
    {
        $val = null;
        if ($dataSlug == ''
            && isset($this->v["graphDataSlugs"][0])
            && sizeof($this->v["graphDataSlugs"][0]) > 0) {
            $dataSlug = $this->v["graphDataSlugs"][0];
        }
        $fields = $this->v["dataTypes"]->getDataPointFields($dataSlug);
        if (sizeof($fields) == 1) {
            if (isset($row->{ $fields[0] })) {
                $val = $row->{ $fields[0] };
                if (in_array($dataSlug, $this->v["convertPercents"]->dataSlugs)) {
                    // Report per Million instead of percentage
                    return 1000000*$val;
                } elseif ($dataSlug == 'debt-govt') {
                    $val = $val/1000000000000;
                }
                return $val;

            } elseif ($this->isWeeklyDataFld($dataSlug)) {
                return $this->getWeeklyData($row, $fields[0]);

            } elseif ($this->isAnnualDataFld($dataSlug)) {
                if (strpos($dataSlug, 'life-expect') !== false
                    || strpos($dataSlug, 'debt-govt') !== false) {
                    $row = $this->getAnnualDataRow($row, 'United States');
                    $fld = $this->swapFldAnnual($fields[0]);
                    if ($row && isset($row->{ $fld })) {
                        $val = $row->{ $fld };
                    }
                } else {
                    $val = $this->getAnnualData($row, $fields[0]);
                }
//echo 'getDataPointValue 1  ' . $dataSlug . ' ? val ' . $val . '<pre>'; print_r($fields); echo '</pre><pre>'; print_r($row); echo '</pre>'; exit;
                if ($val !== null) {
                    if ($dataSlug == 'debt-govt') {
                        $val = $val/1000000000000;
                    }
                    return $val;
                }
            } else {
                return null;
            }
        }
        return $this->calcDataPointValue($row, $dataSlug);
    }

    private function isWeeklyDataFld($dataSlug)
    {
        return (in_array($dataSlug, [ 'diff-mort', 'diff-mort-perc' ]));
    }

    protected function getWeeklyData($row, $fld = '')
    {
        $year = $this->getRowYear($row);
        $week = $this->getRowWeek($row);
        $state = $this->getRowState($row);
        if ($year !== null && $week !== null && $state !== null) {
            $fld = $this->swapFldWeekly($fld);
            $weekRow = $this->getWeeklyDataRow($row, $state);
            if ($weekRow && isset($weekRow->{ $fld })) {
                return $weekRow->{ $fld };
            }
        }
        return null;
    }

    protected function getWeeklyDataRow($row, $state = '')
    {
        if (!isset($this->v["weeklyDatRow"])) {
            $this->v["weeklyDatRow"] = [];
        }
        $year = $this->getRowYear($row);
        $week = $this->getRowWeek($row);
        if ($state == '') {
            $state = $this->getRowState($row);
        }
        if (!isset($this->v["weeklyDatRow"][$state])) {
            $this->v["weeklyDatRow"][$state] = [];
        }
        if (!isset($this->v["weeklyDatRow"][$state][$year])) {
            $this->v["weeklyDatRow"][$state][$year] = [];
        }
        if (!isset($this->v["weeklyDatRow"][$state][$year][$week])) {
            $this->v["weeklyDatRow"][$state][$year][$week] = BSMortWeeklyUs::where('mrt_week_us_week', $week)
                ->where('mrt_week_us_state', $state)
                ->where('mrt_week_us_year', $year)
                ->first();
        }
        return $this->v["weeklyDatRow"][$state][$year][$week];
    }

    private function isAnnualDataFld($dataSlug)
    {
        return (strpos($dataSlug, 'raw-pop') !== false
            || strpos($dataSlug, 'pop-by-age') !== false
            || substr($dataSlug, 0, 11) == 'perc-by-age'
            || strpos($dataSlug, 'life-expect') !== false
            || strpos($dataSlug, 'debt-govt') !== false);
    }

    protected function getAnnualData($row, $fld = '')
    {
        if (!isset($this->v["annualDat"])) {
            $this->v["annualDat"] = [];
        }
        $year = $this->getRowYear($row);
        $state = $this->getRowState($row);
        if ($year !== null && $state !== null) {
            if (!isset($this->v["annualDat"][$state])) {
                $this->v["annualDat"][$state] = [];
            }
            if (!isset($this->v["annualDat"][$state][$year])) {
                $this->v["annualDat"][$state][$year] = [];
            }
            $fld = $this->swapFldAnnual($fld);
            if (!isset($this->v["annualDat"][$state][$year][$fld])) {
                $this->v["annualDat"][$state][$year][$fld] = null;
                $usPop = $this->getAnnualDataRow($row);
                if ($usPop && isset($usPop->{ $fld })) {
                    $this->v["annualDat"][$state][$year][$fld] = $usPop->{ $fld };
                }
            }
            return $this->v["annualDat"][$state][$year][$fld];
        }
        return null;
    }

    protected function getAnnualDataRow($row, $state = '')
    {
        if (!isset($this->v["annualDatRow"])) {
            $this->v["annualDatRow"] = [];
        }
        $year = $this->getRowYear($row);
        if ($state == '') {
            $state = $this->getRowState($row);
        }
        if (!isset($this->v["annualDatRow"][$state])) {
            $this->v["annualDatRow"][$state] = [];
        }
        if (!isset($this->v["annualDatRow"][$state][$year])) {
            $this->v["annualDatRow"][$state][$year] = BSPopulationUs::where('us_pop_state', $state)
                ->where('us_pop_year', $year)
                ->first();
        }
        return $this->v["annualDatRow"][$state][$year];
    }

    protected function swapFldAnnual($fld)
    {
        $fld = str_replace('mrt_week_us_', 'us_pop_', $fld);
        $fld = str_replace('mrt_day_us_', 'us_pop_', $fld);
        return $fld;
    }

    protected function swapFldWeekly($fld)
    {
        $fld = str_replace('us_pop_', 'mrt_week_us_', $fld);
        $fld = str_replace('mrt_day_us_', 'mrt_week_us_', $fld);
        return $fld;
    }

    protected function getRowYear($row)
    {
        if (isset($row->us_pop_year)) {
            return $row->us_pop_year;
        }
        if (isset($row->mrt_week_us_year)) {
            return $row->mrt_week_us_year;
        }
        if (isset($row->mrt_day_us_year)) {
            return $row->mrt_day_us_year;
        }
        return null;
    }

    protected function getRowWeek($row)
    {
        if (isset($row->us_pop_week)) {
            return $row->us_pop_week;
        }
        if (isset($row->mrt_week_us_week)) {
            return $row->mrt_week_us_week;
        }
        if (isset($row->mrt_day_us_week)) {
            return $row->mrt_day_us_week;
        }
        return null;
    }

    protected function getRowState($row)
    {
        if (isset($row->us_pop_state)) {
            return $row->us_pop_state;
        }
        if (isset($row->mrt_week_us_state)) {
            return $row->mrt_week_us_state;
        }
        if (isset($row->mrt_day_us_state)) {
            return $row->mrt_day_us_state;
        }
        return null;
    }

    protected function calcDataPointValue($row, $dataSlug = '')
    {
//echo 'getDataPointValue ' . $dataSlug . ', row:<pre>'; print_r($row); echo '</pre>';
        if (strpos($dataSlug, 'mort-perc-') !== false) {
            return $this->calcMortPerc($row, $dataSlug);
        }
        if ($this->v["timescale"] != 'years' && $this->isAnnualDataFld($dataSlug)) {
            if (strpos($dataSlug, 'life-expect') !== false
                || strpos($dataSlug, 'debt-govt') !== false) {
                $row = $this->getAnnualDataRow($row, 'United States');
            } else {
                $row = $this->getAnnualDataRow($row);
            }
        }
//echo 'getDataPointValue 2  ' . $dataSlug . '<pre>'; print_r($row); echo '</pre>'; exit;
        switch ($dataSlug) {
            case 'perc-by-age-24':
                if ($row->us_pop_population > 0) {
                    return ($row->us_pop_25_years/$row->us_pop_population);
                }
                break;
            case 'perc-by-age-25-44':
                if ($row->us_pop_population > 0) {
                    return ($row->us_pop_25_44_years/$row->us_pop_population);
                }
                break;
            case 'perc-by-age-45-64':
                if ($row->us_pop_population > 0) {
                    return ($row->us_pop_45_64_years/$row->us_pop_population);
                }
                break;
            case 'perc-by-age-65-74':
                if ($row->us_pop_population > 0) {
                    return ($row->us_pop_65_74_years/$row->us_pop_population);
                }
                break;
            case 'perc-by-age-75-84':
                if ($row->us_pop_population > 0) {
                    return ($row->us_pop_75_84_years/$row->us_pop_population);
                }
                break;
            case 'perc-by-age-85':
                if ($row->us_pop_population > 0) {
                    return ($row->us_pop_85_years/$row->us_pop_population);
                }
                break;

            case 'perc-by-age-75':
                if ($row->us_pop_population > 0) {
                    $totPop = $row->us_pop_75_84_years+$row->us_pop_85_years;
                    return ($totPop/$row->us_pop_population);
                }
                break;
            case 'perc-by-age-65':
                if ($row->us_pop_population > 0) {
                    $totPop = $row->us_pop_65_74_years
                        +$row->us_pop_75_84_years
                        +$row->us_pop_85_years;
                    return ($totPop/$row->us_pop_population);
                }
                break;
            case 'perc-by-age-45':
                if ($row->us_pop_population > 0) {
                    $totPop = $row->us_pop_45_64_years
                        +$row->us_pop_65_74_years
                        +$row->us_pop_75_84_years
                        +$row->us_pop_85_years;
                    return ($totPop/$row->us_pop_population);
                }
                break;
            case 'perc-by-age-44':
                if ($row->us_pop_population > 0) {
                    $totPop = $row->us_pop_25_years+$row->us_pop_25_44_years;
                    return ($totPop/$row->us_pop_population);
                }
                break;
        }
        return null;
    }

    protected function calcMortPerc($row, $dataSlug = '')
    {
        $totPop = $totMort = 0;
        if ($this->v["timescale"] != 'years') {
            $prefix = 'mrt_week_us_';
            if ($this->v["timescale"] == 'days') {
                $prefix = 'mrt_day_us_';
            }
            $usRow = $this->getAnnualDataRow($row);
            switch ($dataSlug) {
                case 'mort-perc-by-age-75':
                case 'avg-mort-perc-by-age-75':
                    $totMort = $row->{ $prefix . 'mort_75_84_years' }
                        +$row->{ $prefix . 'mort_85_years' };
                    $totPop = $usRow->us_pop_75_84_years
                        +$usRow->us_pop_85_years;
                    break;
                case 'mort-perc-by-age-65':
                case 'avg-mort-perc-by-age-65':
                    $totMort = $row->{ $prefix . 'mort_65_74_years' }
                        +$row->{ $prefix . 'mort_75_84_years' }
                        +$row->{ $prefix . 'mort_85_years' };
                    $totPop = $usRow->us_pop_65_74_years
                        +$usRow->us_pop_75_84_years
                        +$usRow->us_pop_85_years;
                    break;
                case 'mort-perc-by-age-45':
                case 'avg-mort-perc-by-age-45':
                    $totMort = $row->{ $prefix . 'mort_45_64_years' }
                        +$row->{ $prefix . 'mort_65_74_years' }
                        +$row->{ $prefix . 'mort_75_84_years' }
                        +$row->{ $prefix . 'mort_85_years' };
                    $totPop = $usRow->us_pop_45_64_years
                        +$usRow->us_pop_65_74_years
                        +$usRow->us_pop_75_84_years
                        +$usRow->us_pop_85_years;
                    break;
                case 'mort-perc-by-age-44':
                case 'avg-mort-perc-by-age-44':
                    $totMort = $row->{ $prefix . 'mort_25_years' }
                        +$row->{ $prefix . 'mort_25_44_years' };
                    $totPop = $usRow->us_pop_25_years
                        +$usRow->us_pop_25_44_years;
                    break;
            }
        } else { // years
            switch ($dataSlug) {
                case 'mort-perc-by-age-75':
                case 'avg-mort-perc-by-age-75':
                    $totMort = $row->us_pop_mort_75_84_years
                        +$row->us_pop_mort_85_years;
                    $totPop = $row->us_pop_75_84_years
                        +$row->us_pop_85_years;
                    break;
                case 'mort-perc-by-age-65':
                case 'avg-mort-perc-by-age-65':
                    $totMort = $row->us_pop_mort_65_74_years
                        +$row->us_pop_mort_75_84_years
                        +$row->us_pop_mort_85_years;
                    $totPop = $row->us_pop_65_74_years
                        +$row->us_pop_75_84_years
                        +$row->us_pop_85_years;
                    break;
                case 'mort-perc-by-age-45':
                case 'avg-mort-perc-by-age-45':
                    $totMort = $row->us_pop_mort_45_64_years
                        +$row->us_pop_mort_65_74_years
                        +$row->us_pop_mort_75_84_years
                        +$row->us_pop_mort_85_years;
                    $totPop = $row->us_pop_45_64_years
                        +$row->us_pop_65_74_years
                        +$row->us_pop_75_84_years
                        +$row->us_pop_85_years;
                    break;
                case 'mort-perc-by-age-44':
                case 'avg-mort-perc-by-age-44':
                    $totMort = $row->us_pop_mort_25_years
                        +$row->us_pop_mort_25_44_years;
                    $totPop = $row->us_pop_25_years
                        +$row->us_pop_25_44_years;
                    break;
            }
        }
        if ($totPop > 0) {
            return 1000000*($totMort/$totPop);
        }
        return null;
    }


    public function loadStandardizedExample($override = false)
    {
        $this->v["stdCalcExample"] = '';
        if (!$override
            && !in_array('standardized-by-age-us', $this->v["reqDataSlugs"])
            && !in_array('standardized-by-age-state', $this->v["reqDataSlugs"])
            && !in_array('standardized-by-age-us-avg-5yr', $this->v["reqDataSlugs"])) {
            return '';
        }
        $stdYear = 2000;
        $stdState = 'US';
        if (isset($this->v["states"]) && sizeof($this->v["states"]) > 0) {
            $stdYear = 2020;
            $stdState = $this->v["states"][0];
            if ($stdState == 'US') {
                if (sizeof($this->v["states"]) > 1) {
                    $stdState = $this->v["states"][1];
                } else {
                    $stdYear = 2000;
                }
            }
        }
        $stdStateName = $compareState = $this->getStateName($stdState);
        $usPop = BSPopulationUs::where('us_pop_state', 'United States')
            ->where('us_pop_year', 2019)
            ->first();
        $comparePop = BSPopulationUs::where('us_pop_state', $stdStateName)
            ->where('us_pop_year', $stdYear)
            ->first();
        if (!$override && in_array('standardized-by-age-state', $this->v["reqDataSlugs"])) {
            $distPeeps = $GLOBALS["CUST"]->getPopDistPeepsUSbyName($stdStateName);
        } else {
            $distPeeps = $GLOBALS["CUST"]->getPopDistPeepsUS();
            $compareState = 'U.S.';
        }
        $ageStandards = [
            $distPeeps[0]*$comparePop->us_pop_mort_perc_25_years,
            $distPeeps[1]*$comparePop->us_pop_mort_perc_25_44_years,
            $distPeeps[2]*$comparePop->us_pop_mort_perc_45_64_years,
            $distPeeps[3]*$comparePop->us_pop_mort_perc_65_74_years,
            $distPeeps[4]*$comparePop->us_pop_mort_perc_75_84_years,
            $distPeeps[5]*$comparePop->us_pop_mort_perc_85_years
        ];
        $this->v["stdCalcExample"] = view(
            'vendor.buckystats.nodes.3091-pop-vital-graph-standard-calc',
            [
                "stdYear"      => $stdYear,
                "stdStateName" => $stdStateName,
                "compareState" => $compareState,
                "distPeeps"    => $distPeeps,
                "ageStandards" => $ageStandards,
                "comparePop"   => $comparePop,
                "usPop"        => $usPop
            ]
        )->render();
        return $this->v["stdCalcExample"];
    }


    protected function getGraphDataParams()
    {
        return implode(',', $this->v["reqDataSlugs"]);
    }

    protected function getGraphStateParams()
    {
        return implode(',', $this->v["states"]);
    }

    protected function getGraphURL()
    {
        $url = '/';
        if (sizeof($this->v["states"]) <= 1) {
            $url .= 'one/US/'
                . (($this->v["states"][0] != 'US') ? $this->v["states"][0] . '/' : '')
                . $this->v["timescale"] . '?data=' . $this->getGraphDataParams();
        } else {
            $url .= 'multi/US/' . $this->v["timescale"] . '?states='
                . $this->getGraphStateParams() . '&data=' . $this->getGraphDataParams();
        }
        return $url;
    }

    protected function getGraphLinkText()
    {
        return 'Change This Graph\'s Datasets';
    }

    protected function getGraphLinkIcon()
    {
        return '<img src="/buckystats/uploads/buckystats-ico.png" '
            . 'style="height: 24px; margin-right: 2px;"> ';
    }

    protected function getGraphEmbedLink()
    {
        return '<a href="' . $this->getGraphURL() . '" target="_blank">'
            . $this->getGraphLinkText() . '</a>';
    }

    protected function getGraphEmbed()
    {
        $rand = rand(1000000, 10000000);
        return '<div id="wrap' . $rand . '" style="width: 100%; margin: 15px 0px;"><div>'
            . $this->v["graph"]->print($rand) . '</div><div>'
            . $this->getGraphEmbedLink() . '</div></div>';
    }



    protected function loadDataset($datasetID = 0)
    {
        if (!isset($this->v["dataset"])
            || !isset($this->v["dataset"]->dat_id)
            || intVal($this->v["dataset"]->dat_id) != $datasetID) {
            $this->v["dataset"] = BSDatasets::find($datasetID);
        }
        return true;
    }

    public function wwdGraphDesc($datasetID = 0)
    {
        $data = [];
        if ($GLOBALS["SL"]->REQ->has('data')
            && strpos($GLOBALS["SL"]->REQ->has('data'), 'covid') !== false) {
            $data[] = 'covid';
        }
        return $GLOBALS["CUST"]->printSources($data);
        /*
        $this->loadDataset($datasetID);
        if ($this->v["dataset"] && isset($this->v["dataset"]->dat_desc)) {
            return '<p><br /></p><p><br /></p><h2 class="mT30 slBlueDark">Data Sources</h2><hr>'
                . '<h3 class="mB30">United States Population & All-Cause Mortality Estimates</h3>'
                . trim($this->v["dataset"]->dat_desc);
        }
        return '';
        */
    }

    protected function wwdDataTable($datasetID = 0)
    {
        $this->loadDataset($datasetID);
        if ($this->v["dataset"]
            && isset($this->v["dataset"]->dat_data_table)
            && intVal($this->v["dataset"]->dat_data_table) > 0) {
            $this->v["dataTbl"] = SLTables::find($this->v["dataset"]->dat_data_table);


            return trim($this->v["dataset"]->dat_data_table);
        }
        return '';
    }

    protected function getStateName($abbr)
    {
        $stateName = $GLOBALS["SL"]->states->getState($abbr);
        if ($abbr == 'US' || $stateName == 'Federal') {
            $stateName = 'United States';
        }
        return $stateName;
    }



    public function checkDataTableExports()
    {
        $file = str_replace(' ', '_', $this->v["graph"]->title) . '-' . date("Y-m-d");
        if ($GLOBALS["SL"]->REQ->has('excel')) {
            $this->v["graph"]->excel($file . '.xls');
        }
        if ($GLOBALS["SL"]->REQ->has('csv')) {
            $this->v["graph"]->csv($file . '.csv');
        }
    }

}


