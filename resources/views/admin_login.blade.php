<x-header />

<div class="d-flex align-items-center justify-content-center" style="height:74vh;">

    <div class="col-md-6">

        @isset($Message)
            @php
                $message = explode('.', $Message);
                $message = array_slice($message, 0, count($message) - 1);
            @endphp

            <div class="alert alert-danger">
                <ul>
                    @foreach ($message as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endisset

        <div class="card">

            <div class="card-header fs-5">Admin Login</div>

            <div class="card-body">

                <form method="post" action="admin_login_function">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Email address</label>

                        <input type="text" name="admin_email" id="admin_email" class="form-control" />

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>

                        <input type="password" name="admin_password" id="admin_password" class="form-control" />

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
