<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function login_form() {
    	return view('admin_login');
    }

    public function dashboard() {
    	return view('pages.admin');
    }


    public function getdashboard(Request $request) {
    	$admin_email = $request->admin_email;
    	$admin_password = md5($request->admin_password);
        //echo $admin_email.' '. $admin_password;
    	$result = DB::table('tbl_admin')->where('admin_email', $admin_email)->where('admin_password',$admin_password)->first();
    	if ($result) {
    		Session::put('admin_name',$result->admin_name);
    		Session::put('admin_id',$result->id);
    		return view('admin_layout');
    	}
    	else {
    	    $message = "Wrong Email/Password";
    	    echo "<script type='text/javascript'>alert('$message');</script>";
    		session()->flash('noti', 'Wrong email/Passord');
    		Session::put('sign_noti','Wrong E-mail/Password');
    		return redirect()->back();
    	};
    }

    public function logout(Request $request) {
    	Session::put('admin_id',null);
    	Session::put('admin_name', null);
        Session::put('sign_noti','Log out thành công');
    	return redirect('admin');
    }


}
