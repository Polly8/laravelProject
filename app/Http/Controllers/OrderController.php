<?php

namespace App\Http\Controllers;

use App\Buying;
use App\Categories;
use App\Mail\Order;

use App\Products;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{


	function index(){

		$name = htmlspecialchars($_GET['name']);
		$email = htmlspecialchars($_GET['email']);
		$productId = htmlspecialchars($_GET['id']);


		Mail::to(\Auth::user())->send(new Order(['name' => $name, 'email' => $email, 'product' => $productId]));

		Buying::create([

			'customer_name' => $name,
			'email' => $email,
			'product_id' => $productId

		]);


		$categories = Categories::all();
		$products = Products::all();

		return view('home', ['categories' => $categories, 'products' => $products]);

	}

}
