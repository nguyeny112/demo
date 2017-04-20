<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Brand;
use App\Product;

class IndexController extends Controller
{
    public function index(){
    	$brand = Brand::all();
    	$totalProduct = Product::all()->count();
    	return view('admin.index.index',['brand'=>$brand,'totalProduct'=>$totalProduct]);
    }
}
