<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public $timestamps = false;

    public function post()
    {
        return $this->belongsTo(Post::class, 'postID', 'id');
    }

}
