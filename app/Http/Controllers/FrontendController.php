<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class FrontendController extends Controller
{
	public function index()
	{
		$productNews = Product::orderBy('id', 'DESC')->where('status', 1)->limit(8)->get();
		$productHots = Product::where('pro_hot', 1)->where('status', 1)->limit(8)->get();
		return view('frontend.index', ['productNews' => $productNews, 'productHots' => $productHots]);
		
	}
    // tìm kiếm sản phảma
	public function formSearch(Request $request){
		if ($request -> key) {
			$key = $request -> key;
			$products = Product::where('pro_name', 'like','%'.$request -> key.'%')->limit(3)->get();
			$html = view('layouts.form_search', compact('products'))->render();
			return response()-> json(['data' => $html] );
		}
	}
	public function lien_he()
    {
        return view('frontend.contact');
    }
}
