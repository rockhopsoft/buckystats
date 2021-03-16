<?php
namespace RockHopSoft\BuckyStats\Controllers;

use DB;
use App\Models\BSCdcWeeklyDeathsByAge20152020Unweighted;
use App\Models\BSCdcWeeklyDeathsByAge20152020Weighted;
use App\Models\BSCdcMortByAge19992016;
use App\Models\BSCdcMortByAge19791998;
use App\Models\BSCdcMortByAge19681978;
use App\Models\BSLifeExpectancy;
use App\Models\BSPopulationDist;
use App\Models\BSPopulationUs;
use App\Models\BSPopulationUs1900;
use App\Models\BSPopulationUsMort1900;
use App\Models\BSPopulationMd1790;
use RockHopSoft\BuckyStats\Controllers\DatasetsCompilePlace;
use RockHopSoft\BuckyStats\Controllers\DatasetsCompilePopDistributions;

class DatasetsCompileVitalsYearly extends DatasetsCompilePopDistributions
{

    public function runCompilePopUS()
    {
        $year = intVal($GLOBALS["SL"]->REQ->year);
        if ($year == 1967) {
            return $this->restartUS($year);
        } elseif ($year >= 1968 && $year <= 1978) {
            return $this->runPopUS19681978($year);
        } elseif ($year >= 1979 && $year <= 1998) {
            return $this->runPopUS19791998($year);
        } elseif ($year >= 1999 && $year <= 2016) {
            return $this->runPopUS19992016($year);
        } elseif ($year >= 2017 && $year <= 2020) {
            return $this->runPopUS20152020($year);
        } elseif ($year == 2021) {
            return $this->runPopWrapupUS();
        }
        return '';
    }

    public function restartUS($year)
    {
        DB::table('bs_population_us')->truncate();
        echo $this->redir($year);
        exit;
    }

    protected function loadUS($year = 0, $weeks = false)
    {
        $GLOBALS["CUST"]->loadPopDistUS();
        $this->lookupAbbr['US'] = 0;
        $this->lookupName['united states'] = 0;
        $this->data[] = new DatasetsCompilePlace('US', 'United States', $year, $weeks);
        foreach ($GLOBALS["SL"]->states->stateList as $abbr => $name) {
            $this->lookupAbbr[$abbr] = sizeof($this->data);
            $this->lookupName[strtolower($name)] = sizeof($this->data);
            $this->data[] = new DatasetsCompilePlace($abbr, $name, $year, $weeks);
        }
        return true;
    }

    private function runPopUS19681978($year)
    {
        $this->loadUS($year);
        $fld = 'cdc_mort_age_68_78_year';
        $load = BSCdcMortByAge19681978::where($fld, 'LIKE', $year)
            ->get();
        if ($load->isNotEmpty()) {
            foreach ($load as $rec) {
                if (isset($rec->cdc_mort_age_68_78_state)
                    && isset($rec->cdc_mort_age_68_78_population)
                    && isset($rec->cdc_mort_age_68_78_deaths)) {
                    $state = strtolower(trim($rec->cdc_mort_age_68_78_state));
                    if (isset($this->lookupName[$state])) {
                        $stateInd = $this->lookupName[$state];
                        $pop      = intVal($rec->cdc_mort_age_68_78_population);
                        $mort     = intVal($rec->cdc_mort_age_68_78_deaths);
                        $age = '';
                        if (isset($rec->cdc_mort_age_68_78_age_group_code)) {
                            $age = trim($rec->cdc_mort_age_68_78_age_group_code);
                        }
                        $fld = $this->covertAgePopUS19682016($age);
                        $this->addYearData($stateInd, $pop, $mort, $fld);
                    }
                }
            }
        }
        $this->runPopSumsUS($year);
        foreach ($this->data as $ind => $dat) {
            $this->data[$ind]->addUpAgeGroups();
            $this->data[$ind]->saveData();
        }
        echo $this->printCompileTable();
        echo $this->redir($year);
        exit;
    }

