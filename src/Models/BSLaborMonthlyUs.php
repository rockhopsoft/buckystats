<?php
namespace App\Models;
// generated from /resources/views/vendor/survloop/admin/db/export-laravel-model-gen.blade.php

use Illuminate\Database\Eloquent\Model;

class BSLaborMonthlyUs extends Model
{
    protected $table      = 'bs_labor_monthly_us';
    protected $primaryKey = 'lab_mon_us_id';
    public $timestamps    = true;
    protected $fillable   =
    [
        'lab_mon_us_year_month',
        'lab_mon_us_unemployment_rate',
    ];

    // END Survloop auto-generated portion of Model

}
