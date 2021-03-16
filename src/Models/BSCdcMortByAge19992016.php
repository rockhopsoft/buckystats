<?php
namespace App\Models;
// generated from /resources/views/vendor/survloop/admin/db/export-laravel-model-gen.blade.php

use Illuminate\Database\Eloquent\Model;

class BSCdcMortByAge19992016 extends Model
{
    protected $table      = 'bs_cdc_mort_by_age_group_1999_2016';
    protected $primaryKey = 'cdc_mort_age_99_16_id';
    public $timestamps    = true;
    protected $fillable   =
    [
		'cdc_mort_age_99_16_state',
		'cdc_mort_age_99_16_state_code',
		'cdc_mort_age_99_16_age_group',
		'cdc_mort_age_99_16_age_group_code',
		'cdc_mort_age_99_16_year',
		'cdc_mort_age_99_16_year_code',
		'cdc_mort_age_99_16_deaths',
		'cdc_mort_age_99_16_population',
		'cdc_mort_age_99_16_crude_rate'
    ];

    // END Survloop auto-generated portion of Model

}
