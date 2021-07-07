<!DOCTYPE html>
<html>
  <head>
    <title>MAN 1 Rohil | BI System</title>
    <!-- for-mobile-apps -->
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
                <a class="navbar-brand" href="#"><span class="highlight">BI</span> Mansahil</a>
              </li>
              <li>
                <button type="button" link="../Controller/logout.php">
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
                    <h4 class="username">Yakin Keluar? </h4>
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
      <?php
        $data=new allFunction();
        if(!empty($_POST['tahun'])){
          $tahun=$_POST['tahun'];
        }
        else{
          $tahun=2017;
        }
        $zoneWarna1="warna1";
        $zoneWarna2="warna2";
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
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <label>Target MAN 1 Rokan Hilir Tahun <?php echo $tahunWarna1;?></label>
            </div>
          </div>
        </div>
      </div>
       <div class="row">
        <!-- KPI Prestasi -->

        <div class="col-lg-2">
          <div id="kpiprestasi" class="cardkpi">
            <div class="card-header"> Prestasi <?php echo $tahunWarna1;?>
            </div>
          <div class="body-text">
            <div class="col-lg-2" id="cardkpi2">
              <i class="fa fa-trophy" style="font-size:30px"></i>
            </div>
            <div class="col-lg-9">
              Prestasi yang akan diraih
            </div>
          </div>
          <div class="card-body">
            <div class="cardtitle"><?php echo $prestasiWarna1;?></div>
          </div>
        </div>
      </div>

   <!--- KPI SDM -->

  <div class="col-lg-2">
    <div id="kpisdm" class="cardkpi">
        <div class="card-header">SDM <?php echo $tahunWarna1;?></div>
        <div class="body-text">
        <div class="col-lg-2" id="cardkpi2">
              <i class="fa fa-user" style="font-size:30px"></i>
            </div>
            <div class="col-lg-9">
              SDM yang akan dimiliki
            </div></div>
        <div class="card-body">
            <div class="cardtitle"><?php echo $sdmWarna1;?></div>
        </div>
    </div>
  </div>

  <!-- KPI Fasilitas -->


  <div class="col-lg-2">
    <div id="kpifasilitas" class="cardkpi">
        <div class="card-header">
            Fasilitas   <?php echo $tahunWarna1;?></div>
        <div class="body-text">
        <div class="col-lg-2" id="cardkpi2">
              <i class="fa fa-building" style="font-size:30px"></i>
            </div>
            <div class="col-lg-9">
              Fasilitas yang akan dimiliki
            </div></div>
        <div class="card-body">
            <div class="cardtitle"><?php echo $fasilitasWarna1;?></div>
        </div>
    </div>
  </div>

  <!-- KPI DANA -->

  <div class="col-lg-3">
    <div id="kpidana" class="cardkpi">
      <div class="card-header">
        Penggunaan Dana <?php echo $tahunWarna1;?>
      </div>
      <div class="body-text">
      <div class="col-lg-2" id="cardkpi2">
              <i class="fa fa-money" style="font-size:30px"></i>
            </div>
            <div class="col-lg-9">
              Jumlah dana yang akan digunakan
            </div></div>

      <div class="card-body">
        <div class="cardtitle">Rp<?php echo number_format($danaWarna1,2,",",".").',-'; ?></div>
      </div>
    </div>
  </div>

  <!-- KPI NILAI -->
  <div class="col-lg-3">
    <div id="kpinilai" class="cardkpi">
        <div class="card-header">
           Rata-Rata Nilai <?php echo $tahunWarna1;?>
        </div>
        <div class="body-text">
        <div class="col-lg-2" id="cardkpi2">
              <i class="fa fa-star" style="font-size:30px"></i>
            </div>
            <div class="col-lg-9">
              Rata-Rata Nilai yang akan dicapai
            </div></div>

        <div class="card-body">
            <div class="cardtitle"><?php echo $nilaiWarna1;?></div>
        </div>
    </div>
  </div>

