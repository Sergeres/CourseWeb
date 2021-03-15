@extends('layouts.menu')

@section('content')
    <div class="container" style="margin-top: 10px">
        <h3>Продукты</h3>
        <div class="row">
            @foreach($products as $product)
                <div class="card col s3" style="max-width: 200px; margin-right: 10px;">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="{{$product->picture}}">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">{{$product->name}}<i class="material-icons right">more_vert</i></span>
                        <p><a href="/product/{{$product->id}}">Просмотреть товар</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">{{$product->name}}<i class="material-icons right">close</i></span>
                        <p>{{$product->description}}</p>
                    </div>
                </div>
                {{--            <div class="">--}}
                {{--                <div class="thumbnail">--}}
                {{--                    <div class="labels">--}}
                {{--                    </div>--}}
                {{--                    <img style="max-width: 100px" src="{{$products->picture}}" alt="{{$products->name}}">--}}
                {{--                    <div class="caption">--}}
                {{--                        <h3>{{$products->name}}</h3>--}}
                {{--                        <p>{{$products->price}}₽</p>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--            </div>--}}
            @endforeach
        </div>
    </div>
@endsection
