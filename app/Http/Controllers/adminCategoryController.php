<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminCategoryController extends Controller
{
    //
    function category()
    {
        $data = DB::table('lms_category')->orderBy('category_name')->get();
        $result = json_decode($data, true);

        if (session('msg') != "" && session()->has('msg')) {
            $msg = session('msg');
            session()->pull('msg');
            return view('admin/category', ["result_show" => $result, "msg" => $msg]);
        }
        return view('admin/category', ["result_show" => $result]);
    }

    function category_add()
    {

        if (session()->has('message')) {
            $message = session('message');
            session()->pull('message');
            return view('admin/addCategory', ["Message" => $message]);
        }
        return view('admin/addCategory');

    }

    function category_edit($id)
    {

        if ($id != "") {
            $message = "";
            $row = DB::table('lms_category')->where('category_id', '=', $id)->get();
            $row = json_decode($row, true);
            if (session()->has('message')) {
                $message = session('message');
                session()->pull('message');
                return view('admin/editCategory', ["category_row" => $row, "message" => $message]);
            }
            return view('admin/editCategory', ["category_row" => $row, "message" => $message]);
        }

    }

    function category_edit_status($id, $status)
    {

        if (!empty($id)) {
            $formdata['category_status'] = $status;
            $formdata['category_updated_on'] = date('Y-m-d H:i:s');
            DB::table('lms_category')->where('category_id', $id)->update($formdata);
            if ($status === "Disable") {
                $msg = '<div class="alert alert-warning alert-dismissible fade show" role="alert">Category Status Change to Disable <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            } else {
                $msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">Category Status Change to Enable <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }
            session()->put('msg', $msg);
            return redirect('admin/category');
        }

    }

    function category_insert(Request $req)
    {


        $formdata = array();
        $error = "";

        if (empty($_POST['category_name'])) {
            $error .= '<li>Category Name is required</li>';
        } else {
            $formdata['category_name'] = trim($_POST['category_name']);
        }

        if ($error == "") {
            $json = DB::table('lms_category')->where('category_name', $formdata['category_name'])->get();
            $data = json_decode($json, true);

            if (count($data) > 0) {
                $error = '<li>Category Name Already Exists</li>';
            } else {
                $formdata['category_status'] = "Enable";
                $formdata['category_created_on'] = date('Y-m-d H:i:s');

                DB::table('lms_category')->insert($formdata);
                $msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">New Category Added<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                session()->put('msg', $msg);
                return redirect('admin/category');
            }
        }
        session()->put('message', $error);
        return redirect('admin/category/add');

    }

    function category_update(Request $req)
    {


        $formdata = array();
        $message = "";
        if (!empty($req->category_name)) {
            $formdata['category_name'] = $req->category_name;
        } else {
            $message .= "<li>Category Name Required...!!!</li>";
        }

        if (!empty($req->category_id)) {
            $formdata['category_id'] = $req->category_id;
        } else {
            $message .= "<li>Category ID Required...!!!</li>";
        }

        $json = DB::table('lms_category')->where('category_name', $formdata['category_name'])->get();
        $data = json_decode($json, true);

        if (count($data) > 0) {
            $message .= '<li>Category Name Already Exists</li>';
        }

        if ($message == "") {
            $formdata['category_updated_on'] = date('Y-m-d H:i:s');
            DB::table('lms_category')->where("category_id", "=", $formdata['category_id'])->update($formdata);

            $msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">Category Data Edited <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            session()->put('msg', $msg);
            return redirect('admin/category');

        } else {
            session()->put('message', $message);
            return redirect('admin/category/edit/' . $formdata['category_id']);
        }

    }

    function category_delete($id)
    {

        if (!empty($id)) {
            DB::table('lms_category')->where('category_id', $id)->delete();
            $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">Category Data Deleted <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            session()->put('msg', $msg);
            return redirect('admin/category');
        }

    }
}