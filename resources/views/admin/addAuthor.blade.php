<x-header />

<div class="container-fluid py-4" style="min-height: 700px;">
    <h1>Author Management</h1>
    <ol class="breadcrumb mt-4 mb-4 bg-light p-2 border">
        <li class="breadcrumb-item"><a href="{{ URL::to('admin/') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ URL::to('admin/author') }}">Author Management</a></li>
        <li class="breadcrumb-item active">Add Author</li>
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
                    <i class="fas fa-user-plus"></i> Add New Author
                </div>
                <div class="card-body">

                    <form method="POST" action="author_insert">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Author Name</label>
                            <input type="text" name="author_name" id="author_name" class="form-control" />
                        </div>

                        <div class="mt-4 mb-0">
                            <input type="submit" name="add_author" value="Add" class="btn btn-success" />
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<x-footer />
