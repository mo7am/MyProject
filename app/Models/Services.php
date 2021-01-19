<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    protected $table = "services";

    protected $fillable = [
        'name',
    ];



    ////////////////////////////Begin Relations///////////////////////////////

    public function staff()
    {
        return $this -> hasMany('App\Models\staff' , 'specialist_Id','Id');
    }

    ////////////////////////////End Relations//////////////////////////////////

}
