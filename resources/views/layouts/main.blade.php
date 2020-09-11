<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>main - ГеймсМаркет</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="{{ url('css/libs.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/main.css') }}">
    <link rel="stylesheet" href="{{ url('css/media.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
<div class="main-wrapper">
    <header class="main-header">
        <div class="logotype-container"><a href="#" class="logotype-link"><img src="{{ url('img/logo.png') }}" alt="Логотип"></a></div>
        <nav class="main-navigation">
            <ul class="nav-list">
                <li class="nav-list__item"><a href="#" class="nav-list__item__link">Главная</a></li>
                @if(Auth::user()['is-admin'] == '-')<li class="nav-list__item"><a href="{{ route('myorders') }}" class="nav-list__item__link">Мои заказы</a></li>@endif

                @if(Auth::user()['is-admin'] == 'on') <li class="nav-list__item"><a href="{{ route('allorders') }}" class="nav-list__item__link">Все заказы</a></li> @endif


                <li class="nav-list__item"><a href="#" class="nav-list__item__link">Новости</a></li>
                <li class="nav-list__item"><a href="#" class="nav-list__item__link">О компании</a></li>
            </ul>
        </nav>
        <div class="header-contact">
            <div class="header-contact__phone"><a href="#" class="header-contact__phone-link">Телефон: 33-333-33</a></div>
        </div>
        <div class="header-container">
            <div class="payment-container">
                <div class="payment-basket__status">
                    <div class="payment-basket__status__icon-block"><a class="payment-basket__status__icon-block__link"><i class="fa fa-shopping-basket"></i></a></div>
                    <div class="payment-basket__status__basket"><span class="payment-basket__status__basket-value">0</span><span class="payment-basket__status__basket-value-descr">товаров</span></div>
                </div>
            </div>



            @yield('header-status')



        </div>

    </header>
    <div class="middle">
        <div class="sidebar">
            <div class="sidebar-item">
                <div class="sidebar-item__title">Категории</div>
                <div class="sidebar-item__content">
                    <ul class="sidebar-category">

                        @if(sizeof($categories) != 0)

                            @foreach($categories as $caterory)

                                <li class="sidebar-category__item" style="display:flex; flex-direction:column-reverse;">

                                    @if(Auth::user()['is-admin'] == 'on')

                                        <div style="margin:10px 0; display:flex; flex-direction:row; align-items:center;">


                                            <form action="{{ route('category.edit', ['title' => $caterory->name])}}" method="get" style="font-size:11px; margin-right:10px;">

                                                <input type="text" name="name" value="{{$caterory->name}}" required>
                                                <textarea type="text" name="description" cols="21" rows="2" placeholder="{{$caterory->description}}" required></textarea>

                                                <input type="submit" value="edit" style="background-color:yellow;">
                                            </form>

                                            <form action="{{ route('category.delete', ['title' => $caterory->name])}}" method="get" style="font-size:11px; margin-right:10px; margin-bottom:4px;">
                                                <input type="submit" value="delete" style="background-color:red;">
                                            </form>

                                        </div>

                                    @endif

                                    <a href="{{ route('category.show', ['title' => $caterory->name]) }}" class="sidebar-category__item__link">{{$caterory->name}}</a>
                                </li>

                            @endforeach

                        @endif


                        @if(Auth::user()['is-admin'] == 'on')

                                <form action="{{ route('category.add') }}" method="get">

                                    Название<input type="text" name="newcategory" required>
                                    Описание<textarea type="text" name="description" id="" cols="22" rows="3" required></textarea>
                                    <input type="submit" value="Добавить категорию" style="background-color:lawngreen;">

                                </form>

                        @endif


                    </ul>
                </div>
            </div>
            <div class="sidebar-item">
                <div class="sidebar-item__title">Последние новости</div>
                <div class="sidebar-item__content">
                    <div class="sidebar-news">
                        <div class="sidebar-news__item">
                            <div class="sidebar-news__item__preview-news"><img src="{{ url('img/cover/game-2.jpg') }}" alt="image-new" class="sidebar-new__item__preview-new__image"></div>
                            <div class="sidebar-news__item__title-news"><a href="#" class="sidebar-news__item__title-news__link">О новых играх в режиме VR</a></div>
                        </div>
                        <div class="sidebar-news__item">
                            <div class="sidebar-news__item__preview-news"><img src="{{ url('img/cover/game-1.jpg') }}" alt="image-new" class="sidebar-new__item__preview-new__image"></div>
                            <div class="sidebar-news__item__title-news"><a href="#" class="sidebar-news__item__title-news__link">О новых играх в режиме VR</a></div>
                        </div>
                        <div class="sidebar-news__item">
                            <div class="sidebar-news__item__preview-news"><img src="{{ url('img/cover/game-4.jpg') }}" alt="image-new" class="sidebar-new__item__preview-new__image"></div>
                            <div class="sidebar-news__item__title-news"><a href="#" class="sidebar-news__item__title-news__link">О новых играх в режиме VR</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-content">
            <div class="content-top">
                <div class="content-top__text">Купить игры неборого без регистрации смс с торента, получить компкт диск, скачать Steam игры после оплаты</div>
                <div class="slider"><img src="{{ url('img/slider.png') }}" alt="Image" class="image-main"></div>
            </div>



            @if(Auth::user()['is-admin'] == 'on')

                <form enctype="multipart/form-data" action="{{ route('product.add') }}" method="post" style="display:flex; flex-direction:column; width:400px;">
                    @csrf
                    Название<input type="text" name="name" required>
                    Категория<select name="category" id="" required>
                        @foreach($categories as $category)
                            <option value="{{$category->name}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    Цена<input type="text" name="price" required>
                    Описание<textarea name="description" id="" cols="30" rows="5" required></textarea>
                    <input name="picture" type="file">
                    <input type="submit" value="Добавить товар">

                </form>


            @endif




            <div class="content-middle">
                <div class="content-head__container">
                    <div class="content-head__title-wrap">

                        @yield('page-title')

                    </div>
                    <div class="content-head__search-block">
                        <div class="search-container">
                            <form class="search-container__form">
                                <input type="text" class="search-container__form__input">
                                <button class="search-container__form__btn">search</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="content-main__container">

                    @yield('content')

                </div>
                <div class="content-footer__container">

                    @yield('pagination')

                </div>
            </div>
            <div class="content-bottom">

                @yield('content-bottom')

            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="footer__footer-content">
            <div class="random-product-container">
                <div class="random-product-container__head">Случайный товар</div>
                <div class="random-product-container__content">

                    @if(sizeof($products) != 0)
                        <div class="item-product">
                            <div class="item-product__title-product"><a href="{{ route('product.show', ['id' => $products[0]->id]) }}" class="item-product__title-product__link">{{$products[0]->name}}</a></div>
                            <div class="item-product__thumbnail"><a href="#" class="item-product__thumbnail__link"><img src="../../public/img/cover/game-1.jpg" alt="Preview-image" class="item-product__thumbnail__link__img"></a></div>
                            <div class="item-product__description">
                                <div class="item-product__description__products-price"><span class="products-price">400 руб</span></div>
                                <div class="item-product__description__btn-block"><a href="#" class="btn btn-blue">Купить</a></div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="footer__footer-content__main-content">
                <p>
                    Интернет-магазин компьютерных игр ГЕЙМСМАРКЕТ - это
                    онлайн-магазин игр для геймеров, существующий на рынке уже 5 лет.
                    У нас широкий спектр лицензионных игр на компьютер, ключей для игр - для активации
                    и авторизации, а также карты оплаты (game-card, time-card, игровые валюты и т.д.),
                    коды продления и многое друго. Также здесь всегда можно узнать последние новости
                    из области онлайн-игр для PC. На сайте предоставлены самые востребованные и
                    актуальные товары MMORPG, приобретение которых здесь максимально удобно и,
                    что немаловажно, выгодно!
                </p>
            </div>
        </div>
        <div class="footer__social-block">
            <ul class="social-block__list bcg-social">
                <li class="social-block__list__item"><a href="#" class="social-block__list__item__link"><i class="fa fa-facebook"></i></a></li>
                <li class="social-block__list__item"><a href="#" class="social-block__list__item__link"><i class="fa fa-twitter"></i></a></li>
                <li class="social-block__list__item"><a href="#" class="social-block__list__item__link"><i class="fa fa-instagram"></i></a></li>
            </ul>
        </div>
    </footer>
</div>
<script src="{{ url('js/main.js') }}"></script>


</body>
</html>