    private function runPopUS19791998($year)
    {
        $this->loadUS($year);
        $fld = 'cdc_mort_age_79_98_year';
        $load = BSCdcMortByAge19791998::where($fld, 'LIKE', $year)
            ->get();
        if ($load->isNotEmpty()) {
            foreach ($load as $rec) {
                if (isset($rec->cdc_mort_age_79_98_state)
                    && isset($rec->cdc_mort_age_79_98_population)
                    && isset($rec->cdc_mort_age_79_98_deaths)) {
                    $state = strtolower(trim($rec->cdc_mort_age_79_98_state));
                    if (isset($this->lookupName[$state])) {
                        $stateInd = $this->lookupName[$state];
                        $pop  = intVal($rec->cdc_mort_age_79_98_population);
                        $mort = intVal($rec->cdc_mort_age_79_98_deaths);
                        $age  = '';
                        if (isset($rec->cdc_mort_age_79_98_age_group_code)) {
                            $age = trim($rec->cdc_mort_age_79_98_age_group_code);
                        }
                        $fld = $this->covertAgePopUS19682016($age);
                        $this->addYearData($stateInd, $pop, $mort, $fld);
                    }
                }
            }
        }
        $this->runPopSumsUS($year);
        foreach ($this->data as $ind => $dat) {
            $this->data[$ind]->addUpAgeGroups();
            $this->data[$ind]->saveData();
        }
        echo $this->printCompileTable();
        echo $this->redir($year);
        exit;
    }

    private function runPopUS19992016($year)
    {
        $this->loadUS($year);
        $fld = 'cdc_mort_age_99_16_year';
        $load = BSCdcMortByAge19992016::where($fld, 'LIKE', $year)
            ->get();
        if ($load->isNotEmpty()) {
            foreach ($load as $rec) {
                if (isset($rec->cdc_mort_age_99_16_state)
                    && isset($rec->cdc_mort_age_99_16_population)
                    && isset($rec->cdc_mort_age_99_16_deaths)) {
                    $state = strtolower(trim($rec->cdc_mort_age_99_16_state));
                    if (isset($this->lookupName[$state])) {
                        $stateInd = $this->lookupName[$state];
                        $pop  = intVal($rec->cdc_mort_age_99_16_population);
                        $mort = intVal($rec->cdc_mort_age_99_16_deaths);
                        $age = '';
                        if (isset($rec->cdc_mort_age_99_16_age_group_code)) {
                            $age = trim($rec->cdc_mort_age_99_16_age_group_code);
                        }
                        $fld = $this->covertAgePopUS19682016($age);
                        $this->addYearData($stateInd, $pop, $mort, $fld);
                    }
                }
            }
        }
        $this->runPopSumsUS($year);
        foreach ($this->data as $ind => $dat) {
            $this->data[$ind]->addUpAgeGroups();
            $this->data[$ind]->saveData();
        }
        echo $this->printCompileTable();
        echo $this->redir($year);
        exit;
    }


    private function runPopSumsUS($year)
    {
        foreach ($this->data as $ind => $dat) {
            if ($ind > 0) {
                foreach ($this->popSumFldsUS as $fld => $distFlds) {
                    if (isset($dat->rec->{ $fld })) {
                        $this->data[0]->rec->{ $fld } += $dat->rec->{ $fld };
                    }
                    $fld = str_replace('us_pop_', 'us_pop_mort_', $fld);
                    if (isset($dat->rec->{ $fld })) {
                        $this->data[0]->rec->{ $fld } += $dat->rec->{ $fld };
                    }
                }
            }
        }
        return true;
    }

    private function runPopUS20152020($year)
    {
        $this->loadUS($year);
        $fld = 'cdc_mort_age_15_20_year';
        $load = BSCdcWeeklyDeathsByAge20152020Weighted::where($fld, 'LIKE', $year)
            // ->where('cdc_mort_age_15_20_state_abbreviation', 'NOT LIKE', 'US')
            ->get();
        if ($load->isNotEmpty()) {
            foreach ($load as $rec) {
                $abbr = $this->getWeeklyStateAbbrUS20152020($rec);
                if (isset($this->lookupAbbr[$abbr])
                    && isset($rec->cdc_mort_age_15_20_number_of_deaths)) {
                    $stateInd = $this->lookupAbbr[$abbr];
                    $mort = intVal($rec->cdc_mort_age_15_20_number_of_deaths);
                    $fld = $this->covertAgePopUS20152020($rec);
                    $this->addYearData($stateInd, 0, $mort, $fld);
                }
            }
        }
        $this->popDistRecentYears($year);
        foreach ($this->data as $ind => $dat) {
            $this->data[$ind]->addUpAgeGroups();
            $this->data[$ind]->saveData();
        }
        echo $this->printCompileTable();
        echo $this->redir($year);
        exit;
    }

