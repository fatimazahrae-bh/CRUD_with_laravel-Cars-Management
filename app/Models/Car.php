<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    public function User(){
        return $this->belongsTo('App\user');
    }

    protected $fillable = ['brand','model','release_date','user_id'];

    public function image(){
        return $this->hasOne(Image::class);
    }

}

