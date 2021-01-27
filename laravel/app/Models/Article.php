<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;
use App\Models\User;

class Article extends Model
{
    protected $fillable = ['city_id'];
    use HasFactory;
    public function city(){
        return $this->hasOne(City::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
   
}