    private function popDistRecentYears($year)
    {
        foreach ($this->data as $ind => $dat) {
            $name = $dat->name;
            if ($dat->name == 'United States') {
                $name = 'U.S. ' . $year . ' Estimate';
            }
            $dist = BSPopulationDist::where('pop_dist_year', 'LIKE', $year)
                ->where('pop_dist_name', 'LIKE', $name)
                ->first();
            if ($dist && isset($dist->pop_dist_name)) {
                foreach ($this->popSumFldsUS as $fld => $distFlds) {
                    if (sizeof($distFlds) > 0) {
                        $this->data[$ind]->rec->{ $fld } = 0;
                        foreach ($distFlds as $distFld) {
                            if (isset($dist->{ $distFld })) {
                                $this->data[$ind]->rec->{ $fld } += $dist->{ $distFld };
                            }
                        }
                    }
                }
            } else {
                $year1 = BSPopulationUs::where('us_pop_year', ($year-1))
                    ->where('us_pop_state', 'LIKE', $name)
                    ->first();
                $year6 = BSPopulationUs::where('us_pop_year', ($year-6))
                    ->where('us_pop_state', 'LIKE', $name)
                    ->first();
                if ($year1
                    && $year6
                    && isset($year1->us_pop_population)
                    && isset($year6->us_pop_population)) {
                    foreach ($this->popSumFldsUS as $fld => $distFlds) {
                        if (sizeof($distFlds) > 0) {
                            $this->data[$ind]->rec->{ $fld }
                                = $this->fldPopDist2020($fld, $year1, $year6);
                        }
                    }
                }
            }
            $this->data[$ind]->saveData();
        }
        return true;
    }

    protected function covertAgePopUS19682016($age)
    {
        $undr25 = [ '1', '1-4', '5-9', '10-14', '15-19', '20-24' ];
        $upto44 = [ '25-34', '35-44' ];
        $upto64 = [ '45-54', '55-64' ];
        if (in_array($age, $undr25)) {
            return 'us_pop_25_years';
        } elseif (in_array($age, $upto44)) {
            return 'us_pop_25_44_years';
        } elseif (in_array($age, $upto64)) {
            return 'us_pop_45_64_years';
        } elseif ($age == '65-74') {
            return 'us_pop_65_74_years';
        } elseif ($age == '75-84') {
            return 'us_pop_75_84_years';
        } elseif ($age == '85+') {
            return 'us_pop_85_years';
        } elseif ($age == 'NS') {
            return 'us_pop_age_unknown';
        } elseif ($age == '') {
            // total without non-age-breakdowns
            return '';
        }
        return '';
    }

    protected function covertAgePopUS20152020($rec)
    {
        $age  = '';
        if (isset($rec->cdc_mort_age_15_20_age_group)) {
            $age = trim($rec->cdc_mort_age_15_20_age_group);
        }
        if ($age == 'Under 25 years') {
            return 'us_pop_25_years';
        } elseif ($age == '25-44 years') {
            return 'us_pop_25_44_years';
        } elseif ($age == '45-64 years') {
            return 'us_pop_45_64_years';
        } elseif ($age == '65-74 years') {
            return 'us_pop_65_74_years';
        } elseif ($age == '75-84 years') {
            return 'us_pop_75_84_years';
        } elseif ($age == '85 years and older') {
            return 'us_pop_85_years';
        } elseif ($age == 'NS') {
            return 'us_pop_age_unknown';
        } elseif ($age == '') {
            // total without non-age-breakdowns
            return '';
        }
        return '';
    }

    protected function getWeeklyStateAbbrUS20152020($rec)
    {
        $abbr = '';
        if (isset($rec->cdc_mort_age_15_20_state_abbreviation)) {
            $abbr = trim($rec->cdc_mort_age_15_20_state_abbreviation);
            if ($abbr == 'YC') {
                $abbr = 'NY';
            }
        }
        return $abbr;
    }

    private function addYearData($stateInd, $pop, $mort, $fld)
    {
        if (isset($this->data[$stateInd])) {
            if (trim($fld) != '') {
                if ($fld != 'us_pop_age_unknown' && $pop > 0) {
                    $this->data[$stateInd]->addYearVal($pop, $fld);
                }
                $fld = str_replace('us_pop_', 'us_pop_mort_', $fld);
                $this->data[$stateInd]->addYearVal($mort, $fld);
            }
        }
        return true;
    }

