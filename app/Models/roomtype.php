<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class roomtype extends Model
{
    use HasFactory , Translatable;


    protected $with = ['translations'];


    public $table = "roomtypes";


    protected $fillable = ['is_active'];


    protected $casts = [
        'is_active' =>'boolean',
    ];


    public $translatedAttributes = ['type'];



}
