<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SessionLanguage extends Model
{
    use HasFactory;

    protected $fillable = [
        'lang',
        'user_id',
    ];


    public function user()
    {
        return $this->belongsTo('App\Models\User' , 'user_id' , 'id');
    }

}
