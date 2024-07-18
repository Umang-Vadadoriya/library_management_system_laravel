<x-header />
<div class="container-fluid py-4" style="min-height: 700px;">
    <h1>Category Management</h1>

    <ol class="breadcrumb mt-4 mb-4 bg-light p-2 border">
        <li class="breadcrumb-item"><a href="{{ URL::to('admin/') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ URL::to('admin/category') }}">Category Management</a></li>
        <li class="breadcrumb-item active">Edit Category</li>
    </ol>
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-user-edit"></i> Edit Category Details
                </div>
                <div class="card-body">
                    @isset($message)
                        @if ($message != '')
                            <div class="alert alert-danger">
                                <ul>{!! $message !!}</ul>
                            </div>
                        @endif
                    @endisset
                    <form method="post" action="category_update">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Category Name</label>
                            <input type="text" name="category_name" id="category_name" class="form-control"
                                value="{{ $category_row[0]['category_name'] }}" />
                        </div>

                        <div class="mt-4 mb-0">
                            <input type="hidden" name="category_id" value="{{ $category_row[0]['category_id'] }}" />
                            <input type="submit" name="edit_category" class="btn btn-primary" value="Edit" />
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<x-footer />
