<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function Subcategories(){
        return $this->hasMany("App\Models\Subcategory");
    }
    public function posts(){
        return $this->hasManyThrough("App\Models\Post","App\Models\Subcategory");
    }
    public function images()
    {
        return $this->morphMany("App\Models\Image", "imageable");
    }
}
