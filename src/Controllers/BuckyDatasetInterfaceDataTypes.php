<?php
namespace RockHopSoft\BuckyStats\Controllers;

use Illuminate\Http\Request;
use App\Models\SLTables;
use App\Models\BSDatasets;
use RockHopSoft\Survloop\Controllers\Stats\SurvGraphDataType;
use RockHopSoft\Survloop\Controllers\Stats\SurvGraphDataTypes;
use RockHopSoft\Survloop\Controllers\Stats\SurvGraphLine;
use RockHopSoft\BuckyStats\Controllers\DatasetsLookups;

class BuckyDatasetInterfaceDataTypes extends DatasetsLookups
{
    // Data to pass into views
    public $v = [];

    public function loadDataTypes($timescale = '')
    {
        if ($timescale == '') {
            $timescale = $this->v["timescale"];
        }
        $this->v["dataTypes"] = new SurvGraphDataTypes;
        $this->v["convertPercents"] = new DataTypeConvertPercents;
        $this->loadDataTypeGroups($timescale);
        if (in_array($timescale, ['weeks', 'weeks-for-years'])) {
            $this->v["dataTypes"]->replaceInAllFieldNames('us_pop_', 'mrt_week_us_');
        } elseif ($timescale == 'days') {
            $this->v["dataTypes"]->replaceInAllFieldNames('us_pop_', 'mrt_day_us_');
        }
    }

    protected function loadDataTypeGroups($timescale)
    {
        $this->v["dataTypes"]->addNewGroup('Raw Population Estimates');
        $this->loadDataTypesYearsPop();
        $this->loadDataTypesYearsPopPerc();

        $this->v["dataTypes"]->addNewGroup('Raw Estimates of All-Cause Mortality');
        $this->loadDataTypesYearsMort();
        $this->loadDataTypesYearsMort('2015-2019 Average ', 'avg-');
        $this->v["convertPercents"]->turnOn();

        $this->v["dataTypes"]->addNewGroup('All-Cause Deaths per Million');
        $this->loadDataTypesYearsCrude();
        $this->loadDataTypesYearsCrude('2015-2019 Average ', 'avg-');
        $this->v["convertPercents"]->turnOff();

        $this->v["dataTypes"]->addNewGroup('Population Mortality Scaled to Standard Distributions');
        $this->loadDataTypesYearsStandard();
        $this->loadDataTypesYearsStandard('2015-2019 Average ', 'avg-');
        $this->v["convertPercents"]->turnOff();

        $this->v["dataTypes"]->addNewGroup('Average Life Expectancy Estimates');
        $this->loadDataTypesLifeExpect();

        $this->v["dataTypes"]->addNewGroup('Oxford Covid-19 Government Response Tracker (OxCGRT)');
        $this->loadDataTypesYearsCovid($timescale);

        $this->v["dataTypes"]->addNewGroup('Economic Statistics');
        $this->loadDataTypesEcon();

        $this->v["dataTypes"]->addNewGroup('Increases Over 5-Year Averages');
        $this->loadDataTypesYearsChange();
    }

    protected function loadDataTypesYearsPop($titlePre = '', $slugPre = '')
    {
        $unit = 'People';
        $title = $titlePre . 'Population Estimates';
        $flds = [ 'us_pop_population' ];
        $this->v["dataTypes"]->addType($slugPre . 'raw-pop', $title, $unit, $flds);
        $this->v["dataTypes"]->setAxisMinY();

        $title = $titlePre . 'Population by Age Groups (Stacked)';
        $this->v["dataTypes"]->addType($slugPre . 'pop-by-age-group', $title, $unit);
        $this->v["dataTypes"]->setAxisMinY();

        $title = $titlePre . 'Population of Under 25 Year-Olds';
        $flds = [ 'us_pop_25_years' ];
        $this->v["dataTypes"]->addType($slugPre . 'pop-by-age-24', $title, $unit, $flds);
        $this->v["dataTypes"]->setAxisMinY();
        foreach (['25-44', '45-64', '65-74', '75-84'] as $group) {
            $title = 'Population of ' . $group . ' Year-Olds';
            $flds = [ 'us_pop_' . str_replace('-', '_', $group) . '_years' ];
            $this->v["dataTypes"]->addType($slugPre . 'pop-by-age-' . $group, $title, $unit, $flds);
            $this->v["dataTypes"]->setAxisMinY();
        }
        $title = $titlePre . 'Population of 85+ Year-Olds';
        $flds = [ 'us_pop_85_years' ];
        $this->v["dataTypes"]->addType($slugPre . 'pop-by-age-85', $title, $unit, $flds);
        $this->v["dataTypes"]->setAxisMinY();
    }

