@extends('layouts._base')

@section('content')
    <div class="container py-5 bg-white" style="height: 100vh">
        <section class="text-center">
            <h1>ブログ編集でーーす</h1>
        </section>

        <section class="mt-5">
            <form action="{{ route('posts.update', $post) }}" method="POST">
                @csrf
                @method('PUT')
                <div>
                    <label for="title">
                        タイトル&nbsp;@include('component.error', ['errors' => $errors->get('title')])
                    </label>
                    <input id="title" class="form-control" type="text" name="title" value="{{ old('title', $post->title) }}">
                </div>
                <div class="mt-5">
                    <label for="content">
                        本文&nbsp;@include('component.error', ['errors' => $errors->get('content')])
                    </label>
                    <textarea id="content" class="form-control" type="text" name="content" rows="6">{{ old('content', $post->content) }}</textarea>
                </div>
                <div class="mt-5">
                    <input class="btn btn-outline-primary d-block w-25 mx-auto" type="submit" value="更新">
                </div>
            </form>
        </section>
    </div>
@endsection