    private function runPopWrapupUS()
    {
        $this->runPre1968PopUS();
        echo '<h4>Finished Re-Compiling Historical Population Data</h4>';
        exit;
    }

    private function runPre1968PopUS()
    {
        $chk = BSPopulationUs1900::where('us_pop_1900_year', '<', 1968)
            ->get();
        if ($chk->isNotEmpty()) {
            foreach ($chk as $pop) {
                $addPop = new BSPopulationUs;
                $addPop->us_pop_state      = 'United States';
                $addPop->us_pop_year       = $pop->us_pop_1900_year;
                $addPop->us_pop_population = $pop->us_pop_1900_population;
                $addPop->save();
            }
        }
        $chk = BSPopulationUsMort1900::where('us_mort_1900_year', '<', 1968)
            ->get();
        if ($chk->isNotEmpty()) {
            foreach ($chk as $pop) {
                $addPop = BSPopulationUs::where('us_pop_state', 'United States')
                    ->where('us_pop_year', $pop->us_mort_1900_year)
                    ->first();
                $addPop->us_pop_mortality = $pop->us_mort_1900_deaths_estimate;
                $addPop->save();
            }
        }
        $chk = BSPopulationMd1790::where('pop_md_year', '<', 1968)
            ->get();
        if ($chk->isNotEmpty()) {
            foreach ($chk as $pop) {
                $addPop = new BSPopulationUs;
                $addPop->us_pop_state      = 'Maryland';
                $addPop->us_pop_year       = $pop->pop_md_year;
                $addPop->us_pop_population = $pop->pop_md_population;
                $addPop->us_pop_mortality  = $pop->pop_md_mortality;
                $addPop->save();
            }
        }
        $addPop = new BSPopulationUs;
        $addPop->us_pop_state = 'Maryland';
        $addPop->us_pop_year  = 1901;
        $addPop->save();
        return true;
    }

    public function calcPercsPopUS()
    {
        $chk = BSPopulationUs::get();
        if ($chk->isNotEmpty()) {
            foreach ($chk as $pop) {
                foreach ($this->popSumFldsUS as $fld => $distFlds) {
                    $mortFld = $this->getMortFld($fld);
                    $percFld = $this->getMortPercFld($fld);
                    if (isset($pop->{ $fld })
                        && isset($pop->{ $mortFld })
                        && intVal($pop->{ $fld }) > 0) {
                        $pop->{ $percFld } = ($pop->{ $mortFld }/$pop->{ $fld });
                    }
                }
                $pop->save();
            }
        }
        return true;
    }

    public function calcStandardPopUS()
    {
        $GLOBALS["CUST"]->loadPopDistUS();
        $chk = BSPopulationUs::get();
        if ($chk->isNotEmpty()) {
            foreach ($chk as $pop) {
                $d = 'United States';
                if (isset($GLOBALS["CUST"]->distPeeps[$d])) {
                    $pop->us_pop_mort_std_dist_us
                        = ($GLOBALS["CUST"]->distPeeps[$d][0]*$pop->us_pop_mort_perc_25_years)
                            + ($GLOBALS["CUST"]->distPeeps[$d][1]*$pop->us_pop_mort_perc_25_44_years)
                            + ($GLOBALS["CUST"]->distPeeps[$d][2]*$pop->us_pop_mort_perc_45_64_years)
                            + ($GLOBALS["CUST"]->distPeeps[$d][3]*$pop->us_pop_mort_perc_65_74_years)
                            + ($GLOBALS["CUST"]->distPeeps[$d][4]*$pop->us_pop_mort_perc_75_84_years)
                            + ($GLOBALS["CUST"]->distPeeps[$d][5]*$pop->us_pop_mort_perc_85_years);
                }
                $d = $pop->us_pop_state;
                if ($d == 'United States') {
                    $pop->us_pop_mort_std_dist_state = $pop->us_pop_mort_std_dist_us;
                } elseif (isset($GLOBALS["CUST"]->distPeeps[$d])) {
                    $pop->us_pop_mort_std_dist_state
                        = ($GLOBALS["CUST"]->distPeeps[$d][0]*$pop->us_pop_mort_perc_25_years)
                            + ($GLOBALS["CUST"]->distPeeps[$d][1]*$pop->us_pop_mort_perc_25_44_years)
                            + ($GLOBALS["CUST"]->distPeeps[$d][2]*$pop->us_pop_mort_perc_45_64_years)
                            + ($GLOBALS["CUST"]->distPeeps[$d][3]*$pop->us_pop_mort_perc_65_74_years)
                            + ($GLOBALS["CUST"]->distPeeps[$d][4]*$pop->us_pop_mort_perc_75_84_years)
                            + ($GLOBALS["CUST"]->distPeeps[$d][5]*$pop->us_pop_mort_perc_85_years);
                }
                $pop->save();
            }
        }
        return true;
    }

