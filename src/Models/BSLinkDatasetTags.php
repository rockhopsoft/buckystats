<?php namespace App\Models;
// generated from /resources/views/vendor/survloop/admin/db/export-laravel-model-gen.blade.php

use Illuminate\Database\Eloquent\Model;

class BSLinkDatasetTags extends Model
{
    protected $table      = 'bs_link_dataset_tags';
    protected $primaryKey = 'dat_tag_lnk_id';
    public $timestamps    = true;
    protected $fillable   =
    [
		'dat_tag_lnk_dataset_id',
		'dat_tag_lnk_tag_id',
    ];

    // END Survloop auto-generated portion of Model

}
