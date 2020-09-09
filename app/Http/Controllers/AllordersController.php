<?php

namespace App\Http\Controllers;

use App\Buying;
use App\Categories;
use App\Products;
use Illuminate\Http\Request;

class AllordersController extends Controller
{

	function index(){

		$categories = Categories::all();
		$products = Products::all();

		$allOrders = [];

		$datas = Buying::all();



		foreach($datas as $data){

			$item = $data['product_id'];

			$orders = Products::query()->find($item);

			$allOrders[] = $orders;

		}


		return view('allorders.allorders', ['categories' => $categories, 'products' => $products, 'orders' => $allOrders,
			'datas' => $datas]);

	}



}
