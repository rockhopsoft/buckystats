<?php
/**
  * BuckyStatsGlobals allows the attachment of custom variables and processes
  * in Survloop's main Globals class. So far, it helps with tracking
  * standardized population distributions.
  *
  * Bucky Stats
  * @package  rockhopsoft/buckystats
  * @author  Morgan Lesko <rockhoppers@runbox.com>
  * @since v0.1
  */
namespace RockHopSoft\BuckyStats\Controllers;

use App\Models\BSPopulationDist;
use App\Models\BSPopulationUs;

class BuckyStatsGlobals
{
    public $loadType  = '';
    public $distPeeps = [];
    public $popStates = [];
    public $popAges   = [];

    public $weeklyAvgYearUS = 20152019;

    public function printSources($data = [], $timescale = 'years')
    {
        return view(
            'vendor.buckystats.inc-report-sources',
            [
                "timescale" => $timescale,
                "data"      => $data
            ]
        )->render();
    }

    public function loadPopDistUS($year = 2019)
    {
        $this->distPeeps = [];
        $this->distPeeps['United States'] = $this->getPopDistPeepsUSbyName('United States');
        $dists = BSPopulationDist::where('pop_dist_year', 'LIKE', $year)
            ->where('pop_dist_name', 'NOT LIKE', 'U.S.%Estimate')
            ->get();
        if ($dists->isNotEmpty()) {
            foreach ($dists as $dist) {
                $this->distPeeps[$dist->pop_dist_name] = $this->getPopDistPeepsUSbyRow($dist);
            }
        }
        return $this->distPeeps;
    }

    public function getPopDistPeepsUS()
    {
        $distPercs = $this->getPopDistPercsUSbyName('United States');
        return $this->getPopDistPeepsUSbyPercs($distPercs);
    }

    public function getPopDistPeepsUSbyName($stateName)
    {
        $distPercs = $this->getPopDistPercsUSbyName($stateName);
        return $this->getPopDistPeepsUSbyPercs($distPercs);
    }

    public function getPopDistPeepsUSbyRow($dist)
    {
        $distPercs = $this->getPopDistPercsUS($dist);
        return $this->getPopDistPeepsUSbyPercs($distPercs);
    }

    private function getPopDistPeepsUSbyPercs($distPercs)
    {
        $distPeeps = [ 0, 0, 0, 0, 0, 0 ];
        foreach ($distPercs as $ind => $perc) {
            $distPeeps[$ind] = $perc*1000000;
        }
        return $distPeeps;
    }

    private function getPopDistPercsUSbyName($stateName)
    {
        $distName = $stateName;
        if ($stateName == 'United States') {
            $distName = 'U.S.%Estimate';
        }
        $dist = BSPopulationDist::where('pop_dist_year', 'LIKE', 2019)
            ->where('pop_dist_name', 'LIKE', $distName)
            ->first();
        return $this->getPopDistPercsUS($dist);
    }

    // Return number of people in each age group, out of a standard distribution.
    // [ under 25, 25-44, 45-64, 65-74, 75-84, 85+ ]
    private function getPopDistPercsUS($dist)
    {
        $distPercs = [ 0, 0, 0, 0, 0, 0 ];
        if ($dist && isset($dist->pop_dist_perc_age85)) {
            $distPercs[0] = $dist->pop_dist_perc_age04
                +$dist->pop_dist_perc_age59
                +$dist->pop_dist_perc_age1014
                +$dist->pop_dist_perc_age1519
                +$dist->pop_dist_perc_age2024;
            $distPercs[1] = $dist->pop_dist_perc_age2534
                +$dist->pop_dist_perc_age3544;
            $distPercs[2] = $dist->pop_dist_perc_age4554
                +$dist->pop_dist_perc_age5559
                +$dist->pop_dist_perc_age6064;
            $distPercs[3] = $dist->pop_dist_perc_age6574;
            $distPercs[4] = $dist->pop_dist_perc_age7584;
            $distPercs[5] = $dist->pop_dist_perc_age85;
        }
        return $distPercs;
    }



