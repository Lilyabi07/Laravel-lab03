<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function author()
    {
        return $this->belongsTo(Author::class); //each post belongs to one author.
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
//relationship: A Post belongs to an Author
// and has many Comments:
