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
    <h5>
        Вы совершили заказов свыше 500руб.: <b> {{$countOrders[0]->count}} </b> Ваша скидка: {{$countOrders[0]->count*0.2}} %
    </h5>
    <ul class="collapsible">
        <li>
            <div class="collapsible-header"><i class="material-icons">attach_money</i>Система скидок</div>
            <div class="collapsible-body">
                <span>
                    @for ($i = 20; $i <= 100; $i+= 10)
                        <p>Если совершите {{$i}} покупок свыше 500 руб. Ваша скидка составит: {{$i*0.2}} %</p>
                    @endfor
                </span>
            </div>
        </li>
    </ul>


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
    @if(sizeof($data)!=0)
        <h5>Ваши прошлые покупки:</h5>
        <ul class="collapsible">
            @foreach($data as $unit)
            <li>
                <div class="collapsible-header"><i class="material-icons">shopping_cart</i><b>Дата заказа: </b> {{date('d.m.Y H:i', strtotime($unit->created_at))}} <b> Стоимость: </b> {{$unit->amount}}</div>
                <div class="collapsible-body">
                    <h5>Детали заказа:</h5>
                    @foreach($products as $product)
                        <span>
                            @if($product->order_id == $unit->id)
                                <p><b>Наименование:</b> {{$product -> name}}   <b>Количество:</b> {{$product -> quantity}}   <b>Цена:</b> {{$product -> sellprice}}   <b>Стоимость:</b> {{$product -> sellprice * $product -> quantity}}</p>
                            @endif
                        </span>
                    @endforeach
                </div>
            </li>
            @endforeach
        </ul>
    @endif

</div>
@endsection
