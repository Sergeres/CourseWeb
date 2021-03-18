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
                        <td>{{$unit->quantity}}</td>
                        <td class="center">
                            <a href="{{route('remove.item', $unit->id)}}" class="btn red">Удалить</a>
                        </td>
                    </tr>
                @endforeach


        </table>
{{--        <a href="{{route('remove.item', $unit->id)}}" class="btn red">Удалить</a>--}}
{{--        <button class="btn red ajax" type="submit" name="action">Удалить</button>--}}
    </div>
@endsection
