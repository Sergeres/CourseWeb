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
                <td>{{$unit->user_id}}</td>
                <td>{{$unit->amount}}</td>
                <td>{{$unit->quantity}}</td>
            </tr>
        @endforeach


    </table>
</div>
@endsection
