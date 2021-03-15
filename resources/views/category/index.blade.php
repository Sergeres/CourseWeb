@extends('layouts.menu')

@section('content')
<div class="container">

    <table>
        <thead>
        <tr>
            <th>Название</th>
            <th>Описание</th>
        </tr>
        </thead>
        <tbody>
        @foreach($category as $categorys)
        <tr>
            <td>{{$categorys->name}}</td>
            <td>{{$categorys->description}}</td>
        </tr>
        @endforeach
    </table>


</div>
</div>
@endsection
