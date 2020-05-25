<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;
class CategoryProductController extends Controller
{
    public function themcategory() {
    	$message = Session::get('admin_id');
    	if ($message) {
    		return view('pages.addcategory'); 
    	}
    	else {
    		Session::put('sign_noti','Login First');
    		return redirect('/admin');
    	}
    }

    public function xemcategory() {
    	$message = Session::get('admin_id');
    	if ($message) {
    		$category_data = DB::table('tbl_category_product')->get();
    		$category_manager = view('pages.allcategory')->with('category_data',$category_data);
    		return view('admin_layout')->with('pages.allcategory',$category_manager); 
    	}
    	else {
    		Session::put('sign_noti','Login First');
    		return redirect('/admin');
    	}
    }

    public function savecategory (Request $request) {
    		$data = array();
    		$data['category_name'] = $request->category_name;
    		$data['category_desc'] = $request->category_desc;
    		$data['category_status'] = $request->category_status;

    		DB::table('tbl_category_product')->insert($data);
    		Session::put('cata_noti','Thêm thành công');
    		return redirect()->back();
    }

    public function changecategorystatus($category_product_id) {
    	$message = Session::get('admin_id');
    	if ($message) {
    		$data = DB::table('tbl_category_product')->where('category_id',$category_product_id)->first();
    		if ($data->category_status > 0) DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=> 0]);
    		else DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=> 1]);
    		return redirect()->back();
    	}
    	else {
    		Session::put('sign_noti','Login First');
    		return redirect('/admin');
    	}
    }

    public function editcategory($category_product_id) {
    	$message = Session::get('admin_id');
    	if ($message) {
    		$edit_category_data = DB::table('tbl_category_product')->where('category_id', $category_product_id)->get();
    		$edit_category_manager = view('pages.edit_category_product')->with('edit_category_data',$edit_category_data);
    		return view('admin_layout')->with('pages.edit_category_product',$edit_category_manager); 
    	}
    	else {
    		Session::put('sign_noti','Login First');
    		return redirect('/admin');
    	}
    }

    public function updatecategory($category_product_id, Request $request) {
    	$data = array();
    	$data['category_name'] = $request->category_name;
    	$data['category_desc'] = $request->category_desc;
    	$data['category_status'] = $request->category_status;

    	DB::table('tbl_category_product')->where('category_id', $category_product_id)->update($data);
    	Session::put('cata_noti','Sửa thành công');
    	return redirect()->back();
    }

    public function deletecategory($category_product_id) {
    	$message = Session::get('admin_id');
    	if ($message) {
    		DB::table('tbl_category_product')->where('category_id', $category_product_id)->delete();
    		return redirect()->back();
    	}
    	else {
    		Session::put('sign_noti','Login First');
    		return redirect('/admin');
    	}
    }
}
