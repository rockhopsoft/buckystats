<?php
namespace RockHopSoft\BuckyStats\Controllers;

use DB;
use App\Models\BSMortDailyUs;
use App\Models\BSMortWeeklyUs;
use App\Models\BSOxfordStringencyIndexUs;
use App\Models\BSPopulationDist;
use App\Models\BSPopulationUs;
use RockHopSoft\BuckyStats\Controllers\DatasetsCompileVitalsWeekly;

class DatasetsCompileVitalsDaily extends DatasetsCompileVitalsWeekly
{

    public function runCompileDailyUS()
    {
        $week = intVal($GLOBALS["SL"]->REQ->year);
        if ($week == 1) {
            DB::table('bs_mort_daily_us')->truncate();
        }
        $this->compileMortYearDailyUS($week);
    }

    public function runCompileDailyAveragesUS()
    {
        $week = intVal($GLOBALS["SL"]->REQ->year);
        if ($week == 1) {
            BSMortDailyUs::where('mrt_day_us_year', 20152019)
                ->delete();
        }
        $this->compileMortYearDailyUS($week, 20152019, 'daily-avg');
        exit;
    }

    private function compileMortYearDailyUS($week, $year = 2020, $type = 'daily')
    {
        $this->loadWeekEndDates();
        if ($week < 53) {
            $weekRecs = BSMortWeeklyUs::where('mrt_week_us_year', 'LIKE', $year)
                ->where('mrt_week_us_week', $week)
                ->get();
            $this->compileMortDailyWeeksUS($weekRecs, $year);
            echo 'Compiled daily data for week ' . $week . $this->redir($week, $type);
        } elseif ($week == 53 && $year != 20152019) {
            $weekRecs = BSMortWeeklyUs::where('mrt_week_us_year', ($year-1))
                ->where('mrt_week_us_week', 52)
                ->get();
            $this->compileMortDailyWeeksUS($weekRecs, ($year-1));
            $weekRecs = BSMortWeeklyUs::where('mrt_week_us_year', ($year+1))
                ->where('mrt_week_us_week', 1)
                ->get();
            $this->compileMortDailyWeeksUS($weekRecs, ($year+1));
            echo 'Compiled daily data for week 52 and 1' . $this->redir($week, $type);
        } else {
            echo 'Finished compiling ' . $year . ' ' . $type . ' data averages!';
        }
        exit;
    }

    private function compileMortDailyWeeksUS($weekRecs, $year = 2020)
    {
        if ($weekRecs->isNotEmpty()) {
            foreach ($weekRecs as $week) {
                $yr = $yrInd = $week->mrt_week_us_year;
                if ($yr == 20152019) {
                    $yrInd = 2020;
                }
                $wk = $week->mrt_week_us_week;
                $end = strtotime($this->v["weekEndDates"][$yrInd][$wk]);
                for ($d = 0; $d < 7; $d++) {
                    $addDate = date("Y-m-d", mktime(
                        date('H', $end), date('i', $end), date('s', $end),
                        date('m', $end), date('d', $end)-$d, date('Y', $end)));
                    $this->makeNewDayFromWeek($addDate, $week, $yr);
                }
            }
        }
    }

    protected function makeNewDayFromWeek($date, $week, $year = 2020)
    {
        $day = new BSMortDailyUs;
        $day->mrt_day_us_state = $week->mrt_week_us_state;
        $day->mrt_day_us_week  = $week->mrt_week_us_week;
        $day->mrt_day_us_year  = substr($date, 0, 4);
        if ($year == 20152019) {
            $day->mrt_day_us_year = 20152019;
        }
        $day->mrt_day_us_date  = $date;
        foreach ($this->getWeekFldsForDays() as $fld) {
            $dayFld = str_replace('_week_', '_day_', $fld);
            $day->{ $dayFld } = $week->{ $fld };
        }
        foreach ($this->getWeekFldsForDaysDiv7() as $fld) {
            $dayFld = str_replace('_week_', '_day_', $fld);
            $day->{ $dayFld } = ($week->{ $fld }/7);
        }
        $day->save();
    }

