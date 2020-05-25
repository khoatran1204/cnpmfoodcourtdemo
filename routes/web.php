<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');

Route::get('/trang_chu', 'HomeController@index');

Route::get('/admin', 'AdminController@login_form');

Route::get('admin/dashboard', 'AdminController@dashboard');

Route::post('/admin_dashboard', 'AdminController@getdashboard'); //Ktra pass

Route::get('/logout','AdminController@logout');

Route::post('/admin_dashboard', 'AdminController@getdashboard');

//Category
Route::get('/admin/themcategory', 'CategoryProductController@themcategory');

Route::get('/admin/lietkecategory', 'CategoryProductController@xemcategory');

Route::post('admin/save_category','CategoryProductController@savecategory'); // hàm thêm của themsanpham

Route::get('admin/change_category_status/{category_product_id}','CategoryProductController@changecategorystatus');

Route::get('admin/edit_category_product/{category_product_id}','CategoryProductController@editcategory');

Route::post('admin/update_category_product/{category_product_id}','CategoryProductController@updatecategory');

Route::get('admin/delete_category_product/{category_product_id}','CategoryProductController@deletecategory');

//Brand 

Route::get('/admin/thembrand', 'BrandProductController@thembrand');

Route::get('/admin/lietkebrand', 'BrandProductController@xembrand');

Route::post('admin/save_brand','BrandProductController@savebrand'); 

Route::get('admin/change_brand_status/{brand_product_id}','BrandProductController@changebrandstatus');

Route::get('admin/edit_brand_product/{brand_product_id}','BrandProductController@editbrand');

Route::post('admin/update_brand_product/{brand_product_id}','BrandProductController@updatebrand');

Route::get('admin/delete_brand_product/{brand_product_id}','BrandProductController@deletebrand');

//Product

Route::get('/admin/themproduct', 'ProductController@themproduct');

Route::get('/admin/lietkeproduct', 'ProductController@xemproduct');

Route::post('admin/save_product','ProductController@saveproduct'); 

Route::get('admin/change_product_status/{product_id}','ProductController@changeproductstatus');

Route::get('admin/edit_product/{product_id}','ProductController@editproduct');

Route::post('admin/update_product/{product_id}','ProductController@updateproduct');

Route::get('admin/delete_product/{product_id}','ProductController@deleteproduct');


//Home

Route::get('/xemcategory/{$category_product_id}', 'HomeController@viewcategorybyid');
