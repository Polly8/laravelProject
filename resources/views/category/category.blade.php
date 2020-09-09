
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
                <div class="content-head__title-wrap__title bcg-title">Игры в разделе @if(sizeof($items) != 0) {{$items[0]['category']}} @endif</div>
            @stop



            @section('content')

                <div class="products-category__list">

                    @if(sizeof($items) != 0)

                        @for($i=0; $i < sizeof($items); $i++)


                            <div class="products-category__list__item">
                                <div class="products-category__list__item__title-product">
                                    <a href="{{ route('product.show', ['id' => $items[$i]->id]) }}">{{$items[$i]->name}}</a>
                                </div>
                                <div class="products-category__list__item__thumbnail">
                                    <a href="{{ route('product.show', ['id' => $products[$i]->id]) }}" class="products-category__list__item__thumbnail__link">
                                        <img src="img/cover/game-6.jpg" alt="Preview-image">
                                    </a>
                                </div>
                                <div class="products-category__list__item__description">
                                    <span class="products-price">{{$items[$i]->price}} руб.</span>
                                    <a href="{{ route('product.buy', ['id' => $items[$i]->id]) }}" class="btn btn-blue">Купить</a>
                                </div>
                            </div>

                        @endfor

                    @endif

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





