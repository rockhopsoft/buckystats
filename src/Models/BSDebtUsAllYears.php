<?php
namespace App\Models;
// generated from /resources/views/vendor/survloop/admin/db/export-laravel-model-gen.blade.php

use Illuminate\Database\Eloquent\Model;

class BSDebtUsAllYears extends Model
{
    protected $table      = 'bs_debt_us_all_years';
    protected $primaryKey = 'debt_id';
    public $timestamps    = false;
    protected $fillable   =
    [
        'debt_record_date',
        'debt_outstanding_amount',
        'debt_source_line_number',
        'debt_fiscal_year',
        'debt_fiscal_quarter_number',
        'debt_calendar_year',
        'debt_calendar_quarter_number',
        'debt_calendar_month_number',
        'debt_calendar_day_number',
    ];

    // END Survloop auto-generated portion of Model

}
