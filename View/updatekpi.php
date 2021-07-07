<!DOCTYPE html>
<html>
<head>
  <title>Update KPI | Business Intelligence System</title>

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
$zoneWarna1="warna1";
$row=$data->getDataKpiByZone($zoneWarna1);
if(!empty($row)){
foreach($row as $m){
  $danaWarna1=$m['kpi_dana'];
  $prestasiWarna1=$m['kpi_prestasi'];
  $nilaiWarna1=$m['kpi_nilai'];
  $fasilitasWarna1=$m['kpi_fasilitas'];
  $sdmWarna1=$m['kpi_sdm'];
  $tahunWarna1=$m['year'];
  }
}
?>
</div>
<div class="row">
  <div class="col-md-12">
      <div class="card">
        <div class="card-header2">
          Update Key Performance Indicator
        </div>
        <div class="card-body">
          <div class="row">
            <form enctype="multipart/form-data" action="../Controller/kpiupdate.php" method="POST">
          <!-- <h3><center>Silahkan masukkan nilai indikator untuk menentukan Key Performance Indicator</center></h3> -->
          <!-- <br><br> -->
            <div class="col-md-12 colborder">
              <h4  class="card-header2">Dana</h4>
                <p>KPI Dana (Jumlah Dana yang akan digunakan)</p>
                <input type="text" name="dana1" class="form-control" required value="<?php echo $danaWarna1;?>" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
            </div>
            <div class="col-md-12 colborder">
              <h4 class="card-header2">Prestasi</h4>
              <p>KPI Prestasi (Jumlah Prestasi yang akan diraih)</p>
              <input type="text" name="prestasi1" class="form-control" required value="<?php echo $prestasiWarna1;?>">

            </div>
            <div class="col-md-12 colborder">
              <h4 class="card-header2">Nilai</h4>
              <p>KPI Nilai (Rata-Rata nilai yang akan dicapai)</p>
              <input type="number" step="any" name="nilai1" class="form-control" required value="<?php echo $nilaiWarna1;?>">

            </div>
            <div class="col-md-12 colborder">
              <h4 class="card-header2">Fasilitas</h4>
              <p>KPI Fasilitas (Jumlah Fasilitas yang dimiliki)</p>
              <input type="number" step="any" name="fasilitas1" class="form-control" required value="<?php echo $fasilitasWarna1;?>">

            </div>
            <div class="col-md-12 colborder">
              <h4 class="card-header2">SDM</h4>
             <p>KPI SDM (Jumlah Sumber Daya Manusia yang dimiliki)</p>
              <input type="number" step="any" name="sdm1" class="form-control" required value="<?php echo $sdmWarna1;?>">

            </div>
            <div class="col-md-12 colborder">
              <h4 class="card-header2">Tahun</h4>
             <p>KPI Tahun</p>
              <input type="number" step="any" name="tahun" class="form-control" required value="<?php echo $tahunWarna1;?>">

            </div>
            <!-- <br><br><br><br> -->
          <div class="col-md-12 colborder">
          <button title="Klik untuk update KPI" type="submit" class="form-control btn-primary" onclick="return confirm('Yakin ingin update KPI ?');">Update KPI</button>
          </div>
        </form>
</div>
        </div>
      </div>
    </div>
</div>

  <footer class="app-footer">
  <div class="row">
    <div class="col-xs-12">
      <div class="footer-copyright">
        Copyright &copy; 2017 Alvin Rinaldy. All Rights Reserved
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