    public function compareAvg5yr()
    {
        $this->v["calcDat"] = [];
        $chk = BSPopulationUs::select('us_pop_id', 'us_pop_state', 'us_pop_year',
                'us_pop_mort_perc', 'us_pop_mort_std_dist_us')
            ->get();
        $this->compareAvg5yrLoad($chk);
        if ($chk->isNotEmpty()) {
            foreach ($chk as $pop) {
                $year = intVal($pop->us_pop_year);
                if (isset($this->v["calcDat"][$pop->us_pop_state][($year-1)])
                    && isset($this->v["calcDat"][$pop->us_pop_state][($year-2)])
                    && isset($this->v["calcDat"][$pop->us_pop_state][($year-3)])
                    && isset($this->v["calcDat"][$pop->us_pop_state][($year-4)])
                    && isset($this->v["calcDat"][$pop->us_pop_state][($year-5)])) {

                    $incPerc = $this->compareAvg5yrVar($pop->us_pop_state, $year, 'perc');
                    $incStd = $this->compareAvg5yrVar($pop->us_pop_state, $year, 'std_dist');
                    BSPopulationUs::find($pop->us_pop_id)
                        ->update([
                            'us_pop_mort_perc_avg_inc' => $incPerc,
                            'us_pop_mort_std_dist_us_avg_inc' => $incStd
                        ]);
                }
            }
        }
        return true;
    }

    private function compareAvg5yrLoad($chk)
    {
        if ($chk->isNotEmpty()) {
            foreach ($chk as $pop) {
                if (!isset($this->v["calcDat"][$pop->us_pop_state])) {
                    $this->v["calcDat"][$pop->us_pop_state] = [];
                }
                $this->v["calcDat"][$pop->us_pop_state][intVal($pop->us_pop_year)] = [
                    'perc'     => $pop->us_pop_mort_perc,
                    'std_dist' => $pop->us_pop_mort_std_dist_us
                ];
            }
        }
        return true;
    }

    private function compareAvg5yrVar($state, $year, $var = 'perc')
    {
        $increase = $avg = 0;
        if (isset($this->v["calcDat"][$state][$year][$var])
            && isset($this->v["calcDat"][$state][($year-1)][$var])
            && isset($this->v["calcDat"][$state][($year-2)][$var])
            && isset($this->v["calcDat"][$state][($year-3)][$var])
            && isset($this->v["calcDat"][$state][($year-4)][$var])
            && isset($this->v["calcDat"][$state][($year-5)][$var])
            && $this->v["calcDat"][$state][$year][$var] > 0
            && $this->v["calcDat"][$state][($year-1)][$var] > 0
            && $this->v["calcDat"][$state][($year-2)][$var] > 0
            && $this->v["calcDat"][$state][($year-3)][$var] > 0
            && $this->v["calcDat"][$state][($year-4)][$var] > 0
            && $this->v["calcDat"][$state][($year-5)][$var] > 0) {
            $avg = ($this->v["calcDat"][$state][($year-1)][$var]
                + $this->v["calcDat"][$state][($year-2)][$var]
                + $this->v["calcDat"][$state][($year-3)][$var]
                + $this->v["calcDat"][$state][($year-4)][$var]
                + $this->v["calcDat"][$state][($year-5)][$var]) / 5;
            $increase = ($this->v["calcDat"][$state][$year][$var] - $avg) / $avg;
        }
        return $increase;
    }

