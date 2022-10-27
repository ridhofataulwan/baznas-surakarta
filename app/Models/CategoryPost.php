<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    use HasFactory;
    protected $table = 'category_post';
    protected $guarded = ['id'];

    public function category_post()
    {
        return $this->belongsTo(Post::class);
    }
}