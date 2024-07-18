<x-header />
<div class="container-fluid py-4" style="min-height: 700px;">
    <h1>Author Management</h1>

    <ol class="breadcrumb mt-4 mb-4 bg-light p-2 border">
        <li class="breadcrumb-item"><a href="{{ URL::to('admin/') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ URL::to('admin/author') }}">Author Management</a></li>
        <li class="breadcrumb-item active">Edit Author</li>
    </ol>
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-user-edit"></i> Edit Author Details
                </div>
                <div class="card-body">
                    @isset($message)
                        @if ($message != '')
                            <div class="alert alert-danger">
                                <ul>{!! $message !!}</ul>
                            </div>
                        @endif
                    @endisset
                    <form method="post" action="author_update">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Author Name</label>
                            <input type="text" name="author_name" id="author_name" class="form-control"
                                value="{{ $author_row[0]['author_name'] }}" />
                        </div>

                        <div class="mt-4 mb-0">
                            <input type="hidden" name="author_id" value="{{ $author_row[0]['author_id'] }}" />
                            <input type="submit" name="edit_author" class="btn btn-primary" value="Edit" />
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<x-footer />
