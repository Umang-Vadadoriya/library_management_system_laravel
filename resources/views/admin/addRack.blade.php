<x-header />

<div class="container-fluid py-4" style="min-height: 700px;">
    <h1>Location Rack Management</h1>
    <ol class="breadcrumb mt-4 mb-4 bg-light p-2 border">
        <li class="breadcrumb-item"><a href="{{ URL::to('admin/') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ URL::to('admin/rack') }}">Location Rack Management</a></li>
        <li class="breadcrumb-item active">Add Location Rack</li>
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
                    <i class="fas fa-user-plus"></i> Add New Location Rack
                </div>
                <div class="card-body">

                    <form method="POST" action="rack_insert">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Location Rack Name</label>
                            <input type="text" name="location_rack_name" id="author_name" class="form-control" />
                        </div>

                        <div class="mt-4 mb-0">
                            <input type="submit" name="add_location_rack" value="Add" class="btn btn-success" />
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<x-footer />
