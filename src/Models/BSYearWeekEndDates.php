<?php
namespace App\Models;
// generated from /resources/views/vendor/survloop/admin/db/export-laravel-model-gen.blade.php

use Illuminate\Database\Eloquent\Model;

class BSYearWeekEndDates extends Model
{
    protected $table      = 'bs_year_week_end_dates';
    protected $primaryKey = 'yr_wk_date_id';
    public $timestamps    = false;
    protected $fillable   =
    [
        'yr_wk_date_week',
        'yr_wk_date_year',
        'yr_wk_date_end_date',
    ];

    // END Survloop auto-generated portion of Model

}
