<?php
namespace RockHopSoft\BuckyStats\Controllers;

use Illuminate\Http\Request;
use App\Models\BSPopulationUs;
use App\Models\BSMortDailyUs;
use App\Models\BSMortWeeklyUs;
use RockHopSoft\Survloop\Controllers\Stats\SurvGraphDataLine;
use RockHopSoft\BuckyStats\Controllers\DatasetsCompileVitals;
use RockHopSoft\BuckyStats\Controllers\BuckyDatasetInterface;

class BuckyDatasetVitalSingleUS extends BuckyDatasetInterface
{

    public function wwdGraph($type = 'vital', $state = 'US', $style = 'line')
    {
        $this->wwdGraphLoadRequests();
        $this->initDatasetGraph();
//echo 'dataTypes: <pre>'; print_r($this->v["graphDataSlugs"]); echo '</pre><pre>'; print_r($this->v["dataTypes"]); echo '</pre>'; exit;
        foreach ($this->v["graphDataSlugs"] as $dataSlug) {
            $dataType = $this->v["dataTypes"]->getDataTypeObj($dataSlug);
            $this->v["graph"]->addDataLine($dataType->title);
            $this->v["graph"]->setDataLineOpts($dataType->unit, $dataType->axisY);
            if ($this->v["timescale"] == 'years') {
                $this->wwdGraphAddLineYears($this->v["stateName"], $dataSlug);
            } elseif ($this->v["timescale"] == 'weeks-for-years') {
                $this->wwdGraphAddLineWeeksForYears($this->v["stateName"], $dataSlug);
            } elseif ($this->v["timescale"] == 'weeks') {
                $this->wwdGraphAddLineWeeks($this->v["stateName"], $dataSlug);
            } elseif ($this->v["timescale"] == 'days') {
                $this->wwdGraphAddLineDays($this->v["stateName"], $dataSlug);
            }
        }
        $this->v["graph"]->title = $this->v["stateName"] . $this->addRangeToTitle();
        $this->checkDataTableExports();
        if ($GLOBALS["SL"]->REQ->has('ajax') || $GLOBALS["SL"]->REQ->has('frame')) {
            return $this->getGraphEmbed();
        }
        if ($this->v["stateName"] == 'United States') {
            $this->v["dataTypes"]->skipDataType('standardized-by-age-state');
        }
//dd($this->v["graph"]);
        $this->loadStandardizedExample();
//echo 'state: ' . $this->v["state"] . ', ' . $this->v["stateName"] . '<pre>'; print_r($this->v["graphDataSlugs"]); print_r($this->v["graph"]); echo '</pre>'; exit;
        $this->v["rand"] = rand(100000, 1000000);
        return view(
            'vendor.buckystats.nodes.3091-pop-vital-graph',
            $this->v
        )->render();
    }

    protected function getGraphLinkText()
    {
        return $this->getGraphLinkIcon() . 'Customize This Graph';
    }

    protected function wwdGraphAddLineYears($stateName, $dataSlug)
    {
        if (strpos($dataSlug, 'avg-') === 0) {
            $row = BSPopulationUs::where('us_pop_state', $stateName)
                ->where('us_pop_year', 20152019)
                ->first();
            if ($row && isset($row->us_pop_year)) {
                $val = $this->getDataPointValue($row, $dataSlug);
                for ($yr = 1902; $yr <= 2020; $yr++) {
                    $this->v["graph"]->addDataLineVal($val, $yr);
                }
            }
        } else {
            $this->v["dataRows"] = BSPopulationUs::where($this->v["dataFld"], '<>', 0)
                ->where('us_pop_state', $stateName)
                ->where('us_pop_year', '>=', 1902)
                ->where('us_pop_year', '<=', 2020)
                ->orderBy('us_pop_year', 'asc')
                ->get();
            foreach ($this->v["dataRows"] as $j => $row) {
                $val = $this->getDataPointValue($row, $dataSlug);
                $this->v["graph"]->addDataLineVal($val, $row->us_pop_year);
            }
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

    protected function wwdGraphAddLineWeeks($stateName, $dataSlug)
    {
        $years = [2020];
        $slugParts = $GLOBALS["SL"]->mexplode('-', $dataSlug);
        if ($slugParts[0] == 'avg') {
            $years = [20152019];
        }
        $this->v["dataRows"] = $this->wwdGraphGetRowsWeeks($stateName, $years);
        foreach ($this->v["dataRows"] as $j => $row) {
            $val = $this->getDataPointValue($row, $dataSlug);
            $this->v["graph"]->addDataLineVal($val, $row->mrt_week_us_week);
        }
    }

    protected function wwdGraphAddLineWeeksForYears($stateName, $dataSlug)
    {
        $slugParts = $GLOBALS["SL"]->mexplode('-', $dataSlug);
        if ($slugParts[0] == 'avg') {
            $this->v["dataRows"] = $this->wwdGraphGetRowsWeeks($stateName, [20152019]);
            $vals = [];
            foreach ($this->v["dataRows"] as $j => $row) {
                $vals[] = $this->getDataPointValue($row, $dataSlug);
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
                $val = $this->getDataPointValue($row, $dataSlug);
                $label = $row->mrt_week_us_year . ': ' . $row->mrt_week_us_week;
                $this->v["graph"]->addDataLineVal($val, $label);
            }
        }
    }

    private function wwdGraphGetRowsDays($stateName, $year = 2020)
    {
        return BSMortDailyUs::where($this->v["dataFld"], '<>', 0)
            ->where('mrt_day_us_state', $stateName)
            ->where('mrt_day_us_year', $year)
            //->where('mrt_day_us_date', '>=', $year . '-01-01')
            //->where('mrt_day_us_date', '<=', $year . '-12-31')
            ->orderBy('mrt_day_us_date', 'asc')
            ->get();
    }

    protected function wwdGraphAddLineDays($stateName, $dataSlug)
    {
        $year = 2020;
        if (strpos($dataSlug, 'avg-') === 0) {
            $year = 20152019;
        }
        $this->v["dataRows"] = $this->wwdGraphGetRowsDays($stateName, $year);
        foreach ($this->v["dataRows"] as $j => $row) {
            $val = $this->getDataPointValue($row, $dataSlug);
            $label = date("n/j/y", strtotime($row->mrt_day_us_date));
            $this->v["graph"]->addDataLineVal($val, $label);
        }
//echo 'dataSlug: ' . $dataSlug . ', stateName: ' .  $this->v["stateName"] . ', graph:<pre>'; print_r($this->v["graph"]); echo '</pre>, dataRows:<pre>'; print_r($this->v["dataRows"]); echo '</pre>'; exit;
    }

}