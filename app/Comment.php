<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use App\Post;

/**
 * Class Comment
 * @package App
 */
class Comment extends Model
{
    use SoftDeletes;

    /**
     * @var string[]
     */
    protected $fillable = ['content'];

    /**
     * @return HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'commentator_id');
    }

    /**
     * @return HasOne
     */
    public function post()
    {
        return $this->hasOne(Post::class, 'id', 'post_id');
    }
}
