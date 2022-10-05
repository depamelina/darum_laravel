<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>RuangAdmin - Login</title>
  <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('template/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('template/css/ruang-admin.min.css') }}" rel="stylesheet">

</head>

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
                    <h1 class="h4 text-gray-900 mb-4">Register</h1>
                    <hr>
                    <img src="{{ asset('template/img/login.png') }}" class="mb-2" alt="" width="200px">
                  </div>
                  <form action="/registeruser" method="post">
                      @csrf
                    <div class="form-group">
                      <input type="text" class="form-control" name="name" required id="exampleInputEmail" aria-describedby="emailHelp"
                        placeholder="Enter Name">
                    </div>    
                    <div class="form-group">
                      <input type="email" class="form-control" name="email" required id="exampleInputEmail" aria-describedby="emailHelp"
                        placeholder="Enter Email Address">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" name="password" required id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
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