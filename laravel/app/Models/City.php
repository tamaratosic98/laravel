<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class City extends Model
{
    use HasFactory;
    public $timestamps=false;
    public function article(){
        return $this->belongsTo(Article::class);
    }
}
