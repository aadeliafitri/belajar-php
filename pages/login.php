<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login (admin LTE)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card">
    <!-- <div class="card-header text-center">
      <a href="../index2.html" class="h1"><b>Admin</b>LTE</a>
    </div> -->
    <div class="card-body">
        <div class="text-center">
            <img src="../assets/images/github.png" width="100px" alt="logo github">
        </div>
        <h3 class="text-center">Welcome Back!</h3>
        <p class="login-box-msg">Enter your details to get sign in to your account</p>

        <?php if(!empty($_GET['gagal'])){?>
          <?php if($_GET['gagal']=="userKosong"){?>
            <span class="text-danger">
            Maaf Username Tidak Boleh Kosong
            </span>
            <?php } else if($_GET['gagal']=="passKosong"){?>
            <span class="text-danger">
                Maaf Password Tidak Boleh Kosong
            </span>
            <?php } else {?>
            <span class="text-danger">
                Maaf Username dan Password Anda Salah
            </span>
          <?php }?>
        <?php }?>                                                                                                                                                 
      <form action="proses-login.php" method="post">
        <div class="input-group mb-3">
          <div class="input-group-append">
            <div class="input-group-text">
              <span>+62</span>
            </div>
          </div>
          <input type="text" name="username" class="form-control" placeholder="Username">
        </div>
        <div class="input-group">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
        <p class="text-end">
            <a href="forgot-password.html" class="text-dark">Forgot Password?</a>
        </p>
        <button type="submit" name="login" value="login" class="btn btn-primary btn-block">Sign In</button>
      </form>

      <!-- <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->

      <p class="mb-0 mt-3 text-center">
        Don't have an account? <a href="register.php" class="text-dark fw-bold"><b>Sign up</b></a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>
