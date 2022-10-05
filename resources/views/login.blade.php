<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="{{ asset('template/img/logo/logo2.png') }}" rel="icon">
  <title> Login</title>
  <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('template/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('template/css/ruang-admin.min.css') }}" rel="stylesheet">

</head>
<!-- <style>
  hr { display: block; height: 1px;
    border: 0; border-top: 1px solid #ee3046;
    margin: 1em 0; padding: 0; }
</style> -->

<body class="bg-gradient-login">
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-5 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                    <hr>
                    <img src="{{ asset('template/img/login.png') }}" class="mb-2" alt="" title="image by freepik.com" width="200px">
                  </div>
                  <form action="/loginproses" method="post">
                         @csrf
                    <div class="form-group">
                      @error('login_gagal')
                         {{-- <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span> --}}
                              <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                  {{-- <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span> --}}
                                  <span class="alert-inner--text">{{ $message }}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                      @enderror
                      <input type="email" class="form-control" name="email" required id="exampleInputEmail" aria-describedby="emailHelp"
                        placeholder="Masukkan Email">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" name="password" required id="exampleInputPassword" placeholder="Masukkan Password">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Log In</button>
                    </div>
                  </form>
                 <div class="text-center">
                    <!-- <a class="font-weight-bold small" href="/regist">Create an Account!</a> -->
                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->
  <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('template/js/ruang-admin.min.js') }}"></script>
</body>

</html>