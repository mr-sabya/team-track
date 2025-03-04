<!doctype html>
<html lang="en">


<head>

    <meta charset="utf-8" />
    <title>Dashboard | Appzia - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/toastr/build/toastr.min.css') }}">

    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/custom.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    @livewireStyles

</head>

<body data-sidebar="dark" style="position: relative;">

    <!-- <body data-layout="horizontal" data-topbar="light"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">



        <livewire:theme.header />

        <!-- ========== Left Sidebar Start ========== -->
        <livewire:theme.sidebar />
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">

                <!-- start page title -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Dashboard</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Team Track</a></li>
                                        <li class="breadcrumb-item active">@yield('title')</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                @yield('content')

            </div>
            <!-- End Page-content -->

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    <!-- Include the modal -->

    <livewire:modal />
    <!-- JAVASCRIPT -->
    <script data-navigate-once src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script data-navigate-once src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script data-navigate-once src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script data-navigate-once src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script data-navigate-once src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>


    <!-- toastr plugin -->
    <script data-navigate-once src="{{ asset('assets/libs/toastr/build/toastr.min.js') }}"></script>

    <!-- App js -->
    <script data-navigate-once src="{{ asset('assets/js/app.js') }}"></script>

    @livewireScripts

    @yield('scripts')

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('alert', (event) => {
                // Since the event is an array, access the first item
                const {
                    type,
                    message
                } = event[0];

                // Check if 'type' and 'message' are defined
                if (type === undefined || message === undefined) {
                    console.error('Error: type or message is undefined!');
                } else {
                    // Show toastr notification based on the type
                    if (type === 'success') {
                        toastr.success(message);
                    } else if (type === 'info') {
                        toastr.info(message);
                    } else if (type === 'warning') {
                        toastr.warning(message);
                    } else if (type === 'error') {
                        toastr.error(message);
                    }
                }

            });
        });
    </script>



</body>



</html>