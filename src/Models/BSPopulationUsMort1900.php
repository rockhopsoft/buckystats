<?php namespace App\Models;
// generated from /resources/views/vendor/survloop/admin/db/export-laravel-model-gen.blade.php

use Illuminate\Database\Eloquent\Model;

class BSPopulationUsMort1900 extends Model
{
    protected $table      = 'bs_population_us_mort_1900';
    protected $primaryKey = 'us_mort_1900_id';
    public $timestamps    = true;
    protected $fillable   =
    [
		'us_mort_1900_year',
		'us_mort_1900_deaths_estimate',
		'us_mort_1900_death_rates_per_1000',
    ];

    // END Survloop auto-generated portion of Model

}
