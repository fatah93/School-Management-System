<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Hamma School </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin_backend/images/favicon.png')}}">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="{{ asset('admin_backend/css/style.css')}}" rel="stylesheet">

</head>

<body class="h-100">

    <!--*******************
        Preloader start
    ********************-->

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
                                <a class="text-center" href="{{ route('login')}}">
                                    <h4>Hamma School</h4>
                                </a>
                                @if (session('status'))
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ session('status') }}
                                </div>
                                @endif
                                <form class="mt-5 mb-4 login-input" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Email" type="email" name="email" id="email">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" type="password" name="password">
                                    </div>

                                    <div">
                                        <input  type="submit" class="btn btn-primary" style="float:right;" value="Sign In"></input>
                                    </div>

                                </form>
                                <div class="row">
                                    <div class="col">
                                        @if (Route::has('password.request'))
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                            Forgot your password?
                                        </a>
                                        @endif
                                    </div>
                                    <div class="col">
                                        <p class=" login-form__footer">Dont have account? <a href="{{ route('register')}}" class="text-primary">Sign Up</a> now</p>
                                    </div>

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
    <script src="{{ asset('admin_backend/js/gleek.js')}}"></script>
    <script src="{{ asset('admin_backend/js/styleSwitcher.js')}}"></script>
</body>

</html>