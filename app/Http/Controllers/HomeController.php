<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;
class HomeController extends Controller
{
    public function index() {
    	$cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id')->get();
    	$brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id')->get();

    	$product_data = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')->where('product_status','1')->where('brand_status','1')->where('category_status','1')->orderby('product_id')->get();
    	return view('pages.home')->with('cate_product',$cate_product)->with('brand_product',$brand_product)->with('product_data',$product_data);
    }

   
}
