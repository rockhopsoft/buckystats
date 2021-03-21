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

        $table   = 'bs_labor_monthly_us';
        $prefix  = 'lab_mon_us_';
        $dataFld = 'unemployment_rate';
        $this->compileMonthlyDataRows($table, $prefix, $dataFld, 100);

        $table   = 'bs_us_cpi_u';
        $prefix  = 'cpi_u_';
        $dataFld = 'cpi_u';
        $this->compileMonthlyDataRows($table, $prefix, $dataFld);

        $table   = 'bs_us_cpi_u_rs';
        $prefix  = 'cpi_urs_';
        $dataFld = 'cpi_u_rs';
        $this->compileMonthlyDataRows($table, $prefix, $dataFld, 1, 1978);

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


}
