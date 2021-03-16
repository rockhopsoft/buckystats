<?php
namespace RockHopSoft\BuckyStats\Controllers;

use DB;
use App\Models\BSPopulationDist;
use App\Models\BSPopulationUs;
use App\Models\BSCdcWeeklyDeathsByAge20152020Unweighted;
use App\Models\BSCdcWeeklyDeathsByAge20152020Weighted;
use App\Models\BSCdcMortByAge19992016;
use App\Models\BSCdcMortByAge19791998;
use App\Models\BSCdcMortByAge19681978;
use App\Models\BSPopulationUs1900;
use App\Models\BSPopulationUsMort1900;
use App\Models\BSPopulationMd1790;
use App\Models\BSMortWeeklyUs;
use RockHopSoft\BuckyStats\Controllers\DatasetsCompilePlace;
use RockHopSoft\BuckyStats\Controllers\DatasetsCompileVitalsDaily;

class DatasetsCompileVitals extends DatasetsCompileVitalsDaily
{

	public function printCompileTable($limit = 200)
	{
        return view(
            'vendor.buckystats.compile-print-us-vitals',
            [
                "data"  => $this->data,
                "limit" => $limit
            ]
        )->render();
	}

	public function redir($year = 1, $compile = 'pop')
	{
		$nextYear = 1+$year;
		$url = "/dash/population-datasets?compile=" . $compile . "&year=" . $nextYear;
		return '<script type="text/javascript"> $(document).ready(function(){
			setTimeout(function() {
			  document.getElementById("compilerDiv").innerHTML="Year '
			  	. $year . ' Complete "+getSpinner();
			  console.log("' . $url . '");
			  $("#compilerDiv").load("' . $url . '");
			}, 3000);
		}); </script>';
	}

}


