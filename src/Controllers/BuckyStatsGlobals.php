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

    public function printSources($data = ['covid'], $timescale = 'years')
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

}

