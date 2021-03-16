<?php
namespace App\Models;
// generated from /resources/views/vendor/survloop/admin/db/export-laravel-model-gen.blade.php

use Illuminate\Database\Eloquent\Model;

class BSMortDailyUs extends Model
{
    protected $table      = 'bs_mort_daily_us';
    protected $primaryKey = 'mrt_day_us_id';
    public $timestamps    = true;
    protected $fillable   =
    [
        'mrt_day_us_state',
        'mrt_day_us_year',
        'mrt_day_us_date',

        'mrt_day_us_mortality',
        'mrt_day_us_mortality_diff',
        'mrt_day_us_mort_25_years',
        'mrt_day_us_mort_25_44_years',
        'mrt_day_us_mort_45_64_years',
        'mrt_day_us_mort_65_74_years',
        'mrt_day_us_mort_75_84_years',
        'mrt_day_us_mort_85_years',

        'mrt_day_us_mort_perc',
        'mrt_day_us_mort_perc_diff',
        'mrt_day_us_mort_perc_avg_inc',
        'mrt_day_us_mort_perc_25_years',
        'mrt_day_us_mort_perc_25_44_years',
        'mrt_day_us_mort_perc_45_64_years',
        'mrt_day_us_mort_perc_65_74_years',
        'mrt_day_us_mort_perc_75_84_years',
        'mrt_day_us_mort_perc_85_years',

        'mrt_day_us_mort_std_dist_us',
        'mrt_day_us_mort_std_dist_us_diff',
        'mrt_day_us_mort_std_dist_us_avg_inc',

        'mrt_day_us_oxf_stringency',
        'mrt_day_us_oxf_govt_response',
        'mrt_day_us_oxf_containment_health',
        'mrt_day_us_oxf_economic_support',

        'mrt_day_us_unemployment_rate',
    ];

    // END Survloop auto-generated portion of Model

}
