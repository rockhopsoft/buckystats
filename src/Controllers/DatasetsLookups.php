<?php
namespace RockHopSoft\BuckyStats\Controllers;

use DB;
use App\Models\BSMortDailyUs;
use App\Models\BSMortWeeklyUs;
use App\Models\BSPopulationUs;
use App\Models\BSGeographicAreas;
use App\Models\BSYearWeekEndDates;

class DatasetsLookups
{
    // Variables to pass to views
    public $v          = [];

    public $sourceUrls = [];
	public $geos       = [];

	protected $popSumFldsUS = [
		'us_pop_population' => [
			'pop_dist_total'
		],
		'us_pop_25_years' => [
			'pop_dist_age04',
			'pop_dist_age59',
			'pop_dist_age1014',
			'pop_dist_age1519',
			'pop_dist_age2024'
		],
		'us_pop_25_44_years' => [
			'pop_dist_age2534',
			'pop_dist_age3544'
		],
		'us_pop_45_64_years' => [
			'pop_dist_age4554',
			'pop_dist_age5559',
			'pop_dist_age6064'
		],
		'us_pop_65_74_years' => [
			'pop_dist_age6574'
		],
		'us_pop_75_84_years' => [
			'pop_dist_age7584'
		],
		'us_pop_85_years' => [
			'pop_dist_age85'
		],
		'us_pop_age_unknown' => [],
		'us_pop_mortality'   => []
	];

	protected $fldNames = [
		'age04',
		'age59',
		'age1014',
		'age1519',
		'age2024',
		'age2534',
		'age3544',
		'age4554',
		'age5559',
		'age6064',
		'age6574',
		'age7584',
		'age85',
		'gender_female',
		'gender_male',
		'total'
	];

	protected function getMortFld($popFld)
	{
		if ($popFld == 'us_pop_population') {
			return 'us_pop_mortality';
		}
		return str_replace('us_pop_', 'us_pop_mort_', $popFld);
	}

	protected function getMortPercFld($popFld)
	{
		if ($popFld == 'us_pop_population') {
			return 'us_pop_mort_perc';
		}
		return str_replace('us_pop_', 'us_pop_mort_perc_', $popFld);
	}

	protected function addSourceUrl($abbr, $url, $name)
	{
		$this->sourceUrls[$abbr] = new DatasetsLookupSource($abbr, $url, $name);
	}

	protected function pullSource($abbr)
	{
		$ret = [];
		if (isset($this->sourceUrls[$abbr])
			&& isset($this->sourceUrls[$abbr]->url)
			&& trim($this->sourceUrls[$abbr]->url) != '') {


		}
    }

    protected function getAvgIncLast5($arr)
    {
        $avgInc = 0;
        $last = sizeof($arr)-1;
        if (sizeof($arr) >= 6
            && $arr[$last-1] != 0
            && $arr[$last-2] != 0
            && $arr[$last-3] != 0
            && $arr[$last-4] != 0
            && $arr[$last-5] != 0) {
            $last = sizeof($arr)-1;
            $prevAvg = ($arr[$last-1]+$arr[$last-2]+$arr[$last-3]+$arr[$last-4]+$arr[$last-5])/5;
            $avgInc = ($arr[$last]-$prevAvg)/$prevAvg;
        }
        return $avgInc;
    }

	protected function loadGeoLookups()
	{
		$this->geos = [];
		$chk = BSGeographicAreas::get();
		if ($chk->isNotEmpty()) {
			foreach ($chk as $geo) {
				$geoName = '';
				if (isset($geo->geo_area_city)
					&& trim($geo->geo_area_city) != '') {
					$geoName = $geo->geo_area_city;
				} elseif (isset($geo->geo_area_state)
					&& trim($geo->geo_area_state) != '') {
					$geoName = $geo->geo_area_state;
				} elseif (isset($geo->geo_area_country)
					&& trim($geo->geo_area_country) != '') {
					$geoName = $geo->geo_area_country;
				}
				$geoName = strtolower(trim($geoName));
				if ($geoName != '') {
					$this->geos[$geoName] = intVal($geo->geo_area_id);
				}
			}
		}
		return true;
	}

    public function getCovidVars()
    {
        return [
            [
                'Overall Government Response',
                'us_pop_oxf_govt_response',
                'covid-overall'
            ],
            [
                'Containment and Health',
                'us_pop_oxf_containment_health',
                'covid-containment'
            ],
            [
                'Stringency',
                'us_pop_oxf_stringency',
                'covid-stringency'
            ],
            [
                'Economic Support',
                'us_pop_oxf_economic_support',
                'covid-economic'
            ]
        ];
    }

