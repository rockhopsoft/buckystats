<?php
namespace RockHopSoft\BuckyStats\Controllers;

use App\Models\BSPopulationUs;
use App\Models\BSMortWeeklyUs;

class DatasetsCompilePlace
{
    public $abbr = '';
    public $name = '';
    public $year = 0;
    public $rec  = [];
    public $week = [];

    public function __construct($abbr, $name, $year = 0, $weeks = false)
    {
        $this->abbr = $abbr;
        $this->name = $name;
        $this->year = $year;
        $this->newRec($name, $year);
        if ($weeks) {
            $this->week = [];
            for ($w = 1; $w <= 52; $w++) {
                $this->week[$w] = new DatasetsCompilePlaceWeekly($abbr, $name, $w, $year);
            }
        }
    }

    private function newRec($name, $year)
    {
        $this->rec = BSPopulationUs::where('us_pop_state', 'LIKE', $name)
            ->where('us_pop_year', 'LIKE', $year)
            ->first();
        if (!$this->rec || !isset($this->rec->us_pop_year)) {
            $this->rec = new BSPopulationUs;
            $this->rec->us_pop_state = $name;
            $this->rec->us_pop_year  = $year;
        }
        $this->rec->us_pop_population
            = $this->rec->us_pop_25_years
            = $this->rec->us_pop_25_44_years
            = $this->rec->us_pop_45_64_years
            = $this->rec->us_pop_65_74_years
            = $this->rec->us_pop_75_84_years
            = $this->rec->us_pop_85_years
            = $this->rec->us_pop_age_unknown
            = $this->rec->us_pop_mortality
            = $this->rec->us_pop_mort_25_years
            = $this->rec->us_pop_mort_25_44_years
            = $this->rec->us_pop_mort_45_64_years
            = $this->rec->us_pop_mort_65_74_years
            = $this->rec->us_pop_mort_75_84_years
            = $this->rec->us_pop_mort_85_years
            = $this->rec->us_pop_mort_age_unknown
            = 0;
        return $this->rec;
    }

    public function saveData()
    {
        $this->rec->save();
    }

    public function addUpAgeGroups()
    {
        $this->rec->us_pop_population = $this->rec->us_pop_25_years
            + $this->rec->us_pop_25_44_years
            + $this->rec->us_pop_45_64_years
            + $this->rec->us_pop_65_74_years
            + $this->rec->us_pop_75_84_years
            + $this->rec->us_pop_85_years
            + $this->rec->us_pop_age_unknown;
        $this->rec->us_pop_mortality = $this->rec->us_pop_mort_25_years
            + $this->rec->us_pop_mort_25_44_years
            + $this->rec->us_pop_mort_45_64_years
            + $this->rec->us_pop_mort_65_74_years
            + $this->rec->us_pop_mort_75_84_years
            + $this->rec->us_pop_mort_85_years
            + $this->rec->us_pop_mort_age_unknown;
    }

    public function addYearVal($val, $ageFld = '')
    {
        if ($ageFld == '') {
            return false;
        }
        if (!isset($this->rec->{ $ageFld })) {
            $this->rec->{ $ageFld } = 0;
        }
        $this->rec->{ $ageFld } += $val;
        return $this->rec->{ $ageFld };
    }

    public function addWeekRecord($rec)
    {
        if (isset($rec->cdc_mort_age_15_20_week)
            && isset($this->week[$rec->cdc_mort_age_15_20_week])) {
            $this->week[$rec->cdc_mort_age_15_20_week]->addWeekRecord($rec);
        }
    }

    public function calcWeekRecords()
    {
        $GLOBALS["CUST"]->getStatePopAges($this->name);
        for ($w = 1; $w <= 52; $w++) {
            $this->week[$w]->calcWeek();
        }
    }

}



class DatasetsCompilePlaceWeekly
{
    public $abbr = '';
    public $name = '';
    public $week = 0;
    public $rec  = [];

    public function __construct($abbr, $name, $week, $year)
    {
        $this->abbr = $abbr;
        $this->name = $name;
        $this->week = $week;
        $this->newRec($name, $week, $year);
    }

