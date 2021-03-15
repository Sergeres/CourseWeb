@extends('layouts.menu')

@section('content')
    <div class="container">
        <form method="POST" @if (isset($category)) action="{{ route('category.update', $category) }}"
              @else
              action="{{ route('category.store') }}" @endif>
            {{ isset($category) ? method_field('PUT') : method_field('POST') }}
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Title</label>
                <input class="form-control" type="text" id="name" name="name" value="{{ old('name', isset($category) ? $category->name : null) }}">
            </div>
            <div class="form-group">
                <label for="description">Body</label>
                <textarea class="form-control" id="description" rows="3" name="description" v-text="{{ old('description', isset($category) ? $category->description : null) }}"></textarea>
            </div>
            <div class="row">
                <button class="btn waves-effect waves-light green" type="submit"
                        name="action">{{ isset($category) ? 'Обновить' : 'Добавить' }}</button>
            </div>
        </form>
    </div>>
@endsection

