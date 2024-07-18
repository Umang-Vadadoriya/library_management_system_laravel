<x-header />
<div class="container-fluid py-4" style="min-height: 700px;">
    <h1>Location Rack Management</h1>

    <ol class="breadcrumb mt-4 mb-4 bg-light p-2 border">
        <li class="breadcrumb-item"><a href="{{ URL::to('admin/') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ URL::to('admin/rack') }}">Location Rack Management</a></li>
        <li class="breadcrumb-item active">Edit Location Rack</li>
    </ol>
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-user-edit"></i> Edit Location Rack Details
                </div>
                <div class="card-body">
                    @isset($message)
                        @if ($message != '')
                            <div class="alert alert-danger">
                                <ul>{!! $message !!}</ul>
                            </div>
                        @endif
                    @endisset
                    <form method="post" action="rack_update">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Location Rack Name</label>
                            <input type="text" name="location_rack_name" id="location_rack_name" class="form-control"
                                value="{{ $rack_row[0]['location_rack_name'] }}" />
                        </div>

                        <div class="mt-4 mb-0">
                            <input type="hidden" name="location_rack_id" value="{{ $rack_row[0]['location_rack_id'] }}" />
                            <input type="submit" name="edit_location_rack" class="btn btn-primary" value="Edit" />
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<x-footer />
