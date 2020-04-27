@extends('layouts._base')

@section('content')
    <div class="container py-5 bg-white" style="height: 100vh">
        <section class="text-center">
            <h1>ブログ一覧でーーす</h1>
        </section>

        <section class="mt-5">
            <span>@include('component.error', ['errors' => $errors->get('search_word')])</span>
            <form action="{{ route('posts.search') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-9">
                        <input type="text" class="form-control" name="search_word" placeholder="タイトル名で検索してください">
                    </div>
                    <div class="col-1">
                        <input type="submit" class="btn btn-outline-info w-100" value="検索">
                    </div>
                    <div class="col-2">
                        <a href="{{ route('posts.create') }}" class="btn btn-outline-primary d-block">
                            新規作成
                        </a>
                    </div>
                </div>
            </form>
            <ul class="p-0 mt-5">
                @foreach($posts as $post)
                    <li class="row mb-4">
                        <div class="col-9">
                            <span class="my-auto" style="font-size: 20px">
                                <a href="{{ route('posts.show', $post) }}">
                                    {{ $post->title }}
                                </a> :
                                {{ $post->created_at }}
                            </span>
                        </div>
                        <div class="col-2">
                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-outline-success d-block">編集</a>
                        </div>
                        <div class="col-1">
                            <button type="button" class="delete-btn btn btn-outline-danger w-100"
                                    data-toggle="modal" data-target="#delete_modal"
                                    data-post-title="{{ $post->title }}"
                                    data-post-route="{{ route('posts.destroy', $post) }}">
                                削除
                            </button>
                        </div>
                    </li>
                @endforeach
            </ul>
        </section>
    </div>

    @include('component.modal.posts.index')
@endsection

@section('js')
    <script src="{{ asset('js/main.js') }}"></script>
@endsection
