<?php
namespace App\Models;
// generated from /resources/views/vendor/survloop/admin/db/export-laravel-model-gen.blade.php

use Illuminate\Database\Eloquent\Model;

class BSPopulationUs extends Model
{
    protected $table      = 'bs_population_us';
    protected $primaryKey = 'us_pop_id';
    public $timestamps    = true;
    protected $fillable   =
    [
		'us_pop_state',
		'us_pop_year',

		'us_pop_population',
		'us_pop_25_years',
		'us_pop_25_44_years',
		'us_pop_45_64_years',
		'us_pop_65_74_years',
		'us_pop_75_84_years',
		'us_pop_85_years',
		'us_pop_age_unknown',

		'us_pop_mortality',
		'us_pop_mort_25_years',
		'us_pop_mort_25_44_years',
		'us_pop_mort_45_64_years',
		'us_pop_mort_65_74_years',
		'us_pop_mort_75_84_years',
		'us_pop_mort_85_years',
		'us_pop_mort_age_unknown',

		'us_pop_mort_perc',
		'us_pop_mort_perc_25_years',
		'us_pop_mort_perc_25_44_years',
		'us_pop_mort_perc_45_64_years',
		'us_pop_mort_perc_65_74_years',
		'us_pop_mort_perc_75_84_years',
		'us_pop_mort_perc_85_years',
		'us_pop_mort_perc_age_unknown',
		'us_pop_mort_perc_avg_inc',

		'us_pop_mort_std_dist_us',
		'us_pop_mort_std_dist_state',
		'us_pop_mort_std_dist_us_avg_inc',

        'us_pop_life_expect_at_birth',
        'us_pop_life_expect_at_65',
        'us_pop_life_expect_at_75',
        'us_pop_life_expect_at_birth_avg_inc',
        'us_pop_life_expect_at_65_avg_inc',
        'us_pop_life_expect_at_75_avg_inc',

        'us_pop_oxf_stringency_avg',
        'us_pop_oxf_stringency_max',
        'us_pop_oxf_govt_response_avg',
        'us_pop_oxf_govt_response_max',
        'us_pop_oxf_containment_health_avg',
        'us_pop_oxf_containment_health_max',
        'us_pop_oxf_economic_support_avg',
        'us_pop_oxf_economic_support_max',

        'us_pop_debt_outstanding_amount',
        'us_pop_debt_outstanding_per_capita',
        'us_pop_debt_outstanding_per_capita_avg_inc',

        'us_pop_unemployment_rate',
    ];

    // END Survloop auto-generated portion of Model

}
