<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminRackController extends Controller
{
    //
    function rack()
    {
        if (session()->has('admin_id')) {
            $data = DB::table('lms_location_rack')->orderBy('location_rack_name')->get();
            $result = json_decode($data, true);

            if (session('msg') != "" && session()->has('msg')) {
                $msg = session('msg');
                session()->pull('msg');
                return view('admin/rack', ["result_show" => $result, "msg" => $msg]);
            }
            return view('admin/rack', ["result_show" => $result]);
        } else {
            return redirect('/admin_login');
        }
    }

    function rack_add()
    {
        if (session()->has('admin_id')) {
            if (session()->has('message')) {
                $message = session('message');
                session()->pull('message');
                return view('admin/addRack', ["Message" => $message]);
            }
            return view('admin/addRack');
        } else
            return redirect('/');
    }

    function rack_edit($id)
    {
        if (session()->has('admin_id')) {
            if ($id != "") {
                $message = "";
                $row = DB::table('lms_location_rack')->where('location_rack_id', '=', $id)->get();
                $row = json_decode($row, true);
                if (session()->has('message')) {
                    $message = session('message');
                    session()->pull('message');
                    return view('admin/editRack', ["rack_row" => $row, "message" => $message]);
                }
                return view('admin/editRack', ["rack_row" => $row]);
            }
        } else
            return redirect('/');
    }

    function rack_edit_status($id, $status)
    {
        if (session()->has('admin_id')) {
            if (!empty($id)) {
                $formdata['location_rack_status'] = $status;
                $formdata['location_rack_updated_on'] = date('Y-m-d H:i:s');
                DB::table('lms_location_rack')->where('location_rack_id', $id)->update($formdata);
                if ($status === "Disable") {
                    $msg = '<div class="alert alert-warning alert-dismissible fade show" role="alert">Location Rack Status Change to Disable <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                } else {
                    $msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">Location Rack Status Change to Enable <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                }
                session()->put('msg', $msg);
                return redirect('admin/rack');
            }
        }
    }

    function rack_insert(Request $req)
    {
        if (session()->has('admin_id')) {

            $formdata = array();
            $error = "";

            if (empty($_POST['location_rack_name'])) {
                $error .= '<li>Location Rack Name is required</li>';
            } else {
                $formdata['location_rack_name'] = trim($_POST['location_rack_name']);
            }

            if ($error == "") {
                $json = DB::table('lms_location_rack')->where('location_rack_name', $formdata['location_rack_name'])->get();
                $data = json_decode($json, true);

                if (count($data) > 0) {
                    $error = '<li>Location Rack Name Already Exists</li>';
                } else {
                    $formdata['location_rack_status'] = "Enable";
                    $formdata['location_rack_created_on'] = date('Y-m-d H:i:s');

                    DB::table('lms_location_rack')->insert($formdata);
                    $msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">New Location Rack Added<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                    session()->put('msg', $msg);
                    return redirect('admin/rack');
                }
            }
            session()->put('message', $error);
            return redirect('admin/rack/add');
        } else
            return redirect('/');
    }

    function rack_update(Request $req)
    {
        if (session()->has('admin_id')) {

            $formdata = array();
            $message = "";
            if (!empty($req->location_rack_name)) {
                $formdata['location_rack_name'] = $req->location_rack_name;
            } else {
                $message .= "<li>Location Rack Name Required...!!!</li>";
            }

            if (!empty($req->location_rack_id)) {
                $formdata['location_rack_id'] = $req->location_rack_id;
            } else {
                $message .= "<li>Location Rack ID Required...!!!</li>";
            }

            $json = DB::table('lms_location_rack')->where('location_rack_name', $formdata['location_rack_name'])->get();
            $data = json_decode($json, true);

            if (count($data) > 0) {
                $message .= '<li>Location Rack Name Already Exists</li>';
            }

            if ($message == "") {
                $formdata['location_rack_updated_on'] = date('Y-m-d H:i:s');
                DB::table('lms_location_rack')->where("location_rack_id", "=", $formdata['location_rack_id'])->update($formdata);

                $msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">Location Rack Data Edited <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                session()->put('msg', $msg);
                return redirect('admin/rack');
            } else {
                session()->put('message', $message);
                return redirect('admin/rack/edit/' . $formdata['location_rack_id']);
            }
        }
    }

    function rack_delete($id)
    {
        if (session()->has('admin_id')) {
            if (!empty($id)) {
                DB::table('lms_location_rack')->where('location_rack_id', $id)->delete();
                $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">Location Rack Data Deleted <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                session()->put('msg', $msg);
                return redirect('admin/rack');
            }
        }
    }
}