<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Products;
//use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;


class ProductController extends Controller
{


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



	function add(Request $request){

		$name = $request->post('name');
		$category = $request->post('category');
		$price = $request->post('price');
		$description = $request->post('description');



		$product = Products::query()->where('name', $name)->get();

		if(sizeof($product) == 0){


			$newProduct = Products::create([

				'name' => $name,
				'category' => $category,
				'price' => $price,
				'description' => $description

			]);

		


			if($request->file()){


				$fileName = $newProduct->id . '.jpg';
				$filePath = $request->file('picture')->storeAs('uploads', $fileName, 'public');


//				$manager = new ImageManager(array('driver' => 'gd'));
//
//
//				$image = $manager->make('/public/storage/uploads/' . $fileName)->resize(200, null, function ($constraint) {
//
//					$constraint->aspectRatio();
//				});


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
