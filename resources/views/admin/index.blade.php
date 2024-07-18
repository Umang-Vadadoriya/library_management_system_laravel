<x-header />

<style>
    .card {
        transition: ease-in-out 0.2s;
    }

    .card:hover {
        transform: scale(1.02);
        box-shadow: 4px 4px #676c6c;
    }
</style>
<div class="container-fluid py-4">
    <h1 class="mb-5">Dashboard</h1>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <h1 class="text-center">
                        {{-- <?php echo Count_total_issue_book_number($conn); ?> --}}
                    </h1>
                    <h5 class="text-center">Total Book Issue</h5>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    <h1 class="text-center">
                        {{-- <?php echo Count_total_returned_book_number($conn); ?> --}}
                    </h1>
                    <h5 class="text-center">Total Book Returned</h5>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">
                    <h1 class="text-center">
                        {{-- <?php echo Count_total_not_returned_book_number($conn); ?> --}}
                    </h1>
                    <h5 class="text-center">Total Book Not Return</h5>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <h1 class="text-center">
                        <span style="font-family: DejaVu Sans;">&#8377;</span>
                        {{-- <?php echo Count_total_fines_received($conn); ?> --}}
                    </h1>
                    <h5 class="text-center">Total Fines Received</h5>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <h1 class="text-center">
                        {{-- <?php echo Count_total_book_number($conn); ?> --}}
                    </h1>
                    <h5 class="text-center">Total Book</h5>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">
                    <h1 class="text-center">
                        {{-- <?php echo Count_total_author_number($conn); ?> --}}
                    </h1>
                    <h5 class="text-center">Total Author</h5>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    <h1 class="text-center">
                        {{-- <?php echo Count_total_category_number($conn); ?> --}}
                    </h1>
                    <h5 class="text-center">Total Category</h5>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <h1 class="text-center">
                        {{-- <?php echo Count_total_location_rack_number($conn); ?> --}}
                    </h1>
                    <h5 class="text-center">Total Location Rack</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<x-footer />
