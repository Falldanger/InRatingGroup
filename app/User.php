<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
use App\Comment;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class User
 * @package App
 */
class User extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'name', 'email', 'password', 'active'
    ];


    /**
     * @return HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'commentator_id', 'id');
    }
}
