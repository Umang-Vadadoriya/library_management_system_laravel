<x-header />
<div class="d-flex align-items-center justify-content-center" style="height:74vh;">
    <div class="col-md-6">

        {{--
        <?php
        
        if ($message != '') {
            echo '<div class="alert alert-danger"><ul>' . $message . '</ul></div>';
        }
        
        ?> 
        --}}

        <div class="card">
            <div class="card-header fs-5">User Login</div>
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="text" name="user_email_address" id="user_email_address" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="user_password" id="user_password" class="form-control" />
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                        <input type="submit" name="login_button" class="btn btn-primary" value="Login" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<x-footer />
