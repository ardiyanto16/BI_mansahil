<!DOCTYPE html>
<html>
<head>
  <title>Transformasi Data | Business Intelligence System</title>
  <link rel="shortcut icon" href="assets/images/icon.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="assets/css/vendor.css">
  <link rel="stylesheet" type="text/css" href="assets/css/flat-admin.css">

  <!-- Theme -->
  <link rel="stylesheet" type="text/css" href="assets/css/theme/blue-sky.css">
  <link rel="stylesheet" type="text/css" href="assets/css/theme/blue.css">
  <link rel="stylesheet" type="text/css" href="assets/css/theme/red.css">
  <link rel="stylesheet" type="text/css" href="assets/css/theme/yellow.css">
<?php
  session_start();
if (empty($_SESSION['user']))
{
header("location:../?i=forbidden");
}

include "../Model/function.php";
include "../Model/koneksi.php";
?>
</head>
<body>
  <?php
	  include ("sidebar.php");
	?>

<script type="text/ng-template" id="sidebar-dropdown.tpl.html">
  <div class="dropdown-background">
    <div class="bg"></div>
  </div>
  <div class="dropdown-container">
    {{list}}
  </div>
</script>
<div class="app-container">

  <nav class="navbar navbar-default" id="navbar">
  <div class="container-fluid">
    <div class="navbar-collapse collapse in">
      <ul class="nav navbar-nav navbar-mobile">
        <li>
          <button type="button" class="sidebar-toggle">
            <i class="fa fa-bars"></i>
          </button>
        </li>
        <li class="logo">
          <a class="navbar-brand" href="#"><span class="highlight">Flat v3</span> Admin</a>
        </li>
        <li>
          <button type="button" class="navbar-toggle">
            <img class="profile-img" src="assets/images/profile.png">
          </button>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-left">
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown notification">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <div class="icon"><img class="profile-img img-circle2" src="assets/images/gambar.jpg"></div>
          </a>
          <div class="dropdown-menu">
          <div class="profile-info">
              <h4 class="username">Hello User </h4>
          </div>
          <ul class="action">
            <li>
                <a href="../Controller/logout.php">
                  Logout
                </a>
              </li>
          </ul>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="row">
<?php
$data=new allFunction();
?>
</div>
<div class="row">
  <div class="col-md-12">
      <div class="card">
        <div class="card-header2">
          Proses Data
        </div>
        <div class="card-body">
          <div class="row">
          <form enctype="multipart/form-data" action="../Controller/generatefact.php" method="POST">
  <div class="col-md-12">
    Klik tombol proses untuk mengolah data. Proses pengolahan data akan memakan waktu 1-4 menit tergantung banyaknya jumlah data
    <br><br>
    <button type="submit" name="submit" class="form-control btn btn-primary" onclick="return confirm('Yakin ingin generate fact table ?');">Proses Data</button>
    </form>
  </div>
</div>
        </div>
      </div>
    </div>
</div>

  <footer class="app-footer">
  <div class="row">
    <div class="col-xs-12">
      <div class="footer-copyright">
        Copyright &copy; 2020 Ardiyanto. All Rights Reserved
      </div>
    </div>
  </div>
</footer>
</div>

  </div>

  <script type="text/javascript" src="assets/js/vendor.js"></script>
  <script type="text/javascript" src="assets/js/app.js"></script>

</body>
</html>