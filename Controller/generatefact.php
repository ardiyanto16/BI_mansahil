<?php

include "../Model/function.php";
include "../Model/koneksi.php";

$dana=$_POST['dana'];
$prestasi=$_POST['prestasi'];
$nilai=$_POST['nilai'];
$fasilitas=$_POST['fasilitas'];
$sdm=$_POST['sdm'];

echo $dana.'  '.$prestasi.' '.$nilai.' '.$fasilitas.' '.$sdm;
$action=new AllFunction();

$process=$action->GenerateFactAndDimensions();

header("Location: ../View/");


?>