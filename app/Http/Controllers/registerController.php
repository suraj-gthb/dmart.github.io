<?php

namespace App\Http\Controllers;

use App\Models\tbl_admin;
use App\Models\tbl_customer;
use Illuminate\Http\Request;

class registerController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'first-name_txt' => 'required',
            'last-name_txt' => 'required',
            'email_txt' => 'required',
            'mobile_txt' => 'required',
            'password_txt' => 'required',
            'password-confirm_txt' => 'required_with:password_txt|same:password_txt'
        ]);


        $firstname = $request->get('first-name_txt');
        $lastname = $request->get('last-name_txt');
        $email = $request->get('email_txt');
        $mobile = $request->get('mobile_txt');
        $password = $request->get('password_txt');

        $admin = new tbl_admin([
            'a_name' => $firstname . ' ' . $lastname,
            'a_email' => $email,
            'a_mobile' => $mobile,
            'a_password' => $password
        ]);
        $admin->save();
        echo '<script>alert("Registration Successfully!");window.location.href="login";</script>';
        //echo '<script>Swal.fire({title: "Done!", text: "Registration Succesfully!", icon: "success"}).then(function() {window.location.href="login";});</script>';
    }

    // customer registration
    public function c_register(Request $request)
    {
        $request->validate([
            'first-name_txt' => 'required',
            'last-name_txt' => 'required',
            'email_txt' => 'required',
            'mobile_txt' => 'required',
            'password_txt' => 'required',
            'confirm-password_txt' => 'required_with:password_txt|same:password_txt'
        ]);


        $firstname = $request->get('first-name_txt');
        $lastname = $request->get('last-name_txt');
        $email = $request->get('email_txt');
        $mobile = $request->get('mobile_txt');
        $password = $request->get('password_txt');

        $checkCustomer = tbl_customer::where('c_email', $email)->first();
        if($checkCustomer!=null){
            echo '<script>alert("Email already used!");window.location.href="sign-up";</script>';
        }else{
        $customer = new tbl_customer([
            'c_first_name' => $firstname,
            'c_last_name' => $lastname,
            'c_email' => $email,
            'c_mobile' => $mobile,
            'c_password' => $password
        ]);
        $customer->save();
        echo '<script>alert("Registration Successfully!");window.location.href="sign-in";</script>';
    }
        //echo '<script>Swal.fire({title: "Done!", text: "Registration Succesfully!", icon: "success"}).then(function() {window.location.href="login";});</script>';
    }
}