    public function getStatePopulationDat($stateName = '', $year = 2019)
    {
        if (!isset($this->popStates[$stateName])) {
            $this->popStates[$stateName] = [];
        }
        if (!isset($this->popStates[$stateName][$year])) {
            $this->popStates[$stateName][$year] = BSPopulationUs::where('us_pop_year', 'LIKE', $year)
                ->where('us_pop_state' , 'LIKE', $stateName)
                ->first();
        }
        return $this->popStates[$stateName][$year];
    }


    // Return number of deaths in each age group
    // [ under 25, 25-44, 45-64, 65-74, 75-84, 85+ ]
    public function getStatePopAges($stateName = '', $year = 2019)
    {
        if (!isset($this->popAges[$stateName])) {
            $this->getStatePopulationDat($stateName, $year);
            $this->popAges[$stateName] = [ 0, 0, 0, 0, 0, 0 ];
            if (isset($this->popStates[$stateName]->us_pop_25_years)) {
                $this->popAges[$stateName][0] = $this->popStates[$stateName]->us_pop_25_years;
            }
            if (isset($this->popStates[$stateName]->us_pop_25_44_years)) {
                $this->popAges[$stateName][1] = $this->popStates[$stateName]->us_pop_25_44_years;
            }
            if (isset($this->popStates[$stateName]->us_pop_45_64_years)) {
                $this->popAges[$stateName][2] = $this->popStates[$stateName]->us_pop_45_64_years;
            }
            if (isset($this->popStates[$stateName]->us_pop_65_74_years)) {
                $this->popAges[$stateName][3] = $this->popStates[$stateName]->us_pop_65_74_years;
            }
            if (isset($this->popStates[$stateName]->us_pop_75_84_years)) {
                $this->popAges[$stateName][4] = $this->popStates[$stateName]->us_pop_75_84_years;
            }
            if (isset($this->popStates[$stateName]->us_pop_85_years)) {
                $this->popAges[$stateName][5] = $this->popStates[$stateName]->us_pop_85_years;
            }
        }
        return $this->popAges[$stateName];
    }

    public function getAgeFields()
    {
        return [ '25_years', '25_44_years', '45_64_years', '65_74_years', '75_84_years', '85_years' ];
    }

    public function printGraphEmbed($id)
    {
        return '<div id="graph' . $id . '" class="embedGraphBig">'
            . '<div class="embedGraphSpin"><h4><i class="fa fa-spinner fa-spin"></i></h4></div>'
            . '</div>';
    }

    public function printGraphEmbedJS($id, $url, $delay = 1000)
    {
        if (strpos($url, '&ajax=1') === false) {
            $url .= '&ajax=1';
        }
        return ' setTimeout(function() { console.log("' . $url . '"); '
            . '$("#graph' . $id . '").load("' . $url . '"); }, ' . $delay . '); ';
    }

    public function hasDataSourceCat($cat = '', $data = [])
    {
        if (sizeof($data) == 0) {
            return true;
        }
        if (in_array($cat, ['pop', 'mort'])) {
            return ($this->hasDataSource('raw-pop', $data)
                || $this->hasDataSource('std-pop', $data)
                || $this->hasDataSource('raw-mort', $data)
                || $this->hasDataSource('std-mort', $data)
                || $this->hasDataSource('life-expect', $data));
        } elseif ($cat == 'covid') {
            return $this->hasDataSource('covid', $data);
        } elseif ($cat == 'econ') {
            return ($this->hasDataSource('unemploy', $data)
                || $this->hasDataSource('cpi-u', $data)
                || $this->hasDataSource('r-cpi-u-rs', $data)
                || $this->hasDataSource('debt-govt', $data));
        }
        return true;
    }

    public function hasDataSource($group = '', $data = [])
    {
        if (sizeof($data) == 0) {
            return true;
        }
        $typeList = $this->getSourceDataTypes($group);
        if (sizeof($typeList) > 0) {
            foreach ($typeList as $type) {
                if (in_array($type, $data)) {
                    return true;
                }
            }
        }
        return false;
    }

