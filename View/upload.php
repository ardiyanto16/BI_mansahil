<!DOCTYPE html>
<html>
<head>
  <title>Upload Data | Business Intelligence System</title>
  <link rel="shortcut icon" href="assets/images/icon.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="assets/css/vendor.css">
  <link rel="stylesheet" type="text/css" href="assets/css/flat-admin.css">
  <link href="assets/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
  <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> -->

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
        <!-- <li class="navbar-title">Dashboard</li> -->
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
</div>
<div class="row">
  <div class="col-md-12">
      <div class="card">
        <div class="card-header2">
        Upload Data
          <?php
          if(isset($_GET['i'])){
                    $i=$_GET['i'];
                    if($i=="berhasil"){
                        $msg='Upload Data Berhasil !! Jika telah selesai upload data, silahkan generate fact table.';
                        echo "<script type='text/javascript'>alert('$msg');</script>";
                    }
                    else if($i=="gagal"){
                         $msg='Upload Data Gagal !! Silahkan cek kembali format data anda';
                        echo "<script type='text/javascript'>alert('$msg');</script>";
                    }
          }
                ?>
        </div>
        <div class="card-body">
          <div class="row">
  <div class="col-md-12">
  Silahkan Download Format Data Terlebih Dahulu
  <div class="upload_header">
    <a href="../data/FormatPrestasi.csv" class="btn btn-default">
      <span class="fa fa-download"></span>
      Format Prestasi
    </a>
    <a href="../data/FormatDana.csv" class="btn btn-default">
      <span class="fa fa-download"></span>
      Format Dana
    </a>
    <a href="../data/FormatNilai.csv" class="btn btn-default">
      <span class="fa fa-download"></span>
      Format Nilai
    </a>
    <a href="../data/FormatSDM.csv" class="btn btn-default">
      <span class="fa fa-download"></span>
      Format SDM
    </a>
    <a href="../data/FormatFasilitas.csv" class="btn btn-default">
      <span class="fa fa-download"></span>
      Format Fasilitas
    </a>
  </div>

    <form enctype="multipart/form-data" action="../Controller/dataupload.php" method="POST">
    Silahkan Pilih Jenis Data
    <select class="select2" name="type">
      <option value="prestasi">Prestasi</option>
      <option value="nilai">Nilai</option>
      <option value="dana">Dana</option>
      <option value="fasilitas">Fasilitas</option>
      <option value="sdm">SDM</option>
    </select>
    Silahkan Unggah file .csv sesuai dengan format
      <input id="kv-explorer" name="file[]" required type="file" multiple>

        <button title="Upload Data" type="submit" class="btn btn-primary input-but" onclick="return confirm('Yakin ingin upload data baru ?');">Submit</button>
        <button title="Hapus File yang Telah Dipilih" type="reset" class="btn btn-danger input-but">Reset</button>
    </form>
    <a href="factgenerate.php" class="form-control btn btn-primary">Selanjutnya
    </a>

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
  <script src="assets/js/sortable.js" type="text/javascript"></script>
  <script src="assets/js/fileinput.js" type="text/javascript"></script>
  <script src="assets/themes/theme.js" type="text/javascript"></script>
  <script>
    $(document).ready(function () {
        $("#kv-explorer").fileinput({
            'uploadUrl': '#',
            overwriteInitial: true,
            initialPreviewAsData: true
        });
        /*
         $("#test-upload").on('fileloaded', function(event, file, previewId, index) {
         alert('i = ' + index + ', id = ' + previewId + ', file = ' + file.name);
         });
         */
    });
</script>
</body>

</html>