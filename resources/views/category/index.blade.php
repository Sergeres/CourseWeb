@extends('layouts.menu')

@section('content')
<div class="container">
    <h3>Категории товаров</h3>
    @if (Route::has('login'))
        @if (Auth::check() && Auth::user()->admin == true)
            <a class="waves-effect waves-light btn orange" href="{{ route('category.create') }}"><i
                    class="material-icons left">add_circle</i>Создать</a>
        @endif
    @endif
    <table>
        <thead>
        <tr>
            <th>Название</th>
            <th>Описание</th>
            @if (Auth::check() && Auth::user()->admin == true)
                <th></th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach($categorys as $category)
        <tr>
            <td>{{$category->name}}</td>
            <td>{{$category->description}}</td>
            @if (Route::has('login'))
                @if (Auth::check() && Auth::user()->admin == true)
                    <td class="center">
                        <form method="POST" action="{{ route('category.destroy', $category) }}">
                            <a href="{{ route('category.edit', $category) }}" class="btn green">Редактировать</a>
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn red ajax" type="submit" name="action">Удалить</button>
                        </form>
                    </td>
                @endif
            @endif
        </tr>
        @endforeach
    </table>


</div>
</div>
@endsection
