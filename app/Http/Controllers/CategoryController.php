<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Products;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


	function show($title){


		$categories = Categories::all();
		$products = Products::all();
		$items = Products::query()->where('category', $title)->get();


		return view('category.category', ['categories' => $categories, 'products' => $products, 'items' => $items]);
	}


	function add(Request $request){

		$newcategory = $request->get('newcategory');
		$description = $request->get('description');

		$category = Categories::query()->where('name', $newcategory)->get();


		if(sizeof($category) == 0){

			Categories::create([

				'name' => $newcategory,
				'description' => $description

			]);

		}


		$categories = Categories::all();
		$products = Products::all();


		return view('home', ['categories' => $categories, 'products' => $products]);

	}



	function delete($title){

		$items = Categories::query()->where('name', $title)->delete();

		$categories = Categories::all();
		$products = Products::all();


		return view('home', ['categories' => $categories, 'products' => $products]);

	}



	function edit($title, Request $request){

		$item = Categories::where('name', $title)->firstOrFail();


		$item->name = $request->get('name');
		$item->description = $request->get('description');

		$item->save();


		$categories = Categories::all();
		$products = Products::all();


		return view('home', ['categories' => $categories, 'products' => $products]);

	}


}
