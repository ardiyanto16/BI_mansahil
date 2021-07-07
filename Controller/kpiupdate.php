<?php

include "../Model/function.php";
include "../Model/koneksi.php";

$dana1=$_POST['dana1'];
$prestasi1=$_POST['prestasi1'];
$nilai1=$_POST['nilai1'];
$fasilitas1=$_POST['fasilitas1'];
$sdm1=$_POST['sdm1'];
$tahun=$_POST['tahun'];


$dana1=str_replace(".", "", $dana1);


$dana=array($dana1);
$prestasi=array($prestasi1);
$nilai=array($nilai1);
$fasilitas=array($fasilitas1);
$sdm=array($sdm1);
$tahun=array($tahun);
sort($dana);
rsort($prestasi);
rsort($nilai);
rsort($fasilitas);
rsort($sdm);
rsort($tahun);

// print_r($dana);
// print_r($prestasi);
// print_r($nilai);
$action=new AllFunction();

$update=$action->updateKpi($dana,$prestasi,$nilai,$fasilitas,$sdm,$tahun);

header("Location: ../View/");


?>