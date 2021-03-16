<?php
namespace App\Models;
// generated from /resources/views/vendor/survloop/admin/db/export-laravel-model-gen.blade.php

use Illuminate\Database\Eloquent\Model;

class BSCdcMortByAge19791998 extends Model
{
    protected $table      = 'bs_cdc_mort_by_age_group_1979_1998';
    protected $primaryKey = 'cdc_mort_age_79_98_id';
    public $timestamps    = true;
    protected $fillable   =
    [
		'cdc_mort_age_79_98_state',
		'cdc_mort_age_79_98_state_code',
		'cdc_mort_age_79_98_age_group',
		'cdc_mort_age_79_98_age_group_code',
		'cdc_mort_age_79_98_year',
		'cdc_mort_age_79_98_year_code',
		'cdc_mort_age_79_98_deaths',
		'cdc_mort_age_79_98_population',
		'cdc_mort_age_79_98_crude_rate'
    ];

    // END Survloop auto-generated portion of Model

}
