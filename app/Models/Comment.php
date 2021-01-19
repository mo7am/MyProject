<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Comment extends Model
{
    use HasFactory, Notifiable , HasRoles;

    protected $table = "comments";

    protected $fillable = [
        'content',
        'owner_id',
        'post_id',
    ];


    public function post(){
        return $this->belongsTo('App\Models\Post' , 'post_id' , 'id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User' , 'owner_id' , 'id');
    }
}
