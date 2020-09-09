<?php

namespace App\Http\Controllers;

use App\Buying;
use App\Categories;
use App\Products;
use Illuminate\Http\Request;

class MyordersController extends Controller
{


	function index(){

		$categories = Categories::all();
		$products = Products::all();

		$allOrders = [];

		$email = \Auth::user()->email;


		$datas = Buying::query()->where('email', $email)->get();



		foreach($datas as $data){

			$item = $data['product_id'];

			$orders = Products::query()->find($item);

			$allOrders[] = $orders;

		}


		return view('myorders.myorders', ['categories' => $categories, 'products' => $products, 'orders' => $allOrders,
			'datas' => $datas]);

	}

}
