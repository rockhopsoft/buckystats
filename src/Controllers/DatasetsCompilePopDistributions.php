<?php
namespace RockHopSoft\BuckyStats\Controllers;

use App\Models\BSPopulationDist;
use App\Models\BSPopulationUs;

use RockHopSoft\BuckyStats\Controllers\DatasetsLookups;

class DatasetsCompilePopDistributions extends DatasetsLookups
{
	private $places     = [];
	private $data       = [];
	private $lookupAbbr = [];
	private $lookupName = [];

	public function __construct()
	{
        ini_set('max_execution_time', 360);
		$GLOBALS["SL"]->loadStates();
	}

	public function runCompilePopDist()
	{
		$ret = '';
		$found2020 = false;
		$yr2020 = intVal(date("Y"))-1;
		$dists = BSPopulationDist::get();
		if ($dists->isNotEmpty()) {
			foreach ($dists as $d) {
				if (isset($d->pop_dist_geo_area_id)
					&& intVal($d->pop_dist_geo_area_id) == 1
					&& isset($d->pop_dist_year)
					&& intVal($d->pop_dist_year) == $yr2020
					&& isset($d->pop_dist_name)
					&& trim($d->pop_dist_name) == 'U.S. ' . $yr2020 . ' Estimate') {
					$found2020 = true;
				} elseif (isset($d->pop_dist_total) && $d->pop_dist_total > 0) {
					$ret .= $this->popDistCalcPercentages($d);
				}
			}
			if (!$found2020) {
				$this->estimatePopDist2020();
			}
		}
		$this->popDistAutoSetGeoArea();
		echo 'Finished Re-Compiling Population Distributions<br />' . $ret;
		exit;
	}

	private function popDistAutoSetGeoArea()
	{
		$chk = BSPopulationDist::whereNull('pop_dist_geo_area_id')
			->whereNotNull('pop_dist_name')
			->where('pop_dist_name', 'NOT LIKE', '')
			->get();
		if ($chk->isNotEmpty()) {
			$this->loadGeoLookups();
			foreach ($chk as $dist) {
				$name = strtolower(trim($dist->pop_dist_name));
				if (isset($this->geos[$name])) {
					$dist->pop_dist_geo_area_id = $this->geos[$name];
					$dist->save();
				}
			}
		}
		return true;
	}

	private function popDistCalcPercentages($d)
	{
		foreach ($this->fldNames as $f) {
			if ($f != 'total') {
				if (!isset($d->{ 'pop_dist_' . $f })
					&& isset($d->{ 'pop_dist_perc_' . $f })) {
					$d->{ 'pop_dist_' . $f } = $d->pop_dist_total
						*$d->{ 'pop_dist_perc_' . $f };
				} elseif (!isset($d->{ 'pop_dist_perc_' . $f })
					&& isset($d->{ 'pop_dist_' . $f })) {
					$d->{ 'pop_dist_perc_' . $f } = $d->{ 'pop_dist_' . $f }
						/$d->pop_dist_total;
				}
			}
		}
		$d->save();
		$chkTot = $chkPerc = 0;
		foreach ($this->fldNames as $f) {
			if (strpos($f, 'age') !== false) {
				if (isset($d->{ 'pop_dist_' . $f })) {
					$chkTot += $d->{ 'pop_dist_' . $f };
				}
				if (isset($d->{ 'pop_dist_perc_' . $f })) {
					$chkPerc += $d->{ 'pop_dist_perc_' . $f };
				}
			}
		}
		return '<h4>' . $d->pop_dist_name . '</h4><p>'
			. number_format($d->pop_dist_total) . ' ?= '
			. number_format($chkTot) . '</p><p>100% ?= '
			. (100*$chkPerc) . '%</p><hr>';
	}

	private function estimatePopDist2020()
	{
		$yr = intVal(date("Y"))-1;
		$year1 = BSPopulationDist::where('pop_dist_year', ($yr-1))
			->where('pop_dist_geo_area_id', 1)
			->where('pop_dist_name', 'LIKE', 'U.S. ' . ($yr-1) . ' Estimate')
			->first();
		$year6 = BSPopulationDist::where('pop_dist_year', ($yr-6))
			->where('pop_dist_geo_area_id', 1)
			->where('pop_dist_name', 'LIKE', 'U.S. ' . ($yr-6) . ' Estimate')
			->first();
		if ($year1
			&& $year6
			&& isset($year1->pop_dist_total)
			&& isset($year6->pop_dist_total)) {
			$year2020 = new BSPopulationDist;
			$year2020->pop_dist_geo_area_id = 1;
			$year2020->pop_dist_year = $yr;
			$year2020->pop_dist_name = 'U.S. ' . $yr . ' Estimate';
			foreach ($this->fldNames as $f) {
				$fld = 'pop_dist_' . $f;
				$year2020->{ $fld } += $this->fldPopDist2020($fld, $year1, $year6);
				if ($f != 'total') {
					$fld = 'pop_dist_perc_' . $f;
					$year2020->{ $fld } += $this->fldPopDist2020($fld, $year1, $year6);
				}
			}
			$year2020->save();
			echo view(
	            'vendor.buckystats.compile-print-dist-estimate',
	            [
	            	"yr"	   => $yr,
	                "year1"    => $year1,
	                "year6"    => $year6,
	                "year2020" => $year2020,
	                "fldNames" => $this->fldNames
	            ]
	        )->render();
			return true;
		}
		return false;
	}

	protected function fldPopDist2020($fld, $year1, $year6)
	{
		if (isset($year1->{ $fld })
			&& $year1->{ $fld } > 0
			&& isset($year6->{ $fld })
			&& $year6->{ $fld } > 0) {
			$prev1 = $year1->{ $fld };
			$prev6 = $year6->{ $fld };
			$avgIncr = ($prev1-$prev6)/5;
			return $prev1+$avgIncr;
		}
		return 0;
	}

}