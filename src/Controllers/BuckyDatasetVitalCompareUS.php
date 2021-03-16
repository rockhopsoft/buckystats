<?php
namespace RockHopSoft\BuckyStats\Controllers;

use App\Models\BSPopulationUs;
use App\Models\BSMortDailyUs;
use App\Models\BSMortWeeklyUs;
use RockHopSoft\BuckyStats\Controllers\BuckyDatasetVitalSingleUS;

class BuckyDatasetVitalCompareUS extends BuckyDatasetVitalSingleUS
{

    public function wwdGraphCompare($type = 'vital', $states = ['US'], $style = 'line')
    {
        $this->wwdGraphLoadRequests();
        $this->initDatasetGraph();
        foreach ($this->v["graphDataSlugs"] as $dataSlug) {
            $dataType = $this->v["dataTypes"]->getDataTypeObj($dataSlug);
            foreach ($this->v["states"] as $i => $abbr) {
                $stateName = $this->getStateName($abbr);

                $title = $stateName;
                if (sizeof($this->v["graphDataSlugs"]) > 1) {
                    $title = $dataType->title . ': ' . $title;
                }
                $this->v["graph"]->addDataLine($title);
                $this->v["graph"]->setDataLineOpts($dataType->unit, $dataType->axisY);
                if ($this->v["timescale"] == 'years') {
                    $this->wwdGraphAddLineYears($stateName, $dataSlug);
                } elseif ($this->v["timescale"] == 'weeks-for-years') {
                    $this->wwdGraphAddLineWeeksForYears($stateName, $dataSlug);
                } elseif ($this->v["timescale"] == 'weeks') {
                    $this->wwdGraphAddLineWeeks($stateName, $dataSlug);
                } elseif ($this->v["timescale"] == 'days') {
                    $this->wwdGraphAddLineDays($stateName, $dataSlug);
                }
            }
        }
        if (sizeof($this->v["graphDataSlugs"]) > 1) {
            $this->v["graph"]->title = sizeof($this->v["states"]) . ' States with '
                . sizeof($this->v["graphDataSlugs"]) . ' Data Lines';
        } elseif (sizeof($this->v["graphDataSlugs"]) > 0) {
            $this->v["graph"]->title = $this->v["dataTypes"]->getDataPointTitle($this->v["graphDataSlugs"][0]);
        }
        $this->v["graph"]->title .= $this->addRangeToTitle();
        $this->checkDataTableExports();
        if ($GLOBALS["SL"]->REQ->has('ajax') || $GLOBALS["SL"]->REQ->has('frame')) {
            return $this->getGraphEmbed();
        }
//echo '<h3>stateName: ' . $stateName . '</h3><pre>'; print_r($this->v["states"]); echo '</pre><pre>'; print_r($this->v["dataRows"]); echo '</pre>'; exit;
        $this->v["distPeeps"] = $GLOBALS["CUST"]->getPopDistPeepsUS();
        $this->loadStandardizedExample();
        $this->v["rand"] = rand(100000, 1000000);
        return view(
            'vendor.buckystats.nodes.3091-pop-vital-graph',
            $this->v
        )->render();
    }

    protected function getGraphLinkText()
    {
        return $this->getGraphLinkIcon() . 'Add More To This Graph';
    }

    private function wwdGraphCompareAddLineYears($stateName, $dataSlug)
    {
        $sqlData = BSPopulationUs::where($this->v["dataFld"], '<>', 0)
            ->where('us_pop_state', $stateName)
            ->where('us_pop_year', '>', 1901)
            ->orderBy('us_pop_year', 'asc')
            ->get();
        foreach ($sqlData as $j => $row) {
            $val = $this->getDataPointValue($row, $this->v["graphDataSlugs"][0]);
            $this->v["graph"]->addDataLineVal($val, $row->us_pop_year);
        }
    }



    private function wwdGraphGetRowsWeeks($stateName, $years)
    {
        return BSMortWeeklyUs::where($this->v["dataFld"], '<>', 0)
            ->where('mrt_week_us_state', $stateName)
            ->whereIn('mrt_week_us_year', $years)
            ->orderBy('mrt_week_us_year', 'asc')
            ->orderBy('mrt_week_us_week', 'asc')
            ->get();
    }

    private function wwdGraphCompareAddLineWeeks($stateName, $dataSlug)
    {
        $years = [2020];
        $slugParts = $GLOBALS["SL"]->mexplode('-', $this->v["graphDataSlugs"][0]);
        if ($slugParts[0] == 'avg') {
            $years = [20152019];
        }
        $this->v["dataRows"] = $this->wwdGraphGetRowsWeeks($stateName, $years);
        foreach ($this->v["dataRows"] as $j => $row) {
            $val = $this->getDataPointValue($row, $this->v["graphDataSlugs"][0]);
            $this->v["graph"]->addDataLineVal($val, $row->mrt_week_us_week);
        }
    }

    private function wwdGraphCompareAddLineWeeksForYears($stateName, $dataSlug)
    {
        $slugParts = $GLOBALS["SL"]->mexplode('-', $this->v["graphDataSlugs"][0]);
        if ($slugParts[0] == 'avg') {
            $this->v["dataRows"] = $this->wwdGraphGetRowsWeeks($stateName, [20152019]);
            $vals = [];
            foreach ($this->v["dataRows"] as $j => $row) {
                $vals[] = $this->getDataPointValue($row, $this->v["graphDataSlugs"][0]);
            }
            for ($year = 2015; $year <= 2020; $year++) {
                foreach ($vals as $j => $val) {
                    $this->v["graph"]->addDataLineVal($val, $year . ': ' . (1+$j));
                }
            }
        } else {
            $years = [2015, 2016, 2017, 2018, 2019, 2020];
            $this->v["dataRows"] = $this->wwdGraphGetRowsWeeks($stateName, $years);
            foreach ($this->v["dataRows"] as $j => $row) {
                $val = $this->getDataPointValue($row, $this->v["graphDataSlugs"][0]);
                $label = $row->mrt_week_us_year . ': ' . $row->mrt_week_us_week;
                $this->v["graph"]->addDataLineVal($val, $label);
            }
        }
    }

    private function wwdGraphGetRowsDays($stateName, $year = 2020)
    {
        return BSMortDailyUs::where($this->v["dataFld"], '<>', 0)
            ->where('mrt_day_us_state', $stateName)
            ->where('mrt_day_us_date', '>=', $year . '-01-01')
            ->where('mrt_day_us_date', '<', (1+$year) . '-01-01')
            ->orderBy('mrt_day_us_date', 'asc')
            ->get();
    }

    private function wwdGraphCompareAddLineDays($stateName, $dataSlug)
    {
        $this->v["dataRows"] = $this->wwdGraphGetRowsDays($stateName);
        foreach ($this->v["dataRows"] as $j => $row) {
            $val = $this->getDataPointValue($row, $this->v["graphDataSlugs"][0]);
            $label = date("n/j/y", strtotime($row->mrt_day_us_date));
            $this->v["graph"]->addDataLineVal($val, $label);
        }
//echo 'dataSlug: ' . $dataSlug . ', stateName: ' .  $this->v["stateName"] . ', graph:<pre>'; print_r($this->v["graph"]); echo '</pre>, dataRows:<pre>'; print_r($this->v["dataRows"]); echo '</pre>'; exit;
    }




    public function printGraphsAllStates()
    {
        $this->wwdGraphLoadRequests();
        $this->v["isAll"] = true;
        return view(
            'vendor.buckystats.nodes.3091-pop-vital-compare',
            $this->v
        )->render();
    }



}