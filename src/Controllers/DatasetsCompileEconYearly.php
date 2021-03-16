<?php
namespace RockHopSoft\BuckyStats\Controllers;

use DB;
use App\Models\BSDebtUsAllYears;
use App\Models\BSLaborMonthlyUs;
use App\Models\BSMortDailyUs;
use App\Models\BSMortWeeklyUs;
use App\Models\BSPopulationUs;
use RockHopSoft\BuckyStats\Controllers\DatasetsCompilePlace;
use RockHopSoft\BuckyStats\Controllers\DatasetsCompilePopDistributions;

class DatasetsCompileEconYearly extends DatasetsCompilePopDistributions
{

    public function runCompileEconDebtYearlyUS()
    {
        $this->runCompileEconDebtUS();
        $this->runCompileEconUnemploymentUS();
        echo 'Finished Compiling Economic stats';
        exit;
    }

    private function runCompileEconDebtUS()
    {
        $years = [];
        $debts = BSDebtUsAllYears::orderBy('debt_fiscal_year', 'asc')
            ->get();
        if ($debts->isNotEmpty()) {
            foreach ($debts as $d => $debt) {
                $pop = BSPopulationUs::where('us_pop_state', 'United States')
                    ->where('us_pop_year', intVal($debt->debt_fiscal_year))
                    ->first();
                if ($pop && isset($pop->us_pop_population) && $pop->us_pop_population > 0) {
                    $debtTot = $debt->debt_outstanding_amount;
                    $pop->us_pop_debt_outstanding_amount = $debtTot;
                    $pop->us_pop_debt_outstanding_per_capita = $debtTot/$pop->us_pop_population;
                    $years[] = $pop->us_pop_debt_outstanding_per_capita;
                    $pop->us_pop_debt_outstanding_per_capita_avg_inc = $this->getAvgIncLast5($years);
                    $pop->save();
                }
            }
        }
    }

    private function runCompileEconUnemploymentUS()
    {
        $years = $months = [];
        for ($year = 1948; $year <= 2020; $year++) {
            $years[$year]  = 0;
            $months[$year] = [];
        }
        $unemploy = BSLaborMonthlyUs::orderBy('lab_mon_us_year', 'asc')
            ->get();
        if ($unemploy->isNotEmpty()) {
            foreach ($unemploy as $e => $unemp) {
                $year = intVal($unemp->lab_mon_us_year);
                if ($year <= 2020) {
                    for ($month = 1; $month <= 12; $month++) {
                        $rate = ($unemp->{ 'lab_mon_us_' . $month }/100);
                        $months[$year][$month] = $rate;
                        $years[$year] += $rate;
                        if ($year >= 2015) {
                            $dateMatch = $year . '-' . (($month < 10) ? '0' : '') . $month . '-%';
                            BSMortDailyUs::where('mrt_day_us_state', 'United States')
                                ->where('mrt_day_us_date', 'LIKE', $dateMatch)
                                ->update([ 'mrt_day_us_unemployment_rate' => $months[$year][$month] ]);
                        }
                    }
                }
            }
        }
        for ($year = 1948; $year <= 2020; $year++) {
            $years[$year] = $years[$year]/12;
            BSPopulationUs::where('us_pop_state', 'United States')
                ->where('us_pop_year', $year)
                ->update([ 'us_pop_unemployment_rate' => $years[$year] ]);
        }
        $chk = BSMortWeeklyUs::where('mrt_week_us_state', 'United States')
            ->where('mrt_week_us_year', '<=', 2020)
            ->get();
        if ($chk->isNotEmpty()) {
            foreach ($chk as $week) {
                $year = intVal($week->mrt_week_us_year);
                $month = $this->getWeekEndDateMonth($year, $week->mrt_week_us_week);
                $week->mrt_week_us_unemployment_rate = null;
                if ($month >= 1 && $month <= 12) {
                    $week->mrt_week_us_unemployment_rate = $months[$year][$month];
                }
                $week->save();
            }
        }
    }

}
