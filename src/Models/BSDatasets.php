<?php namespace App\Models;
// generated from /resources/views/vendor/survloop/admin/db/export-laravel-model-gen.blade.php

use Illuminate\Database\Eloquent\Model;

class BSDatasets extends Model
{
    protected $table      = 'bs_datasets';
    protected $primaryKey = 'dat_id';
    public $timestamps    = true;
    protected $fillable   =
    [
		'dat_name',
		'dat_slug',
		'dat_desc',
		'dat_source_name',
		'dat_source_url',
		'dat_total_recs',
		'dat_version_ab',
		'dat_submission_progress',
		'dat_ip_addy',
		'dat_tree_version',
		'dat_unique_str',
		'dat_user_id',
		'dat_is_mobile',
    ];

    // END Survloop auto-generated portion of Model

}
