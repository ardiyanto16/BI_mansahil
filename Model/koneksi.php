<?php
class koneksi{
	public function Koneksi()
	{
		$host = "localhost";
 		$user = "root";
 		$pass = "";
 		$dbnm = "mansahil";
 		$dbms = "mysql";

		$con=mysqli_connect($host,$user,$pass,$dbnm);

		if(mysqli_connect_errno($con)){
			echo "Failed to connect to MySQL: ".mysqli_connect_error();
		}
		return $con;
	}

}
?>