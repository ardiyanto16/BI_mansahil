<?php
include '../Model/koneksi.php';
include '../Model/function.php';

$a=$_POST['username'];
$b=$_POST['password'];
session_start();
echo $a.' '.$b;
$auth = new allFunction();
$status= $auth->auth($a,$b);
foreach($status as $m){
	if($m['username']=="gagal"){
		$status="gagal";
	}
	else{
		$user = $m['username'];
		$id = $m['id_user'];
		$_SESSION['user'] = $user;
		$_SESSION['id'] = $id;
	}
}
if($status=='gagal'){
	header('location:../?i=fail');
}
else{
	header('location:../View/');
}

?>