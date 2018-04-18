@extends('layouts.app')

@section('content')

    <div class="container">

        @include('categories.form', ['categorie' => isset($categorie) ? $categorie : null])

        <hr>

    </div>


@endsection