<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login | AI Survey Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/dcismicon.png')}}"/>
    <!-- preloader css -->
    <link rel="stylesheet" href="{{ asset('assets/css/preloader.min.css')}}" type="text/css" />
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css -->
    <link href="{{ asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/custom-style.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/custom-style-login.css')}}" id="app-style" rel="stylesheet" type="text/css" />

    <!-- Inter Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>

<body class="animated-background">
    <div class="container-fluid p-0">
        <div class="auth-page">
            <div class="pt-lg-6 p-4 justify-content-center">
                <div class="card auth-card">
                    <div class="row g-0">
                        <div class="col-xl-5 left-side">
                            <div class="left-side-text d-flex flex-column align-items-center">
                                <div class="p-5">
                                    <div class="p-5">
                                        <p>&nbsp;</p>
                                        <p>&nbsp;</p>
                                    </div>
                                    <h3 class="welcome-msg">Good to See you!</h3>
                                    <p class="text-center">
                                        Ready to evaluate?
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 right-side bg-white">
                            <div class="d-flex flex-column h-100">
                                <div class="pt-5 mb-3 text-center">
                                    <a href="javascript:void(0)" class="d-block auth-logo">
                                        <img src="{{ asset('assets/images/dcismicon.png')}}" alt="" width="130">
                                    </a>
                                </div>
                                <div class="auth-content my-auto">
                                    <div class="form-container slide-left" id="formContainer">
                                        <div class="form" id="form1">
                                            <div class="text-center">
                                                <h4 style="color: #333333;" class="mt-2">Sign in to continue.</h4>
                                            </div>
                                            <form class="mt-4 pt-2" method="POST" action="{{ route('login.request') }}">
                                                @csrf
                                                <div class="mb-3">
                                                    <label class="form-label">Email</label>
                                                    <input type="text" name="email" class="form-control" id="email" placeholder="Enter Your Email">
                                                </div>
                                                <div class="mb-3">
                                                    <div class="d-flex align-items-start">
                                                        <div class="flex-grow-1">
                                                            <label class="form-label">Password</label>
                                                        </div>
                                                        <div class="flex-shrink-0">
                                                            <!-- <div>
                                                                <a href="auth-recoverpw.html" class="text-muted">Forgot password?</a>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                    <div class="input-group auth-pass-inputgroup">
                                                        <input type="password" name="password" class="form-control" placeholder="Enter Your Password" aria-label="Password" aria-describedby="password-addon">
                                                        <button class="btn btn-light shadow-none ms-0" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="remember-check">
                                                            <label class="form-check-label" for="remember-check">Remember me</label>
                                                        </div>  
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <button class="btn btn-sign-in w-100 waves-effect waves-light" type="submit">Sign In</button>
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
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js')}}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js')}}"></script>
    <!-- pace js -->
    <script src="{{ asset('assets/libs/pace-js/pace.min.js')}}"></script>
    <!-- password addon init -->
    <script src="{{ asset('assets/js/pages/pass-addon.init.js')}}"></script>

</body>

</html>
