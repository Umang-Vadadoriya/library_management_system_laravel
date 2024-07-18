<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class loginController extends Controller
{
    //

    function admin_index()
    {
        if (session()->has('admin_id'))
            return view('admin/index');
        else
            return redirect('/');
    }

    function admin_login_function(Request $req)
    {

        $formdata = array();
        $message = "";

        if (empty($req->admin_email)) {
            $message .= 'Email Address is required.';
        } else {
            if (!filter_var($req->admin_email, FILTER_VALIDATE_EMAIL)) {
                $message .= 'Invalid Email Address.';
            } else {
                $formdata['admin_email'] = trim($req->admin_email);
            }
        }

        if (empty($req->admin_password)) {
            $message .= 'Password is required.';
        } else {
            $formdata['admin_password'] = $req->admin_password;
        }

        if ($message == '') {
            $result = DB::table('lms_admin')->where('admin_email', '=', $formdata['admin_email'])->get();

            if (count($result) > 0) {
                foreach ($result as $row) {
                    if ($row->admin_password == $formdata['admin_password']) {
                        session()->put("admin_id", $row->admin_email);
                        return redirect('admin/');
                    } else {
                        $message = 'Wrong Password.';
                    }
                }
            } else {
                $message = 'Wrong Email Address.';
            }
        }

        return view('/admin_login', ["Message" => $message]);

    }

    function user_login_function(Request $req){
        print_r( $req->input());
    }

    function log_out_function()
    {
        session()->flush();
        return redirect('/');
    }
}
