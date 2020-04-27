<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\PostRequest;
use App\Http\Requests\Post\SearchRequest;
use App\Post;
use App\Repository\Post\PostRepository;
use App\Services\PostService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Arr;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * @var PostRepository
     */
    private $repository;

    /**
     * @var PostService
     */
    private $service;

    /**
     * PostController constructor.
     * @param PostRepository $repository
     * @param PostService $service
     */
    public function __construct(PostRepository $repository, PostService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * post一覧画面
     *
     * @return Factory|View
     */
    public function index()
    {
        $posts = $this->repository->getAuthUserPosts();

        return view('posts.index', compact('posts'));
    }

    /**
     * post作成画面
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * post保存処理
     *
     * @param PostRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(PostRequest $request)
    {
        $this->service->store($request->validated());

        return redirect(route('posts.index'));
    }

    /**
     * post詳細画面
     *
     * @param Post $post
     * @return Factory|View
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * post編集画面
     *
     * @param Post $post
     * @return Factory|View
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * post編集処理
     *
     * @param Post $post
     * @param PostRequest $request
     * @return RedirectResponse|Redirector
     */
    public function update(Post $post, PostRequest $request)
    {
        $this->service->update($post, $request->validated());

        return redirect(route('posts.index'));
    }

    /**
     * post削除処理
     *
     * @param Post $post
     * @return RedirectResponse|Redirector
     */
    public function destroy(Post $post)
    {
        $this->service->destroy($post);

        return redirect(route('posts.index'));
    }

    /**
     * post検索
     *
     * @param SearchRequest $searchWord
     * @return Factory|View
     */
    public function search(SearchRequest $searchWord)
    {
        $posts = $this->repository->getAuthUserSearchPosts(Arr::get($searchWord->validated(), 'search_word'));

        return view('posts.search', compact('posts'));
    }
}
