@extends('layouts._base')

@section('content')
    @include('posts.index')

    @include('component.modal.posts.index')
@endsection

@section('js')
    <script src="{{ asset('js/main.js') }}"></script>
@endsection
