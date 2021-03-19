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
</div>
@endsection