    public function runCompilePopLifeExpectUS()
    {
        $lifeExpTypes = [
            0  => 'at_birth',
            65 => 'at_65',
            75 => 'at_75'
        ];
        $years = [];
        foreach ($lifeExpTypes as $age => $fldname) {
            $years[$age] = [];
        }
        $expects = BSLifeExpectancy::orderBy('life_exp_year', 'asc')
            ->get();
        if ($expects->isNotEmpty()) {
            foreach ($expects as $i => $exp) {
                $pop = BSPopulationUs::where('us_pop_state', 'United States')
                    ->where('us_pop_year', intVal($exp->life_exp_year))
                    ->first();
                if ($pop && isset($pop->us_pop_population)) {
                    foreach ($lifeExpTypes as $age => $fldname) {
                        $years[$age][] = $exp->{ 'life_exp_' . $fldname };
                        $pop->{ 'us_pop_life_expect_' . $fldname } = $exp->{ 'life_exp_' . $fldname };
                        $pop->{ 'us_pop_life_expect_' . $fldname . '_avg_inc' }
                            = $this->getAvgIncLast5($years[$age]);
                    }
                    $pop->save();
                }
            }
        }
        echo 'Compiled Life Expectancy Stats!';
        exit;
    }


    public function runCompileYears20152019()
    {
        $states = [];
        $fldAvgs = $this->getYearFldsAvg();
        BSPopulationUs::where('us_pop_year', 20152019)
            ->delete();
        $pops = BSPopulationUs::whereIn('us_pop_year', [2015, 2016, 2017, 2018, 2019])
            ->get();
        if ($pops->isNotEmpty()) {
            foreach ($pops as $pop) {
                $s = $pop->us_pop_state;
                if (!isset($states[$s])) {
                    $states[$s] = new BSPopulationUs;
                    $states[$s]->us_pop_state = $s;
                    $states[$s]->us_pop_year  = 20152019;
                    foreach ($fldAvgs as $fld) {
                        $states[$s]->{ $fld } = 0;
                    }
                }
                foreach ($fldAvgs as $fld) {
                    $states[$s]->{ $fld } += $pop->{ $fld };
                }
            }
            foreach ($states as $s => $state) {
                foreach ($fldAvgs as $fld) {
                    $states[$s]->{ $fld } = $states[$s]->{ $fld }/5;
                }
                $states[$s]->save();
            }
        }
        echo 'Year averages calculated for 2015-2019!';
        exit;
    }




    protected function getYearFldsAvg()
    {
        return [
            'us_pop_population',
            'us_pop_25_years',
            'us_pop_25_44_years',
            'us_pop_45_64_years',
            'us_pop_65_74_years',
            'us_pop_75_84_years',
            'us_pop_85_years',
            'us_pop_age_unknown',

            'us_pop_mortality',
            'us_pop_mort_25_years',
            'us_pop_mort_25_44_years',
            'us_pop_mort_45_64_years',
            'us_pop_mort_65_74_years',
            'us_pop_mort_75_84_years',
            'us_pop_mort_85_years',
            'us_pop_mort_age_unknown',

            'us_pop_mort_perc',
            'us_pop_mort_perc_25_years',
            'us_pop_mort_perc_25_44_years',
            'us_pop_mort_perc_45_64_years',
            'us_pop_mort_perc_65_74_years',
            'us_pop_mort_perc_75_84_years',
            'us_pop_mort_perc_85_years',
            'us_pop_mort_perc_age_unknown',
            'us_pop_mort_perc_avg_inc',

            'us_pop_mort_std_dist_us',
            'us_pop_mort_std_dist_state',
            'us_pop_mort_std_dist_us_avg_inc',

            'us_pop_life_expect_at_birth',
            'us_pop_life_expect_at_65',
            'us_pop_life_expect_at_75',
            'us_pop_life_expect_at_birth_avg_inc',
            'us_pop_life_expect_at_65_avg_inc',
            'us_pop_life_expect_at_75_avg_inc',

            /*
            'us_pop_oxf_stringency_avg',
            'us_pop_oxf_stringency_max',
            'us_pop_oxf_govt_response_avg',
            'us_pop_oxf_govt_response_max',
            'us_pop_oxf_containment_health_avg',
            'us_pop_oxf_containment_health_max',
            'us_pop_oxf_economic_support_avg',
            'us_pop_oxf_economic_support_max',
            */

            'us_pop_debt_outstanding_amount',
            'us_pop_debt_outstanding_per_capita',
            'us_pop_debt_outstanding_per_capita_avg_inc',
            'us_pop_unemployment_rate'
        ];
    }

}