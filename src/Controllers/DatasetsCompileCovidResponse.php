<?php
namespace RockHopSoft\BuckyStats\Controllers;

use App\Models\BSOxfordStringencyIndexUs;
use RockHopSoft\BuckyStats\Controllers\DatasetsLookups;

class DatasetsCompileCovidResponse extends DatasetsLookups
{

    public function __construct()
    {
        $this->addSourceUrl(
            'oxford-string',
            'https://raw.githubusercontent.com/OxCGRT/covid-policy-tracker/master/data/timeseries/stringency_index.csv',
            'Country Stringency Index by Oxford Covid-19 Government Response Tracker (OxCGRT)'
        );


        $this->addSourceUrl(
            'oxford-string-us',
            'https://raw.githubusercontent.com/OxCGRT/USA-covid-policy/master/data/OxCGRT_US_latest.csv',
            'U.S. Stringency Index by Oxford Covid-19 Government Response Tracker (OxCGRT)'
        );

        // https://github.com/OxCGRT/covid-policy-tracker/blob/master/documentation/codebook.md
    }

    public function compileOxfordSringencyUS()
    {
        $flds = [
            'oxf_strg_us_region_code',
            'oxf_strg_us_date',
            'oxf_strg_us_StringencyIndex',
            'oxf_strg_us_GovernmentResponseIndex',
            'oxf_strg_us_ContainmentHealthIndex',
            'oxf_strg_us_EconomicSupportIndex'
        ];
        $all = BSOxfordStringencyIndexUs::select($flds)
            ->get();



    }



}