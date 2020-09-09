<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

    	$categories = Categories::all();
    	$products = Products::all();

        return view('home', ['categories' => $categories, 'products' => $products]);
    }
}
