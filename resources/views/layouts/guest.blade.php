<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Login | Appzia - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/custom.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    @livewireStyles
</head>

<body class="auth-body-bg auth">
    <div class="accountbg"></div>
    <div class="wrapper-page">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center mt-0 mb-3">
                    <livewire:theme.logo />
                </h3>
                <h5 class="text-center mt-0 text-color"><b>Sign In</b></h5>
                @yield('content')
            </div>
        </div>
    </div>



    <!-- JAVASCRIPT -->
    <script data-navigate-once src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script data-navigate-once src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script data-navigate-once src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script data-navigate-once src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script data-navigate-once src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

    <script data-navigate-once src="{{ asset('assets/js/app.js') }}"></script>
    @livewireScripts

</body>

</html>