    protected function loadDataTypesYearsPopPerc($titlePre = '', $slugPre = '')
    {
        $unit = 'Percent';
        $title = $titlePre . 'Age Group Sizes as Percent of Population (Stacked)';
        $this->v["dataTypes"]->addType($slugPre . 'perc-by-age-group', $title, $unit);

        $title = $titlePre . 'Percent of Population Under 25 Year-Olds';
        $this->v["dataTypes"]->addType($slugPre . 'perc-by-age-24', $title, $unit);
        $this->v["dataTypes"]->setAxisMinY();
        foreach (['25-44', '45-64', '65-74', '75-84'] as $group) {
            $title = 'Percent of Population ' . $group . ' Year-Olds';
            $this->v["dataTypes"]->addType($slugPre . 'perc-by-age-' . $group, $title, $unit);
            $this->v["dataTypes"]->setAxisMinY();
        }
        $title = $titlePre . 'Percent of Population 85+ Year-Olds';
        $this->v["dataTypes"]->addType($slugPre . 'perc-by-age-85', $title, $unit);
        $this->v["dataTypes"]->setAxisMinY();

        foreach ([75, 65, 45] as $group) {
            $title = $titlePre . 'Percent of Population ' . $group . '+ Year-Olds';
            $this->v["dataTypes"]->addType($slugPre . 'perc-by-age-' . $group, $title, $unit);
            $this->v["dataTypes"]->setAxisMinY();
        }
        $title = $titlePre . 'Percent of Population Under 45 Year-Olds';
        $this->v["dataTypes"]->addType($slugPre . 'perc-by-age-44', $title, $unit);
        $this->v["dataTypes"]->setAxisMinY();
    }

    protected function loadDataTypesYearsMort($titlePre = '', $slugPre = '')
    {
        $unit = 'People';
        $title = $titlePre . 'Death Estimates';
        $flds = [ 'us_pop_mortality' ];
        $this->v["dataTypes"]->addType($slugPre . 'raw-mort', $title, $unit, $flds);
        $this->v["dataTypes"]->setAxisMinY();

        $title = $titlePre . 'Deaths by Age Groups (Stacked)';
        $this->v["dataTypes"]->addType($slugPre . 'mort-by-age-group', $title, $unit);
        $this->v["dataTypes"]->setAxisMinY();

        $title = $titlePre . 'Deaths of Under 25 Year-Olds';
        $flds = [ 'us_pop_mort_25_years' ];
        $this->v["dataTypes"]->addType($slugPre . 'mort-by-age-24', $title, $unit, $flds);
        $this->v["dataTypes"]->setAxisMinY();
        foreach (['25-44', '45-64', '65-74', '75-84'] as $group) {
            $title = $titlePre . 'Deaths of ' . $group . ' Year-Olds';
            $flds = [ 'us_pop_mort_' . str_replace('-', '_', $group) . '_years' ];
            $this->v["dataTypes"]->addType($slugPre . 'mort-by-age-' . $group, $title, $unit, $flds);
            $this->v["dataTypes"]->setAxisMinY();
        }
        $title = $titlePre . 'Deaths of 85+ Year-Olds';
        $flds = [ 'us_pop_mort_85_years' ];
        $this->v["dataTypes"]->addType($slugPre . 'mort-by-age-85', $title, $unit, $flds);
        $this->v["dataTypes"]->setAxisMinY();

    }

