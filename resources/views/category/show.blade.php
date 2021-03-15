@extends('layouts.menu')

@section('content')
    <div class="container">

        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('category') }}">category Alert</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('category') }}">View All categorys</a></li>
                <li><a href="{{ URL::to('category/create') }}">Create a category</a>
            </ul>
        </nav>

        <h1>Showing {{ $category->name }}</h1>

        <div class="jumbotron text-center">
            <h2>{{ $category->name }}</h2>
            <p>
                <strong>Name:</strong> {{ $category->name }}<br>
                <strong>Desc:</strong> {{ $category->description }}
            </p>
        </div>

    </div>
@endsection