    private function newRec($name, $week, $year)
    {
        $this->rec = BSMortWeeklyUs::where('mrt_week_us_state', 'LIKE', $name)
            ->where('mrt_week_us_year', 'LIKE', $year)
            ->where('mrt_week_us_week', 'LIKE', $week)
            ->first();
        if (!$this->rec || !isset($this->rec->mrt_week_us_week)) {
            $this->rec = new BSMortWeeklyUs;
            $this->rec->mrt_week_us_state = $name;
            $this->rec->mrt_week_us_year  = $year;
            $this->rec->mrt_week_us_week  = $week;
        }
        $this->rec->mrt_week_us_mortality
            = $this->rec->mrt_week_us_mort_25_years
            = $this->rec->mrt_week_us_mort_25_44_years
            = $this->rec->mrt_week_us_mort_45_64_years
            = $this->rec->mrt_week_us_mort_65_74_years
            = $this->rec->mrt_week_us_mort_75_84_years
            = $this->rec->mrt_week_us_mort_85_years
            = $this->rec->mrt_week_us_mort_perc
            = $this->rec->mrt_week_us_mort_perc_25_years
            = $this->rec->mrt_week_us_mort_perc_25_44_years
            = $this->rec->mrt_week_us_mort_perc_45_64_years
            = $this->rec->mrt_week_us_mort_perc_65_74_years
            = $this->rec->mrt_week_us_mort_perc_75_84_years
            = $this->rec->mrt_week_us_mort_perc_85_years
            = $this->rec->mrt_week_us_mort_std_dist_us
            = $this->rec->mrt_week_us_mort_std_dist_us_avg_inc
            = $this->rec->mrt_week_us_mort_perc_avg_inc
            = 0;
        return $this->rec;
    }

    public function addWeekRecord($rec)
    {
        $this->rec->mrt_week_us_mortality += $rec->cdc_mort_age_15_20_number_of_deaths;
        if (isset($rec->cdc_mort_age_15_20_age_group)) {
            $fld = $this->convertAgeValToField($rec->cdc_mort_age_15_20_age_group);
            $this->rec->{ $fld } += $rec->cdc_mort_age_15_20_number_of_deaths;
        }
    }

    private function convertAgeValToField($val, $prefix = 'mrt_week_us_mort_')
    {
        switch ($val) {
            case 'Under 25 years':     return $prefix . '25_years';    break;
            case '25-44 years':        return $prefix . '25_44_years'; break;
            case '45-64 years':        return $prefix . '45_64_years'; break;
            case '65-74 years':        return $prefix . '65_74_years'; break;
            case '75-84 years':        return $prefix . '75_84_years'; break;
            case '85 years and older': return $prefix . '85_years';    break;
        }
        return '';
    }

    private function convertIndToField($ind, $prefix = 'mrt_week_us_mort_')
    {
        switch ($ind) {
            case 0: return $prefix . '25_years';    break;
            case 1: return $prefix . '25_44_years'; break;
            case 2: return $prefix . '45_64_years'; break;
            case 3: return $prefix . '65_74_years'; break;
            case 4: return $prefix . '75_84_years'; break;
            case 5: return $prefix . '85_years';    break;
        }
        return '';
    }

    public function calcWeek()
    {
        $totPop = $totMort = 0;
        $year = $this->rec->mrt_week_us_year;
        $popRec = $GLOBALS["CUST"]->getStatePopulationDat($this->name, $year);
        $distSizes = $GLOBALS["CUST"]->distPeeps["United States"];
        foreach ($GLOBALS["CUST"]->getAgeFields() as $i => $fld) {
            $mort = $this->rec->{ 'mrt_week_us_mort_' . $fld };
            $pop = $popRec->{ 'us_pop_' . $fld };
            $percFld = 'mrt_week_us_mort_perc_' . $fld;
            $this->rec->{ $percFld } = 0;
            if ($pop > 0) {
                $this->rec->{ $percFld } = $mort/$pop;
            }
            $this->rec->mrt_week_us_mort_std_dist_us += $this->rec->{ $percFld }*$distSizes[$i];
        }
        $this->rec->mrt_week_us_mort_perc = $this->rec->mrt_week_us_mortality
            /$popRec->us_pop_population;
//if ($this->name != 'United States') { echo 'calcWeek - popRec:<pre>'; print_r($popRec); echo '</pre>distSizes:<pre>'; print_r($distSizes); echo '</pre><pre>'; print_r($this->rec); echo '</pre>'; exit; }
        $this->rec->save();
    }

}

