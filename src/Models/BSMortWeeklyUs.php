<?php
namespace App\Models;
// generated from /resources/views/vendor/survloop/admin/db/export-laravel-model-gen.blade.php

use Illuminate\Database\Eloquent\Model;

class BSMortWeeklyUs extends Model
{
    protected $table      = 'bs_mort_weekly_us';
    protected $primaryKey = 'mrt_week_us_id';
    public $timestamps    = true;
    protected $fillable   =
    [
        'mrt_week_us_state',
        'mrt_week_us_year',
        'mrt_week_us_week',

        'mrt_week_us_mortality',
        'mrt_week_us_mortality_diff',
        'mrt_week_us_mort_25_years',
        'mrt_week_us_mort_25_44_years',
        'mrt_week_us_mort_45_64_years',
        'mrt_week_us_mort_65_74_years',
        'mrt_week_us_mort_75_84_years',
        'mrt_week_us_mort_85_years',

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
        'mrt_week_us_mort_std_dist_us_avg_inc',

        'mrt_week_us_oxf_stringency_avg',
        'mrt_week_us_oxf_stringency_max',
        'mrt_week_us_oxf_govt_response_avg',
        'mrt_week_us_oxf_govt_response_max',
        'mrt_week_us_oxf_containment_health_avg',
        'mrt_week_us_oxf_containment_health_max',
        'mrt_week_us_oxf_economic_support_avg',
        'mrt_week_us_oxf_economic_support_max',

        'mrt_week_us_unemployment_rate',
        'mrt_week_us_cpi_u',
        'mrt_week_us_cpi_u_rs',
    ];

    // END Survloop auto-generated portion of Model

}
