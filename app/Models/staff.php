<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class staff extends Model
{
    use HasFactory;


    protected $fillable = [

        'birthdate',
        'workhours',
        'salary',
        'age',
        'phone',
        'Address',
        'user_id',
        'specialist_Id',


    ];


    ////////////////////////////Begin Relations///////////////////////////////

    public function mobile()
    {
        return $this->hasOne('App\Models\Mobile', 'IdStaff', 'StaffId');
    }

/////////////////////////////One To Manny/////////////////////////

    public function specialist()
    {
        return $this->belongsTo('App\Models\Specialist', 'specialist_Id', 'Id');
    }

    /////////////////////Many To Many//////////////////////////

    public function service()
    {
        return $this->belongsToMany('App\Models\Services' , 'staff_services' , 'staff_Id' , 'service_Id');
    }

    ////////////////////////////End Relations//////////////////////////////////




    public function user()
    {
        return $this->belongsTo('App\Models\User' , 'user_id' , 'id');
    }

    public function scopeSelection($query){
        return $query->select('birthdate', 'workhours', 'salary', 'age', 'phone', 'Address', 'user_id', 'specialist_Id');
    }

}
