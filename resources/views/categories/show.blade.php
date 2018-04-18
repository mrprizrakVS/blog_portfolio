@extends('layouts.app')

@section('content')

    <div class="container">
        <br/>
        <div class="row">
                <div class="col-md-4">
                    <h2>{{$category->name}}</h2>
                    <h6>{{$category->created_at->format('d-m-Y')}}</h6>
                    <p>{{ !empty($category->description) ? $category->description  : null }}</p>

                </div>

            <hr>
        </div>

        <h1>Articles</h1> <br />
        <div class="row">
        @forelse($articles->articles as $article)
                <div class="col-md-4">
                    <a href="{{route('article.show', $article->id)}}"><h2>{{$article->name}}</h2></a>
                    <h6>{{$article->created_at->format('d-m-Y')}}</h6>
                    <p>{{  $article->content }}</p>

                </div>

                <hr>
            @empty
                <h2>Empty</h2>
            @endforelse

        </div>


    </div> <!-- /container -->


@endsection