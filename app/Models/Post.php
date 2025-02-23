<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->hasMany(Tags::class,'postID','id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
