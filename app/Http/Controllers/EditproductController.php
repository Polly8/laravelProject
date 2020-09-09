<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Products;
use Illuminate\Http\Request;

class EditproductController extends Controller
{


	function index(){

		$id = htmlspecialchars($_GET['id']);


		$item = Products::query()->where('id', $id)->first();


		$item['name'] = htmlspecialchars($_GET['name']);
		$item['category'] = htmlspecialchars($_GET['category']);
		$item['price'] = htmlspecialchars($_GET['price']);
		$item['description'] = htmlspecialchars($_GET['description']);

		$item->save();


		$categories = Categories::all();
		$products = Products::all();


		return view('home', ['categories' => $categories, 'products' => $products]);
	}

}
