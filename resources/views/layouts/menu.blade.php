<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{!! csrf_token() !!}"/>

    <title>Расходные материалы для парикмахерских</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }
    </style>
</head>
<body>
<nav style="background: teal; margin-bottom: 60px">
    <div class="nav-wrapper">
        <div class="container">
            <a href="/" class="brand-logo; left"><i class="material-icons">content_cut</i></a>
            <ul class="right">
                <div>
                <li><a href="{{ url('/products') }}">Продукты</a></li>
                @if (Route::has('login'))

                        @if (Auth::check())
                            <li><a href="{{ url('/home') }}">Личный кабинет</a></li>
                            <li>
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Выход
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        @else
                            <li><a href="{{ url('/login') }}">Войти</a></li>
{{--                            <li><a href="{{ url('/register') }}">Зарегистрироваться</a></li>--}}
                        @endif
                    </div>
                @endif
            </ul>
            <div class="nav-content">
                <ul class="tabs tabs-transparent" style="background: darkslategray">
                    <li class="tab"><a class="/categorys" href="/products">Все товары</a></li>
                    <li class="tab"><a href="/category">Категории</a></li>
                    <li class="tab"><a href="/product">Продукты</a></li>
                    <li class="tab"><a href="/cart">Корзина</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<main class="relative flex items-top justify-center min-h-screen">
    @yield('content')
</main>


<script src="/js/laravel.ajax.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
<footer class="page-footer" style="background-color: teal;">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Расходники для "Барбишопа"</h5>
                {{--                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>--}}
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Полезные ссылки</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright" style="background-color: darkslategrey">
        <div class="container">
            © 2021 Created by Sergey Prozorov
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
        </div>
    </div>
</footer>
</html>
