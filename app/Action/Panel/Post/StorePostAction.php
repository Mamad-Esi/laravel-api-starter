<?php

// namespace App\Action\Panel\Post;
// namespace App\Action\Panel\Post;

namespace app\Action\Panel\Post;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class StorePostAction
{
    public function handle(array $data)
    {
        /** @var User  */
        $user = Auth::user();

        // بررسی اینکه thumbnail فایل آپلودی است یا رشته
        if (isset($data['thumbnail']) && $data['thumbnail'] instanceof \Illuminate\Http\UploadedFile) {
            $thumbnailPath = $data['thumbnail']->store('thumbnails', 'public');
            $thumbnail = "storage/{$thumbnailPath}";
        } else {
            // اگه فقط رشته باشه مستقیم استفاده می‌کنیم
            $thumbnail = $data['thumbnail'] ?? null;
        }

        $post = $user->posts()->create([
            'title' => $data['title'],
            'content' => $data['content'],
            'status' => $data['status'] === 'active',
            'thumbnail' => $thumbnail,
        ]);

        if (isset($data['categories']) && is_array($data['categories'])) {
            $post->categories()->attach($data['categories']);
        }

        return [
            'post' => $post,
        ];
    }
}