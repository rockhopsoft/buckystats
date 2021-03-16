<?php
namespace RockHopSoft\BuckyStats\Controllers;

use Illuminate\Http\Request;
use RockHopSoft\Survloop\Controllers\Globals\Globals;
use RockHopSoft\Survloop\Controllers\Tree\TreeSurvForm;

class BuckyStatsInit extends TreeSurvForm
{
    public $classExtension = 'BuckyStats';
    public $treeID         = 1;

    // Initializing a bunch of things which are not [yet] automatically determined by the software
    protected function initExtra(Request $request)
    {
        // Establishing Main Navigation Organization, with Node ID# and Section Titles
        $this->majorSections = [];
        return true;
    }

    // Initializing a bunch of things which are not [yet] automatically determined by the software
    protected function loadExtra()
    {
        $GLOBALS["SL"]->loadStates();
        return true;
    }

    protected function getAllGraphBulletList($timescale = 'years')
    {
        $this->v["allTypes"] = new BuckyDatasetInterfaceDataTypes;
        $this->v["allTypes"]->loadDataTypes($timescale);
        return view(
            'vendor.buckystats.nodes.3120-all-graph-bullet-list',
            [
                "dataTypes" => $this->v["allTypes"]->v["dataTypes"],
                "timescale" => $timescale
            ]
        )->render();
    }

    protected function getCustReportBulletList()
    {
        $groups = [];
        $groups["COVID-19 Government Responses (United States)"] = [
            [
                'COVID-19 All State Responses: 2020 Overall',
                '/covid-govt-response'
            ],
            [
                'COVID-19 All State Responses: Daily Data',
                '/covid-response-all-states-daily'
            ],
            [
                'COVID-19 All State Responses: Weekly Data',
                '/covid-response-all-states-weekly'
            ]
        ];
        return view(
            'vendor.buckystats.nodes.3120-all-custom-reports-bullet-list',
            [ "groups" => $groups ]
        )->render();
    }


    protected function getRequestsDataLines(Request $request)
    {
        $ret = '';
        if ($request->has('data')) {
            $ret .= '&data=' . $request->get('data');
        }
        if ($request->has('states')) {
            $ret .= '&states=' . $request->get('states');
        }
        if ($request->has('ajax')) {
            $ret .= '&ajax=1';
        }
        if ($request->has('frame')) {
            $ret .= '&frame=1';
        }
        if ($GLOBALS["SL"]->isMobile()) {
            $ret .= '&mobile=1';
        }
        return $ret;
    }


    protected function loadGraphPageOrCache(Request $request, $url, $treeID)
    {
        $GLOBALS["SL"] = new Globals($request, 1, 1, 1);
        $ret = $GLOBALS["SL"]->chkCache($url, 'page-html', 1);
        if (trim($ret) == '' || $GLOBALS["SL"]->REQ->has('refresh')) {
            $this->loadPageVariation($request, 1, $treeID, $url);
            if ($request->has('ajax') && in_array($treeID, [1509, 1510])) {
                if ($treeID == 1509) {
                    $ret = $this->getGraphPageVitalOneGraph();
                } elseif ($treeID == 1510) {
                    $ret = $this->getGraphPageVitalMultiGraph();
                }
                $GLOBALS["SL"]->putCache($url, $ret, 'page-html', 1);
                exit;
            } else {
                $ret = $this->index($request);
                $GLOBALS["SL"]->putCache($url, $ret, 'page-html', 1);
            }
        }
        return $ret;
    }


    protected function getGraphPageVitalOneGraph()
    {
        $GLOBALS["SL"]->x["needsCharts"] = true;
        $this->v["report"] = new BuckyDatasetVitalSingleUS;
        return $this->v["report"]->wwdGraph();
    }


    public function loadGraphPageVitalOne(Request $request, $country = 'US', $state = '', $timescale = 'years')
    {
        $GLOBALS["timescale"] = $timescale;
        if ($state != '' && !$request->has('states')) {
            $GLOBALS["states"] = $state;
        }
        $url = '/one/' . $country . '/' . $state . '/' . $timescale
            . $this->getRequestsDataLines($request);
        $url = str_replace('/US/US/', '/US/', $url);
        return $this->loadGraphPageOrCache($request, $url, 1509);
    }

    public function loadGraphPageVitalYears(Request $request, $country = 'US', $state = '')
    {
        return $this->loadGraphPageVitalOne($request, $country, $state, 'years');
    }

    public function loadGraphPageVitalWeeks(Request $request, $country = 'US', $state = '')
    {
        return $this->loadGraphPageVitalOne($request, $country, $state, 'weeks');
    }

    public function loadGraphPageVitalWeeksYears(Request $request, $country = 'US', $state = '')
    {
        return $this->loadGraphPageVitalOne($request, $country, $state, 'weeks-for-years');
    }

