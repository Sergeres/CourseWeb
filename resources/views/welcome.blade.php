@extends('layouts.menu')

@section('content')

    {{--        <p>Добро пожаловать в наш интернет магазин !</p>--}}
    <div class="container valign-wrapper" style="height: 100vh">
        <div class="row">
            <div class="col s12 center"><h4 class="center-align">Добро пожаловать в магазин расходных материалов для парикмахерских!</h4></div>
            <div class="col s12 center"><img src="https://sun9-13.userapi.com/impg/0GBBAN8ifDeWVJYZtPBVt1Uz8mh_CV8oNkHM1Q/zI2I16WgKvw.jpg?size=700x200&quality=96&sign=c74d07648571d6d7b051632b6aa87e31&type=album"></div>
            <div class="col s12 center"><a href="/products" class="btn-large waves-effect waves-light black">За покупками!</a></div>
        </div>
    </div>


    <hr style="width: 200vh">
    <div class="container">

    <table class="centered bordered" style="border:5px solid black;">
        <thead>
        <tr style="text-align: center">
            <th>Топ продаж!</th>
{{--            <th>Новинки</th>--}}
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <div class="carousel">
                    @foreach($topSells as $product)
                        <a class="carousel-item" href="/product/{{$product->product_id}}"><img style="max-width: 150px;" src="{{$product->picture}}"> <span style="color: black">{{$product->name}}</span> </a>
                    @endforeach

                    {{--        <div class="col s4">--}}
                    {{--            <div class="card">--}}
                    {{--                <div class="card-image w3-card-4">--}}
                    {{--                    <figure class="image is-3by4"><img style="max-width: 300px; max-height: 300px; width: auto; height: auto; display: block" src="{{$product->picture}}" alt=""></figure>--}}
                    {{--                    <span style="background-color: #A5A5A5" class="card-title">{{$product->name}}</span>--}}
                    {{--                </div>--}}
                    {{--                <div class="card-content">--}}
                    {{--                    <p>{{$product->description}}</p>--}}
                    {{--                </div>--}}
                    {{--                <div class="card-action">--}}
                    {{--                    <a href="/product/{{$product->product_id}}">Подробнее</a>--}}
                    {{--                    <a href="{{route('add.item', $product->product_id)}}" class="btn orange">В корзину</a>--}}
                    {{--                </div>--}}
                    {{--            </div>--}}
                    {{--        </div>--}}
                </div>
            </td>
{{--            <td>--}}
{{--                <div class="carousel">--}}
{{--                    @foreach($newProducts as $product)--}}
{{--                        <a class="carousel-item" href="/product/{{$product->id}}"><img style="max-width: 150px" src="{{$product->picture}}"> <span style="color: black">{{$product->name}}</span> </a>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </td>--}}
        </tr>
        </tbody>
    </table>
    </div>

    <hr style="width: 200vh">
    <div class="container" style="margin-bottom: 20px">

        <table class="centered bordered" style="border:5px solid black;">
            <thead>
            <tr style="text-align: center">
{{--                <th>Топ продаж!</th>--}}
                            <th>Новинки</th>
            </tr>
            </thead>
            <tbody>
            <tr>
{{--                <td>--}}
{{--                    <div class="carousel">--}}
{{--                        @foreach($topSells as $product)--}}
{{--                            <a class="carousel-item" href="/product/{{$product->product_id}}"><img style="max-width: 150px;" src="{{$product->picture}}"> <span style="color: black">{{$product->name}}</span> </a>--}}
{{--                        @endforeach--}}

{{--                        --}}{{--        <div class="col s4">--}}
{{--                        --}}{{--            <div class="card">--}}
{{--                        --}}{{--                <div class="card-image w3-card-4">--}}
{{--                        --}}{{--                    <figure class="image is-3by4"><img style="max-width: 300px; max-height: 300px; width: auto; height: auto; display: block" src="{{$product->picture}}" alt=""></figure>--}}
{{--                        --}}{{--                    <span style="background-color: #A5A5A5" class="card-title">{{$product->name}}</span>--}}
{{--                        --}}{{--                </div>--}}
{{--                        --}}{{--                <div class="card-content">--}}
{{--                        --}}{{--                    <p>{{$product->description}}</p>--}}
{{--                        --}}{{--                </div>--}}
{{--                        --}}{{--                <div class="card-action">--}}
{{--                        --}}{{--                    <a href="/product/{{$product->product_id}}">Подробнее</a>--}}
{{--                        --}}{{--                    <a href="{{route('add.item', $product->product_id)}}" class="btn orange">В корзину</a>--}}
{{--                        --}}{{--                </div>--}}
{{--                        --}}{{--            </div>--}}
{{--                        --}}{{--        </div>--}}
{{--                    </div>--}}
{{--                </td>--}}
                            <td>
                                <div class="carousel">
                                    @foreach($newProducts as $product)
                                        <a class="carousel-item" href="/product/{{$product->id}}"><img style="max-width: 150px" src="{{$product->picture}}"> <span style="color: black">{{$product->name}}</span> </a>
                                    @endforeach
                                </div>
                            </td>
            </tr>
            </tbody>
        </table>
    </div>


{{--    <div class="container">--}}
{{--        <h4>Топ продаж!</h4>--}}
{{--        <div class="carousel">--}}
{{--            @foreach($topSells as $product)--}}
{{--                <a class="carousel-item" href="/product/{{$product->product_id}}"><img style="max-width: 150px" src="{{$product->picture}}"> {{$product->name}} </a>--}}
{{--            @endforeach--}}

{{--            --}}{{--        <div class="col s4">--}}
{{--            --}}{{--            <div class="card">--}}
{{--            --}}{{--                <div class="card-image w3-card-4">--}}
{{--            --}}{{--                    <figure class="image is-3by4"><img style="max-width: 300px; max-height: 300px; width: auto; height: auto; display: block" src="{{$product->picture}}" alt=""></figure>--}}
{{--            --}}{{--                    <span style="background-color: #A5A5A5" class="card-title">{{$product->name}}</span>--}}
{{--            --}}{{--                </div>--}}
{{--            --}}{{--                <div class="card-content">--}}
{{--            --}}{{--                    <p>{{$product->description}}</p>--}}
{{--            --}}{{--                </div>--}}
{{--            --}}{{--                <div class="card-action">--}}
{{--            --}}{{--                    <a href="/product/{{$product->product_id}}">Подробнее</a>--}}
{{--            --}}{{--                    <a href="{{route('add.item', $product->product_id)}}" class="btn orange">В корзину</a>--}}
{{--            --}}{{--                </div>--}}
{{--            --}}{{--            </div>--}}
{{--            --}}{{--        </div>--}}
{{--        </div>--}}
{{--    </div>--}}


@endsection
