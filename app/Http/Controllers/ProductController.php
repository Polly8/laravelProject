<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{

	function index(){

	}


    function show($id){


		$categories = Categories::all();
		$products = Products::all();
		$item = Products::query()->find($id);

    	return view('product.product', ['categories' => $categories, 'products' => $products, 'item' => $item]);
	}



	function buy($id){


		$categories = Categories::all();
		$products = Products::all();
    	$item = Products::query()->find($id);

		return view('product.buy', ['categories' => $categories, 'products' => $products, 'item' => $item]);

	}


	function edit($id){

		$categories = Categories::all();
		$products = Products::all();
		$item = Products::query()->find($id);

		return view('product.edit', ['categories' => $categories, 'products' => $products, 'item' => $item]);

	}



	function add(){

		$name = htmlspecialchars($_POST['name']);
		$category = htmlspecialchars($_POST['category']);
		$price = htmlspecialchars($_POST['price']);
		$description = htmlspecialchars($_POST['description']);



		$product = Products::query()->where('name', $name)->get();

		if(sizeof($product) == 0){


			$newProduct = Products::create([

				'name' => $name,
				'category' => $category,
				'price' => $price,
				'description' => $description

			]);


			$postId = $newProduct['id'];


			if (!empty($_FILES['picture']['tmp_name'])) {


				//dd($_SERVER['DOCUMENT_ROOT']);

				$fileContent = file_get_contents($_FILES['picture']['tmp_name']);
				(file_put_contents('C:/OSPanel/images/'. $postId . '.png', $fileContent));


			}

		}


		$categories = Categories::all();
		$products = Products::all();


		return view('home', ['categories' => $categories, 'products' => $products]);


	}



	function delete($id){


		$items = Products::query()->where('id', $id)->delete();

		$categories = Categories::all();
		$products = Products::all();


		return view('home', ['categories' => $categories, 'products' => $products]);

	}





}
