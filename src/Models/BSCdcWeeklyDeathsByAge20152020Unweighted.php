<?php
namespace App\Models;
// generated from /resources/views/vendor/survloop/admin/db/export-laravel-model-gen.blade.php

use Illuminate\Database\Eloquent\Model;

class BSCdcWeeklyDeathsByAge20152020Unweighted extends Model
{
    protected $table      = 'bs_cdc_weekly_deaths_by_age_2015_2020_unweighted';
    protected $primaryKey = 'cdc_mort_age_15_20_id';
    public $timestamps    = true;
    protected $fillable   =
    [
		'cdc_mort_age_15_20_week_ending_date',
		'cdc_mort_age_15_20_state_abbreviation',
		'cdc_mort_age_15_20_year',
		'cdc_mort_age_15_20_week',
		'cdc_mort_age_15_20_age_group',
		'cdc_mort_age_15_20_number_of_deaths',
    ];

    // END Survloop auto-generated portion of Model

}
