@extends('layouts.menu')

@section('content')
    <div class="container">
        <h3>Каталог товаров</h3>
        @if (Route::has('login'))
            @if (Auth::check() && Auth::user()->admin == true)
                <a class="waves-effect waves-light btn orange" href="{{ route('product.create') }}"><i
                        class="material-icons left">add_circle</i>Создать</a>
            @endif
        @endif
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
                <th></th>
            </tr>
            </thead>
            <tbody>

            @foreach($products as $product)
                <tr>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->category_name}}</td>
{{--                    @foreach($categories as $category)--}}
{{--                        @if($product->category_id == $category->id)--}}
{{--                            <td>{{$category->name}}</td>--}}
{{--                        @endif--}}
{{--                    @endforeach--}}
                    @if (Route::has('login'))
                        @if (Auth::check() && Auth::user()->admin == true)
                            <td class="center">
                                <form method="POST" action="{{ route('product.destroy', $product->id) }}">
                                    <a href="{{ route('product.edit', $product->id) }}" class="btn green">Редактировать</a>
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn red ajax" type="submit" name="action">Удалить</button>
                                </form>
                            </td>
                        @endif
                    @endif
                </tr>
            @endforeach
        </table>
    </div>
@endsection
