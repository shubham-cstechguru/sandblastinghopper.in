<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model {
    protected $table 		= "settings";
    const CREATED_AT        = 'created_at';
    const UPDATED_AT        = 'updated_at';
}