    public function loadGraphPageVitalDays(Request $request, $country = 'US', $state = '')
    {
        return $this->loadGraphPageVitalOne($request, $country, $state, 'days');
    }

    public function loadGraphPageVitalYearsUS(Request $request, $country = 'US')
    {
        return $this->loadGraphPageVitalOne($request, $country, 'US', 'years');
    }

    public function loadGraphPageVitalWeeksUS(Request $request, $country = 'US')
    {
        return $this->loadGraphPageVitalOne($request, $country, 'US', 'weeks');
    }

    public function loadGraphPageVitalWeeksYearsUS(Request $request, $country = 'US')
    {
        return $this->loadGraphPageVitalOne($request, $country, 'US', 'weeks-for-years');
    }

    public function loadGraphPageVitalDaysUS(Request $request, $country = 'US')
    {
        return $this->loadGraphPageVitalOne($request, $country, 'US', 'days');
    }




    protected function getGraphPageVitalMultiGraph()
    {
        $GLOBALS["SL"]->x["needsCharts"] = true;
        $this->v["report"] = new BuckyDatasetVitalCompareUS;
        return $this->v["report"]->wwdGraphCompare();
    }

    public function loadGraphPageVitalMulti(Request $request, $country = 'US', $timescale = 'years')
    {
        $GLOBALS["timescale"] = $timescale;
        $url = '/multi/' . $country . '/' . $timescale
            . $this->getRequestsDataLines($request);
        return $this->loadGraphPageOrCache($request, $url, 1510);
    }

    public function loadGraphPageVitalYearsMulti(Request $request, $country = 'US')
    {
        return $this->loadGraphPageVitalMulti($request, $country, 'years');
    }

    public function loadGraphPageVitalWeeksMulti(Request $request, $country = 'US')
    {
        return $this->loadGraphPageVitalMulti($request, $country, 'weeks');
    }

    public function loadGraphPageVitalWeeksYearsMulti(Request $request, $country = 'US')
    {
        return $this->loadGraphPageVitalMulti($request, $country, 'weeks-for-years');
    }

    public function loadGraphPageVitalDaysMulti(Request $request, $country = 'US')
    {
        return $this->loadGraphPageVitalMulti($request, $country, 'days');
    }




    public function loadGraphsAllStates(Request $request, $country = 'US', $timescale = 'years')
    {
        $GLOBALS["timescale"] = $timescale;
        $url = '/all-states/' . $country . '/' . $timescale
            . $this->getRequestsDataLines($request);
        return $this->loadGraphPageOrCache($request, $url, 1518);
    }

    public function loadGraphsAllStatesYears(Request $request, $country = 'US')
    {
        return $this->loadGraphsAllStates($request, $country, 'years');
    }

    public function loadGraphsAllStatesWeeks(Request $request, $country = 'US')
    {
        return $this->loadGraphsAllStates($request, $country, 'weeks');
    }

    public function loadGraphsAllStatesWeeksYears(Request $request, $country = 'US')
    {
        return $this->loadGraphsAllStates($request, $country, 'weeks-for-years');
    }

    public function loadGraphsAllStatesDays(Request $request, $country = 'US')
    {
        return $this->loadGraphsAllStates($request, $country, 'days');
    }


    protected function getCovidAllStateGraph($timescale = 'weeks')
    {
        $GLOBALS["SL"]->loadStates();
        $reportInterface = new BuckyDatasetInterface;
        $reportInterface->loadStandardizedExample(true);
        return view(
            'vendor.buckystats.nodes.3135-report-covid-all-states',
            [
                "timescale"      => $timescale,
                "stdCalcExample" => $reportInterface->v["stdCalcExample"]
            ]
        )->render();
    }



    public function loadGraphsAllLines(Request $request, $country = 'US', $state = '', $timescale = 'years')
    {
        $GLOBALS["timescale"] = $timescale;
        if ($state != '' && !$request->has('states')) {
            $GLOBALS["states"] = $state;
        }
        $url = '/all-lines/' . $country . '/' . (($state != '') ? $state . '/' : '')
            . $timescale . $this->getRequestsDataLines($request);
        return $this->loadGraphPageOrCache($request, $url, 1513);
    }

    public function loadGraphsAllLinesYears(Request $request, $country = 'US', $state = '')
    {
        return $this->loadGraphsAllLines($request, $country, $state, 'years');
    }

    public function loadGraphsAllLinesWeeks(Request $request, $country = 'US', $state = '')
    {
        return $this->loadGraphsAllLines($request, $country, $state, 'weeks');
    }

    public function loadGraphsAllLinesWeeksYears(Request $request, $country = 'US', $state = '')
    {
        return $this->loadGraphsAllLines($request, $country, $state, 'weeks-for-years');
    }

    public function loadGraphsAllLinesDays(Request $request, $country = 'US', $state = '')
    {
        return $this->loadGraphsAllLines($request, $country, $state, 'days');
    }

}