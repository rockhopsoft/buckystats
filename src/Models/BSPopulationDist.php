<?php
namespace App\Models;
// generated from /resources/views/vendor/survloop/admin/db/export-laravel-model-gen.blade.php

use Illuminate\Database\Eloquent\Model;

class BSPopulationDist extends Model
{
    protected $table      = 'bs_population_dist';
    protected $primaryKey = 'pop_dist_id';
    public $timestamps    = true;
    protected $fillable   =
    [
		'pop_dist_geo_area_id',
        'pop_dist_name',
        'pop_dist_year',
        'pop_dist_source_url',
        'pop_dist_source_url2',
        'pop_dist_total',
        'pop_dist_gender_female',
        'pop_dist_gender_male',
        'pop_dist_age04',
        'pop_dist_age59',
        'pop_dist_age1014',
        'pop_dist_age1519',
        'pop_dist_age2024',
        'pop_dist_age2534',
        'pop_dist_age3544',
        'pop_dist_age4554',
        'pop_dist_age5559',
        'pop_dist_age6064',
        'pop_dist_age6574',
        'pop_dist_age7584',
        'pop_dist_age85',
        'pop_dist_perc_gender_female',
        'pop_dist_perc_gender_male',
        'pop_dist_perc_age04',
        'pop_dist_perc_age59',
        'pop_dist_perc_age1014',
        'pop_dist_perc_age1519',
        'pop_dist_perc_age2024',
        'pop_dist_perc_age2534',
        'pop_dist_perc_age3544',
        'pop_dist_perc_age4554',
        'pop_dist_perc_age5559',
        'pop_dist_perc_age6064',
        'pop_dist_perc_age6574',
        'pop_dist_perc_age7584',
        'pop_dist_perc_age85',
    ];

    // END Survloop auto-generated portion of Model

}
