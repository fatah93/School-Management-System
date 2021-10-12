<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Hamma School - Forget password</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin_backend/assets/images/favicon.png')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="{{ asset('admin_backend/css/style.css')}}" rel="stylesheet">

</head>

<body class="h-100">

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
    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="{{route('login')}}">
                                    <h4>Hamma School </h4>
                                </a>
                                <div class="mb-4">
                                    <div class="text-gray">
                                        Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
                                    </div>
                                    @if (session('status'))
                                        <div class="mb-4 font-medium text-sm text-green-600">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                </div>
                                <form class="mt-5 mb-4 login-input" method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="form-group">
                                        
                                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" autocomplete="off" required>
                                    </div>
                                    <div>
                                        <button class="btn btn-primary" style="float:right">EMAIL PASSWORD RESET LINK</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{ asset('admin_backend/plugins/common/common.min.js')}}"></script>
    <script src="{{ asset('admin_backend/js/custom.min.js')}}"></script>
    <script src="{{ asset('admin_backend/js/settings.js')}}"></script>
</body>

</html>