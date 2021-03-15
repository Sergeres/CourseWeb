@extends('layouts.menu')

@section('content')
    <div class="container">
        <form action="{{ route('product.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Title</label>
                <input class="form-control" type="text" id="name" name="name">
            </div>

            <div class="form-group">
                <label for="description">Body</label>
                <textarea class="form-control" id="description" rows="3" name="description"></textarea>
            </div>
            <input type="submit" class="btn btn-primary">
        </form>
    </div>>
@endsection

