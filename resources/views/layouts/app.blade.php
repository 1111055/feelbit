<html class="no-js" lang="en-US">
@include('backend.head')


<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
   <img src="{{asset('/image/logo.png')}}" alt="logo-image" 
    style="max-width: 110px";>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">FeelBit</p>

        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="form-group has-feedback">
                    <input id="email" name="email" type="email" class="form-control" placeholder="Email"  value="{{ old('email') }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>   
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
            </div>

            <div class="form-group has-feedback">
                    <input id="password" type="password" class="form-control" name="password"  placeholder="password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
            </div>

            <div class="form-group">
                <div class="col-xs-12 text-center">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">
                        Login
                    </button>
                </div>
                <div class="col-xs-12 text-center">
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        Esqueceu-se da PassWord?
                    </a>
                </div>
               
            </div>
        </form>
      <div class="text-right">
        <a href="http://www.feelbit.pt" target="_blank">Feel Bit</a>
      </div>
  </div>

</div>

<script src="{{ asset('backend/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('backend/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('backend/plugins/iCheck/icheck.min.js') }}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
