<?php
namespace App\Models;
// generated from /resources/views/vendor/survloop/admin/db/export-laravel-model-gen.blade.php

use Illuminate\Database\Eloquent\Model;

class BSCdcMortByAge19681978 extends Model
{
    protected $table      = 'bs_cdc_mort_by_age_group_1968_1978';
    protected $primaryKey = 'cdc_mort_age_68_78_id';
    public $timestamps    = true;
    protected $fillable   =
    [
		'cdc_mort_age_68_78_state',
		'cdc_mort_age_68_78_state_code',
		'cdc_mort_age_68_78_age_group',
		'cdc_mort_age_68_78_age_group_code',
		'cdc_mort_age_68_78_year',
		'cdc_mort_age_68_78_year_code',
		'cdc_mort_age_68_78_deaths',
		'cdc_mort_age_68_78_population',
		'cdc_mort_age_68_78_crude_rate'
    ];

    // END Survloop auto-generated portion of Model

}
