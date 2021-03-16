<?php
namespace RockHopSoft\BuckyStats\Controllers;

use DB;
use App\Models\BSCdcWeeklyDeathsByAge20152020Unweighted;
use App\Models\BSCdcWeeklyDeathsByAge20152020Weighted;
use App\Models\BSMortWeeklyUs;
use RockHopSoft\BuckyStats\Controllers\DatasetsCompileVitalsYearly;

class DatasetsCompileVitalsWeekly extends DatasetsCompileVitalsYearly
{

    public function runCompileWeeklyUS()
    {
        $year = intVal($GLOBALS["SL"]->REQ->year);
        if ($year <= 2014) {
            DB::table('bs_mort_weekly_us')->truncate();
            echo 'Emptied weekly data table '
                . $this->redir($year, 'weekly');
        } elseif (2015 <= $year && $year <= 2020) {
            $this->loadUS($year, true);
            $this->compileMortWeeklyUS($year);
            echo 'Calculated ' . $year . $this->redir($year, 'weekly');
        } elseif ($year == 2021) { // then run the 2015-2019 average
            $GLOBALS["CUST"]->loadPopDistUS();
            $this->avgCompileWeeklyUS();
            echo 'Calculated weekly averages (' . $year . ')'
                . $this->redir($year, 'weekly');
        } elseif ($year == 2022) { // then run the 2015-2019 average
            $this->avgIncCompileWeeklyUS(1);
            echo 'Calculated weekly averages step 1'
                . $this->redir($year, 'weekly');
        } else {
            $this->avgIncCompileWeeklyUS(2);
            echo 'Finished compiling weekly data averages increments!';
        }
        //echo $this->printCompileTable();
        exit;
    }

    private function compileMortWeeklyUS($year)
    {
        $GLOBALS["CUST"]->loadPopDistUS();
        $fldYr = 'cdc_mort_age_15_20_year';
        $load = BSCdcWeeklyDeathsByAge20152020Weighted::where($fldYr, 'LIKE', $year)
            // ->where('cdc_mort_age_15_20_state_abbreviation', 'NOT LIKE', 'US')
            ->get();
        if ($load->isNotEmpty()) {
            foreach ($load as $rec) {
                $abbr = $this->getWeeklyStateAbbrUS20152020($rec);
                if (isset($this->lookupAbbr[$abbr])) {
                    $stateInd = $this->lookupAbbr[$abbr];
                    $this->data[$stateInd]->addWeekRecord($rec);
                }
            }
        }
        foreach ($this->data as $stateInd => $dat) {
            $this->data[$stateInd]->calcWeekRecords();
        }
    }

    private function avgCompileWeeklyUS()
    {
        $avgWeeks = $this->initAvgCompileWeeklyUS();
        $avgFlds  = $this->avgFieldsCompileWeeklyUS();
        $allWeeks = BSMortWeeklyUs::where('mrt_week_us_year', '<', 2020)
            ->get();
        if ($allWeeks->isNotEmpty()) {
            foreach ($allWeeks as $i => $wk) {
                if (isset($wk->mrt_week_us_state) && isset($wk->mrt_week_us_week)) {
                    $state = $wk->mrt_week_us_state;
                    $week = intVal($wk->mrt_week_us_week);
                    if (isset($avgWeeks[$state]) && isset($avgWeeks[$state][$week])) {
                        foreach ($avgFlds as $fldSffx) {
                            $fld = 'mrt_week_us_' . $fldSffx;
                            $avgWeeks[$state][$week]->{ $fld } += $wk->{ $fld };
                        }
                    }
                }
            }
            for ($w = 1; $w <= 52; $w++) {
                foreach ($avgFlds as $fldSffx) {
                    $fld = 'mrt_week_us_' . $fldSffx;
                    foreach ($GLOBALS["SL"]->states->stateList as $abbr => $state) {
                        $avgWeeks[$state][$w]->{ $fld } = $avgWeeks[$state][$w]->{ $fld }/5;
                    }
                    $avgWeeks["United States"][$w]->{ $fld } = $avgWeeks["United States"][$w]->{ $fld }/5;
                }
                foreach ($GLOBALS["SL"]->states->stateList as $abbr => $state) {
                    $avgWeeks[$state][$w]->save();
                    $avgWeeks["United States"][$w]->save();
                }
            }
        }
    }

