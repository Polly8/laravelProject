
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
                <div class="content-head__title-wrap__title bcg-title">Последние товары</div>
            @stop


            @section('content')


                    @if(sizeof($products) != 0)

                        <div class="products-columns" style="display:flex; align-items:center;">

                            {{--@foreach($products as $product)--}}

                                @for($i = 0; $i < sizeof($products) && $i<6; $i++)



                                    <div class="products-columns__item">

                                        <div class="products-columns__item__title-product">
                                            <a href="{{ route('product.show', ['id' => $products[$i]->id]) }}" class="products-columns__item__title-product__link">{{$products[$i]->name}}</a>
                                        </div>

                                        <div class="products-columns__item__thumbnail">
                                            <a href="{{ route('product.show', ['id' => $products[$i]->id]) }}" class="products-columns__item__thumbnail__link">

                                                <img src=" {{$_SERVER['DOCUMENT_ROOT']}}/image.php/?id={{ $products[$i]->id }}" alt="No image" class="products-columns__item__thumbnail__img">
                                                {{--<img src="../../public/img/cover/game-1.jpg" alt="Preview-image" class="products-columns__item__thumbnail__img">--}}
                                            </a>
                                        </div>

                                        <div class="products-columns__item__description"><span class="products-price">{{$products[$i]->price}} руб</span>
                                            <a href="{{ route('product.buy', ['id' => $products[$i]->id]) }}" class="btn btn-blue">Купить</a>
                                        </div>
                                    </div>


                                    @if(Auth::user()['is-admin'] == 'on')

                                        <div style="margin:10px 0; display:flex; flex-direction:column;">


                                            <form action="{{ route('product.edit', ['id' => $products[$i]->id])}}" method="get" style="font-size:11px; margin:5px;">

                                                <input type="submit" value="edit" style="background-color:yellow;">
                                            </form>

                                            <form action="{{ route('product.delete', ['id' => $products[$i]->id])}}" method="get" style="font-size:11px; margin:5px;">
                                                <input type="submit" value="delete" style="background-color:red;">
                                            </form>

                                        </div>

                                    @endif




                                @endfor

                            {{--@endforeach--}}
                        </div>


                    @endif


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

