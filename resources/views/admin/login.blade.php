<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>تسجيل الدخول</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" href="{{asset('/admin_assets')}}/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/admin_assets')}}/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('/admin_assets')}}/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <a href="{{ route('social.oauth', 'facebook') }}" class="btn btn-primary btn-block">
          Login with Facebook
        </a>
        <a href="{{ route('social.oauth', 'google') }}" class="btn btn-danger btn-block">
          Login with Google
        </a>
        <p class="login-box-msg">تسجيل الدخول</p>
        @include('admin.layouts.message')
        <form action="{{route('auth.login')}}" method="post">
          {{csrf_field()}}
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Email" name="email">

            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> تذكرني
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">تسجيل الدخول</button>
            </div><!-- /.col -->
          </div>
        </form>




      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="{{asset('/admin_assets')}}/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.4 -->
    <script src="{{asset('/admin_assets')}}/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="{{asset('/admin_assets')}}/plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
