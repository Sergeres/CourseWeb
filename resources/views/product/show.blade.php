@extends('layouts.menu')

@section('content')
    <div class="container">

        <h3>Просмотр товара: {{ $product->name }}</h3>

        <div class="col s12 m7">
{{--            <h2 class="header">Horizontal Card</h2>--}}
            <div class="card horizontal">
                <div class="card-image">
                    <img src="{{ $product->picture }}">
                </div>
                <div class="card-stacked">
                    <div class="card-content">
                        <p><strong>Наименование товара:</strong> {{ $product->name }}</p>
                        <p><strong>Описание:</strong> {{ $product->description }}</p>
                        <p><strong>Цена:</strong> {{ $product->price }}</p>
                    </div>
                    <div class="card-action">
                        <a href="{{route('add.item', $product->id)}}" class="btn orange">В корзину</a>
                        @if (Auth::check() && Auth::user()->admin == true)
                            <a href="{{ route('product.edit', $product) }}" class="btn green">Редактировать</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
