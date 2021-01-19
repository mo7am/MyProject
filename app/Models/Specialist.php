<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialist extends Model
{
    use HasFactory;

    protected $table = "specialists";

    protected $fillable = [
        'specialist',
    ];



    ////////////////////////////Begin Relations///////////////////////////////

    public function staff()
    {
        return $this -> hasMany('App\Models\staff' , 'specialist_Id','Id');
    }

    ////////////////////////////End Relations//////////////////////////////////

}
