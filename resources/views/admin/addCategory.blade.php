<x-header />

<div class="container-fluid py-4" style="min-height: 700px;">
    <h1>Category Management</h1>
    <ol class="breadcrumb mt-4 mb-4 bg-light p-2 border">
        <li class="breadcrumb-item"><a href="{{ URL::to('admin/') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ URL::to('admin/category') }}">Category Management</a></li>
        <li class="breadcrumb-item active">Add Category</li>
    </ol>
    <div class="row">
        <div class="col-md-6">
            @isset($Message)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="list-unstyled">{!! $Message !!}</ul> <button type="button" class="btn-close"
                        data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endisset

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-user-plus"></i> Add New Category
                </div>
                <div class="card-body">

                    <form method="POST" action="category_insert">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Category Name</label>
                            <input type="text" name="category_name" id="category_name" class="form-control" />
                        </div>

                        <div class="mt-4 mb-0">
                            <input type="submit" name="add_category" value="Add" class="btn btn-success" />
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<x-footer />
