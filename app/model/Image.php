<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded = [];

    protected $table         = "images";

    public $timestamps = false;
}
