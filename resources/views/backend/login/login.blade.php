<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log in | {{ucwords($siteSetting->site_title ?? 'APP_NAME')}}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{$siteSetting->icon}}" type="image/gif">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/admin-lte/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('/admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/admin-lte/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('/admin-lte/plugins/sweetalert2/sweetalert2.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- jQuery -->
    <script src="{{asset('/admin-lte/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('/admin-lte/dist/js/adminlte.min.js')}}"></script>
    <script src="{{asset('/admin-lte/plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>

</head>
<body class="hold-transition login-page">
@if(Session::has('success'))
    <script>
        var msg ='{{ Session::get("success") }}';
        Swal.fire(msg, "", "success");
    </script>
@endif
@if(Session::has('error'))
    <script>
        var msg ='{{Session::get("error")}}';
        Swal.fire(msg, "", "error");
    </script>
@endif

<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>{{ucwords($siteSetting->site_title ?? '')}}</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="{{route('admin.login')}}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input name="email" type="email" class="form-control" placeholder="Email" autocomplete="off">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    <span class="text-danger">{{($errors->has('email')) ? $errors->first('email') : ''}}</span>
                </div>
                <div class="input-group mb-3">
                    <input name="password" type="password" class="form-control" placeholder="Password" autocomplete="off">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    <span class="text-danger" style="width: 100%">{{($errors->has('password')) ? $errors->first('password') : ''}}</span>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember" value="1" name="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <br>
            <div class="row">
                <div class="col-12">
                    <div  style="border-top: 1px solid rgba(0,0,0,.1);">
                        <small>Copyright ©️ 2021 Web Embed. All rights reserved.</small><br>
                        <small><a href="https://itclanbd.com" target="_blank">Design and Develop by ITclan BD</a></small>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

</body>
</html>
