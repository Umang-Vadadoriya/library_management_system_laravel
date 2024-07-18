@php($cur_date = date('Y'))

@if (session()->has('admin_id'))
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Library Management System{{ $cur_date }}
                </div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
    </div>
    </div>
@endif
@if (!session()->has('admin_id'))
    <footer class="pt-3 mt-4 text-muted text-center border-top">
        All right Reserved of <a href="{{ URL::to('/') }}">Library Management System</a> &copy; {{ $cur_date }}
    </footer>
    </div>
    </main>
@endif

<script src="{{ asset('asset/js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('asset/js/scripts.js') }}"></script>
<script src="{{ asset('asset/js/simple-datatables@latest.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('asset/js/datatables-simple-demo.js') }}"></script>

</body>

</html>