    protected function loadDataTypesYearsCrude($titlePre = '', $slugPre = '')
    {
        $unit = 'People';
        $titlePre .= 'Deaths per Million ';
        $title = $titlePre;
        $flds = [ 'us_pop_mort_perc' ];
        $this->v["dataTypes"]->addType($slugPre . 'mort-perc-all-ages', $title, $unit, $flds);
        $this->v["dataTypes"]->setAxisMinY();
        $this->v["convertPercents"]->addSlug($slugPre . 'mort-perc-all-ages');

        $title = $titlePre . 'by Age Groups (Stacked)';
        $this->v["dataTypes"]->addType($slugPre . 'mort-perc-by-age-group', $title);
        $this->v["dataTypes"]->setAxisMinY();
        $this->v["convertPercents"]->addSlug($slugPre . 'mort-perc-by-age-group');

        $title = $titlePre . 'Under 25 Year-Olds';
        $flds = [ 'us_pop_mort_perc_25_years' ];
        $this->v["dataTypes"]->addType($slugPre . 'mort-perc-by-age-24', $title, $unit, $flds);
        $this->v["dataTypes"]->setAxisMinY();
        $this->v["convertPercents"]->addSlug($slugPre . 'mort-perc-by-age-24');
        foreach (['25-44', '45-64', '65-74', '75-84'] as $group) {
            $title = $titlePre . 'for ' . $group . ' Year-Olds';
            $flds = [ 'us_pop_mort_perc_' . str_replace('-', '_', $group) . '_years' ];
            $this->v["dataTypes"]->addType($slugPre . 'mort-perc-by-age-' . $group, $title, $unit, $flds);
        $this->v["dataTypes"]->setAxisMinY();
        $this->v["convertPercents"]->addSlug($slugPre . 'mort-perc-by-age-' . $group);
        }
        $title = $titlePre . 'for 85+ Year-Olds';
        $flds = [ 'us_pop_mort_perc_85_years' ];
        $this->v["dataTypes"]->addType($slugPre . 'mort-perc-by-age-85', $title, $unit, $flds);
        $this->v["dataTypes"]->setAxisMinY();
        $this->v["convertPercents"]->addSlug($slugPre . 'mort-perc-by-age-85');

        foreach ([75, 65, 45] as $group) {
            $title = $titlePre . 'for ' . $group . '+ Year-Olds';
            $this->v["dataTypes"]->addType($slugPre . 'mort-perc-by-age-' . $group, $title, $unit);
            $this->v["dataTypes"]->setAxisMinY();
            $this->v["convertPercents"]->addSlug($slugPre . 'mort-perc-by-age-' . $group);
        }
        $title = $titlePre . 'for Under 45 Year-Olds';
        $this->v["dataTypes"]->addType($slugPre . 'mort-perc-by-age-44', $title, $unit);
        $this->v["dataTypes"]->setAxisMinY();
        $this->v["convertPercents"]->addSlug($slugPre . 'mort-perc-by-age-44');
    }

    protected function loadDataTypesYearsStandard($titlePre = '', $slugPre = '')
    {
        $unit = 'People';
        $title = $titlePre . 'Deaths per Million of U.S. 2019 Standardized Population';
        $flds = [ 'us_pop_mort_std_dist_us' ];
        $this->v["dataTypes"]->addType($slugPre . 'standardized-by-age-us', $title, $unit, $flds);
        $this->v["dataTypes"]->setAxisMinY();

        /*
        $title = $titlePre . 'Deaths per Million of State\'s Own 2019 Standardized Population';
        $flds = [ 'us_pop_mort_std_dist_state' ];
        $this->v["dataTypes"]->addType($slugPre . 'standardized-by-age-state', $title, $unit, $flds);
        $this->v["dataTypes"]->setAxisMinY();
        */
    }

