<x-header />

<div class="container-fluid py-4" style="min-height: 700px;">
    <h1>Book Management</h1>
    <ol class="breadcrumb mt-4 mb-4 bg-light p-2 border">
        <li class="breadcrumb-item"><a href="{{ URL::to('admin/') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ URL::to('admin/book') }}">Book
                Management</a></li>
        <li class="breadcrumb-item active">Add Book</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            @isset($Message)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="list-unstyled">{!! $Message !!}</ul> <button type="button" class="btn-close"
                        data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endisset

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-user-plus"></i> Add New Book
                </div>
                <div class="card-body">
                    <form method="post" action="book_insert">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Book Name</label>
                                    <input type="text" name="book_name" id="book_name" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Select Author</label>
                                    <select name="book_author" id="book_author" class="form-control">
                                        {!!$authorOutput!!}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Select Category</label>
                                    <select name="book_category" id="book_category" class="form-control">
                                        {!!$categoryOutput!!}
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Select Location Rack</label>
                                    <select name="book_location_rack" id="book_location_rack" class="form-control">
                                        {!!$rackOutput!!}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Book ISBN Number</label>
                                    <input type="text" name="book_isbn_number" id="book_isbn_number"
                                        class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">No. of Copy</label>
                                    <input type="number" name="book_no_of_copy" id="book_no_of_copy" step="1"
                                        class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 mb-3 text-center">
                            <input type="submit" name="add_book" class="btn btn-success" value="Add" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<x-footer />
