<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Products;
use Illuminate\Http\Request;

class EditproductController extends Controller
{


	function index(Request $request){

		$id = $request->get('id');


		$item = Products::query()->where('id', $id)->first();


		$item['name'] = $request->get('name');
		$item['category'] = $request->get('category');
		$item['price'] = $request->get('price');
		$item['description'] = $request->get('description');

		$item->save();


		$categories = Categories::all();
		$products = Products::all();


		return view('home', ['categories' => $categories, 'products' => $products]);
	}

}
