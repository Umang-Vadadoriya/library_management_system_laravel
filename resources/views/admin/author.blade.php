<x-header />

<div class="container-fluid py-4" style="min-height: 700px;">
    <h1>Author Management</h1>

    <ol class="breadcrumb mt-4 mb-4 bg-light p-2 border">
        <li class="breadcrumb-item"><a href="{{ URL::to('admin/') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Author Management</li>
    </ol>

    @isset($msg)
        {!! $msg !!}
    @endisset

    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6">
                    <i class="fas fa-table me-1"></i> Author Management
                </div>
                <div class="col col-md-6" align="right">
                    <a href="{{ URL::to('admin/author/add') }}" class="btn btn-success btn-sm">Add</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Author Name</th>
                        <th>Status</th>
                        <th>Created On</th>
                        <th>Updated On</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Author Name</th>
                        <th>Status</th>
                        <th>Created On</th>
                        <th>Updated On</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>

                    @if (count($result_show) > 0)
                        @foreach ($result_show as $row)
                            @php
                                $statusSpan = '';
                                $statusButton = '';
                                $link = 'admin/author/edit/' . $row['author_id'];
                                if ($row['author_status'] == 'Enable') {
                                    $statusSpan = '<div class="badge bg-success">Enable</div>';
                                    $statusButton .= '<button type="button" name="switch_button" class="btn btn-warning btn-sm" onclick="switch_data(`' . $row['author_id'] . '`, `' . $row['author_status'] . '`)">Disable</button>';
                                } else {
                                    $statusSpan = '<div class="badge bg-danger">Disable</div>';
                                    $statusButton .= '<button type="button" name="switch_button" class="btn btn-success btn-sm" onclick="switch_data(`' . $row['author_id'] . '`, `' . $row['author_status'] . '`)">Enable</button>';
                                }
                                $statusButton .= ' <a class="btn btn-sm btn-danger" onclick="delete_data(`' . $row['author_id'] . '`)">Delete</a>';
                            @endphp

                            <tr>
                                <td>{{ $row['author_name'] }}</td>
                                <td>{!! $statusSpan !!}</td>
                                <td>{{ $row['author_created_on'] }}</td>
                                <td>{{ $row['author_updated_on'] }}</td>
                                <td><a href="{{ URL::to($link) }}" class="btn btn-sm btn-primary">Edit</a>
                                    {!! $statusButton !!}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="text-center">No Data Found</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Script To Switch Status -->
    <script>
        function switch_data(code, status) {
            var new_status = "Enable";

            if (status == "Enable") {
                new_status = "Disable";
            }

            if (confirm("Are you sure you want to " + new_status + " this Author?")) {
                window.location.href = "author/edit/" + code + "/" + new_status + "";
            }
        }

        function delete_data(code) {


            if (confirm("Are you sure you want to Delete this Author?")) {
                window.location.href = "author/delete/" + code;
            }
        }
    </script>

</div>

<x-footer />
