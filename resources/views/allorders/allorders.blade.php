
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
                <div class="content-head__title-wrap__title bcg-title">Все заказы</div>
            @stop



            @section('content')


                    <div class="cart-product-list">


                        @for($i=0; $i < sizeof($datas); $i++)


                            <div class="cart-product-list__item">
                                <div class="cart-product__item__product-photo"><img src="../../public/img/cover/game-1.jpg" class="cart-product__item__product-photo__image"></div>
                                <div class="cart-product__item__product-name">
                                    <div class="cart-product__item__product-name__content"><a href="#">{{$orders[$i]['name']}}</a></div>
                                </div>
                                <div class="cart-product__item__cart-date">
                                    <div class="cart-product__item__cart-date__content">{{$datas[$i]['created_at']}}</div>
                                </div>
                                <div class="cart-product__item__product-price"><span class="product-price__value">{{$datas[$i]['email']}}</span></div>
                            </div>

                        @endfor

                    </div>



            @stop



            @section('pagination')

                <ul class="page-nav">
                    <li class="page-nav__item"><a href="#" class="page-nav__item__link"><i class="fa fa-angle-double-left"></i></a></li>
                    <li class="page-nav__item"><a href="#" class="page-nav__item__link">1</a></li>
                    <li class="page-nav__item"><a href="#" class="page-nav__item__link">2</a></li>
                    <li class="page-nav__item"><a href="#" class="page-nav__item__link">3</a></li>
                    <li class="page-nav__item"><a href="#" class="page-nav__item__link">4</a></li>
                    <li class="page-nav__item"><a href="#" class="page-nav__item__link">5</a></li>
                    <li class="page-nav__item"><a href="#" class="page-nav__item__link"><i class="fa fa-angle-double-right"></i></a></li>
                </ul>

            @stop






