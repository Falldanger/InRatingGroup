<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Image
 * @package App
 */
class Image extends Model
{
    /**
     * @var string
     */
    protected $table = 'images';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string[]
     */
    protected $fillable = ['url'];

    /**
     * @return BelongsTo
     */
    public function post()
    {
        return $this->belongsTo(Post::class, 'id', 'image_id');
    }
}
