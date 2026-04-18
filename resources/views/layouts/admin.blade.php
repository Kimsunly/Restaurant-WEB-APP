<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>@yield('title', 'Admin') - Feane</title>

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
        integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ=="
        crossorigin="anonymous" />
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet" />
    @stack('page-styles')
    <style>
        body.admin_page {
            background: #f4efe7;
        }

        .admin-shell {
            min-height: 100vh;
            background: linear-gradient(180deg, #111111 0%, #1f1f1f 235px, #f4efe7 235px, #f4efe7 100%);
            display: flex;
        }

        .admin-sidebar {
            width: 260px;
            background: linear-gradient(180deg, #111111 0%, #1b1f2a 100%);
            color: #ffffff;
            min-height: 100vh;
            padding: 22px 18px;
            position: fixed;
            inset: 0 auto 0 0;
            border-right: 1px solid rgba(255, 255, 255, 0.06);
            z-index: 1040;
            display: flex;
            flex-direction: column;
        }

        .admin-brand {
            display: inline-block;
            margin-bottom: 26px;
            text-decoration: none;
        }

        .admin-brand span {
            font-family: 'Dancing Script', cursive;
            font-size: 38px;
            line-height: 1;
            color: #ffbe33;
        }

        .admin-nav {
            display: grid;
            gap: 8px;
            margin-bottom: 24px;
        }

        .admin-nav-link {
            display: flex;
            align-items: center;
            width: 100%;
            padding: 12px 14px;
            border-radius: 14px;
            color: rgba(255, 255, 255, 0.88);
            text-decoration: none;
            font-weight: 600;
            transition: background 0.2s ease, color 0.2s ease;
        }

        .admin-nav-link:hover,
        .admin-nav-link.active {
            background: rgba(255, 190, 51, 0.16);
            color: #ffbe33;
        }

        .admin-sidebar-actions {
            margin-top: auto;
            display: grid;
            gap: 10px;
        }

        .admin-side-action,
        .admin-mini-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 18px;
            border-radius: 45px;
            background: #ffbe33;
            color: #ffffff;
            border: 1px solid #ffbe33;
            font-weight: 700;
            line-height: 1;
        }

        .admin-side-action:hover,
        .admin-mini-btn:hover {
            background: #e69c00;
            color: #ffffff;
            text-decoration: none;
        }

        .admin-logout-btn {
            border-radius: 45px;
            background: #ffffff;
            color: #222831;
            border: 1px solid rgba(255, 190, 51, 0.75);
            box-shadow: 0 10px 24px rgba(0, 0, 0, 0.08);
            padding: 0.55rem 1.1rem;
            font-weight: 600;
        }

        .admin-logout-btn:hover {
            background: #fff7e0;
            color: #222831;
            border-color: #ffbe33;
        }

        .admin-main {
            flex: 1;
            margin-left: 260px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .admin-alert-wrap {
            margin-top: 8px;
        }

        .admin-content {
            padding: 104px 0 72px;
            flex: 1;
        }

        .admin-content .container {
            width: 100%;
            max-width: 1380px;
            padding-left: 28px;
            padding-right: 28px;
        }

        .admin-dashboard-shell {
            margin-top: 34px;
        }

        .admin-hero-card,
        .admin-table-card,
        .admin-form-card,
        .admin-preview-card,
        .admin-metric-card {
            background: #ffffff;
            border-radius: 24px;
            box-shadow: 0 18px 45px rgba(15, 15, 15, 0.08);
        }

        .admin-hero-card {
            position: relative;
            overflow: hidden;
        }

        .admin-hero-card:before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at top right, rgba(255, 190, 51, 0.16), transparent 36%);
            pointer-events: none;
        }

        .admin-section-title {
            margin-bottom: 22px;
            display: flex;
            justify-content: space-between;
            align-items: end;
            gap: 16px;
        }

        .admin-section-title h2 {
            margin: 0;
            font-family: 'Dancing Script', cursive;
            font-size: 40px;
            color: #222831;
        }

        .admin-section-title p {
            margin: 8px 0 0;
            color: #666666;
            max-width: 760px;
        }

        .admin-chip {
            display: inline-flex;
            align-items: center;
            padding: 6px 12px;
            border-radius: 999px;
            background: #fff4d6;
            color: #a36b00;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .04em;
            text-transform: uppercase;
        }

        .admin-stat {
            height: 100%;
            padding: 24px;
            border-radius: 20px;
            background: linear-gradient(180deg, #ffffff 0%, #fbf7ef 100%);
            border: 1px solid rgba(255, 190, 51, 0.25);
        }

        .admin-stat .label {
            margin-bottom: 10px;
            color: #666666;
            font-size: 13px;
            letter-spacing: .08em;
            text-transform: uppercase;
        }

        .admin-stat .value {
            margin: 0;
            color: #222831;
            font-size: 42px;
            line-height: 1;
            font-weight: 700;
        }

        .admin-stat .meta {
            margin-top: 12px;
            color: #666666;
            font-size: 14px;
        }

        .admin-table-card .table {
            margin-bottom: 0;
        }

        .admin-table-card {
            overflow: hidden;
        }

        .admin-table-card thead th {
            background: #222831;
            color: #ffffff;
            border: 0;
            font-weight: 600;
            white-space: nowrap;
        }

        .admin-table-card tbody tr:hover {
            background: #fffaf0;
        }

        .admin-table-card td,
        .admin-table-card th {
            vertical-align: middle;
        }

        .admin-thumb {
            width: 68px;
            height: 68px;
            object-fit: cover;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        }

        .admin-preview-image {
            width: 100%;
            border-radius: 18px;
            object-fit: cover;
            box-shadow: 0 16px 30px rgba(0, 0, 0, 0.12);
        }

        .admin-empty {
            text-align: center;
            padding: 44px 20px;
            color: #666666;
        }

        .admin-form-card .form-control,
        .admin-form-card select,
        .admin-form-card textarea {
            min-height: 46px;
            border-radius: 14px;
            border-color: #dcd6c7;
        }

        .admin-select-field {
            width: 100%;
            display: block;
            background-color: #ffffff;
        }

        .admin-form-field {
            margin-bottom: 1rem;
        }

        .admin-form-field>label {
            display: block;
            margin-bottom: 0.55rem;
            color: #222831;
            font-weight: 700;
        }

        .admin-form-field .form-control,
        .admin-form-field .admin-select-field {
            width: 100%;
        }

        .admin-file-input {
            display: block;
            width: 100%;
            min-height: 52px;
            padding: 0.85rem 1rem;
            border: 1px dashed #e5c97c;
            border-radius: 16px;
            background: #fffaf0;
            color: #222831;
            cursor: pointer;
        }

        .admin-file-input::file-selector-button {
            margin-right: 14px;
            padding: 0.62rem 1rem;
            border: 0;
            border-radius: 999px;
            background: #ffbe33;
            color: #ffffff;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.2s ease, transform 0.2s ease;
        }

        .admin-file-input::file-selector-button:hover {
            background: #e69c00;
            transform: translateY(-1px);
        }

        .admin-file-input::-webkit-file-upload-button {
            margin-right: 14px;
            padding: 0.62rem 1rem;
            border: 0;
            border-radius: 999px;
            background: #ffbe33;
            color: #ffffff;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.2s ease, transform 0.2s ease;
        }

        .admin-file-input::-webkit-file-upload-button:hover {
            background: #e69c00;
            transform: translateY(-1px);
        }

        .admin-upload-box {
            padding: 16px;
            border-radius: 18px;
            background: linear-gradient(180deg, #fffaf0 0%, #fffdf8 100%);
            border: 1px solid #f0e2bf;
        }

        .admin-upload-box>label {
            display: block;
            margin-bottom: 0.7rem;
            color: #222831;
            font-weight: 700;
        }

        .admin-upload-box label {
            margin-bottom: 10px;
            color: #222831;
            font-weight: 700;
        }

        .admin-upload-help {
            margin-top: 8px;
            color: #666666;
            font-size: 13px;
        }

        .admin-form-card textarea {
            min-height: 126px;
        }

        .admin-form-card .custom-control-label {
            padding-top: 1px;
        }

        .admin-toolbar {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            align-items: center;
        }

        .admin-action-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 16px;
            border-radius: 999px;
            font-weight: 600;
            line-height: 1;
        }

        .admin-action-link.secondary {
            background: #ffffff;
            color: #222831;
            border: 1px solid #e1ddd3;
        }

        .admin-action-link.secondary:hover {
            border-color: #ffbe33;
            color: #ffbe33;
        }

        .admin-toast-wrap {
            position: fixed;
            top: 18px;
            right: 18px;
            z-index: 1080;
            width: min(100%, 380px);
        }

        .admin-toast {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 14px 16px;
            margin-bottom: 10px;
            border-radius: 16px;
            background: rgba(255, 255, 255, 0.98);
            box-shadow: 0 18px 42px rgba(0, 0, 0, 0.18);
            border-left: 6px solid #ffbe33;
        }

        .admin-toast.success {
            border-left-color: #28a745;
        }

        .admin-toast.danger {
            border-left-color: #dc3545;
        }

        .admin-toast strong {
            display: block;
            margin-bottom: 2px;
            color: #222831;
            font-size: 0.95rem;
        }

        .admin-toast p {
            margin: 0;
            color: #666666;
            line-height: 1.5;
            font-size: 0.94rem;
        }

        .admin-toast .close {
            margin-left: auto;
            border: 0;
            background: transparent;
            color: #666666;
            font-size: 1.2rem;
            line-height: 1;
            cursor: pointer;
        }

        .admin-action-link.primary {
            background: #ffbe33;
            color: #ffffff;
            border: 1px solid #ffbe33;
        }

        .admin-action-link.primary:hover {
            background: #e69c00;
            color: #ffffff;
            border-color: #e69c00;
        }

        .admin-section-title.dark .admin-chip {
            background: rgba(255, 190, 51, 0.14);
            color: #ffbe33;
        }

        .admin-section-title.dark h2,
        .admin-section-title.dark p {
            color: #f8f3ea;
        }

        .admin-section-title.dark p {
            opacity: .92;
        }

        @media (max-width: 991px) {
            .admin-shell {
                display: block;
            }

            .admin-sidebar {
                position: static;
                width: 100%;
                min-height: auto;
                padding: 16px 14px;
            }

            .admin-brand {
                margin-bottom: 14px;
            }

            .admin-nav {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                margin-bottom: 14px;
            }

            .admin-sidebar-actions {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                margin-top: 4px;
            }

            .admin-main {
                margin-left: 0;
            }

            .admin-content .container {
                max-width: 100%;
                padding-left: 16px;
                padding-right: 16px;
            }

            .admin-content {
                padding-top: 68px;
            }

            .admin-section-title {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        @media (max-width: 575px) {

            .admin-nav,
            .admin-sidebar-actions {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body class="admin_page">
    <div class="admin-shell">
        @if (session('toast'))
            <div class="admin-toast-wrap">
                <div class="admin-toast {{ session('toast.type') }}">
                    <div>
                        <strong>{{ session('toast.title') }}</strong>
                        <p>{{ session('toast.message') }}</p>
                    </div>
                    <button type="button" class="close" onclick="this.parentElement.remove()"
                        aria-label="Close">&times;</button>
                </div>
            </div>
        @endif

        <aside class="admin-sidebar">
            <a class="admin-brand" href="{{ route('admin.dashboard') }}">
                <span>Feane Admin</span>
            </a>

            <nav class="admin-nav">
                <a href="{{ route('admin.dashboard') }}"
                    class="admin-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
                <a href="{{ route('admin.menus.index') }}"
                    class="admin-nav-link {{ request()->routeIs('admin.menus.*') ? 'active' : '' }}">Menus</a>
                <a href="{{ route('admin.slides.index') }}"
                    class="admin-nav-link {{ request()->routeIs('admin.slides.*') ? 'active' : '' }}">Slides</a>
                <a href="{{ route('home') }}" target="_blank" rel="noreferrer" class="admin-nav-link">View Site</a>
            </nav>

            <div class="admin-sidebar-actions">
                <a href="{{ route('admin.dashboard') }}" class="admin-side-action">Admin Panel</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-sm admin-logout-btn w-100" type="submit">Logout</button>
                </form>
            </div>
        </aside>

        <div class="admin-main">
            @if(session('success'))
                <div class="admin-alert-wrap">
                    <div class="container">
                        <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endif

            <main class="admin-content">
                @yield('content')
            </main>

            <footer class="footer_section">
                <div class="container">
                    <div class="footer-info">
                        <p>Feane Admin Panel</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    @stack('page-scripts')
</body>

</html>