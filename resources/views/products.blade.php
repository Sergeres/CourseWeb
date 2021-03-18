@extends('layouts.menu')

@section('content')
    <div class="container" style="margin-top: 10px">
        <h3>Продукты</h3>
        @foreach($products as $product)
            <div class="card horizontal">
                <div class="card-image waves-effect waves-block waves-light">
                    <img style="height: 250px;" class="activator" src="{{$product->picture}}"/>
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">{{$product->name}}<i class="material-icons right">more_vert</i></span>
                    <p><a href="/product/{{$product->id}}">Просмотреть товар</a></p>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">{{$product->name}}<i class="material-icons right">close</i></span>
                    <p>{{$product->description}}</p>
                </div>
                <a href="{{route('add.item', $product->id)}}" class="btn orange">В корзину</a>
            </div>
        @endforeach
    </div>
@endsection
