@extends('layouts.app')

@section('content')

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
        <a class="btn btn-primary btn-lg" href="{{route('categories.create')}}" role="button">Create category</a>
        <a class="btn btn-primary btn-lg" href="{{route('article.create')}}" role="button">Create article</a>
        </div>
        <br/>
        <div class="row">
            @forelse($articles as $article)
                <div class="col-md-4">
                    <h2>{{$article->name}}</h2>
                    <p>{{ !empty($article->content) ? $article->content  : null }}</p>
                    <p><a class="btn btn-secondary" href="{{route('article.show', $article->id)}}" role="button">View
                            details &raquo;</a></p>
                    <p><a class="btn btn-secondary" href="{{route('article.edit', $article->id)}}" role="button">Edit article &raquo;</a></p>
                </div>
            @empty
                <div class="col-md-4">
                    <h2>Empty</h2>

                </div>
            @endforelse

        </div>

        <hr>

    </div> <!-- /container -->


@endsection