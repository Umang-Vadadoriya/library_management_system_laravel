<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminAuthorController extends Controller
{
    //
    function author()
    {

        $data = DB::table('lms_author')->orderBy('author_name')->get();
        $result = json_decode($data, true);

        if (session('msg') != "" && session()->has('msg')) {
            $msg = session('msg');
            session()->pull('msg');
            return view('admin/author', ["result_show" => $result, "msg" => $msg]);
        }
        return view('admin/author', ["result_show" => $result]);

    }

    function author_add()
    {

        if (session()->has('message')) {
            $message = session('message');
            session()->pull('message');
            return view('admin/addAuthor', ["Message" => $message]);
        }
        return view('admin/addAuthor');

    }

    function author_edit($id)
    {

        if ($id != "") {
            $message = "";
            $row = DB::table('lms_author')->where('author_id', '=', $id)->get();
            $row = json_decode($row, true);
            if (session()->has('message')) {
                $message = session('message');
                session()->pull('message');
                return view('admin/editAuthor', ["author_row" => $row, "message" => $message]);
            }
            return view('admin/editAuthor', ["author_row" => $row]);
        }

    }

    function author_edit_status($id, $status)
    {

        if (!empty($id)) {
            $formdata['author_status'] = $status;
            $formdata['author_updated_on'] = date('Y-m-d H:i:s');
            DB::table('lms_author')->where('author_id', $id)->update($formdata);
            if ($status === "Disable") {
                $msg = '<div class="alert alert-warning alert-dismissible fade show" role="alert">Author Status Change to Disable <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            } else {
                $msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">Author Status Change to Enable <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }
            session()->put('msg', $msg);
            return redirect('admin/author');
        }

    }

    function author_insert(Request $req)
    {


        $formdata = array();
        $error = "";

        if (empty($_POST['author_name'])) {
            $error .= '<li>Author Name is required</li>';
        } else {
            $formdata['author_name'] = trim($_POST['author_name']);
        }

        if ($error == "") {
            $json = DB::table('lms_author')->where('author_name', $formdata['author_name'])->get();
            $data = json_decode($json, true);

            if (count($data) > 0) {
                $error = '<li>Author Name Already Exists</li>';
            } else {
                $formdata['author_status'] = "Enable";
                $formdata['author_created_on'] = date('Y-m-d H:i:s');

                DB::table('lms_author')->insert($formdata);
                $msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">New Author Added<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                session()->put('msg', $msg);
                return redirect('admin/author');
            }
        }
        session()->put('message', $error);
        return redirect('admin/author/add');

    }

    function author_update(Request $req)
    {


        $formdata = array();
        $message = "";
        if (!empty($req->author_name)) {
            $formdata['author_name'] = $req->author_name;
        } else {
            $message .= "<li>Author Name Required...!!!</li>";
        }

        if (!empty($req->author_id)) {
            $formdata['author_id'] = $req->author_id;
        } else {
            $message .= "<li>Author ID Required...!!!</li>";
        }

        $json = DB::table('lms_author')->where('author_name', $formdata['author_name'])->get();
        $data = json_decode($json, true);

        if (count($data) > 0) {
            $message .= '<li>Author Name Already Exists</li>';
        }

        if ($message == "") {
            $formdata['author_updated_on'] = date('Y-m-d H:i:s');
            DB::table('lms_author')->where("author_id", "=", $formdata['author_id'])->update($formdata);

            $msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">Author Data Edited <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            session()->put('msg', $msg);
            return redirect('admin/author');
        } else {
            session()->put('message', $message);
            return redirect('admin/author/edit/' . $formdata['author_id']);
        }

    }

    function author_delete($id)
    {

        if (!empty($id)) {
            DB::table('lms_author')->where('author_id', $id)->delete();
            $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">Author Data Deleted <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            session()->put('msg', $msg);
            return redirect('admin/author');
        }

    }
}