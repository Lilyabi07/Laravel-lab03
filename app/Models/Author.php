<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

      // Optional: define which fields are mass assignable (good for factories)
      protected $fillable = [
        'name',
        'email',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}

//relationship: An author can have multiple posts
