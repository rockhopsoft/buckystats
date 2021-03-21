<?php
namespace RockHopSoft\BuckyStats\Controllers;

use DB;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\BSPopulationDist;
use App\Models\BSPopulationUs;
use RockHopSoft\BuckyStats\Controllers\BuckyDatasetInterfaceDataTypes;
use RockHopSoft\BuckyStats\Controllers\BuckyDatasetVitalSingleUS;
use RockHopSoft\BuckyStats\Controllers\BuckyDatasetVitalCompareUS;
use RockHopSoft\BuckyStats\Controllers\BuckyEmbed;
use RockHopSoft\BuckyStats\Controllers\BuckyStatsInit;
use RockHopSoft\BuckyStats\Controllers\DatasetsCompileCovidResponse;
use RockHopSoft\BuckyStats\Controllers\DatasetsCompileEconYearly;
use RockHopSoft\BuckyStats\Controllers\DatasetsCompileVitals;
use RockHopSoft\BuckyStats\Controllers\ReportCovidResponses;

class BuckyStats extends BuckyStatsInit
{

    protected function customNodePrint(&$curr = null)
    {
        $ret = '';
        if ($curr->nID == 3127) {
            $this->routeDataCompileRequests($curr->nID);
        } elseif ($curr->nID == 3091) {
            $GLOBALS["CUST"]->loadType = '/one';
            return $this->getGraphPageVitalOneGraph();
        } elseif ($curr->nID == 3096) {
            $GLOBALS["CUST"]->loadType = '/multi';
            return $this->getGraphPageVitalMultiGraph();
        } elseif (in_array($curr->nID, [3090, 3098])) {
            return $this->v["report"]->wwdGraphDesc(3);
        } elseif ($curr->nID == 3120) {
            $GLOBALS["SL"]->x["needsCharts"] = true;
            return $this->getAllGraphBulletList();
        } elseif ($curr->nID == 3113) {
            $GLOBALS["SL"]->x["needsCharts"] = true;
        } elseif ($curr->nID == 3122) {
            $GLOBALS["SL"]->x["needsCharts"] = true;
            $GLOBALS["CUST"]->loadType = '/all-lines';
            $report = new BuckyDatasetCompareDataLines;
            return $report->wwdGraphAllLines();
        } elseif ($curr->nID == 3131) {
            $GLOBALS["SL"]->x["needsCharts"] = true;
            $report = new ReportCovidResponses;
            return $report->printReportCovid($curr->nID);
        } elseif ($curr->nID == 3134) {
            $GLOBALS["SL"]->x["needsCharts"] = true;
            return $this->getCovidAllStateGraph();
        } elseif ($curr->nID == 3140) {
            $GLOBALS["SL"]->x["needsCharts"] = true;
            return $this->getCovidAllStateGraph('days');
        } elseif ($curr->nID == 3137) {
            $GLOBALS["SL"]->x["needsCharts"] = true;
        } elseif ($curr->nID == 3143) {
            $GLOBALS["SL"]->x["needsCharts"] = true;
            $GLOBALS["CUST"]->loadType = '/all-states';
            $report = new BuckyDatasetVitalCompareUS;
            return $report->printGraphsAllStates();
        } elseif ($curr->nID == 3128) {
            return $GLOBALS["CUST"]->printSources();
        } elseif ($curr->nID == 3100) {
            $GLOBALS["SL"]->x["needsCharts"] = true;
            return $this->printHomePage();
        } elseif ($curr->nID == 3154) {
            return view('vendor.buckystats.nodes.3154-donate')->render();
        } elseif ($curr->nID == 3150) {
            return $this->printAboutPageGraphs();
        }
        return $ret;
    }

    public function printPreviewReportCustom($isAdmin = false, $view = '')
    {
        if (!isset($this->sessData->dataSets[$GLOBALS["SL"]->coreTbl])) {
            return '';
        }
        return '';
    }

    public function ajaxChecksCustom(Request $request, $type = '')
    {
        $state = 'US';
        if ($request->has('state') && trim($request->get('state')) != '') {
            $state = trim($request->get('state'));
        }
        if ($type == 'graph-vital') {
            return $this->wwdGraph('vital', $state);
        }
        return '';
    }

