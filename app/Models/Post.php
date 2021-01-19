<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Post extends Model
{
    use HasFactory, Notifiable , HasRoles;

    protected $table = "posts";

    protected $fillable = [
        'content',
        'image',
        'owner_id',
    ];


    public function user(){
        return $this->belongsTo('App\Models\User' , 'owner_id' , 'id');
    }


    public function comments(){
        return $this->hasMany('App\Models\Comment' , 'post_id' , 'id');
    }

}
