<?php
namespace RockHopSoft\BuckyStats\Controllers;

use DB;
use App\Models\BSMortDailyUs;
use App\Models\BSMortWeeklyUs;
use App\Models\BSPopulationUs;
use RockHopSoft\Survloop\Controllers\Stats\SurvStatsTbl;
use RockHopSoft\Survloop\Controllers\Stats\SurvGraphScatter;
use RockHopSoft\BuckyStats\Controllers\BuckyDatasetInterface;
use RockHopSoft\BuckyStats\Controllers\DatasetsLookups;

class ReportCovidResponses extends DatasetsLookups
{

    public function printReportCovid($nID)
    {
        $this->setDataTableSort();
        $ret = '';
        $pageUrl = '/covid-govt-response';
        if ($GLOBALS["SL"]->REQ->has('ajaxTbl')) {
            $pageUrl .= '?ajaxTbl=1&sort=' . $GLOBALS["SL"]->REQ->get('sort');
            $ret = $GLOBALS["SL"]->chkCache($pageUrl, 'page-html', 1);
            if (trim($ret) != '' && !$GLOBALS["SL"]->REQ->has('refresh')) {
                echo $ret;
                exit;
            }
        } else {
            $this->initReportCovidScatters();
        }
        $this->v["covidTblUS"] = new SurvStatsTbl;
        if ($GLOBALS["SL"]->REQ->has('csv')) {
            $this->printReportCovidHeaderCsv();
        } else {
            $this->printReportCovidHeaderWeb();
        }
        $dir = 'desc';
        if ($this->v["sortSlug"] == 'state-name') {
            $dir = 'asc';
        }
        $states = BSPopulationUs::where('us_pop_year', 2020)
            ->orderBy($this->v["sort"], $dir)
            ->get();
        if ($states->isNotEmpty()) {
            foreach ($states as $state) {
                if (!$GLOBALS["SL"]->REQ->has('ajaxTbl')
                    && $state->us_pop_state != 'District of Columbia') {
                    $x1 = $state->us_pop_oxf_govt_response_avg;
                    $x2 = $state->us_pop_oxf_govt_response_max;
                    $x3 = $state->us_pop_oxf_containment_health_avg;
                    $x4 = $state->us_pop_oxf_stringency_avg;
                    $x5 = $state->us_pop_oxf_economic_support_avg;
                    $y1 = $state->us_pop_mort_std_dist_us;
                    $y2 = (100*$state->us_pop_mort_std_dist_us_avg_inc);
                    $this->v["graph1"]->addDataLineVal($x1, $y1, $state->us_pop_state);
                    $this->v["graph2"]->addDataLineVal($x1, $y2, $state->us_pop_state);
                    $this->v["graph3"]->addDataLineVal($x2, $y1, $state->us_pop_state);
                    $this->v["graph4"]->addDataLineVal($x2, $y2, $state->us_pop_state);
                    $this->v["graph5"]->addDataLineVal($x3, $y1, $state->us_pop_state);
                    $this->v["graph6"]->addDataLineVal($x3, $y2, $state->us_pop_state);
                    $this->v["graph7"]->addDataLineVal($x4, $y1, $state->us_pop_state);
                    $this->v["graph8"]->addDataLineVal($x4, $y2, $state->us_pop_state);
                    $this->v["graph9"]->addDataLineVal($x5, $y1, $state->us_pop_state);
                    $this->v["graph10"]->addDataLineVal($x5, $y2, $state->us_pop_state);
                }
                $this->v["covidTblUS"]->startNewRow();
                $this->v["covidTblUS"]->addHeaderCell($state->us_pop_state, 'brdRgtBlue2');
                $this->v["covidTblUS"]->addRowCellNumber($state->us_pop_mort_std_dist_us, 'brdLftGrey');
                $this->v["covidTblUS"]->addRowCellPerc($state->us_pop_mort_std_dist_us_avg_inc);
                foreach ($this->getCovidVars() as $var) {
                    $this->v["covidTblUS"]->addRowCellNumber($state->{ $var[1] . '_avg' }, 'brdLftGrey');
                    $this->v["covidTblUS"]->addRowCellNumber($state->{ $var[1] . '_max' });
                }
            }
        }
        if ($GLOBALS["SL"]->REQ->has('ajaxTbl')) {
            $ret = $this->v["covidTblUS"]->print();
            $GLOBALS["SL"]->putCache($pageUrl, $ret, 'page-html', 1);
            echo $ret;
            exit;
        }
        $this->checkCovidExports();

        $reportInterface = new BuckyDatasetInterface;
        $reportInterface->loadStandardizedExample(true);
        $this->v["stdCalcExample"] = $reportInterface->v["stdCalcExample"];

        return view(
            'vendor.buckystats.nodes.3131-report-covid-response',
            $this->v
        )->render();
    }

