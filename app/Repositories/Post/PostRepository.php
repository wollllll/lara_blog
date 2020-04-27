<?php

namespace App\Repository\Post;

use App\Post;
use Illuminate\Support\Facades\Auth;

class PostRepository implements PostRepositoryInterface
{
    /**
     * ログインユーザーの全postを取得
     *
     * @return mixed
     */
    public function getAuthUserPosts()
    {
        return Post::where('user_id', Auth::id())->latest()->get();
    }

    /**
     * postの作成
     *
     * @param array $request
     * @return mixed
     */
    public function create(array $request)
    {
        return Post::create($request);
    }

    /**
     * 検索ワードに該当するpostを取得
     *
     * @param string $searchWord
     * @return mixed
     */
    public function getAuthUserSearchPosts(string $searchWord)
    {
        return Post::where('title', 'LIKE', "%{$searchWord}%")->latest()->get();
    }
}
