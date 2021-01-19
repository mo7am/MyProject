<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class roomTypeTranslation extends Model
{


    protected $fillable = ['type'];

    public $table = "roomtype_translations";
}