    public function getSourceDataTypes($group)
    {
        if ($group == 'raw-pop') {
            return [ 'raw-pop' ];

        } elseif ($group == 'std-pop') {
            return $this->getSourceDataTypesStdPop();

        } elseif ($group == 'raw-mort') {
            return $this->getSourceDataTypesRawMort();

        } elseif ($group == 'std-mort') {
            return $this->getSourceDataTypesStdMort();

        } elseif ($group == 'life-expect') {
            return $this->getSourceDataTypesLifeExpect();

        } elseif ($group == 'covid') {
            return $this->getSourceDataTypesCovidResponse();

        } elseif ($group == 'unemploy') {
            return [ 'unemployment-rate' ];

        } elseif ($group == 'cpi-u') {
            return [ 'cpi-u' ];

        } elseif ($group == 'r-cpi-u-rs') {
            return [ 'r-cpi-u-rs' ];

        } elseif ($group == 'debt-govt') {
            return [ 'debt-govt', 'debt-govt-per-capita', 'debt-govt-per-capita-avg-5yr' ];
        }
    }

    public function getSourceDataTypesStdPop()
    {
        return [
            'pop-by-age-group',
            'pop-by-age-24',
            'pop-by-age-25-44',
            'pop-by-age-45-64',
            'pop-by-age-65-74',
            'pop-by-age-75-84',
            'pop-by-age-85',
            'pop-by-age-75',
            'pop-by-age-65',
            'pop-by-age-45',
            'pop-by-age-44',
        ];
    }

    public function getSourceDataTypesRawMort()
    {
        return [
            'raw-mort',
            'avg-raw-mort',
            'avg-mort-perc-all-ages',
            'diff-mort',
            'diff-mort-perc',
            'mort-perc-all-ages-avg-5yr'
        ];
    }

    public function getSourceDataTypesStdMort()
    {
        return [
            'mort-by-age-group',
            'mort-by-age-24',
            'mort-by-age-25-44',
            'mort-by-age-45-64',
            'mort-by-age-65-74',
            'mort-by-age-75-84',
            'mort-by-age-85',
            'avg-mort-by-age-group',
            'avg-mort-by-age-24',
            'avg-mort-by-age-25-44',
            'avg-mort-by-age-45-64',
            'avg-mort-by-age-65-74',
            'avg-mort-by-age-75-84',
            'avg-mort-by-age-85',
            'mort-perc-all-ages',
            'mort-perc-by-age-group',
            'mort-perc-by-age-24',
            'mort-perc-by-age-25-44',
            'mort-perc-by-age-45-64',
            'mort-perc-by-age-65-74',
            'mort-perc-by-age-75-84',
            'mort-perc-by-age-85',
            'mort-perc-by-age-75',
            'mort-perc-by-age-65',
            'mort-perc-by-age-45',
            'mort-perc-by-age-44',
            'avg-mort-perc-by-age-group',
            'avg-mort-perc-by-age-24',
            'avg-mort-perc-by-age-25-44',
            'avg-mort-perc-by-age-45-64',
            'avg-mort-perc-by-age-65-74',
            'avg-mort-perc-by-age-75-84',
            'avg-mort-perc-by-age-85',
            'avg-mort-perc-by-age-75',
            'avg-mort-perc-by-age-65',
            'avg-mort-perc-by-age-45',
            'avg-mort-perc-by-age-44',
            'standardized-by-age-us',
            'avg-standardized-by-age-us',
            'diff-mort-standardized-by-age-us',
            'standardized-by-age-us-avg-5yr'
        ];
    }

    public function getSourceDataTypesLifeExpect()
    {
        return [
            'life-expect-birth',
            'life-expect-65',
            'life-expect-75',
            'life-expect-birth-avg-5yr',
            'life-expect-65-avg-5yr',
            'life-expect-75-avg-5yr'
        ];
    }

    public function getSourceDataTypesCovidResponse()
    {
        return [
            'covid-all-avg',
            'covid-overall-avg',
            'covid-containment-avg',
            'covid-stringency-avg',
            'covid-economic-avg',
            'covid-all-max',
            'covid-overall-max',
            'covid-containment-max',
            'covid-stringency-max',
            'covid-economic-max'
        ];
    }

}

