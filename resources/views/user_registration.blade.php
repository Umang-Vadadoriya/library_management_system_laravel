<x-header />

<div class="d-flex align-items-center justify-content-center mt-5 mb-5" style="min-height:700px;">
    <div class="col-md-6">


        @isset($message)
            @if($message != '')
                <div class="alert alert-danger">
                    <ul>{{ $message }}</ul>
                </div>
            @endif
        @endisset

        @isset($success)
            @if($success != '')
                <div class="alert alert-success">
                    <ul>{{ $success }}</ul>
                </div>
            @endif
        @endisset


        <div class="card">
            <div class="card-header">New User Registration</div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="user_login_function">
                    @csrf
                    <div class=" mb-3">
                        <label class="form-label">Email address</label>
                        <input type="text" name="user_email_address" id="user_email_address" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="user_password" id="user_password" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">User Name</label>
                        <input type="text" name="user_name" class="form-control" id="user_name" value="" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">User Contact No.</label>
                        <input type="text" name="user_contact_no" id="user_contact_no" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">User Address</label>
                        <textarea name="user_address" id="user_address" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">User Photo</label><br />
                        <input type="file" name="user_profile" id="user_profile" />
                        <br />
                        <span class="text-muted">Only .jpg & .png image allowed. Image height & width must be
                            same.</span>
                    </div>
                    <div class="text-center mt-4 mb-2">
                        <input type="submit" name="register_button" class="btn btn-primary" value="Register" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<x-footer />
