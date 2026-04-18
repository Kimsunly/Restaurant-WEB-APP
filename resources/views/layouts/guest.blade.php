<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Feane') }}</title>

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

    <style>
        body.auth_page {
            background: #f4efe7;
        }

        .auth-shell {
            min-height: 100vh;
            padding: 28px 0 40px;
            background:
                linear-gradient(135deg, rgba(17, 17, 17, 0.96), rgba(31, 31, 31, 0.93)),
                url('{{ asset('assets/images/hero-bg.jpg') }}') center center / cover no-repeat;
            position: relative;
            overflow: hidden;
        }

        .auth-shell:before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at top right, rgba(255, 190, 51, 0.16), transparent 30%);
            pointer-events: none;
        }

        .auth-shell .container {
            position: relative;
            z-index: 1;
        }

        .auth-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.05fr) minmax(0, 0.95fr);
            gap: 28px;
            align-items: center;
            min-height: calc(100vh - 68px);
        }

        .auth-copy {
            color: #ffffff;
            padding: 12px 0;
        }

        .auth-brand {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 22px;
            text-decoration: none;
        }

        .auth-brand span {
            font-family: 'Dancing Script', cursive;
            font-size: 54px;
            line-height: 1;
            color: #ffbe33;
        }

        .auth-copy h1 {
            margin: 0 0 14px;
            font-size: clamp(2.25rem, 4vw, 4.4rem);
            line-height: 1.02;
            font-weight: 700;
            color: #ffffff;
        }

        .auth-copy p {
            margin: 0;
            max-width: 560px;
            color: rgba(255, 255, 255, 0.88);
            font-size: 1.05rem;
            line-height: 1.7;
        }

        .auth-points {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 14px;
            margin: 28px 0 30px;
            max-width: 620px;
        }

        .auth-point {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 190, 51, 0.18);
            border-radius: 18px;
            padding: 16px;
            backdrop-filter: blur(6px);
        }

        .auth-point strong {
            display: block;
            margin-bottom: 4px;
            color: #ffbe33;
            font-size: 0.88rem;
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }

        .auth-point span {
            color: rgba(255, 255, 255, 0.88);
            font-size: 0.95rem;
            line-height: 1.5;
        }

        .auth-home-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-top: 8px;
            padding: 12px 18px;
            border-radius: 999px;
            background: #ffbe33;
            color: #ffffff;
            text-decoration: none;
            font-weight: 700;
            transition: 0.2s ease;
        }

        .auth-home-link:hover {
            background: #e69c00;
            color: #ffffff;
        }

        .auth-panel {
            display: flex;
            justify-content: flex-end;
        }

        .auth-card {
            width: 100%;
            max-width: 560px;
            background: rgba(255, 255, 255, 0.97);
            border-radius: 32px;
            box-shadow: 0 26px 70px rgba(0, 0, 0, 0.24);
            padding: 34px;
            backdrop-filter: blur(10px);
        }

        .auth-card-header {
            margin-bottom: 24px;
        }

        .auth-card-header .auth-chip {
            display: inline-flex;
            padding: 6px 12px;
            border-radius: 999px;
            background: #fff4d6;
            color: #a36b00;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .04em;
            text-transform: uppercase;
        }

        .auth-card-header h2 {
            margin: 14px 0 10px;
            color: #222831;
            font-family: 'Dancing Script', cursive;
            font-size: 40px;
            line-height: 1;
        }

        .auth-card-header p {
            margin: 0;
            color: #666666;
            line-height: 1.7;
        }

        .auth-form {
            display: grid;
            gap: 18px;
        }

        .auth-field {
            display: grid;
            gap: 8px;
        }

        .auth-label {
            color: #222831;
            font-size: 0.92rem;
            font-weight: 700;
            letter-spacing: 0.02em;
        }

        .auth-input {
            width: 100%;
            min-height: 48px;
            border: 1px solid #d9d1c3;
            border-radius: 14px;
            padding: 0.85rem 1rem;
            background: #ffffff;
            color: #222831;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.03);
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .auth-input:focus {
            outline: none;
            border-color: #ffbe33;
            box-shadow: 0 0 0 0.2rem rgba(255, 190, 51, 0.18);
        }

        .auth-input[type='checkbox'] {
            width: 18px;
            min-height: 18px;
            padding: 0;
            accent-color: #ffbe33;
            box-shadow: none;
        }

        .auth-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 48px;
            padding: 0.82rem 1.35rem;
            border: 0;
            border-radius: 999px;
            background: #ffbe33;
            color: #ffffff;
            font-weight: 700;
            transition: background 0.2s ease, transform 0.2s ease;
        }

        .auth-button:hover {
            background: #e69c00;
            transform: translateY(-1px);
        }

        .auth-error-list {
            margin: 0;
            padding-left: 1rem;
            color: #c0392b;
            font-size: 0.9rem;
        }

        .auth-status {
            padding: 0.9rem 1rem;
            border-radius: 14px;
            background: #fff4d6;
            color: #8a5a00;
            font-size: 0.95rem;
            font-weight: 600;
        }

        .auth-inline-link {
            color: #222831;
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 600;
        }

        .auth-inline-link:hover {
            color: #ffbe33;
        }

        .auth-muted {
            color: #666666;
            font-size: 0.95rem;
            line-height: 1.7;
        }

        .auth-divider {
            height: 1px;
            background: #eee5d6;
            margin: 4px 0;
        }

        .auth-footer-links {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            flex-wrap: wrap;
        }

        .auth-small-link {
            color: #666666;
            text-decoration: none;
            font-size: 0.92rem;
            font-weight: 600;
        }

        .auth-small-link:hover {
            color: #ffbe33;
        }

        .auth-toast-wrap {
            position: fixed;
            top: 18px;
            right: 18px;
            z-index: 1080;
            width: min(100%, 380px);
        }

        .auth-toast {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 14px 16px;
            margin-bottom: 10px;
            border-radius: 16px;
            background: rgba(255, 255, 255, 0.96);
            box-shadow: 0 18px 42px rgba(0, 0, 0, 0.22);
            border-left: 6px solid #ffbe33;
        }

        .auth-toast.success {
            border-left-color: #28a745;
        }

        .auth-toast.danger {
            border-left-color: #dc3545;
        }

        .auth-toast strong {
            display: block;
            margin-bottom: 2px;
            color: #222831;
            font-size: 0.95rem;
        }

        .auth-toast p {
            margin: 0;
            color: #666666;
            line-height: 1.5;
            font-size: 0.94rem;
        }

        .auth-toast .close {
            margin-left: auto;
            border: 0;
            background: transparent;
            color: #666666;
            font-size: 1.2rem;
            line-height: 1;
            cursor: pointer;
        }

        .auth-section+.auth-section {
            margin-top: 18px;
        }

        .auth-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 22px;
        }

        .auth-link {
            color: #222831;
            text-decoration: none;
            font-weight: 600;
        }

        .auth-link:hover {
            color: #ffbe33;
        }

        @media (max-width: 991px) {
            .auth-grid {
                grid-template-columns: 1fr;
                min-height: auto;
                padding-top: 18px;
                padding-bottom: 18px;
            }

            .auth-panel {
                justify-content: stretch;
            }

            .auth-card {
                max-width: 100%;
            }

            .auth-points {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 575px) {
            .auth-card {
                padding: 24px 18px;
                border-radius: 24px;
            }
        }
    </style>
</head>

<body class="auth_page">
    @if (session('toast'))
        <div class="auth-toast-wrap">
            <div class="auth-toast {{ session('toast.type') }}">
                <div>
                    <strong>{{ session('toast.title') }}</strong>
                    <p>{{ session('toast.message') }}</p>
                </div>
                <button type="button" class="close" onclick="this.parentElement.remove()"
                    aria-label="Close">&times;</button>
            </div>
        </div>
    @endif

    <div class="auth-shell">
        <div class="container">
            <div class="auth-grid">
                <section class="auth-copy">
                    <a class="auth-brand" href="{{ route('home') }}">
                        <span>Feane</span>
                    </a>
                    <h1>Restaurant control, styled like the site.</h1>
                    <p>
                        Sign in to manage menus and homepage slides from a Feane-branded interface that matches the rest
                        of the app.
                    </p>

                    <div class="auth-points">
                        <div class="auth-point">
                            <strong>Menus</strong>
                            <span>Keep dishes, prices, and images current.</span>
                        </div>
                        <div class="auth-point">
                            <strong>Slides</strong>
                            <span>Control the hero carousel on the homepage.</span>
                        </div>
                        <div class="auth-point">
                            <strong>Preview</strong>
                            <span>Jump back to the public site at any time.</span>
                        </div>
                    </div>

                    <a class="auth-home-link" href="{{ route('home') }}">Back to public site</a>
                </section>

                <section class="auth-panel">
                    <div class="auth-card">
                        {{ $slot }}
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>

</html>