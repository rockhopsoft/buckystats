<?php
namespace App\Models;
// generated from /resources/views/vendor/survloop/admin/db/export-laravel-model-gen.blade.php

use Illuminate\Database\Eloquent\Model;

class BSGeographicAreas extends Model
{
    protected $table      = 'bs_geographic_areas';
    protected $primaryKey = 'geo_area_id';
    public $timestamps    = true;
    protected $fillable   =
    [
		'geo_area_country',
		'geo_area_state',
		'geo_area_county',
		'geo_area_city',
    ];

    // END Survloop auto-generated portion of Model

}
