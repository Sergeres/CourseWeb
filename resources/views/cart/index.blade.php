@extends('layouts.menu')

@section('content')
    <div class="container">
        <table>
            <thead>
            <tr>
                <th>Название</th>
                <th>Цена</th>
                <th>Количество</th>
                <th></th>
            </tr>
            </thead>
            <tbody>

                @foreach($data as $unit)
                    <tr>
                        <td>{{$unit->name}}</td>
                        <td>{{$unit->price}}</td>
                        <td>
                            {{$unit->quantity}}
                            <a href="{{route('add.item', $unit->id)}}" class="btn-floating btn-sm waves-effect waves-light btn orange ajax">+</a>
                            @if($unit->quantity > 1)
                                <a href="{{route('sub.item', $unit->id)}}" class="btn-floating btn-sm waves-effect waves-light btn red ajax">-</a>
                            @endif
                        </td>

                        <td class="center">
                            <a href="{{route('remove.item', $unit->id)}}" class="btn red ajax">Удалить</a>
                        </td>
                    </tr>
                @endforeach


        </table>
        @if(sizeof(\Cart::getContent()) != 0)
            <h3>Общая цена: {{\Cart::getTotal()}}</h3><br>
            <a href="{{route('clearCart')}}" class="btn red ajax">Очистить корзину</a>
        @endif
{{--        <button class="btn red ajax" type="submit" name="action">Удалить</button>--}}
    </div>
@endsection
