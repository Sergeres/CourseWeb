@extends('layouts.menu')

@section('content')
    <div class="container">
        @if (isset($category))
            <h3>
                Редактирование категории товаров
            </h3>
        @else
            <h3>
                Создание категории товаров
            </h3>
        @endif
        <form method="POST" @if (isset($category)) action="{{ route('category.update', $category) }}"
              @else
              action="{{ route('category.store') }}" @endif>
            {{ isset($category) ? method_field('PUT') : method_field('POST') }}
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Наименование</label>
                <input class="form-control" type="text" id="name" name="name" value="{{ old('name', isset($category) ? $category->name : null) }}">
            </div>
            <div class="form-group">
{{--                <label for="description">Body</label>--}}
{{--                <textarea class="form-control" id="description" rows="3" name="description" v-text=""></textarea>--}}

                <div class="input-field">
                    <label for="description">Описание</label>
                    <textarea id="description" class="materialize-textarea form-control" data-length="120">{{ old('description', isset($category) ? $category->description : null) }}</textarea>
                </div>

            </div>
            <div class="row">
                <button class="btn waves-effect waves-light green" type="submit"
                        name="action">{{ isset($category) ? 'Обновить' : 'Добавить' }}</button>
            </div>
        </form>
    </div>>
@endsection

