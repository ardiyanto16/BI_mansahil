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
        Visualisasi Perkembangan SDM Terhadap Prestasi
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Visualisasi SDM
        </div>
        <div class="card-body">
        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        <script type="text/javascript">
        Highcharts.createElement('link', {
          href: 'https://fonts.googleapis.com/css?family=Josefin+Sans',
          rel: 'stylesheet',
          type: 'text/css'
        }, null, document.getElementsByTagName('head')[0]);

        Highcharts.theme = {
          colors: ['#3c8dbc', '#20ff00', '#f00', '#7798BF', '#aaeeee', '#ff0066', '#eeaaee',
              '#55BF3B', '#DF5353', '#7798BF', '#aaeeee'],
          chart: {
              backgroundColor: {
                linearGradient: { x1: 0, y1: 0, x2: 1, y2: 1 },
                stops: [
                    [0, '#fff'],
                    [1, '#fff']
                ]
              },
              style: {
                fontFamily: '\'Times new roman\', sans-serif'
              },
              plotBorderColor: '#000'
          },
          title: {
              style: {
                color: '#000',
                textTransform: 'capital each other',
                fontSize: '20px'
              }
          },
          subtitle: {
              style: {
                color: '#000',
                textTransform: 'capital each other'
              }
          },
          xAxis: {
              gridLineColor: '#000',
              labels: {
                style: {
                    color: '#000'
                }
              },
              lineColor: '#000',
              minorGridLineColor: '#fff',
              tickColor: '#000',
              title: {
                style: {
                    color: '#000'

                }
              }
          },
          yAxis: {
              gridLineColor: '#c1c1c6',
              labels: {
                style: {
                    color: '#000'
                }
              },
              lineColor: '#c1c1c6',
              minorGridLineColor: '#505053',
              tickColor: '#c1c1c6',
              tickWidth: 1,
              title: {
                style: {
                    color: '#000'
                }
              }
          },
          tooltip: {
              backgroundColor: 'rgba(0, 0, 0, 0.85)',
              style: {
                color: '#F0F0F0'
              }
          },
          plotOptions: {
              series: {
                dataLabels: {
                    color: '#000'
                },
                marker: {
                    lineColor: '#333'
                }
              },
              boxplot: {
                fillColor: '#505053'
              },
              candlestick: {
                lineColor: 'white'
              },
              errorbar: {
                color: 'white'
              }
          },
          legend: {
              itemStyle: {
                color: '#E0E0E3'
              },
              itemHoverStyle: {
                color: '#FFF'
              },
              itemHiddenStyle: {
                color: '#606063'
              }
          },
          credits: {
              style: {
                color: '#666'
              }
          },
          labels: {
              style: {
                color: '#fff'
              }
          },

          drilldown: {
              activeAxisLabelStyle: {
                color: '#000'
              },
              activeDataLabelStyle: {
                color: '#000'
              }
          },

          navigation: {
              buttonOptions: {
                symbolStroke: '#DDDDDD',
                theme: {
                    fill: '#505053'
                }
              }
          },

          // scroll charts
          rangeSelector: {
              buttonTheme: {
                fill: '#505053',
                stroke: '#000000',
                style: {
                    color: '#CCC'
                },
                states: {
                    hover: {
                      fill: '#707073',
                      stroke: '#000000',
                      style: {
                          color: 'white'
                      }
                    },
                    select: {
                      fill: '#000003',
                      stroke: '#000000',
                      style: {
                          color: 'white'
                      }
                    }
                }
              },
              inputBoxBorderColor: '#505053',
              inputStyle: {
                backgroundColor: '#333',
                color: 'silver'
              },
              labelStyle: {
                color: 'silver'
              }
          },

          navigator: {
              handles: {
                backgroundColor: '#666',
                borderColor: '#AAA'
              },
              outlineColor: '#CCC',
              maskFill: 'rgba(255,255,255,0.1)',
              series: {
                color: '#7798BF',
                lineColor: '#A6C7ED'
              },
              xAxis: {
                gridLineColor: '#505053'
              }
          },

          scrollbar: {
              barBackgroundColor: '#808083',
              barBorderColor: '#808083',
              buttonArrowColor: '#CCC',
              buttonBackgroundColor: '#606063',
              buttonBorderColor: '#606063',
              rifleColor: '#FFF',
              trackBackgroundColor: '#404043',
              trackBorderColor: '#404043'
          },

          // special colors for some of the
          legendBackgroundColor: 'rgba(0, 0, 0, 0.5)',
          background2: '#505053',
          dataLabelsColor: '#B0B0B3',
          textColor: '#C0C0C0',
          contrastTextColor: '#F0F0F3',
          maskColor: 'rgba(255,255,255,0.3)'
        };

