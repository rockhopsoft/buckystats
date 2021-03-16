<?php
namespace App\Models;
// generated from /resources/views/vendor/survloop/admin/db/export-laravel-model-gen.blade.php

use Illuminate\Database\Eloquent\Model;

class BSLifeExpectancy extends Model
{
    protected $table      = 'bs_life_expectancy';
    protected $primaryKey = 'life_exp_id';
    public $timestamps    = false;
    protected $fillable   =
    [
        'life_exp_year',
        'life_exp_at_birth',
        'life_exp_at_65',
        'life_exp_at_75',
    ];

    // END Survloop auto-generated portion of Model

}
