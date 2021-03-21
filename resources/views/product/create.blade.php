@extends('layouts.menu')

@section('content')
    <div class="container">
        <h4>Создание товара</h4>
        <form method="POST" @if (isset($product)) action="{{ route('product.update', $product) }}"
              @else
              action="{{ route('product.store') }}" @endif>
            {{ isset($product) ? method_field('PUT') : method_field('POST') }}
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Название</label>
                <input class="form-control" type="text" id="name" name="name" value="{{ old('name', isset($product) ? $product->name : null) }}">
            </div>

            <div class="form-group">
                <label for="price">Цена</label>
                <input class="form-control" type="text" id="price" name="price" value="{{ old('price', isset($product) ? $product->price : null) }}">
            </div>

            <div class="form-group">
                <div class="input-field">
                    <label for="description">Описание</label>
                    <textarea id="description" class="materialize-textarea form-control" data-length="120">{{ old('description', isset($product) ? $product->description : null) }}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="picture">Изображение</label>
                <input class="form-control" id="picture" rows="3" name="picture" value="{{ old('picture', isset($product) ? $product->picture : null) }}">
            </div>

            <label for="category_id">Категория товара</label>
            <select id="category_id" name="category_id" style="display: block; margin-bottom: 10px">

                @foreach($categories as $category)
                    @if(isset($product) && $category->id == $product->category_id)
                        <option selected value="{{ old('category_id', isset($product) ? $product->category_id : null) }}">{{isset($product) ? $category->name : null}}</option>
                    @else
                    <option value="{{ $category->id }}"> {{ $category->name }} </option>
                    @endif

                @endforeach
            </select>

            <div class="row">
                <button class="btn waves-effect waves-light green" type="submit"
                        name="action">{{ isset($product) ? 'Обновить' : 'Добавить' }}</button>
            </div>
        </form>
    </div>
@endsection

