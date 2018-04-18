@extends('layouts.app')

@section('content')

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
        <p><a class="btn btn-primary btn-lg" href="{{route('categories.create')}}" role="button">Create category</a>
        <a class="btn btn-primary btn-lg" href="{{route('article.create')}}" role="button">Create article</a>
        </div>
        <br/>
        <div class="row">
            @forelse($categories as $category)
                <div class="col-md-4">
                    <h2>{{$category->name}}</h2>
                    <p>{{ !empty($category->description) ? $category->description  : null }}</p>
                    <p><a class="btn btn-secondary" href="{{route('categories.show', $category->id)}}" role="button">View
                            details &raquo;</a></p>
                    <p><a class="btn btn-secondary" href="{{route('categories.edit', $category->id)}}" role="button">Edit category &raquo;</a></p>
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