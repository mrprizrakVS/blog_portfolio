@extends('layouts.app')

@section('content')

    <div class="container">
        @include('article.form', ['article' => isset($article) ? $article : null, 'categories' => $categories])

    </div> <!-- /container -->


@endsection