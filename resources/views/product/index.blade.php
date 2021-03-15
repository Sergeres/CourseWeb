@extends('layouts.menu')

@section('content')
<div class="container" style="margin-top: 10px">

    <div class="row">

        <select name="category_id" style="display: block">
            @foreach($category as $categories)
                <option value="{{ $categories->id }}"> {{ $categories->name }} </option>
            @endforeach
        </select>

    </div>


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
