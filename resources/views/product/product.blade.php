
@extends('layouts.main')


        @section('header-status')

            @guest
                <li class="nav-item authorization-block" style="display: inline;">
                    {{--<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
                    <a href="{{ route('login') }}" class="authorization-block__link">Войти</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item authorization-block" style="display: inline;">
                        {{--<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
                        <a href="{{ route('register') }}" class="authorization-block__link">Регистрация</a>
                    </li>
                @endif
            @else
                <li class="authorization-block" style="display: flex;">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle authorization-block__link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item authorization-block__link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Выйти') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest

        @stop



        @section('page-title')
            <div class="content-head__title-wrap__title bcg-title">{{$item->name}} в разделе {{$item->category}}</div>
        @stop


        @section('content')

        <div class="product-container">
            <div class="product-container__image-wrap">
                <img src="img/cover/game-1.jpg" class="image-wrap__image-product">
            </div>
            <div class="product-container__content-text">
                <div class="product-container__content-text__title">{{$item->name}}</div>
                <div class="product-container__content-text__price">
                    <div class="product-container__content-text__price__value">
                        Цена: <b>{{$item->price}}</b>
                        руб
                    </div><a href="{{ route('product.buy', ['id' => $item->id]) }}" class="btn btn-blue">Купить</a>
                </div>
                <div class="product-container__content-text__description">
                    <p>
                        {{$item->description}}
                    </p>
                </div>
            </div>
        </div>

        @stop



        @section('content-bottom')

            <div class="line"></div>
            <div class="content-head__container">
                <div class="content-head__title-wrap">
                    <div class="content-head__title-wrap__title bcg-title">Посмотрите наши товары</div>
                </div>
            </div>
            <div class="content-main__container">
                <div class="products-columns">


                    @for($i = 0; $i < 3; $i++)

                        <div class="products-columns__item">

                            <div class="products-columns__item__title-product">
                                <a href="{{ route('product.show', ['id' => $products[$i]->id]) }}" class="products-columns__item__title-product__link">{{$products[$i]->name}}</a>
                            </div>

                            <div class="products-columns__item__thumbnail">
                                <a href="{{ route('product.show', ['id' => $products[$i]->id]) }}" class="products-columns__item__thumbnail__link">
                                    <img src="../../public/img/cover/game-1.jpg" alt="Preview-image" class="products-columns__item__thumbnail__img">
                                </a>
                            </div>

                            <div class="products-columns__item__description"><span class="products-price">{{$products[$i]->price}} руб</span>
                                <a href="{{ route('product.buy', ['id' => $products[$i]->id]) }}" class="btn btn-blue">Купить</a>
                            </div>

                        </div>

                    @endfor
                </div>
            </div>

        @stop