</div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <form action="" method="POST">
                <div class="form-group">
                  <label>Pilih Tahun Yang Diinginkan Untuk Melihat Key Performance Index</label>
                  <select class="form-control" name="tahun" onChange='this.form.submit()'>
                    <option value="<?php echo $tahun;?>">--Pilih Tahun--</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                  </select>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- KPI Prestasi -->
        <?php
          $dana=$data->getPerformancePrestasi($tahun);
          foreach($dana as $dn){
            $score=$dn['Jumlah'];
          }
        ?>
        <?php
        if($score < $prestasiWarna1){ ?>
        <div class="col-lg-2">
          <div  class="cardkpimerah">
            <div class="card-header">
              KPI Prestasi
            </div>
          <div class="body-text">Prestasi Pada Tahun <?php echo $tahun;?></div>
          <div class="card-body">
            <div class="cardtitle2"><?php echo $score; ?></div>
          </div>
        </div>
        <?php } else { ?>
          <div class="col-lg-2">
          <div  class="cardkpihijau">
            <div class="card-header">
              KPI Prestasi
            </div>
          <div class="body-text">Prestasi Pada Tahun <?php echo $tahun;?></div>
          <div class="card-body">
            <div class="cardtitle2"><?php echo $score; ?></div>
          </div>
        </div>
        <?php }
         ?>

      </div>


   <!--- KPI SDM -->
   <?php
    $dana=$data->getPerformanceSDM($tahun);
    foreach($dana as $dn){
      $score=$dn['guru'];
      }
  ?>
  <?php
        if($score < $sdmWarna1){ ?>
        <div class="col-lg-2">
    <div  class="cardkpimerah">
        <div class="card-header">
            KPI SDM   </div>
        <div class="body-text">SDM Pada Tahun <?php echo $tahun;?></div>
        <div class="card-body">
            <div class="cardtitle2"><?php echo $score; ?></div>
        </div>
    </div>
  </div>
        <?php } else { ?>
          <div class="col-lg-2">
    <div  class="cardkpihijau">
        <div class="card-header">
            KPI SDM   </div>
        <div class="body-text">SDM Pada Tahun <?php echo $tahun;?></div>
        <div class="card-body">
            <div class="cardtitle2"><?php echo $score; ?></div>
        </div>
    </div>
  </div>
        <?php } ?>

  <!-- KPI Fasilitas -->
  <?php
    $dana=$data->getPerformanceFasilitas($tahun);
    foreach($dana as $dn){
      $score=$dn['fasilitas'];
      }
  ?>
<?php
        if($score < $fasilitasWarna1){ ?>
<div class="col-lg-2">
    <div class="cardkpimerah">
        <div class="card-header">
            KPI Fasilitas   </div>
        <div class="body-text">Fasilitas Pada Tahun <?php echo $tahun;?></div>
        <div class="card-body">
            <div class="cardtitle2"><?php echo $score; ?></div>
        </div>
    </div>
  </div>
        <?php } else { ?>
          <div class="col-lg-2">
    <div class="cardkpihijau">
        <div class="card-header">
            KPI Fasilitas   </div>
        <div class="body-text">Fasilitas Pada Tahun <?php echo $tahun;?></div>
        <div class="card-body">
            <div class="cardtitle2"><?php echo $score; ?></div>
        </div>
    </div>
  </div>
        <?php } ?>



  <!-- KPI DANA -->
  <?php
    $dana=$data->getPerformanceDana($tahun);
    foreach($dana as $dn){
    $score=$dn['biaya'];
    }
  ?>
<?php
        if($score <= $danaWarna1){ ?>
        <div class="col-lg-3">
    <div class="cardkpihijau">
      <div class="card-header">
        KPI Penggunaan Dana
      </div>
      <div class="body-text">Penggunaan Dana Pada Tahun <?php echo $tahun;?></div>
      <div class="card-body">
        <div class="cardtitle2">Rp<?php echo number_format($score,2,",",".").',-'; ?></div>
      </div>
    </div>
  </div>
        <?php } else { ?>
          <div class="col-lg-3">
    <div class="cardkpimerah">
      <div class="card-header">
        KPI Penggunaan Dana
      </div>
      <div class="body-text">Penggunaan Dana Pada Tahun <?php echo $tahun;?></div>
      <div class="card-body">
        <div class="cardtitle2">Rp<?php echo number_format($score,2,",",".").',-'; ?></div>
      </div>
    </div>
  </div>
        <?php } ?>


  <!-- KPI NILAI -->
  <?php
    $dana=$data->getPerformanceNilai($tahun);
    foreach($dana as $dn){
      $score=$dn['Rata'];
      }
  ?>
<?php if($score < $nilaiWarna1){ ?>
  <div class="col-lg-3">
          <div class="cardkpimerah">
            <div class="card-header">
              KPI Rata-Rata Nilai
          </div>
          <div class="body-text">Rata-Rata Nilai Rapor Pada Tahun <?php echo $tahun;?></div>
          <div class="card-body">
              <div class="cardtitle2"><?php echo $score; ?></div>
          </div>
    </div>
  </div>
<?php } else { ?>
  <div class="col-lg-3">
          <div class="cardkpihijau">
            <div class="card-header">
              KPI Rata-Rata Nilai
          </div>
          <div class="body-text">Rata-Rata Nilai Rapor Pada Tahun <?php echo $tahun;?></div>
          <div class="card-body">
              <div class="cardtitle2"><?php echo $score; ?></div>
          </div>
    </div>
  </div>
<?php } ?>



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