<head>
    <meta charset="UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Library Management</title>

    <!-- <link rel="stylesheet" href="{{ asset('asset/css/styles.css') }}"> -->
    <link href="{{ asset('asset/css/simple-datatables-style.css') }}" rel="stylesheet" />
    <link href="{{ asset('asset/css/styles.css') }}" rel="stylesheet" />

    <!-- Favicons -->
    <link rel="icon" type="image/svg" href="{{ asset('asset/images/book.svg') }}">
</head>

@if (session()->has('admin_id'))

    <body class="sb-nav-fixed">

        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->

            <a class="navbar-brand ps-3" href="{{ URL::to('admin/') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor"
                    class="bi bi-book" style="vertical-align:bottom;" viewBox="0 0 16 16">
                    <path
                        d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
                </svg>
                LMS
            </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
                <i class="fas fa-bars"></i>
            </button>
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="{{ URL::to('/') }}" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white"
                            class="bi bi-person" viewBox="0 0 16 16">
                            <path
                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                        </svg>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                        <li><a class="dropdown-item" href="setting.php">Setting</a></li>
                        <li><a class="dropdown-item" href="{{ URL::to('/log_out_function') }}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="{{ URL::to('admin/category') }}">Category</a>
                            <a class="nav-link" href="{{ URL::to('admin/author') }}">Author</a>
                            <a class="nav-link" href="{{ URL::to('admin/rack') }}">Location Rack</a>
                            <a class="nav-link" href="{{ URL::to('admin/book') }}">Book</a>
                            <a class="nav-link" href="{{ URL::to('admin/user') }}">User</a>
                            <a class="nav-link" href="{{ URL::to('admin/category') }}">Issue Book</a>
                            <a class="nav-link" href="{{ URL::to('log_out_function') }}">Logout</a>

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">

                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
@endif

@if (!session()->has('admin_id'))

    <body>

        <main>

            <div class="container py-4">

                <header class="pb-3 mb-4 border-bottom">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ URL::to('/') }}"
                                class="d-flex align-items-center text-dark text-decoration-none">
                                <svg xmlns="" width="36" height="36" fill="currentColor"
                                    class="bi bi-book px-1" style="vertical-align:bottom;" viewBox="0 0 16 16">
                                    <path
                                        d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
                                </svg>
                                <span class="fs-4">LMS</span>
                            </a>
                        </div>
                        <div class="col-md-6">


                            @if (session()->has('user_id'))
                                <ul class="list-inline float-end">
                                    <li class="list-inline-item" style="vertical-align: bottom;">
                                        {{-- <?php echo $_SESSION['user_id']; ?> 
                                        <span class="fs-5 fw-bold">
                                                        <?php echo 'Welcome ', $_SESSION['user_nm']; ?>
                                                    </span> --}}
                                    </li>
                                    <li class="list-inline-item"><a class="btn btn-sm btn-outline-secondary"
                                            href="issue_book_details.php">Issued
                                            Books</a>
                                    </li>
                                    <li class="list-inline-item"><a class="btn btn-sm btn-outline-secondary"
                                            href="search_book.php">Search
                                            Book</a></li>
                                    <li class="list-inline-item"><a class="btn btn-sm btn-outline-secondary"
                                            href="profile.php">Profile</a></li>
                                    <li class="list-inline-item"><a class="btn btn-sm btn-outline-danger"
                                            href="logout.php">Logout</a></li>
                                </ul>
                            @endif
                        </div>
                    </div>

                </header>
@endif