    private function setDataTableSort()
    {
        $this->v["sort"] = 'us_pop_oxf_govt_response_avg';
        $this->v["sortSlug"] = 'covid-overall-avg';
        if ($GLOBALS["SL"]->REQ->has('sort')) {
            $customSort = $this->getDataTableSortFld($GLOBALS["SL"]->REQ->get('sort'));
            if ($customSort != '') {
                $this->v["sort"] = $customSort;
                $this->v["sortSlug"] = $GLOBALS["SL"]->REQ->get('sort');
            }
        }
    }

    private function getDataTableSortFld($dataSlug)
    {
        foreach ($this->dataTableSortsArr() as $sort) {
            if ($sort[0] == $dataSlug) {
                return $sort[1];
            }
        }
    }

    private function getDataTableSortSlug($fldName)
    {
        foreach ($this->dataTableSortsArr() as $sort) {
            if ($sort[1] == $fldName) {
                return $sort[0];
            }
        }
    }

    private function dataTableSortsArr()
    {
        $this->v["sortArr"] = [
            [ 'state-name',                     'us_pop_state'                      ],
            [ 'standardized-by-age-us',         'us_pop_mort_std_dist_us'           ],
            [ 'standardized-by-age-us-avg-5yr', 'us_pop_mort_std_dist_us_avg_inc'   ],
            [ 'covid-overall-avg',              'us_pop_oxf_govt_response_avg'      ],
            [ 'covid-overall-max',              'us_pop_oxf_govt_response_max'      ],
            [ 'covid-containment-avg',          'us_pop_oxf_containment_health_avg' ],
            [ 'covid-containment-max',          'us_pop_oxf_containment_health_max' ],
            [ 'covid-stringency-avg',           'us_pop_oxf_stringency_avg'         ],
            [ 'covid-stringency-max',           'us_pop_oxf_stringency_max'         ],
            [ 'covid-economic-avg',             'us_pop_oxf_economic_support_avg'   ],
            [ 'covid-economic-max',             'us_pop_oxf_economic_support_max'   ]
        ];
        return $this->v["sortArr"];
    }

    private function checkCovidExports()
    {
        $file = "COVID-Response-US-States-Annual_Average_of_Daily_Indices";
        if ($GLOBALS["SL"]->REQ->has('excel')) {
            $this->v["covidTblUS"]->excel($file . '.xls');
        }
        if ($GLOBALS["SL"]->REQ->has('csv')) {
            $this->v["covidTblUS"]->csv($file . '.csv');
        }
    }

    private function printReportCovidHeaderWeb()
    {
        $ico = '<i class="fa fa-caret-down mL5 slBlueDark" aria-hidden="true"></i>';
        $this->v["covidTblUS"]->startNewRow();

        $header = '<a data-sort-tbl="graphDataTbl" data-sort-slug="state-name" '
            . 'href="javascript:;" class="dataTblHeaderSort">'
            . 'State / Jurisdiction: <nobr>2020 Overall</nobr></a>';
        if ($this->v["sortSlug"] == 'state-name') {
            $header = 'State / Jurisdiction: <nobr>2020 Overall ' . $ico . '</nobr>';
        }
        $this->v["covidTblUS"]->addHeaderRowSpan(
            $header,
            'brdRgtBlue2 brdBotBlue2'
        );

        $header = '<a data-sort-tbl="graphDataTbl" data-sort-slug="standardized-by-age-us" '
            . 'href="javascript:;" class="dataTblHeaderSort">'
            . 'Deaths per Million of U.S. 2019 Standardized Population</a>';
        if ($this->v["sortSlug"] == 'standardized-by-age-us') {
            $header = 'Deaths per Million of U.S. 2019 Standardized <nobr>Population '
                . $ico . '</nobr>';
        }
        $this->v["covidTblUS"]->addHeaderRowSpan($header, 'brdLftGrey brdBotBlue2');

        $header = '<a data-sort-tbl="graphDataTbl" data-sort-slug="standardized-by-age-us-avg-5yr" '
            . 'href="javascript:;" class="dataTblHeaderSort">'
            . 'Deaths per Million of U.S. 2019 Standardized Population</a>';
        if ($this->v["sortSlug"] == 'standardized-by-age-us-avg-5yr') {
            $header = '<nobr>% Increase of</nobr> Standardized Mortality Over '
                . '<nobr>2015-2019</nobr> <nobr>Average ' . $ico . '</nobr>';
        }
        $this->v["covidTblUS"]->addHeaderRowSpan($header, 'brdBotBlue2');

        foreach ($this->getCovidVars() as $v => $var) {
            $this->v["covidTblUS"]->addHeaderCellSpan($var[0] . ' Index', 'brdLftGrey');
        }
        $this->v["covidTblUS"]->startNewRow('brdBotBlue2');
        foreach ($this->getCovidVars() as $v => $var) {
            $header = '<a data-sort-slug="' . $var[2] . '-avg" href="javascript:;" '
                . 'data-sort-tbl="graphDataTbl" class="dataTblHeaderSort">Daily Average</a>';
            if ($this->v["sortSlug"] == ($var[2] . '-avg')) {
                $header = 'Daily <nobr>Average' . $ico . '</nobr>';
            }
            $this->v["covidTblUS"]->addHeaderCell($header, 'brdLftGrey');

            $header = '<a data-sort-slug="' . $var[2] . '-max" href="javascript:;" '
                . 'data-sort-tbl="graphDataTbl" class="dataTblHeaderSort">Daily Maximum</a>';
            if ($this->v["sortSlug"] == ($var[2] . '-max')) {
                $header = 'Daily <nobr>Maximum' . $ico . '</nobr>';
            }
            $this->v["covidTblUS"]->addHeaderCell($header);
        }
    }

