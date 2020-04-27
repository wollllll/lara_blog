<?php

namespace App\Services;

use App\Post;
use App\Repository\Post\PostRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostService
{
    /**
     * @var PostRepository
     */
    private $repository;

    /**
     * PostService constructor.
     * @param PostRepository $repository
     */
    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * post保存処理
     *
     * @param array $request
     */
    public function store(array $request)
    {
        try {
            DB::beginTransaction();

            $this->repository->create(array_merge($request, ['user_id' => Auth::id()]));

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            abort(500, $e->getMessage());
        }
    }

    /**
     * post更新処理
     *
     * @param Post $post
     * @param array $request
     */
    public function update(Post $post, array $request)
    {
        try {
            DB::beginTransaction();

            $post->update($request);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            abort(500, $e->getMessage());
        }
    }

    /**
     * post削除処理
     *
     * @param Post $post
     */
    public function destroy(Post $post)
    {
        try {
            DB::beginTransaction();

            $post->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            abort(500, $e->getMessage());
        }
    }
}
