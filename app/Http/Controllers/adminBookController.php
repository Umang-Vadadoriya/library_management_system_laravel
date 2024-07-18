<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminBookController extends Controller
{
    //
    function book()
    {

        $data = DB::table('lms_book')->orderBy('book_name')->get();
        $result = json_decode($data, true);

        if (session('msg') != "" && session()->has('msg')) {
            $msg = session('msg');
            session()->pull('msg');
            return view('admin/book', ["result_show" => $result, "msg" => $msg]);
        }
        return view('admin/book', ["result_show" => $result]);

    }

    function book_add()
    {

        $author_data = DB::table('lms_author')->select('author_name')->where('author_status', 'Enable')->orderBy('author_name')->get();
        $author_data = json_decode($author_data, true);

        $category_data = DB::table('lms_category')->select('category_name')->where('category_status', 'Enable')->orderBy('category_name')->get();
        $category_data = json_decode($category_data, true);

        $location_rack_data = DB::table('lms_location_rack')->select('location_rack_name')->where('location_rack_status', 'Enable')->orderBy('location_rack_name')->get();
        $location_rack_data = json_decode($location_rack_data, true);

        $output_author_data = '<option value="">Select Author</option>';
        $output_category_data = '<option value="">Select Category</option>';
        $output_location_rack_data = '<option value="">Select Location Rack</option>';

        foreach ($author_data as $row) {
            $output_author_data .= '<option value="' . $row["author_name"] . '">' . $row["author_name"] . '</option>';
        }
        foreach ($category_data as $row) {
            $output_category_data .= '<option value="' . $row["category_name"] . '">' . $row["category_name"] . '</option>';
        }
        foreach ($location_rack_data as $row) {
            $output_location_rack_data .= '<option value="' . $row["location_rack_name"] . '">' . $row["location_rack_name"] . '</option>';
        }
        if (session()->has('message')) {
            $message = session('message');
            session()->pull('message');
            return view('admin/addBook', ["authorOutput" => $output_author_data, "categoryOutput" => $output_category_data, "rackOutput" => $output_location_rack_data, "Message" => $message]);
        }
        return view('admin/addBook', ["authorOutput" => $output_author_data, "categoryOutput" => $output_category_data, "rackOutput" => $output_location_rack_data]);

    }

    function book_edit($id)
    {
        $author_data = DB::table('lms_author')->select('author_name')->where('author_status', 'Enable')->orderBy('author_name')->get();
        $author_data = json_decode($author_data, true);

        $category_data = DB::table('lms_category')->select('category_name')->where('category_status', 'Enable')->orderBy('category_name')->get();
        $category_data = json_decode($category_data, true);

        $location_rack_data = DB::table('lms_location_rack')->select('location_rack_name')->where('location_rack_status', 'Enable')->orderBy('location_rack_name')->get();
        $location_rack_data = json_decode($location_rack_data, true);

        $output_author_data = '<option value="">Select Author</option>';
        $output_category_data = '<option value="">Select Category</option>';
        $output_location_rack_data = '<option value="">Select Location Rack</option>';

        foreach ($author_data as $row) {
            $output_author_data .= '<option value="' . $row["author_name"] . '">' . $row["author_name"] . '</option>';
        }
        foreach ($category_data as $row) {
            $output_category_data .= '<option value="' . $row["category_name"] . '">' . $row["category_name"] . '</option>';
        }
        foreach ($location_rack_data as $row) {
            $output_location_rack_data .= '<option value="' . $row["location_rack_name"] . '">' . $row["location_rack_name"] . '</option>';
        }

        if ($id != "") {
            $message = "";
            $row = DB::table('lms_book')->where('book_id', '=', $id)->get();
            $row = json_decode($row, true);
            if (session()->has('message')) {
                $message = session('message');
                session()->pull('message');
                
                return view('admin/editBook', ["book_row" => $row,"authorOutput" => $output_author_data, "categoryOutput" => $output_category_data, "rackOutput" => $output_location_rack_data, "Message" => $message]);

            }
            return view('admin/editBook', ["book_row" => $row,"authorOutput" => $output_author_data, "categoryOutput" => $output_category_data, "rackOutput" => $output_location_rack_data]);
        }

    }

    function book_edit_status($id, $status)
    {

        if (!empty($id)) {
            $formdata['book_status'] = $status;
            $formdata['book_updated_on'] = date('Y-m-d H:i:s');
            DB::table('lms_book')->where('book_id', $id)->update($formdata);
            if ($status === "Disable") {
                $msg = '<div class="alert alert-warning alert-dismissible fade show" role="alert">Book Status Change to Disable <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            } else {
                $msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">Book Status Change to Enable <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }
            session()->put('msg', $msg);
            return redirect('admin/book');
        }

    }

    function book_insert(Request $req)
    {

        $formdata = array();
        $message = "";

        if (empty($req->book_name)) {
            $message .= '<li>Book Name is required</li>';
        } else {
            $formdata['book_name'] = trim($req->book_name);
        }

        if (empty($req->book_category)) {
            $message .= '<li>Book Category is required</li>';
        } else {
            $formdata['book_category'] = trim($req->book_category);
        }

        if (empty($req->book_author)) {
            $message .= '<li>Book Author is required</li>';
        } else {
            $formdata['book_author'] = trim($req->book_author);
        }

        if (empty($req->book_location_rack)) {
            $message .= '<li>Book Location Rack is required</li>';
        } else {
            $formdata['book_location_rack'] = trim($req->book_location_rack);
        }

        if (empty($req->book_isbn_number)) {
            $message .= '<li>Book ISBN Number is required</li>';
        } else {
            $formdata['book_isbn_number'] = trim($req->book_isbn_number);
        }

        if (empty($req->book_no_of_copy)) {
            $message .= '<li>Book No. of Copy is required</li>';
        } else {
            $formdata['book_no_of_copy'] = trim($req->book_no_of_copy);
        }

        $json = DB::table('lms_book')->where('book_name', $req->book_name)->get();
        $data = json_decode($json, true);
        if (count($data) > 0)
        {
            $message = '<li>Book Name Already Exists</li>';
        }

        if ($message == "") {
            $formdata['book_status'] = "Enable";
            $formdata['book_added_on'] = date('Y-m-d H:i:s');

            DB::table('lms_book')->insert($formdata);
            $msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">New Author Added<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            session()->put('msg', $msg);
            return redirect('admin/book');
        }
        session()->put('message', $message);
        return redirect('admin/book/add');

    }

    function book_update(Request $req)
    {
        $formdata = array();
        $message = "";

        if (empty($req->book_id)) {
            $message .= '<li>Book ID is required</li>';
        } else {
            $formdata['book_id'] = trim($req->book_id);
        }

        if (empty($req->book_name)) {
            $message .= '<li>Book Name is required</li>';
        } else {
            $formdata['book_name'] = trim($req->book_name);
        }

        if (empty($req->book_category)) {
            $message .= '<li>Book Category is required</li>';
        } else {
            $formdata['book_category'] = trim($req->book_category);
        }

        if (empty($req->book_author)) {
            $message .= '<li>Book Author is required</li>';
        } else {
            $formdata['book_author'] = trim($req->book_author);
        }

        if (empty($req->book_location_rack)) {
            $message .= '<li>Book Location Rack is required</li>';
        } else {
            $formdata['book_location_rack'] = trim($req->book_location_rack);
        }

        if (empty($req->book_isbn_number)) {
            $message .= '<li>Book ISBN Number is required</li>';
        } else {
            $formdata['book_isbn_number'] = trim($req->book_isbn_number);
        }

        if (empty($req->book_no_of_copy)) {
            $message .= '<li>Book No. of Copy is required</li>';
        } else {
            $formdata['book_no_of_copy'] = trim($req->book_no_of_copy);
        }

        if ($message == "") {
            $formdata['book_updated_on'] = date('Y-m-d H:i:s');

            DB::table('lms_book')->where('book_id',$formdata['book_id'])->update($formdata);
            $msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">Book Data Edited <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            session()->put('msg', $msg);
            return redirect('admin/book');
        }
        session()->put('message', $message);
        return redirect('admin/book/edit/'.$req->book_id);

    }

    function book_delete($id)
    {

        if (!empty($id)) {
            DB::table('lms_book')->where('book_id', $id)->delete();
            $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">Book Data Deleted <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            session()->put('msg', $msg);
            return redirect('admin/book');
        }

    }
}
