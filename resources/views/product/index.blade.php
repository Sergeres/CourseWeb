@extends('layouts.menu')

@section('content')
<div class="container">

    <div class="row">
        <label for="category_id">Категория товара</label>
        <select id="category_id" name="category_id" style="display: block">
            @foreach($categories as $category)
                <option value="{{ $category->id }}"> {{ $category->name }} </option>
            @endforeach
        </select>

    </div>

{{--    {{$selectOption = $_POST['category_id']}}--}}
        <a href="{{route('filterProducts', 2)}}" class="btn red ajax">Отфильтровать</a>


    <table>
        <thead>
        <tr>
            <th>Название</th>
            <th>Цена</th>
            <th>Описание</th>
            <th>Категория</th>
        </tr>
        </thead>
        <tbody>

        @foreach($products as $product)
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->category_name}}</td>
            </tr>
        @endforeach
    </table>
</div>
@endsection
