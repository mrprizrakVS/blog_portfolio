@extends('layouts.app')

@section('content')

    <div class="container">
        @include('categories.form', ['article' => isset($categorie) ? $categorie : null])

    </div> <!-- /container -->


@endsection