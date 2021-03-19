@extends('layouts.menu')

@section('content')
    <div class="container">
        <form action="{{ route('product.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Название</label>
                <input class="form-control" type="text" id="name" name="name">
            </div>

            <div class="form-group">
                <label for="name">Цена</label>
                <input class="form-control" type="text" id="price" name="price">
            </div>

            <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control" id="description" rows="3" name="description"></textarea>
            </div>

            <div class="form-group">
                <label for="picture">Изображение</label>
                <textarea class="form-control" id="picture" rows="3" name="picture"></textarea>
            </div>

            <select id="category_id" name="category_id" style="display: block">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"> {{ $category->name }} </option>
                @endforeach
            </select>

            <input type="submit" class="btn btn-primary">
        </form>
    </div>>
@endsection

