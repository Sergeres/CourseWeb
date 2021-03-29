@extends('layouts.menu')

@section('content')
    <div class="container" style="margin-top: 10px">
        <h3>Продукты</h3>
        <div class="row">
        @foreach($products as $product)
{{--            <div class="card horizontal">--}}
{{--                <div class="card-image waves-effect waves-block waves-light">--}}
{{--                    <img style="height: 250px;" class="activator" src="{{$product->picture}}"/>--}}
{{--                </div>--}}
{{--                <div class="card-content">--}}
{{--                    <span class="card-title activator grey-text text-darken-4">{{$product->name}}<i class="material-icons right">more_vert</i></span>--}}
{{--                    <p><a href="/product/{{$product->id}}">Просмотреть товар</a></p>--}}
{{--                </div>--}}
{{--                <div class="card-reveal">--}}
{{--                    <span class="card-title grey-text text-darken-4">{{$product->name}}<i class="material-icons right">close</i></span>--}}
{{--                    <p>{{$product->description}}</p>--}}
{{--                </div>--}}
{{--                <a href="{{route('add.item', $product->id)}}" class="btn orange">В корзину</a>--}}
{{--            </div>--}}

{{--        <div class="row">--}}
{{--            <div class="col s9 push-s3">--}}
{{--                <span class="flow-text">{{$product->name}}</span>--}}
{{--            </div>--}}
{{--            <div class="col s9 push-s3">--}}
{{--                <span class="flow-text">{{$product->description}}</span>--}}
{{--            </div>--}}
{{--            <div class="col s3 pull-s9">--}}
{{--                <img style="height: 250px;" class="activator" src="{{$product->picture}}"/>--}}
{{--            </div>--}}
{{--        </div>--}}

            <div class="col s4" style="max-height: 200px; margin-bottom: 400px">
                <div class="card">
                    <div class="card-image w3-card-4">
                        <figure class="image is-3by4"><img style="max-width: 300px; max-height: 300px; min-height: 300px; width: auto; height: auto; display: block" src="{{$product->picture}}" alt=""></figure>
                        <span style="background-color: #A5A5A5" class="card-title">{{$product->name}}</span>
                    </div>
                    <div class="card-content">
                        <p>{{$product->description}}</p>
                    </div>
                    <div class="card-action">
                        <a href="/product/{{$product->id}}">Подробнее</a>
                        <a href="{{route('add.item', $product->id)}}" class="btn orange">В корзину</a>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
@endsection
