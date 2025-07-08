<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'post_id',
        'parent_comment_id',
        'depth',
    ];

  
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($comment) {
            if ($comment->parent_comment_id) {
                $parent = Comment::find($comment->parent_comment_id);

               
                if (!$parent) {
                    throw new \Exception('Parent comment not found.');
                }

            
                $comment->depth = $parent->depth + 1;

             
                if ($comment->depth > 3) {
                    throw new \Exception('Maximum reply depth reached.');
                }
            } else {
                $comment->depth = 1;
            }
        });
    }


    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_comment_id');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_comment_id');
    }
}
