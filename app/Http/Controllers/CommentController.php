<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use App\Http\Resources\CommentResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Validation\Factory as Validator;

/**
 * Class CommentController
 * @package App\Http\Controllers
 */
class CommentController extends Controller
{
    /**
     * @var Post
     */
    public $post;
    /**
     * @var Comment
     */
    public $comment;
    /**
     * @var Validator
     */
    public $validator;

    /**
     * CommentController constructor.
     * @param Post $post
     * @param Comment $comment
     * @param Validator $validator
     */
    public function __construct(Post $post, Comment $comment, Validator $validator)
    {
        $this->post = $post;
        $this->comment = $comment;
        $this->validator = $validator;
    }

    /**
     * @param $id
     * @return Application|ResponseFactory|JsonResponse|Response
     */
    public function index($id)
    {

        $validator = $this->validator->make(['user_id' => $id], [
            'user_id' => [
                'exists:users,id',
            ],
        ]);

        if ($validator->fails()) {
            return response($validator->messages()->toArray());
        }

        $comments = $this->comment
            ->withTrashed()
            ->select('comments.*')
            ->whereNotNull('posts.image_id')
            ->join('posts', 'comments.post_id', 'posts.id')
            ->where('comments.commentator_id', $id)
            ->orderByDesc('comments.created_at');

        return CommentResource::collection($comments->paginate(5))->response();
    }
}