    private function printReportCovidHeaderCsv()
    {
        $this->v["covidTblUS"]->startNewRow();
        $this->v["covidTblUS"]->addHeaderRowSpan('State / Jurisdiction: 2020 Overall');
        $mortHeader = 'Deaths per Million of U.S. 2019 Standardized Population';
        $this->v["covidTblUS"]->addHeaderRowSpan($mortHeader);
        $mortHeader = '% Increase of Standardized Mortality Over 2015-2019 Average';
        $this->v["covidTblUS"]->addHeaderRowSpan($mortHeader);
        foreach ($this->getCovidVars() as $v => $var) {
            $this->v["covidTblUS"]->addHeaderCell($var[0] . ' Index: Daily Average');
            $this->v["covidTblUS"]->addHeaderCell($var[0] . ' Index: Daily Maximum');
        }
    }

    private function initReportCovidScatters()
    {
        $labAxisX1 = 'Overall Government Response Index: 2020 Daily Average';
        $labAxisX2 = 'Overall Government Response Index: 2020 Daily Maximum';
        $labAxisX3 = 'Containment and Health Index: 2020 Daily Average';
        $labAxisX4 = 'Stringency Index: 2020 Daily Average';
        $labAxisX5 = 'Economic Support Index: 2020 Daily Average';
        $labAxisY1 = '2020 Deaths per Million of U.S. 2019 Standardized Population';
        $labAxisY2 = 'Percent Increase of 2020 Standardized Mortality Over 2015-2019 Average';

        $this->v["graph1"] = new SurvGraphScatter($labAxisY1);
        $this->v["graph1"]->addDataLine('', '', $labAxisY1, $labAxisX1);
        $this->v["graph1"]->setDataLineAxisMinY(0);

        $this->v["graph2"] = new SurvGraphScatter($labAxisY2);
        $this->v["graph2"]->addDataLine('', '', $labAxisY2, $labAxisX1);

        $this->v["graph3"] = new SurvGraphScatter($labAxisY1);
        $this->v["graph3"]->addDataLine('', '', $labAxisY1, $labAxisX2);
        $this->v["graph3"]->setDataLineAxisMinY(0);

        $this->v["graph4"] = new SurvGraphScatter($labAxisY2);
        $this->v["graph4"]->addDataLine('', '', $labAxisY2, $labAxisX2);

        $this->v["graph5"] = new SurvGraphScatter($labAxisY1);
        $this->v["graph5"]->addDataLine('', '', $labAxisY1, $labAxisX3);
        $this->v["graph5"]->setDataLineAxisMinY(0);

        $this->v["graph6"] = new SurvGraphScatter($labAxisY2);
        $this->v["graph6"]->addDataLine('', '', $labAxisY2, $labAxisX3);

        $this->v["graph7"] = new SurvGraphScatter($labAxisY1);
        $this->v["graph7"]->addDataLine('', '', $labAxisY1, $labAxisX4);
        $this->v["graph7"]->setDataLineAxisMinY(0);

        $this->v["graph8"] = new SurvGraphScatter($labAxisY2);
        $this->v["graph8"]->addDataLine('', '', $labAxisY2, $labAxisX4);

        $this->v["graph9"] = new SurvGraphScatter($labAxisY1);
        $this->v["graph9"]->addDataLine('', '', $labAxisY1, $labAxisX5);
        $this->v["graph9"]->setDataLineAxisMinY(0);

        $this->v["graph10"] = new SurvGraphScatter($labAxisY2);
        $this->v["graph10"]->addDataLine('', '', $labAxisY2, $labAxisX5);

        for ($g = 1; $g < 11; $g++) {
            $this->v["graph" . $g]->axisX->min = 0;
            $this->v["graph" . $g]->axisX->max = 100;
        }
    }

}
