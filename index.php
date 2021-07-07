<!DOCTYPE html>
<html>
<head>
  <?php
    session_start();
  if (!empty($_SESSION['user']))
  {
  header("location:View");
  }
    if(isset($_GET['i'])){
      $i=$_GET['i'];
      if($i=="forbidden"){
        $msg='Tidak boleh Masuk Langsung !!';
        echo "<script type='text/javascript'>alert('$msg');</script>";
      }
      else if($i=="logout"){
        $msg='Logout sukses !';
        echo "<script type='text/javascript'>alert('$msg');</script>";
      }
      else if($i=="fail"){
        $msg='Username atau Password salah !!';
        echo "<script type='text/javascript'>alert('$msg');</script>";
      }
    }
  ?>
  <title>BI | Login</title>
  <!-- for-mobile-apps -->
  <link rel="shortcut icon" href="view/assets/images/icon.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
      function hideURLbar(){ window.scrollTo(0,1); } </script>
  <!-- //for-mobile-apps -->
  <link href="View/assets/css/login.css" rel="stylesheet" type="text/css" media="all" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- //<link href='//fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'> -->
</head>
<body class="hold-transition login-page">
  <div class="login-box-2">
    <div class="login-box-page">
      <p class="login-box-msg2">MAN 1 Rokan Hilir</p>
      <form action="Controller/auth.php" method="POST">
        <div class="form-group has-feedback">
          <input type="text" name = "username" class="form-control" placeholder="Username">
          <span class="far fa-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" name = "password" class="form-control" placeholder="Password">
          <span class="fas fa-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="submit" Value="Log In" class="btn btn-primary btn-block btn-flat">
        </div>
        <div class="footer">
          <p>&copy 2020 Ardiyanto</a></p>
        </div>
      </form>
      <div class="clearfix"> </div>
    </div>
  </div>
  <!-- //main -->
</body>
</html>