    protected function getWeekFldsForDays()
    {
        return [
            'mrt_week_us_mort_perc',
            'mrt_week_us_mort_perc_diff',
            'mrt_week_us_mort_perc_avg_inc',
            'mrt_week_us_mort_perc_25_years',
            'mrt_week_us_mort_perc_25_44_years',
            'mrt_week_us_mort_perc_45_64_years',
            'mrt_week_us_mort_perc_65_74_years',
            'mrt_week_us_mort_perc_75_84_years',
            'mrt_week_us_mort_perc_85_years',

            'mrt_week_us_mort_std_dist_us',
            'mrt_week_us_mort_std_dist_us_diff',
            'mrt_week_us_mort_std_dist_us_avg_inc'
        ];
    }

    protected function getWeekFldsForDaysDiv7()
    {
        return [
            'mrt_week_us_mortality',
            'mrt_week_us_mortality_diff',
            'mrt_week_us_mort_25_years',
            'mrt_week_us_mort_25_44_years',
            'mrt_week_us_mort_45_64_years',
            'mrt_week_us_mort_65_74_years',
            'mrt_week_us_mort_75_84_years',
            'mrt_week_us_mort_85_years'
        ];
    }

    protected function getDayOxfordFldsAvg()
    {
        return [
            'mrt_day_us_oxf_stringency',
            'mrt_day_us_oxf_govt_response',
            'mrt_day_us_oxf_containment_health',
            'mrt_day_us_oxf_economic_support'
        ];
    }


    public function runCompileCovidResponseDailyUS()
    {
        $month = intVal($GLOBALS["SL"]->REQ->year);
        if ($month < 13) {
            $this->covidResponseDailyUS($month);
            echo 'Compiled daily COVID data for month #' . $month
                . $this->redir($month, 'covid');
        } elseif ($month < 25) {
            $this->covidResponseWeeklyUS($month-12);
            echo 'Compiled weekly COVID data for month #' . ($month-12)
                . $this->redir($month, 'covid');
        } else {
            echo 'Finished compiling daily COVID data averages!';
        }
        exit;
    }

    private function covidResponseDailyUS($month)
    {
        $dateMatch = '2020' . (($month < 10) ? '0' : '') . $month . '%';
        $responses = BSOxfordStringencyIndexUs::select(
                'oxf_strg_us_jurisdiction',
                'oxf_strg_us_region_name',
                'oxf_strg_us_date',
                'oxf_strg_us_StringencyIndex',
                'oxf_strg_us_GovernmentResponseIndex',
                'oxf_strg_us_ContainmentHealthIndex',
                'oxf_strg_us_EconomicSupportIndex'
            )
            ->where('oxf_strg_us_date', 'LIKE', $dateMatch)
            ->get();
        if ($responses->isNotEmpty()) {
            foreach ($responses as $day) {
                $state = '';
                if ($day->oxf_strg_us_jurisdiction == 'NAT_GOV') {
                    $state = 'United States';
                } elseif (isset($day->oxf_strg_us_region_name)) {
                    $state = $day->oxf_strg_us_region_name;
                }
                $date = $day->oxf_strg_us_date;
                $date = substr($date, 0, 4)
                    . '-' . substr($date, 4, 2)
                    . '-' . substr($date, 6, 2);
                BSMortDailyUs::where('mrt_day_us_state', $state)
                    ->where('mrt_day_us_date', $date)
                    ->update([
                        "mrt_day_us_oxf_stringency"
                            => $day->oxf_strg_us_StringencyIndex,
                        "mrt_day_us_oxf_govt_response"
                            => $day->oxf_strg_us_GovernmentResponseIndex,
                        "mrt_day_us_oxf_containment_health"
                            => $day->oxf_strg_us_ContainmentHealthIndex,
                        "mrt_day_us_oxf_economic_support"
                            => $day->oxf_strg_us_EconomicSupportIndex
                    ]);
            }
        }
    }



    public function runCompileCovidResponseWeeklyUS()
    {
        $weeks = intVal($GLOBALS["SL"]->REQ->year);
        if ($weeks < 7) {
            if ($weeks == 1) {
            }
            $this->v["fldsAvgs"] = $this->getDayOxfordFldsAvg();
            $this->covidResponseWeeklyUS($weeks, 2020);
            $this->covidResponseWeeklyUS($weeks, 20152019);
            echo 'Compiled weekly COVID response data for weeks '
                . ((($weeks-1)*10)+1) . ' - ' . ($weeks*10)
                . $this->redir($weeks, 'covid-week');
        } else {
            echo 'Finished compiling weekly data averages!';
        }
        exit;
    }

