<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="assets/highcharts/highcharts.js"></script>
<script src="assets/highcharts/data.js"></script>
<script src="assets/highcharts/drilldown.js"></script>
<script src="assets/highcharts/exporting.js"></script>
<script src="assets/highcharts/highcharts-more.js"></script>
<div class="app app-default">
<aside class="app-sidebar" id="sidebar">
  <div class="sidebar-header">
    <a class="sidebar-brand" href="#"><div class="highlight">MAN 1 Rokan Hilir</div>
    </a>



    <!-- <a class="sidebar-brand">BI System</a> -->
    <!-- <button type="button" class="sidebar-toggle">
      <i class="fa fa-times"></i>
    </button> -->
  </div>
  <div class="sidebar2 sidebar-menu">
  <div class="user-panel2">
        <div class="pull-left image">
          <img src="assets/images/gambar.jpg" class="img-circle2" alt="User Image">
        </div>
        <div class="pull-left info">
          <p class="color-p"><?php echo $_SESSION['sessionname']?></p><!-- use session name -->
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
   <ul class="sidebar-menu2 sidebar-nav">
    <li class="sidebar-header2">MAIN MENU</li>
    <li class="treeview dropdown">
      <a class="a2" href="index.php"><i class="fa fa-dashboard "></i><span> Home</span>
        <span class="pull-right2">
          <i class="fa fa-angle-right pull-right"></i>
        </span>
      </a>
      <div class="dropdown-menu">
        <ul>
            <li class="section"><i class="fa fa-tasks" aria-hidden="true"></i><a href="index.php">Home</a></li>
          </ul>
      </div>
    </li>
    <li class="treeview dropdown">
      <a class="a2" href="#"><i class="fa fa-home "></i><span> Dashboard</span>
        <span class="pull-right2">
          <i class="fa fa-angle-right pull-right"></i>
        </span>
      </a>
        <div class="dropdown-menu">
          <ul>
            <li class="section"><i class="fa fa-file-o" aria-hidden="true"></i>Dashboard Pengaruh Dana</li>
            <li><a href="danatonilai.php">Dana Terhadap Nilai</a></li>
            <li><a href="danatoprestasi.php">Dana Terhadap Prestasi</a></li>
            <li class="section"><i class="fa fa-file-o" aria-hidden="true"></i>Dashboard Pengaruh SDM</li>
            <li><a href="sdmtonilai.php">SDM Terhadap Nilai</a></li>
            <li><a href="sdmtoprestasi.php">SDM Terhadap Prestasi</a></li>
            <li class="section"><i class="fa fa-file-o" aria-hidden="true"></i>Dashboard Pengaruh Fasilitas</li>
            <li><a href="fasilitastoprestasi.php">Fasilitas Terhadap Prestasi</a></li>
          </ul>
        </div>
    </li>
    <li class="treeview dropdown">
      <a class="a2" href="upload.php"><i class="fa fa-cogs"></i><span> Proses ETL</span>
        <span class="pull-right2">
          <i class="fa fa-angle-right pull-right"></i>
        </span>
      </a>
      <!-- <div class="dropdown-menu">
        <ul>
          <li class="section"><i class="fa fa-cog" aria-hidden="true"></i>Proses ETL</li>
            <li class="section"><i class="fa fa-file-o" aria-hidden="true"></i>Extract</li>
            <li><a href="upload.php">Upload Data</a></li>
            <li class="section"><i class="fa fa-file-o" aria-hidden="true"></i>Transform & Load</li>
            <li><a href="factgenerate.php">Generate Fact Table</a></li>
          </ul>
      </div> -->
    </li>
    <li class="treeview dropdown">
      <a class="a2" href="updatekpi.php"><i class="fa fa-edit"></i><span>Update KPI</span>
        <span class="pull-right2">
          <i class="fa fa-angle-right pull-right"></i>
        </span>
      </a>
      <div class="dropdown-menu">
        <ul>
            <li class="section"><i class="fa fa-refresh" aria-hidden="true"></i><a href="updatekpi.php">Update KPI</a></li>
          </ul>
</div>
    </li>
   </ul>
  </div>
  <!-- <div class="sidebar-menu">
    <ul class="sidebar-nav"> -->
    <!-- <li class="">
        <a href="updatekpi.php">
          <div class="icon">
            <img class="img-circle" src="assets/images/icon.png" />
          </div>
          <div class="title">BI System</div>
        </a>
      </li> -->
      <!-- <li class="dropdown">
        <a href="#">
            <i class="fa fa-home"  aria-hidden="true"></i>
        </a>
        <div class="dropdown-menu">
        <ul>
            <li class="section"><i class="fa fa-tasks" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
          </ul>
</div>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <div class="icon">
            <i class="fa fa-cogs"  aria-hidden="true">ETL</i>
          </div>

        </a>
        <div class="dropdown-menu">
          <ul>
          <li class="section"><i class="fa fa-cog" aria-hidden="true"></i>Proses ETL</li>
            <li class="section"><i class="fa fa-file-o" aria-hidden="true"></i>Extract</li>
            <li><a href="upload.php">Upload Data</a></li>
            <li class="section"><i class="fa fa-file-o" aria-hidden="true"></i>Transform & Load</li>
            <li><a href="factgenerate.php">Generate Fact Table</a></li>
          </ul>
        </div>
      </li>
      <li class="dropdown">
        <a href="#">
          <div class="icon">
            <i class="fa fa-edit" style="margin-left:10px" aria-hidden="true"></i>
          </div>

        </a>
        <div class="dropdown-menu">
        <ul>
            <li class="section"><i class="fa fa-refresh" aria-hidden="true"></i><a href="updatekpi.php">Update KPI</a></li>
          </ul>
</div>
      </li>
    </ul>
  </div> -->
</aside>