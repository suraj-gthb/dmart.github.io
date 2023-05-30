<?php

namespace App\Http\Controllers;

use App\Models\tbl_admin;
use App\Models\tbl_customer;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class loginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(Request $request){
        $request->validate([
            'email_txt' => 'required',
            'password_txt' => 'required'
        ]);

        $email = $request->get('email_txt');
        $password = $request->get('password_txt');

        $admins = tbl_admin::where('a_email',$email)->select('*')->first();
        if($admins==''){
            return back()->with('message', 'Account Not Found!');
        }
        if($admins->a_password==$password){
            $request->session()->put('admin_id', $admins->id);
            $request->session()->put('admin_name', $admins->a_name);
            return redirect('dashboard');
        }else{
            return back()->with('message', 'Email or Password is incorrect!');
        }
    }

    public function logout(){
        session()->forget('admin_id');
        return redirect('login');
    }

    //customer login method
    public function c_login(Request $request){
        $request->validate([
            'email_txt' => 'required',
            'password_txt' => 'required'
        ]);

        $email = $request->get('email_txt');
        $password = $request->get('password_txt');

        $customers = tbl_customer::where('c_email',$email)->select('*')->first
        ();

        // echo $customers;
        // die();
        $customer_data = json_decode($customers);

        if($customers==''){
            return back()->with('message', 'Account Not Found!');
        }
        if($customers->c_password==$password){
            $request->session()->put('customer_id', $customers->id);
            $request->session()->put('customer_name', $customer_data->c_first_name);
            return redirect('/');
        }else{
            return back()->with('message', 'Email or Password is incorrect!');
        }
    }

    public function c_logout(){
        session()->flush();
        return redirect('/');
    }
}
