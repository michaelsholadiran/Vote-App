
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->
  {{-- <link rel="icon" type="image/png" href="{{asset("website_assets")}}/vendors/login/images/icons/favicon.ico" /> --}}
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset("website_assets")}}/vendors/login/vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset("website_assets")}}/vendors/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset("website_assets")}}/vendors/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset("website_assets")}}/vendors/login/vendor/animate/animate.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset("website_assets")}}/vendors/login/vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset("website_assets")}}/vendors/login/vendor/animsition/css/animsition.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset("website_assets")}}/vendors/login/vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset("website_assets")}}/vendors/login/vendor/daterangepicker/daterangepicker.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset("website_assets")}}/vendors/login/css/util.css">
  <link rel="stylesheet" type="text/css" href="{{asset("website_assets")}}/vendors/login/css/main.css">
  <link rel="stylesheet" type="text/css" href="{{asset("website_assets")}}/vendors/login/css/sheet.css">
  <!--===============================================================================================-->
</head>
<body>
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100 p-l-40 p-r-40 p-t-55 p-b-55">
        <h1>Admin</h1>
        <form action="{{ route('login') }}" method="post" class="login100-form validate-form flex-sb flex-w">
              @csrf
          <span class="login100-form-title p-b-32">
            <!-- Account Login -->
          </span>
          <span class="txt1 p-b-11">
            User Id
          </span>
          <div class="wrap-input100 validate-input m-b-36  @error('user_id') alert-validate  @enderror" data-validate="Email is required">
            <input class="input100" type="text" name="email" value="{{ old('user_id') }}">
                  <span class="focus-input100"></span>
              </div>

          <span class="txt1 p-b-11">
            Password
          </span>
          <div class="wrap-input100 validate-input m-b-12 @error('user_id') alert-validate  @enderror" data-validate="Password is required">
            <span class="btn-show-pass">
              <i class="fa fa-eye"></i>
            </span>
            <input class="input100" type="password" name="password">
            <span class="focus-input100"></span>
          </div>

          <div class="container-login100-form-btn">
            <button class="login100-form-btn">
              Login
            </button>
          </div>
        </form>
        <div class="">
          @if($errors->any())
      {!! implode('', $errors->all('<div>:message</div>')) !!}
  @endif
        </div>
      </div>
    </div>
  </div>
  <div id="dropDownSelect1"></div>
  <!--===============================================================================================-->
  <script src="{{asset("website_assets")}}/vendors/login/vendor/jquery/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  <script src="{{asset("website_assets")}}/vendors/login/vendor/animsition/js/animsition.min.js"></script>
  <!--===============================================================================================-->
  <script src="{{asset("website_assets")}}/vendors/login/vendor/bootstrap/js/popper.js"></script>
  <script src="{{asset("website_assets")}}/vendors/login/vendor/bootstrap/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="{{asset("website_assets")}}/vendors/login/vendor/select2/select2.min.js"></script>
  <!--===============================================================================================-->
  <script src="{{asset("website_assets")}}/vendors/login/vendor/daterangepicker/moment.min.js"></script>
  <script src="{{asset("website_assets")}}/vendors/login/vendor/daterangepicker/daterangepicker.js"></script>
  <!--===============================================================================================-->
  <script src="{{asset("website_assets")}}/vendors/login/vendor/countdowntime/countdowntime.js"></script>
  <!--===============================================================================================-->
  <script src="{{asset("website_assets")}}/vendors/login/js/main.js"></script>
</body>

</html>
