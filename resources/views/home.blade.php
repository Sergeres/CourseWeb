@extends('layouts.menu')

@section('content')
<div class="container">
    <h3>Личный кабинет</h3>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                                <div class="panel-body">
                    Здравствуйте, {{Auth::user()->name}} !
                </div>
            </div>
        </div>
    </div>
{{--    <table>--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th>Дата покупки</th>--}}
{{--            <th>Стоимость</th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        @foreach($data as $unit)--}}
{{--            <tr>--}}
{{--                <td><a href="/order/{{$unit->id}}">{{$unit->created_at}}</a></td>--}}
{{--                <td>{{$unit->amount}}</td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}
{{--    </table>--}}

    <ul class="collapsible">
        @foreach($data as $unit)
        <li>
            <div class="collapsible-header"><i class="material-icons">shopping_cart</i><b>Дата заказа: </b> {{date('d.m.Y H:i', strtotime($unit->created_at))}} <b> Стоимость: </b> {{$unit->amount}}</div>
            <div class="collapsible-body">
                @foreach($products as $product)
                    <span>
                        @if($product->order_id == $unit->id)
                            <p>{{$product -> name}}   {{$product -> quantity}}   {{$product -> price}}</p>
                        @endif
                    </span>
                @endforeach
            </div>
        </li>
        @endforeach
    </ul>

</div>
@endsection