    private function initAvgCompileWeeklyUS()
    {
        BSMortWeeklyUs::where('mrt_week_us_year', 'LIKE', $GLOBALS["CUST"]->weeklyAvgYearUS)
            ->delete();
        $avgWeeks = [];
        $avgWeeks["United States"] = [];
        foreach ($GLOBALS["SL"]->states->stateList as $abbr => $state) {
            $avgWeeks[$state] = [];
        }
        for ($w = 1; $w <= 52; $w++) {
            foreach ($GLOBALS["SL"]->states->stateList as $abbr => $state) {
                $avgWeeks[$state][$w] = $this->initRowAvgCompileWeeklyUS($w, $state);
            }
            $avgWeeks["United States"][$w] = $this->initRowAvgCompileWeeklyUS($w, 'United States');
        }
        return $avgWeeks;
    }

    private function initRowAvgCompileWeeklyUS($w, $state)
    {
        $new = new BSMortWeeklyUs;
        $new->mrt_week_us_week  = $w;
        $new->mrt_week_us_state = $state;
        $new->mrt_week_us_year  = $GLOBALS["CUST"]->weeklyAvgYearUS;
        return $new;
    }

    private function avgFieldsCompileWeeklyUS()
    {
        return [
            'mortality',
            'mort_25_years',
            'mort_25_44_years',
            'mort_45_64_years',
            'mort_65_74_years',
            'mort_75_84_years',
            'mort_85_years',
            'mort_perc',
            'mort_perc_25_years',
            'mort_perc_25_44_years',
            'mort_perc_45_64_years',
            'mort_perc_65_74_years',
            'mort_perc_75_84_years',
            'mort_perc_85_years',
            'mort_std_dist_us'
        ];
    }

    private function avgIncCompileWeeklyUS($step = 1)
    {
        $avgWeeks = [];
        $operator = (($step == 1) ? '<' : '>=');
        $weekRecs = BSMortWeeklyUs::where('mrt_week_us_state', $operator, 'M')
            ->where('mrt_week_us_year', 'LIKE', $GLOBALS["CUST"]->weeklyAvgYearUS)
            ->get();
        if ($weekRecs->isNotEmpty()) {
            foreach ($weekRecs as $wk) {
                $state = $wk->mrt_week_us_state;
                $week = intVal($wk->mrt_week_us_week);
                if (!isset($avgWeeks[$state])) {
                    $avgWeeks[$state] = [];
                }
                $avgWeeks[$state][$week] = $wk;
            }
        }
        $weekRecs = BSMortWeeklyUs::where('mrt_week_us_year', '<=', 2020)
            ->where('mrt_week_us_state', $operator, 'M')
            ->get();
        if ($weekRecs->isNotEmpty()) {
            foreach ($weekRecs as $wk) {
                $state = $wk->mrt_week_us_state;
                $week = intVal($wk->mrt_week_us_week);
                if (isset($avgWeeks[$state]) && isset($avgWeeks[$state][$week])) {
                    $dat = $wk->mrt_week_us_mortality;
                    $avg = $avgWeeks[$state][$week]->mrt_week_us_mortality;
                    $wk->mrt_week_us_mortality_diff = $dat-$avg;

                    $dat = $wk->mrt_week_us_mort_perc;
                    $avg = $avgWeeks[$state][$week]->mrt_week_us_mort_perc;
                    $wk->mrt_week_us_mort_perc_diff = $dat-$avg;
                    if ($avg != 0) {
                        $wk->mrt_week_us_mort_perc_avg_inc = ($dat-$avg)/$avg;
                    }

                    $dat = $wk->mrt_week_us_mort_std_dist_us;
                    $avg = $avgWeeks[$state][$week]->mrt_week_us_mort_std_dist_us;
                    $wk->mrt_week_us_mort_std_dist_us_diff = $dat-$avg;
                    if ($avg != 0) {
                        $wk->mrt_week_us_mort_std_dist_us_avg_inc = ($dat-$avg)/$avg;
                    }
                    $wk->save();
                }
            }
        }
    }



}