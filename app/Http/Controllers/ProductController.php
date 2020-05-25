<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;
class ProductController extends Controller
{
    public function themproduct() {
    	$message = Session::get('admin_id');
    	if ($message) {
    		$cate_product = DB::table('tbl_category_product')->orderby('category_id')->get();
    		$brand_product = DB::table('tbl_brand')->orderby('brand_id')->get();
    		return view('pages.addproduct')->with('cate_product',$cate_product)->with('brand_product',$brand_product); 
    	}
    	else {
    		Session::put('sign_noti','Login First');
    		return redirect('/admin');
    	}
    }

    public function xemproduct() {
    	$message = Session::get('admin_id');
    	if ($message) {
    		//$cate_product = DB::table('tbl_category_product')->orderby('id')->get();
    		//$brand_product = DB::table('tbl_brand')->orderby('id')->get();
    		$product_data = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')->get();
    		$product_manager = view('pages.allproduct')->with('product_data',$product_data);
    		return view('admin_layout')->with('pages.allproduct',$product_manager); 
    	}
    	else {
    		Session::put('sign_noti','Login First');
    		return redirect('/admin');
    	}
    }

    public function saveproduct (Request $request) {
    		$data = array();
    		$data['product_name'] = $request->product_name;
    		$data['product_desc'] = $request->product_desc;
    		$data['product_status'] = $request->product_status;
    		$data['product_price'] = $request->product_price;
    		$data['product_content'] = $request->product_content;
    		$data['category_id'] = $request->category_id;
    		$data['brand_id'] = $request->brand_id;

    		//$data['product_image'] = $request->product_image;
    		$get_image = $request->file('product_image');
    		if ($get_image) {
    			$new_image = time().'.'.$get_image->getclientoriginalextension();
    			$get_image->move('upload/product',$new_image);
    			$data['product_image'] = $new_image;
    		}
    		else $data['product_image'] = '';
    		DB::table('tbl_product')->insert($data);
    		Session::put('product_noti','Thêm thành công');
    		return redirect()->back();  	
    }

    public function changeproductstatus($product_id) {
    	$message = Session::get('admin_id');
    	if ($message) {
    		$data = DB::table('tbl_product')->where('product_id',$product_id)->first();
    		if ($data->product_status > 0) DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=> 0]);
    		else DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=> 1]);
    		return redirect()->back();
    	}
    	else {
    		Session::put('sign_noti','Login First');
    		return redirect('/admin');
    	}
    }

    public function editproduct($product_id) {
    	$message = Session::get('admin_id');
    	if ($message) {
    		$cate_product = DB::table('tbl_category_product')->orderby('category_id')->get();
    		$brand_product = DB::table('tbl_brand')->orderby('brand_id')->get();
    		$edit_product_manager = DB::table('tbl_product')->where('product_id',$product_id)->get();
    		return view('pages.edit_product')->with('cate_product',$cate_product)->with('brand_product',$brand_product)->with('edit_product_manager',$edit_product_manager);
    	}
    	else {
    		Session::put('sign_noti','Login First');
    		return redirect('/admin');
    	}
    }

    public function updateproduct($product_id, Request $request) {
    	$data = array();
    	$data['product_name'] = $request->product_name;
    	$data['product_desc'] = $request->product_desc;
    	$data['product_status'] = $request->product_status;
    	$data['product_price'] = $request->product_price;
    	$data['product_content'] = $request->product_content;
    	$data['category_id'] = $request->category_id;
    	$data['brand_id'] = $request->brand_id;

    	$get_image = $request->file('product_image');
    		if ($get_image) {
    			$temp = DB::table('tbl_product')->where('product_id', $product_id)->first();
    			$old_image = $temp->product_image;
    			unlink ('upload/product/'.$old_image);
    			$new_image = time().'.'.$get_image->getclientoriginalextension();
    			$get_image->move('upload/product',$new_image);
    			$data['product_image'] = $new_image;
    		}
    	DB::table('tbl_product')->where('product_id', $product_id)->update($data);
    	Session::put('product_noti','Sửa thành công');
    	return redirect()->back();
    }

    public function deleteproduct($product_id) {
    	$message = Session::get('admin_id');
    	if ($message) {
    		$temp = DB::table('tbl_product')->where('product_id', $product_id)->first();
    		$old_image = $temp->product_image;
    		if ($old_image) unlink ('upload/product/'.$old_image);
    		DB::table('tbl_product')->where('product_id', $product_id)->delete();
    		return redirect()->back();
    	}
    	else {
    		Session::put('sign_noti','Login First');
    		return redirect('/admin');
    	}
    }
}