    private function routeDataCompileRequests($nID)
    {
        if ($GLOBALS["SL"]->REQ->has('compile')) {
            $vitals = new DatasetsCompileVitals;
            $compile = trim($GLOBALS["SL"]->REQ->compile);
            if ($compile == 'pop') {
                $vitals->runCompilePopUS();
            } elseif ($compile == 'dist') {
                $vitals->runCompilePopDist();
            } elseif ($compile == 'weekly') {
                $vitals->runCompileWeeklyUS();
            } elseif ($compile == 'daily') {
                $vitals->runCompileDailyUS();
            } elseif ($compile == 'daily-avg') {
                $vitals->runCompileDailyAveragesUS();
            } elseif ($compile == 'covid') {
                $vitals->runCompileCovidResponseDailyUS();
            } elseif ($compile == 'covid-week') {
                $vitals->runCompileCovidResponseWeeklyUS();
            } elseif ($compile == 'covid-year') {
                $vitals->runCompileCovidResponseYearlyUS();
            } elseif ($compile == 'life-expect') {
                $vitals->runCompilePopLifeExpectUS();
            } elseif ($compile == 'debt') {
                $econ = new DatasetsCompileEconYearly;
                $econ->runCompileEconDebtYearlyUS();
            } elseif ($compile == 'yearly-avg') {
                $vitals->runCompileYears20152019();
            }
        } elseif ($GLOBALS["SL"]->REQ->has('calc')) {
            $vitals = new DatasetsCompileVitals;
            $calc = trim($GLOBALS["SL"]->REQ->calc);
            if ($calc == 'pop') {
                $vitals->calcPercsPopUS();
                echo 'Finished Recalculating Population Ratios!';
                exit;
            }
            if ($calc == 'standard') {
                $vitals->calcStandardPopUS();
                echo 'Finished Standardizing Population Distributions!';
                exit;
            }
            if ($calc == 'avg5yr') {
                $vitals->compareAvg5yr();
                echo 'Finished Comparing to 5-Year Averages!';
                exit;
            }
        }
    }





    private function printHomePage()
    {
        $this->v["bigList"] = $this->getAllGraphBulletList();
        $this->v["custReps"] = $this->getCustReportBulletList();
        $this->v["charts"] = [];

        $url = '/multi/US/years?states=,US,MD,&data=mort-perc-all-ages';
        $this->v["charts"][] = new BuckyEmbed(1, $url, 200);

        $url = '/one/US/years?data=life-expect-birth,life-expect-65,life-expect-75';
        $this->v["charts"][] = new BuckyEmbed(2, $url, 400);

        $url = '/multi/US/years?states=,US,CA,TX,FL,NY,PA,IL,OH,GA,&data=standardized-by-age-us';
        $this->v["charts"][] = new BuckyEmbed(3, $url, 600);

        $url = '/multi/US/years?states=,US,CA,TX,FL,NY,PA,IL,OH,GA,&data=standardized-by-age-us-avg-5yr';
        $this->v["charts"][] = new BuckyEmbed(4, $url, 800);

        $url = '/one/US/years?data=unemployment-rate,debt-govt-per-capita';
        $this->v["charts"][] = new BuckyEmbed(5, $url, 1000);

        $url = '/one/US/years?data=r-cpi-u,r-cpi-u-rs';
        $this->v["charts"][] = new BuckyEmbed(6, $url, 1200);

        $url = '/one/US/days?data=standardized-by-age-us,avg-standardized-by-age-us,covid-all-avg';
        $this->v["charts"][] = new BuckyEmbed(7, $url, 1400);

        $url = '/one/US/MD/days?data=standardized-by-age-us,avg-standardized-by-age-us,covid-all-avg';
        $this->v["charts"][] = new BuckyEmbed(8, $url, 1600);

        $url = '/one/US/FL/days?data=standardized-by-age-us,avg-standardized-by-age-us,covid-all-avg';
        $this->v["charts"][] = new BuckyEmbed(9, $url, 1800);

        return view(
            'vendor.buckystats.nodes.3100-home-page',
            $this->v
        )->render();
    }


    private function printAboutPageGraphs()
    {
        $charts = [];

        $url = '/one/US/weeks?data=raw-mort,avg-raw-mort';
        $charts[] = new BuckyEmbed(1, $url, 100);

        $url = '/one/US/weeks-for-years?data=raw-mort,avg-raw-mort';
        $charts[] = new BuckyEmbed(2, $url, 1000);

        $url = '/multi/US/years?states=,US,MD,&data=mort-perc-all-ages';
        $charts[] = new BuckyEmbed(3, $url, 2000);

        $url = '/one/US/years?data=perc-by-age-group';
        $charts[] = new BuckyEmbed(4, $url, 3000);

        $url = '/multi/US/years?states=,US,CA,TX,FL,NY,PA,IL,OH,GA,NC,MI,NJ,VA,WA,AZ,MA,'
            . '&data=standardized-by-age-us';
        $charts[] = new BuckyEmbed(5, $url, 4000);

        return view(
            'vendor.buckystats.nodes.3150-about-graphs',
            [ "charts" => $charts ]
        )->render();
    }


    public function sendEmailBlurbsCustom($emailBody, $recID = 0)
    {
        $dynamos = [
            '[{ Filter State }]',
            '[{ Filter Data Full }]',
            '[{ Filter Data }]',
            '[{ Filter Keywords }]'
        ];
        foreach ($dynamos as $dy) {
            if (strpos($emailBody, $dy) !== false) {
                $dyCore = trim(str_replace('[{', '', str_replace('}]', '', $dy)));
                $swap = $GLOBALS["SL"]->getSwapTxt($dyCore);
                $emailBody = str_replace($dy, $swap, $emailBody);
            }
        }
        return $emailBody;
    }

}

