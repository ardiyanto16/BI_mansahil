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
  <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
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
        Visualisasi Penggunaan Dana Terhadap Prestasi
      </div>
    </div>
  </div>

</div>
<div class="row">
  <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          Visualisasi Data per Program Penggunaan Dana
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
        // plotBackgroundColor: null,
        // plotBorderWidth: null,
        // plotShadow: false,
        type: 'bar',

    },
    title: {
        text: 'Penggunaan Dana Tahunan'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    subtitle: {
        text: 'Click untuk melakukan drilldown data per program penggunaan dana'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total (Rp)'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
      pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth: 35,
        },
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

        $row=$data->visualisasiProgramDanaTahunan();
        foreach($row as $m){
        ?>
        {
            name: '<?php echo $m['year'];?>',
            y: <?php echo $m['biaya'];?>,
            drilldown: '<?php echo $m['year'];?>'
        },
        <?php }?>
        ]
    }],
    drilldown: {
        series: [<?php $datayear=$data->getYears();
        foreach($datayear as $dy){
          $year = $dy['year'];
        ?>
        {
            name: '<?php echo $year;?>',
            id: '<?php echo $year;?>',
            data: [
            <?php $dt=$data->getDataByYears($year);
            foreach($dt as $d){
            ?>
                [
                    '<?php echo $d['JenisPengeluaran'];?>',
                    <?php echo $d['biaya'];?>
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
          Visualisasi per Bulan Penggunaan Dana
        </div>
        <div class="card-body">
        <div id="containerr" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        <script type="text/javascript">


// Create the chart
Highcharts.chart('containerr', {
    chart: {
      zoomType: 'x'
    },
    title: {
        text: 'Penggunaan Dana Bulanan'
    },
    subtitle: {
      text:  'Click dan geser untuk melihat data per bulan'

    },
    xAxis: {
      categories: [
        '01-2017','02-2017','03-2017','04-2017','05-2017','06-2017','07-2017','08-2017','09-2017','10-2017','11-2017','12-2017',
        '01-2018','02-2018','03-2018','04-2018','05-2018','06-2018','07-2018','08-2018','09-2018','10-2018','11-2018','12-2018',
        '01-2019','02-2019','03-2019','04-2019','05-2019','06-2019','07-2019','08-2019','09-2019','10-2019','11-2019','12-2019'
      ],
      crosshair: true
    },
    yAxis: {
        title: {
            text: 'Total (Rp)'
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
                format: 'Rp {point.y:,.0f}'
            }
        },
        area: {
                    fillColor: {
                        linearGradient: {
                            x1: 0,
                            y1: 0,
                            x2: 0,
                            y2: 1
                        },
                        stops: [
                            [0, Highcharts.getOptions().colors[0]],
                            [1, Highcharts.color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                        ]
                    },
                    marker: {
                        radius: 2
                    },
                    lineWidth: 1,
                    states: {
                        hover: {
                            lineWidth: 1
                        }
                    },
                    threshold: null
                }
    },


    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span> :',
        pointFormat: '<span style="color:{point.color}">{point.name}</span><br><span style="font-size:11px">Bulan</span> {point.name2} <br>Rp {point.y:,.0f}</b><br/>'
    },

    series: [{
        type: 'area',
        name: 'Tahun',
        colorByPoint: true,
        data:
        [
        <?php

        $row=$data->getdataBulanByYears();
        foreach($row as $m){
        ?>
        {
            name: '<?php echo $m['year'];?>',
            name2:'<?php echo $m['month'];?>' ,
            y: <?php echo $m['biaya'];?>,

        },
        <?php }?>
        ]
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
<!-- </div>

<div class="row"> -->
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
          Visualisasi Penggunaan Dana, dan Capaian Prestasi
        </div>
        <div class="card-body">
        <div id="containerrrrrrb" style="min-width: 400px; height: 400px; margin: 0 auto"></div>



    <script type="text/javascript">

Highcharts.chart('containerrrrrrb', {
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
        opposite: true

    }, { // Secondary yAxis
        gridLineWidth: 0,
        title: {
            text: 'Penggunaan Dana',
            style: {
                color: Highcharts.getOptions().colors[0]
            }
        },
        labels: {
            format: 'Rp {value} ',
            style: {
                color: Highcharts.getOptions().colors[0]
            }
        }

    }, { // Tertiary yAxis
        gridLineWidth: 0,
        title: {
            text: 'Capaian Prestasi',
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
        name: 'Penggunaan Dana',
        type: 'column',
        yAxis: 1,
        <?php $combodana=$data->comboDana(); ?>
        data: [<?php foreach($combodana as $cd){ echo $cd['biaya']; ?>,<?php }?>],
        tooltip: {
            valueSuffix: ' Rupiah'
        }

    }, {
        name: 'Capaian Prestasi',
        type: 'spline',
        yAxis: 2,
        <?php $comboprestasi=$data->comboPrestasi(); ?>
        data: [<?php foreach($comboprestasi as $cp){ echo $cp['Jumlah']; ?>,<?php }?>],
        marker: {
            enabled: false
        },
        dashStyle: 'shortdot',
        tooltip: {
            valueSuffix: ' Prestasi'
        }

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