    protected function loadWeekEndDates()
    {
        $this->v["weekEndDates"] = [
            2015 => [],
            2016 => [],
            2017 => [],
            2018 => [],
            2019 => [],
            2020 => [],
            2021 => []
        ];
        $endDates = BSYearWeekEndDates::get();
        if ($endDates->isNotEmpty()) {
            foreach ($endDates as $date) {
                $yr = $date->yr_wk_date_year;
                $wk = $date->yr_wk_date_week;
                $this->v["weekEndDates"][$yr][$wk] = $date->yr_wk_date_end_date;
            }
        }
        return $this->v["weekEndDates"];
    }

    protected function getWeekEndDate($year, $week)
    {
        $this->loadWeekEndDates();
        if (isset($this->v["weekEndDates"][$year])
            && isset($this->v["weekEndDates"][$year][$week])) {
            return $this->v["weekEndDates"][$year][$week];
        }
        return '';
    }

    protected function getWeekEndDateMonthStr($year, $week)
    {
        if ($week == 1) {
            return '01';
        }
        if ($week == 52) {
            return '12';
        }
        $date = $this->getWeekEndDate($year, $week);
        if ($date != '') {
            return substr($date, 5, 2);
        }
        return '00';
    }

    protected function getWeekEndDateMonth($year, $week)
    {
        return intVal($this->getWeekEndDateMonthStr($year, $week));
    }

    protected function storeMonthDataForDays($year, $month, $dataFld, $val)
    {
        $dailyFld = 'mrt_day_us_' . $dataFld;
        $dateMatch = $year . '-' . (($month < 10) ? '0' : '') . $month . '-%';
        BSMortDailyUs::where('mrt_day_us_state', 'United States')
            ->where('mrt_day_us_date', 'LIKE', $dateMatch)
            ->update([ $dailyFld => $val ]);
    }

    protected function compileMonthlyDataRows($table, $prefix, $dataFld, $div = 1, $year1 = -1)
    {
        $yearFld = $prefix . 'year';
        if ($div == 0) {
            $div = 1;
        }
        $monthlies = DB::table($table)
            ->orderBy($yearFld, 'asc')
            ->get();
        if ($monthlies->isNotEmpty()) {
            if ($year1 <= 0) {
                $year1 = intVal($monthlies[0]->{ $yearFld });
            }
            $years = $months = [];
            for ($year = $year1; $year <= 2020; $year++) {
                $years[$year]  = 0;
                $months[$year] = [];
            }
            foreach ($monthlies as $i => $row) {
                $year = intVal($row->{ $yearFld });
                if ($year >= $year1 && $year <= 2020) {
                    for ($month = 1; $month <= 12; $month++) {
                        $val = ($row->{ $prefix . $month }/$div);
                        $months[$year][$month] = $val;
                        $years[$year] += $val;
                        if ($year == 2020) {
                            $this->storeMonthDataForDays($year, $month, $dataFld, $val);
                        }
                    }
                }
            }
        }
        for ($year = $year1; $year <= 2020; $year++) {
            $years[$year] = $years[$year]/12;
            BSPopulationUs::where('us_pop_state', 'United States')
                ->where('us_pop_year', $year)
                ->update([ ('us_pop_' . $dataFld) => $years[$year] ]);
        }
        $weeklyFld = 'mrt_week_us_' . $dataFld;
        $chk = BSMortWeeklyUs::where('mrt_week_us_state', 'United States')
            ->where('mrt_week_us_year', '<=', 2020)
            ->get();
        if ($chk->isNotEmpty()) {
            foreach ($chk as $week) {
                $year = intVal($week->mrt_week_us_year);
                $month = $this->getWeekEndDateMonth($year, $week->mrt_week_us_week);
                $week->{ $weeklyFld } = null;
                if ($month >= 1 && $month <= 12) {
                    $week->{ $weeklyFld } = $months[$year][$month];
                }
                $week->save();
            }
        }
    }

}

class DatasetsLookupSource
{
	public $abbr = '';
	public $url  = '';
	public $name = '';

    public function __construct($abbr, $url, $name)
    {
    	$this->abbr = $abbr;
		$this->url  = $url;
		$this->name = $name;
    }
}
