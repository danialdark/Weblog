<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    public function images()
    {
        return $this->morphMany("App\Models\Image", "imageable");
    }
    public function user(){
        return $this->belongsTo("App\Models\User");
    }
    public function comments(){
        return $this->hasMany("App\Models\Comment");
    }
    public function subcategory(){
        return $this->belongsTo("App\Models\Subcategory");
    }
    public function translations(){
        return $this->hasMany("App\Models\Posttranslation");
    }
    protected $table="posts";
}
