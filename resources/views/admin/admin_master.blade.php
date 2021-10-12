<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Hamma School </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin_backend/images/favicon.png')}}">
    <!-- Pignose Calender -->
    <link href="{{ asset('admin_backend/plugins/pg-calendar/css/pignose.calendar.min.css')}}" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="{{ asset('admin_backend/plugins/chartist/css/chartist.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin_backend/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css')}}">
    <!-- Custom Stylesheet -->

    <link href="{{ asset('admin_backend/plugins/tables/css/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{ asset('admin_backend/css/style.css')}}" rel="stylesheet">

    <!-- Toastr-->
    <link href="{{ asset('admin_backend/plugins/toastr/css/toastr.min.css')}}" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        @include('admin.body.header')
        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('admin.body.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid mt-3">
                @yield('main_admin')
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        @include('admin.body.footer')
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{ asset('admin_backend/plugins/common/common.min.js')}}"></script>
    <script src="{{ asset('admin_backend/js/custom.min.js')}}"></script>
    <script src="{{ asset('admin_backend/js/settings.js')}}"></script>
    <script src="{{ asset('admin_backend/js/gleek.js')}}"></script>
    <script src="{{ asset('admin_backend/js/styleSwitcher.js')}}"></script>

    <!-- Chartjs -->
    <script src="{{ asset('admin_backend/plugins/chart.js/Chart.bundle.min.js')}}"></script>
    <!-- Circle progress -->
    <script src="{{ asset('admin_backend/plugins/circle-progress/circle-progress.min.js')}}"></script>
    <!-- Datamap -->
    <script src="{{ asset('admin_backend/plugins/d3v3/index.js')}}"></script>
    <script src="{{ asset('admin_backend/plugins/topojson/topojson.min.js')}}"></script>
    <script src="{{ asset('admin_backend/plugins/datamaps/datamaps.world.min.js')}}"></script>
    <!-- Morrisjs -->
    <script src="{{ asset('admin_backend/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{ asset('admin_backend/plugins/morris/morris.min.js')}}"></script>
    <!-- Pignose Calender -->
    <script src="{{ asset('admin_backend/plugins/moment/moment.min.js')}}"></script>
    <script src="{{ asset('admin_backend/plugins/pg-calendar/js/pignose.calendar.min.js')}}"></script>
    <!-- ChartistJS -->
    <script src="{{ asset('admin_backend/plugins/chartist/js/chartist.min.js')}}"></script>
    <script src="{{ asset('admin_backend/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js')}}"></script>

    <script src="{{ asset('admin_backend/js/dashboard/dashboard-1.js')}}"></script>

    <!--sweet alert-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(function() {
            $(document).on('click', '#delete', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Delete this Data ?!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link
                        Swal.fire(
                            'Deleted!',
                            'User has been deleted.',
                            'success'
                        )
                    }
                })
            });
        });
    </script>

    <!-- Toastr-->
    <script src="{{ asset('admin_backend/plugins/toastr/js/toastr.min.js')}}"></script>
    <script src="{{asset('admin_backend/plugins/toastr/js/toastr.init.js')}}"></script>



    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info')}}"

        switch (type) {
            case 'success':
                toastr.success("{{ Session::get('message')}}");
                break;
            case 'info':
                toastr.info("{{ Session::get('message')}}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message')}}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message')}}");
                break;
        }
        @endif
    </script>
</body>

</html>