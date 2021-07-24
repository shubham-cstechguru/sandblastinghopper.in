<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class ProdImage extends Model
{
    protected $guarded = [];

    protected $table         = "prod_images";

    public $timestamps = false;
}