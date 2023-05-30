<!DOCTYPE html>
<html lang="en">
<!-- auth-register.html  21 Nov 2019 04:05:01 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>D Mart - Registration</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('admin/css/app.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/bundles/jquery-selectric/selectric.css')}}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('admin/css/components.css')}}">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{asset('admin/css/custom.css')}}">
  <link rel='shortcut icon' type='image/x-icon' href="{{asset('admin/img/favicon.ico')}}"/>
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Register</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="registration">
                    @csrf
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="first_name">First Name</label>
                      <input id="first_name" type="text" class="form-control" name="first-name_txt" value="{{old('first-name_txt')}}" autofocus>
                      @error('first-name_txt') <p class="text-danger">{{$message}}</p>@enderror
                    </div>
                    <div class="form-group col-6">
                      <label for="last_name">Last Name</label>
                      <input id="last_name" type="text" class="form-control" name="last-name_txt" value="{{old('last-name_txt')}}">
                      @error('last-name_txt') <p class="text-danger">{{$message}}</p>@enderror
                    </div>
                  </div>
                  <div class="row">
                      <div class="form-group col-6">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email_txt" value="{{old('email_txt')}}">
                        @error('email_txt') <p class="text-danger">{{$message}}</p>@enderror
                        <div class="invalid-feedback">
                        </div>
                      </div>
                      <div class="form-group col-6">
                        <label for="mobile">Mobile</label>
                        <input id="mobile" type="mobile" class="form-control" name="mobile_txt" value="{{old('mobile_txt')}}">
                        @error('mobile_txt') <p class="text-danger">{{$message}}</p>@enderror
                        <div class="invalid-feedback">
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator"
                        name="password_txt">
                        @error('password_txt') <p class="text-danger">{{$message}}</p>@enderror
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="password2" class="d-block">Password Confirmation</label>
                      <input id="password2" type="password" class="form-control" name="password-confirm_txt">
                      @error('password-confirm_txt') <p class="text-danger">{{$message}}</p>@enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                      <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
              </div>
              <div class="mb-4 text-muted text-center">
                Already Registered? <a href="login">Login</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="{{asset('admin/js/app.min.js')}}"></script>
  <!-- JS Libraies -->
  <script src="{{asset('admin/bundles/jquery-pwstrength/jquery.pwstrength.min.js')}}"></script>
  <script src="{{asset('admin/bundles/jquery-selectric/jquery.selectric.min.js')}}"></script>
  <!-- Page Specific JS File -->
  <script src="{{asset('admin/js/page/auth-register.js')}}"></script>
  <!-- Template JS File -->
  <script src="{{asset('admin/js/scripts.js')}}"></script>
  <!-- Custom JS File -->
  <script src="{{asset('admin/js/custom.js')}}"></script>
</body>
<!-- auth-register.html  21 Nov 2019 04:05:02 GMT -->
</html>