<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posttranslation extends Model
{
    use HasFactory;
    public function posts(){
        return $this->belongsTo("App\Models\post","post_id");
    }
}
