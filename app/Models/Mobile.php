<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobile extends Model
{
    use HasFactory;

    protected $table = "mobiles";

    protected $fillable = [
        'code',
        'mobile',
        'IdStaff',

    ];

    protected  $hidden = [
        'IdStaff',
    ];



    ////////////////////////////Begin Relations///////////////////////////////

    public function staff()
    {
        return $this -> belongsTo('App\Models\staff' , 'IdStaff','StaffId');
    }

    ////////////////////////////End Relations//////////////////////////////////


}