    protected function loadDataTypesLifeExpect($titlePre = '', $slugPre = '')
    {
        $unit = 'Years';
        $title = $titlePre . 'Average U.S. Life Expectancy At Birth';
        $flds = [ 'us_pop_life_expect_at_birth' ];
        $this->v["dataTypes"]->addType($slugPre . 'life-expect-birth', $title, $unit, $flds);
        $this->v["dataTypes"]->setAxisMinY();

        $title = $titlePre . 'Average U.S. Life Expectancy At Age 65';
        $flds = [ 'us_pop_life_expect_at_65' ];
        $this->v["dataTypes"]->addType($slugPre . 'life-expect-65', $title, $unit, $flds);
        $this->v["dataTypes"]->setAxisMinY();

        $title = $titlePre . 'Average U.S. Life Expectancy At Age 75';
        $flds = [ 'us_pop_life_expect_at_75' ];
        $this->v["dataTypes"]->addType($slugPre . 'life-expect-75', $title, $unit, $flds);
        $this->v["dataTypes"]->setAxisMinY();
    }

    protected function loadDataTypesYearsCovid($timescale, $titlePre = '', $slugPre = '')
    {
        $unit = 'Index';
        $vars = $this->getCovidVars();
        if ($timescale == 'days') {
            $title = $titlePre . 'All COVID-19 Daily Index (Stacked)';
            $this->v["dataTypes"]->addType($slugPre . 'covid-all-avg', $title, $unit);
            $this->v["dataTypes"]->setAxisMinY();
            foreach ($vars as $var) {
                $title = $titlePre . 'COVID-19 ' . $var[0] . ' Daily Index';
                $slug  = $slugPre . $var[2] . '-avg';
                $this->v["dataTypes"]->addType($slug, $title, $unit, [ $var[1] ]);
                $this->v["dataTypes"]->setAxisMaxY(100);
            }

        } else {
            $title = $titlePre . 'All COVID-19 Daily Index Averages (Stacked)';
            $this->v["dataTypes"]->addType($slugPre . 'covid-all-avg', $title, $unit);
            $this->v["dataTypes"]->setAxisMinY();
            foreach ($vars as $var) {
                $title = $titlePre . 'COVID-19 ' . $var[0] . ' Index: Daily Average';
                $slug  = $slugPre . $var[2] . '-avg';
                $this->v["dataTypes"]->addType($slug, $title, $unit, [ $var[1] . '_avg' ]);
                $this->v["dataTypes"]->setAxisMaxY(100);
            }

            $title = $titlePre . 'All COVID-19 Daily Index Maximums (Stacked)';
            $this->v["dataTypes"]->addType($slugPre . 'covid-all-max', $title, $unit);
            $this->v["dataTypes"]->setAxisMinY();
            foreach ($vars as $var) {
                $title = $titlePre . 'COVID-19 ' . $var[0] . ' Index: Daily Maximum';
                $slug  = $slugPre . $var[2] . '-max';
                $this->v["dataTypes"]->addType($slug, $title, $unit, [ $var[1] . '_max' ]);
                $this->v["dataTypes"]->setAxisMaxY(100);
            }
        }
    }

    protected function loadDataTypesEcon($titlePre = '', $slugPre = '')
    {
        $unit = 'Percent';
        $title = $titlePre . 'U.S. Average Unemployment Rate';
        $flds = [ 'us_pop_unemployment_rate' ];
        $this->v["dataTypes"]->addType($slugPre . 'unemployment-rate', $title, $unit, $flds);
        $this->v["dataTypes"]->setAxisMinY();

        $unit = 'Trillions of U.S. Dollars';
        $title = $titlePre . 'National Debt: Outstanding Amount';
        $flds = [ 'us_pop_debt_outstanding_amount' ];
        $this->v["dataTypes"]->addType($slugPre . 'debt-govt', $title, $unit, $flds);
        $this->v["dataTypes"]->setAxisMinY();

        $unit = 'U.S. Dollars';
        $title = $titlePre . 'National Debt: Outstanding Amount Per Capita';
        $flds = [ 'us_pop_debt_outstanding_per_capita' ];
        $this->v["dataTypes"]->addType($slugPre . 'debt-govt-per-capita', $title, $unit, $flds);
        $this->v["dataTypes"]->setAxisMinY();
    }


