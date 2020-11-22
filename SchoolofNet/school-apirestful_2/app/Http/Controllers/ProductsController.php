<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests\ProductsRequest as Request;
use App\Http\Resources\ProductsResource;

class ProductsController extends Controller
{	
	public function index()
	{			
		$minutes = \Carbon\Carbon::now()->addMinutes(10);
		$result = \Cache::remember('api::products', $minutes, function(){
			return ProductsResource::collection(Product::all());			
		});
		return $result;
	}

	public function store(Request $request)
	{		
		\Cache::forget('api::products'); //limpa o cache
		$data = $request->all();
		$data['user_id'] = \Auth::user()->id;
		return new ProductsResource(Product::create($data));
	}

	public function update(Request $request, Product $product)
	{		
		$product->update($request->all());
		return new ProductsResource($product);
	}

	public function show(Product $product)
	{		
		return new ProductsResource($product);
	}	

	public function destroy(Product $product)
	{
		$product->delete();
		return new ProductsResource($product);
	}
}
