@extends('layouts._base')

@section('content')
    <div class="container py-5 bg-white" style="height: 100vh">
        <section class="text-center">
            <h1>ブログ詳細でーーす</h1>
        </section>

        <section class="mt-5">
            <div>
                <label>
                    タイトル
                </label>
                <p>{{ $post->title }}</p>
            </div>
            <div class="mt-5">
                <label>
                    本文
                </label>
                <p>{{ $post->content }}</p>
            </div>
        </section>
    </div>
@endsection