    private function covidResponseWeeklyUS($weeks, $year = 2020)
    {
        $this->v["fldsAvgs"] = $this->getDayOxfordFldsAvg();
        $lookups = [];
        $weekRecs = BSMortWeeklyUs::where('mrt_week_us_year', $year)
            ->where('mrt_week_us_week', '>', (($weeks-1)*10))
            ->where('mrt_week_us_week', '<=', ($weeks*10))
            ->get();
        if ($weekRecs->isNotEmpty()) {
            foreach ($weekRecs as $w => $wk) {
                if (!isset($lookups[$wk->mrt_week_us_state])) {
                    $lookups[$wk->mrt_week_us_state] = [];
                }
                $lookups[$wk->mrt_week_us_state][$wk->mrt_week_us_week] = $w;
                foreach ($this->v["fldsAvgs"] as $fld) {
                    $weekFld = str_replace('_day_', '_week_', $fld);
                    $weekRecs[$w]->{ $weekFld . '_avg' } = 0;
                    $weekRecs[$w]->{ $weekFld . '_max' } = 0;
                }
            }
            $days = BSMortDailyUs::where('mrt_day_us_year', $year)
                ->where('mrt_day_us_week', '>', (($weeks-1)*10))
                ->where('mrt_day_us_week', '<=', ($weeks*10))
                ->get();
            if ($days->isNotEmpty()) {
                foreach ($days as $day) {
                    $weekInd = $lookups[$day->mrt_day_us_state][$day->mrt_day_us_week];
                    foreach ($this->v["fldsAvgs"] as $fld) {
                        $weekFld = str_replace('_day_', '_week_', $fld);
                        $weekRecs[$weekInd]->{ $weekFld . '_avg' } += $day->{ $fld };
                        if ($weekRecs[$weekInd]->{ $weekFld . '_max' } < $day->{ $fld }) {
                            $weekRecs[$weekInd]->{ $weekFld . '_max' } = $day->{ $fld };
                        }
                    }
                }
            }
            foreach ($weekRecs as $w => $wk) {
                foreach ($this->v["fldsAvgs"] as $fld) {
                    $weekFld = str_replace('_day_', '_week_', $fld) . '_avg';
                    $weekRecs[$w]->{ $weekFld } = $weekRecs[$w]->{ $weekFld }/7;
                }
                $weekRecs[$w]->save();
            }
        }
    }


    public function runCompileCovidResponseYearlyUS()
    {
        $this->covidResponseYearlyUS();
        echo 'Compiled weekly COVID response data for the year!';
        exit;
    }

    private function covidResponseYearlyUS($year = 2020)
    {
        $this->v["fldsAvgs"] = $this->getDayOxfordFldsAvg();
        $lookups = [];
        $yearRecs = BSPopulationUs::where('us_pop_year', $year)
            ->get();
        if ($yearRecs->isNotEmpty()) {
            foreach ($yearRecs as $y => $yr) {
                $lookups[$yr->us_pop_state] = $y;
                foreach ($this->v["fldsAvgs"] as $fld) {
                    $yearFld = str_replace('mrt_day_us_', 'us_pop_', $fld);
                    $yearRecs[$y]->{ $yearFld . '_avg' } = 0;
                    $yearRecs[$y]->{ $yearFld . '_max' } = 0;
                }
            }
            $days = BSMortDailyUs::where('mrt_day_us_year', $year)
                ->get();
            if ($days->isNotEmpty()) {
                foreach ($days as $day) {
                    $yearInd = $lookups[$day->mrt_day_us_state];
                    foreach ($this->v["fldsAvgs"] as $fld) {
                        $yearFld = str_replace('mrt_day_us_', 'us_pop_', $fld);
                        $yearRecs[$yearInd]->{ $yearFld . '_avg' } += $day->{ $fld };
                        if ($yearRecs[$yearInd]->{ $yearFld . '_max' } < $day->{ $fld }) {
                            $yearRecs[$yearInd]->{ $yearFld . '_max' } = $day->{ $fld };
                        }
                    }
                }
            }
            foreach ($yearRecs as $y => $yr) {
                foreach ($this->v["fldsAvgs"] as $fld) {
                    $yearFld = str_replace('mrt_day_us_', 'us_pop_', $fld) . '_avg';
                    $yearRecs[$y]->{ $yearFld } = $yearRecs[$y]->{ $yearFld }/365;
                }
                $yearRecs[$y]->save();
            }
        }
    }




}
