<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8"/>
    <title>Login | Dalfa Pakistan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description"/>
    <meta content="Themesbrand" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet"
          type="text/css"/>
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css"/>

</head>

<body>
<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
                    <div class="bg-primary bg-soft">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-4">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p>Sign in to continue to Dalfa Pakistan.</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="{{asset('assets/images/profile-img.png')}}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="auth-logo">
                            <a href="index.html" class="auth-logo-light">
                                <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{asset('assets/images/favicon.ico')}}" alt=""
                                                     class="rounded-circle"
                                                     height="34">
                                            </span>
                                </div>
                            </a>

                            <a href="index.html" class="auth-logo-dark">
                                <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{asset('assets/images/favicon.ico')}}" alt=""
                                                     class="rounded-circle"
                                                     height="34">
                                            </span>
                                </div>
                            </a>
                        </div>
                        <div class="p-2">
                            @if (Session::has('message'))
                                <div class="alert alert-danger">{{Session::get('message')}}</div>
                            @endif
                            @if (Session::has('verified'))
                                <div class="alert alert-success">{{Session::get('verified')}}</div>
                            @endif
                            @if (Session::has('already_verified'))
                                <div class="alert alert-success">{{Session::get('already_verified')}}</div>
                            @endif
                            <form method="POST" action="{{route('login.post')}}" class="form-horizontal">
                                @csrf
                                <div class="mb-3">
                                    <label for="username" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                           placeholder="Enter Email">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <div class="input-group auth-pass-inputgroup">
                                        <input type="password" name="password" id="password" class="form-control"
                                               placeholder="8+ characters required"
                                               aria-label="Password" aria-describedby="password-addon">
                                        <button class="btn btn-light " type="button" id="password-addon"><i
                                                class="mdi mdi-eye-outline"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3 d-grid">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">Log In
                                    </button>
                                </div>

                                <div class="mt-4 text-center">
                                    <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock me-1"></i>
                                        Forgot your password?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end account-pages -->

<!-- JAVASCRIPT -->
<script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>

<!-- App js -->
<script src="{{asset('assets/js/app.js')}}"></script>
</body>
</html>