    protected function loadDataTypesYearsChange($titlePre = '', $slugPre = '')
    {
        $inc = 'Increase Over Previous 5-Year Average';
        $incWeek = 'Increase Over 2015-2019 Average';

        $title = $titlePre . $incWeek . ' Deaths';
        $flds = [ 'mrt_week_us_mortality_diff' ];
        $this->v["dataTypes"]->addType($slugPre . 'diff-mort', $title, 'People', $flds);

        $title = $titlePre . $incWeek . ' of Deaths per Million';
        $flds = [ 'mrt_week_us_mort_perc_diff' ];
        $this->v["dataTypes"]->addType($slugPre . 'diff-mort-perc', $title, 'People', $flds);
        $this->v["convertPercents"]->addSlug($slugPre . 'diff-mort-perc');

        $title = $titlePre . $incWeek . ' of Deaths per Million of U.S. 2019 Standardized Population';
        $slug = $slugPre . 'diff-mort-standardized-by-age-us';
        $flds = [ 'mrt_week_us_mort_std_dist_us_diff' ];
        $this->v["dataTypes"]->addType($slug, $title, 'People', $flds);

        $title = $titlePre . '% ' . $inc . ' of Deaths per Million';
        $slug  = $slugPre . 'mort-perc-all-ages-avg-5yr';
        $flds  = [ 'us_pop_mort_perc_avg_inc' ];
        $this->v["dataTypes"]->addType($slug, $title, 'Percent', $flds);

        $title = $titlePre . '% ' . $inc . ' of Deaths per Million of U.S. 2019 Standardized Population';
        $slug  = $slugPre . 'standardized-by-age-us-avg-5yr';
        $flds  = [ 'us_pop_mort_std_dist_us_avg_inc' ];
        $this->v["dataTypes"]->addType($slug, $title, 'Percent', $flds);


        $title = $titlePre . '% ' . $inc . ' of U.S. Life Expectancy At Birth';
        $slug = $slugPre . 'life-expect-birth-avg-5yr';
        $flds = [ 'us_pop_life_expect_at_birth_avg_inc' ];
        $this->v["dataTypes"]->addType($slug, $title, 'Percent', $flds);

        $title = $titlePre . '% ' . $inc . ' of U.S. Life Expectancy At Age 65';
        $slug = $slugPre . 'life-expect-65-avg-5yr';
        $flds = [ 'us_pop_life_expect_at_65_avg_inc' ];
        $this->v["dataTypes"]->addType($slug, $title, 'Percent', $flds);

        $title = $titlePre . '% ' . $inc . ' of U.S. Life Expectancy At Age 75';
        $slug = $slugPre . 'life-expect-75-avg-5yr';
        $flds = [ 'us_pop_life_expect_at_75_avg_inc' ];
        $this->v["dataTypes"]->addType($slug, $title, 'Percent', $flds);


        $title = $titlePre . '% ' . $inc . ' of National Debt Per Capita';
        $slug = $slugPre . 'debt-govt-per-capita-avg-5yr';
        $flds = [ 'us_pop_debt_outstanding_per_capita_avg_inc' ];
        $this->v["dataTypes"]->addType($slug, $title, 'Percent', $flds);
    }

}

class DataTypeConvertPercents
{
    public $dataSlugs   = [];
    public $autoCollect = false;

    public function __construct($autoCollect = false)
    {
        $this->autoCollect = $autoCollect;
    }

    public function turnOn()
    {
        $this->autoCollect = true;
    }

    public function turnOff()
    {
        $this->autoCollect = false;
    }

    public function addSlug($dataSlug)
    {
        if (!in_array($dataSlug, $this->dataSlugs)) {
            $this->dataSlugs[] = $dataSlug;
        }
    }

    public function collectIfOn($dataSlug)
    {
        if ($this->autoCollect) {
            $this->addSlug($dataSlug);
        }
    }

}

