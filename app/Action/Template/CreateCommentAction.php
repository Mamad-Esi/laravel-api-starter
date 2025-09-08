<?php

namespace App\Action\Template;

use App\Models\Comment;
use App\Models\Post;

class CreateCommentAction
{

    public function handle($comment ,Post $post )
    {
        $post->comments()->create($comment);

        return [
            'comment' => $comment,
            'message' =>  'Comment was posted and show after accept by admin.'
        ];
    }
}
