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
<?php
$data=new allFunction();
?>

<div class="row">
  <div class="col-md-12">
  <div class="card2">
        <div class="card-header3">
            Visualisasi Perkembangan SDM Terhadap Nilai
</div>
</div>
</div>
</div>
<!-- Visualisasi SDM -->
<div class="row">
  <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          Visualisasi per Tahun Pencapaian SDM
        </div>
        <div class="card-body">
        <div id="containerrrrrrrrrr" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        <script type="text/javascript">


// Create the chart
Highcharts.chart('containerrrrrrrrrr', {
    colors: ['#3c8dbc', '#f00', '#20ff00'],
    chart: {
        type: 'column'
    },
    title: {
        text: 'Pencapaian SDM Tahunan'
    },
    subtitle: {
        text: 'Click untuk melakukan drilldown data per Guru Bidang'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Jumlah Guru'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:,.0f}'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:,.0f}</b><br/>'
    },

    series: [{
        name: 'Tahun',
        colorByPoint: true,
        data:
        [
        <?php

        $row=$data->getDataSDMPerTahun();
        foreach($row as $m){
        ?>
        {
            name: '<?php echo $m['year'];?>',
            y: <?php echo $m['Jumlah'];?>,
            drilldown: '<?php $year=$m['year'];echo $m['year'];?>'
        },
        <?php }?>
        ]
    }],
    drilldown: {
        series: [<?php $yy=$data->getSDMYears();
        foreach($yy as $y){
          $year=$y['year'];
        ?>{
            name: '<?php echo $year;?>',
            id: '<?php echo $year;?>',
            data: [
            <?php $dt=$data->getDataSDMByYears($year);
            foreach($dt as $d){
            ?>
                [
                    '<?php echo $d['GuruBidang'];?>',
                    <?php echo $d['Jumlah'];?>
                ],
            <?php } ?>
                ]
        },<?php } ?>]
    }
});
    </script>
    </div>
</div>
</div>
<div class="col-md-6">
      <div class="card">
        <div class="card-header">
          Visualisasi per Tahun Pencapaian Nilai Rapor
        </div>
        <div class="card-body">
        <div id="containerrrrrrrrr" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        <script type="text/javascript">


// Create the chart
Highcharts.chart('containerrrrrrrrr', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Pencapaian Nilai Rapor Tahunan'
    },
    subtitle: {
        text: 'Click untuk melakukan drilldown data per generasi'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        allowDecimals: false,
        title: {
            text: 'Rata-Rata Nilai Rapor'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:,.2f}'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:,.2f}</b><br/>'

    },

    series: [{
        name: 'Tahun',
        colorByPoint: true,
        data:
        [
        <?php

        $row=$data->getDataNilaiPerTahun();
        foreach($row as $m){
        ?>
        {
            name: '<?php echo $m['year'];?>',
            y: <?php echo $m['Rata'];?>,
            drilldown: '<?php $year=$m['year'];echo $m['year'];?>'
        },
        <?php }?>
        ]
    }],
    drilldown: {
        series: [<?php $yy=$data->getNilaiYears();
        foreach($yy as $y){
          $year=$y['year'];
        ?>{
            name: '<?php echo $year;?>',
            id: '<?php echo $year;?>',
            data: [
            <?php $dt=$data->getDataNilaiByYears($year);
            foreach($dt as $d){
            ?>
                [
                    '<?php echo $d['Generasi'];?>',
                    <?php echo $d['Rata'];?>
                ],
            <?php } ?>
                ]
        },<?php } ?>]
    }
});
    </script>
    </div>
</div>
</div>
</div>


<div class="row">
  <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Visualisasi SDM, Capaian Nilai
        </div>
        <div class="card-body">
        <div id="containerrrrrr" style="min-width: 400px; height: 400px; margin: 0 auto"></div>



    <script type="text/javascript">

Highcharts.chart('containerrrrrr', {
    chart: {
        zoomType: 'xy'
    },
    title: {
        text: 'Data Akademik Tahunan MAN 1 Rokan Hilir'
    },
    subtitle: {
        text: ''
    },
    xAxis: [{
        <?php $yearr=$data->getYearFromDim();?>
        categories: [<?php foreach($yearr as $y){ ?>'<?php echo $y['year'];?>',<?php } ?>],
        crosshair: true
    }],
    yAxis: [{ // Secondary yAxis
        title: {
            text: 'Jumlah Guru',
            style: {
                color: Highcharts.getOptions().colors[0]
            }
        },
        labels: {
            format: '{value} ',
            style: {
                color: Highcharts.getOptions().colors[0]
            }
        }

    }, { // Tertiary yAxis
        gridLineWidth: 0,
        title: {
            text: 'Rata-Rata Nilai Rapor',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        labels: {
            format: '{value}',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        opposite: true
    }],
    tooltip: {
        shared: true
    },
    legend: {
        layout: 'vertical',
        align: 'left',
        x: 450,
        verticalAlign: 'top',
        y: 80,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
    },
    series: [{
        name: 'Guru',
        type: 'column',
        yAxis: 1,
        <?php $combosdm=$data->comboSDM(); ?>
        data: [<?php foreach($combosdm as $cd){ echo $cd['JumlahGB']; ?>,<?php }?>],
        tooltip: {
            valueSuffix: ' Guru'
        }

    }, {
        name: 'Nilai',
        type: 'spline',
        <?php $combonilai=$data->comboNilai(); ?>
        data: [<?php foreach($combonilai as $cn){ echo $cn['RataRata']; ?>,<?php }?>],
        tooltip: {
            valueSuffix: ''
        }
    }]
});


    </script>

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