<?php namespace App\Models;
// generated from /resources/views/vendor/survloop/admin/db/export-laravel-model-gen.blade.php

use Illuminate\Database\Eloquent\Model;

class BSDatasetTags extends Model
{
    protected $table      = 'bs_dataset_tags';
    protected $primaryKey = 'tag_id';
    public $timestamps    = true;
    protected $fillable   =
    [
		'tag_name',
		'tag_slug',
		'tag_desc',
		'tag_total_recs',
    ];

    // END Survloop auto-generated portion of Model

}
