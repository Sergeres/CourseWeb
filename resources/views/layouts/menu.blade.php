<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{!! csrf_token() !!}"/>

    <title>Магазин расходных материалов для парикмахерских</title>

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

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        $( document ).ready(function() {
            $('.dropdown-trigger').dropdown({
                // hover: true,
                coverTrigger: false
            });
            $('.collapsible').collapsible();
            $('.carousel').carousel();
            $('.sidenav').sidenav();
        });
    </script>
    <script src="/js/laravel.ajax.js"></script>
</head>
<body>
<nav style="background: black;">
    <div class="nav-wrapper">
        <div class="container">
            <a href="/" class="brand-logo"><i class="material-icons">content_cut</i>Salon de Coiffure</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="{{ url('/products') }}">Каталог</a></li>
                <li><a href="/cart"><i class="material-icons left">shopping_cart</i>Корзина</a></li>
                @if (Route::has('login'))
                    @if (Auth::check())
                        @if(Auth::user()->admin == true)
                            <li><a class="dropdown-trigger " href='#' data-target='dropdown1'>Справочники</a></li>
                        @endif
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
                @endif
            </ul>
            <!-- Dropdown Structure -->
            <ul id='dropdown1' class='dropdown-content'>
                <li><a href="/category">Категории</a></li>
                <li><a href="/product">Продукты</a></li>
                <li class="divider" tabindex="-1"></li>
            </ul>
        </div>
    </div>
</nav>

<ul class="sidenav" id="mobile-demo">
    <li><a href="{{ url('/products') }}">Каталог</a></li>
    <li><a href="/cart"><i class="material-icons">shopping_cart</i></a></li>
    @if (Route::has('login'))
        @if (Auth::check())
            @if(Auth::user()->admin == true)
                <li class="divider" tabindex="-1"></li>
                <li><a href="/category">Категории</a></li>
                <li><a href="/product">Продукты</a></li>
                <li class="divider" tabindex="-1"></li>
            @endif
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
    @endif
</ul>



<main class="relative flex items-top justify-center min-h-screen">
    @yield('content')
</main>

</body>
<footer class="page-footer" style="background-color: dimgrey;">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Salon de Coiffure</h5>
                <p class="grey-text text-lighten-4">Интернет магазин расходных материалов для парикмахерских. <br>Предоставляет обширный выбор товаров для любых целей покупателей.</p>
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
    <div class="footer-copyright" style="background-color: black">
        <div class="container">
            © 2021 Created by Sergey Prozorov
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
        </div>
    </div>
</footer>
</html>