// Apply the theme
Highcharts.setOptions(Highcharts.theme);

// Create the chart
Highcharts.chart('container', {
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
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:,.1f}</b><br/>'
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
</div>
<div class="row">
  <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          Visualisasi per Tingkat Pencapaian Prestasi
        </div>
        <div class="card-body">
        <div id="containerrr" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        <script type="text/javascript">


// Create the chart
Highcharts.chart('containerrr', {
    colors: ['#3c8dbc', '#fffb01', '#20ff00'],
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Pencapaian Prestasi Tahunan'
    },
    subtitle: {
        text: 'Click untuk melakukan drilldown data per tingkat prestasi'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Jumlah'
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
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:,.0f} Capaian</b><br/>'
    },

    series: [{
        name: 'Tahun',
        colorByPoint: true,
        data:
        [
        <?php

        $row=$data->getDataPrestasiPerTahun();
        foreach($row as $m){
        ?>
        {
            name: '<?php echo $m['year'];?>',
            y: <?php echo $m['jumlah'];?>,
            drilldown: '<?php $year=$m['year'];echo $m['year'];?>'
        },
        <?php }?>
        ]
    }],
    drilldown: {
        series: [<?php $yy=$data->getPrestasiYears();
        foreach($yy as $y){
          $year=$y['year'];
        ?>{
            name: '<?php echo $year;?>',
            id: '<?php echo $year;?>',
            data: [
            <?php $dt=$data->getDataPrestasiByTahun($year);
            foreach($dt as $d){
            ?>
                [
                    '<?php echo $d['Tingkat'];?>',
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
          Visualisasi per Bulan Pencapaian Prestasi
        </div>
        <div class="card-body">
        <div id="containerrrr" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        <script type="text/javascript">


// Create the chart
Highcharts.chart('containerrrr', {
  colors: ['#79BD9A', '#3B8686', '#0B486B'],
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Pencapaian Prestasi Tahunan'
    },
    subtitle: {
        text: 'Click untuk melakukan drilldown data per bulan'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Jumlah'
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
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:,.0f} Capaian</b><br/>'
    },

    series: [{
        name: 'Tahun',
        colorByPoint: true,
        data:
        [
        <?php

        $row=$data->getDataPrestasiPerTahun();
        foreach($row as $m){
        ?>
        {
            name: '<?php echo $m['year'];?>',
            y: <?php echo $m['jumlah'];?>,
            drilldown: '<?php $year=$m['year'];echo $m['year'];?>'
        },
        <?php }?>
        ]
    }],
    drilldown: {
        series: [<?php $yy=$data->getPrestasiYears();
        foreach($yy as $y){
          $year=$y['year'];
        ?>{
            name: '<?php echo $year;?>',
            id: '<?php echo $year;?>',
            data: [
            <?php $dt=$data->getDataPrestasiBulanByYears($year);
            foreach($dt as $d){
            ?>
                [
                    'Bulan <?php echo $d['month'];?>',
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
</div>


<div class="row">
  <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Visualisasi Perkembangan SDM, Capaian Prestasi
        </div>
        <div class="card-body">
        <div id="containerrrrrr" style="min-width: 400px; height: 400px; margin: 0 auto"></div>



    <script type="text/javascript">

Highcharts.chart('containerrrrrr', {
  colors: ['#3c8dbc', '#f00', '#20ff00'],
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
    yAxis: [{ // Primary yAxis
        labels: {
            format: '{value}',
            style: {
                color: Highcharts.getOptions().colors[2]
            }
        },
        title: {
            text: 'Prestasi',
            style: {
                color: Highcharts.getOptions().colors[2]
            }
        },
        opposite: true

    }, { // Secondary yAxis
        gridLineWidth: 0,
        title: {
            text: 'Guru',
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
            valueSuffix: ''
        }

    }, {
        name: 'Prestasi',
        type: 'spline',
        <?php $comboprestasi=$data->comboPrestasi(); ?>
        data: [<?php foreach($comboprestasi as $cn){ echo $cn['Jumlah']; ?>,<?php }?>],
        tooltip: {
            valueSuffix: ''
        },
        dashStyle: 'ShortDash'
    }]
});


    </script>

    </div>
</div>
</div>
</div>


<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        Visualisasi Prestasi Tingkat Kecamatan
      </div>
      <div class="card-body">
        <div id="containerrrrk" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        <script type="text/javascript">
        // Create the chart
Highcharts.chart('containerrrrk', {
    colors: ['#601848', '#C04848', '#F07241'],
    chart: {
        type: 'column'
    },
    title: {
        text: 'Pencapaian Prestasi Tahunan'
    },
    subtitle: {
        text: 'Click untuk melakukan drilldown data per bulan'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Jumlah'
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
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:,.0f} Capaian</b><br/>'
    },

    series: [{
        name: 'Tahun',
        colorByPoint: true,
        data:
        [
        <?php

        $row=$data->getDataPrestasiPerTahunKecamatan();
        foreach($row as $m){
        ?>
        {
            name: '<?php echo $m['year'];?>',
            y: <?php echo $m['jumlah'];?>,
            drilldown: '<?php $year=$m['year'];echo $m['year'];?>'
        },
        <?php }?>
        ]
    }],
    drilldown: {
        series: [<?php $yy=$data->getPrestasiYears();
        foreach($yy as $y){
          $year=$y['year'];
        ?>{
            name: '<?php echo $year;?>',
            id: '<?php echo $year;?>',
            data: [
            <?php $dt=$data->getDataPrestasiBulanByYearsKecamatan($year);
            foreach($dt as $d){
            ?>
                [
                    'Bulan <?php echo $d['month'];?>',
                    <?php echo $d['Jumlah'];?>,
                ],
            <?php } ?>
                ]
        },
        <?php } ?>]
    }
});
    </script>
    </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card">
    <div class="card-header">
        Visualisasi Prestasi Tingkat Kabupaten
      </div>
      <div class="card-body">
        <div id="containerrrrka" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        <script type="text/javascript">
        // Create the chart
Highcharts.chart('containerrrrka', {
    colors: ['#601848', '#C04848', '#F07241'],
    chart: {
        type: 'column'
    },
    title: {
        text: 'Pencapaian Prestasi Tahunan'
    },
    subtitle: {
        text: 'Click untuk melakukan drilldown data per bulan'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Jumlah'
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
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:,.0f} Capaian</b><br/>'
    },

    series: [{
        name: 'Tahun',
        colorByPoint: true,
        data:
        [
        <?php

        $row=$data->getDataPrestasiPerTahunKabupaten();
        foreach($row as $m){
        ?>
        {
            name: '<?php echo $m['year'];?>',
            y: <?php echo $m['jumlah'];?>,
            drilldown: '<?php $year=$m['year'];echo $m['year'];?>'
        },
        <?php }?>
        ]
    }],
    drilldown: {
        series: [<?php $yy=$data->getPrestasiYears();
        foreach($yy as $y){
          $year=$y['year'];
        ?>{
            name: '<?php echo $year;?>',
            id: '<?php echo $year;?>',
            data: [
            <?php $dt=$data->getDataPrestasiBulanByYearsKabupaten($year);
            foreach($dt as $d){
            ?>
                [
                    'Bulan <?php echo $d['month'];?>',
                    <?php echo $d['Jumlah'];?>,
                ],
            <?php } ?>
                ]
        },
        <?php } ?>]
    }
});
    </script>
    </div>
    </div>
  </div>
  </div>
  <div class="row">
  <div class="col-md-6">
    <div class="card">
    <div class="card-header">
        Visualisasi Prestasi Tingkat Provinsi
      </div>
      <div class="card-body">
        <div id="containerrrrp" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        <script type="text/javascript">
        // Create the chart
Highcharts.chart('containerrrrp', {
    colors: ['#601848', '#C04848', '#F07241'],
    chart: {
        type: 'column'
    },
    title: {
        text: 'Pencapaian Prestasi Tahunan'
    },
    subtitle: {
        text: 'Click untuk melakukan drilldown data per bulan'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Jumlah'
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
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:,.0f} Capaian</b><br/>'
    },

    series: [{
        name: 'Tahun',
        colorByPoint: true,
        data:
        [
        <?php

        $row=$data->getDataPrestasiPerTahunProvinsi();
        foreach($row as $m){
        ?>
        {
            name: '<?php echo $m['year'];?>',
            y: <?php echo $m['jumlah'];?>,
            drilldown: '<?php $year=$m['year'];echo $m['year'];?>'
        },
        <?php }?>
        ]
    }],
    drilldown: {
        series: [<?php $yy=$data->getPrestasiYears();
        foreach($yy as $y){
          $year=$y['year'];
        ?>{
            name: '<?php echo $year;?>',
            id: '<?php echo $year;?>',
            data: [
            <?php $dtT=$data->getDataPrestasiBulanByYearsProvinsi($year);
            foreach($dtT as $dT){
            ?>
                [
                    'Bulan <?php echo $dT['month'];?>',
                    <?php echo $dT['Jumlah'];?>,
                ],
            <?php } ?>
                ]
        },
        <?php } ?>]
    }
});
    </script>
    </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card">
    <div class="card-header">
        Visualisasi Prestasi Tingkat Nasional
      </div>
      <div class="card-body">
        <div id="containerrrrn" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        <script type="text/javascript">
        // Create the chart
Highcharts.chart('containerrrrn', {
    colors: ['#601848', '#C04848', '#F07241'],
    chart: {
        type: 'column'
    },
    title: {
        text: 'Pencapaian Prestasi Tahunan'
    },
    subtitle: {
        text: 'Click untuk melakukan drilldown data per bulan'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Jumlah'
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
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:,.0f} Capaian</b><br/>'
    },

    series: [{
        name: 'Tahun',
        colorByPoint: true,
        data:
        [
        <?php

        $row=$data->getDataPrestasiPerTahunNasional();
        foreach($row as $m){
        ?>
        {
            name: '<?php echo $m['year'];?>',
            y: <?php echo $m['jumlah'];?>,
            drilldown: '<?php $year=$m['year'];echo $m['year'];?>'
        },
        <?php }?>
        ]
    }],
    drilldown: {
        series: [<?php $yy=$data->getPrestasiYears();
        foreach($yy as $y){
          $year=$y['year'];
        ?>{
            name: '<?php echo $year;?>',
            id: '<?php echo $year;?>',
            data: [
            <?php $dtT=$data->getDataPrestasiBulanByYearsNasional($year);
            foreach($dtT as $dT){
            ?>
                [
                    'Bulan <?php echo $dT['month'];?>',
                    <?php echo $dT['Jumlah'];?>,
                ],
            <?php } ?>
                ]
        },
        <?php } ?>]
    }
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