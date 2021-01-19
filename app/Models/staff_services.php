<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class staff_services extends Model
{
    use HasFactory;

    protected $table = "staff_services";

    protected $fillable = [
        'staff_Id',
        'service_Id',
    ];



    ////////////////////////////Begin Relations///////////////////////////////

    public function staff()
    {
        return $this -> hasMany('App\Models\staff' , 'specialist_Id','Id');
    }

    ////////////////////////////End Relations//////////////////////////////////

}
