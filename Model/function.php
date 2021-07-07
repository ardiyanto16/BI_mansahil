<?php
ini_set('max_execution_time', 300);
class AllFunction{

	function auth($user,$pass){

	$a=$user;
	$b=$pass;

	// echo $a.' '.$b;

	$db = new koneksi();
	$con = $db->Koneksi();
	$nomor=0;
	$data=null;

	$query=mysqli_query($con,"SELECT * FROM user WHERE username='$user' AND password='$pass'");
	if(!empty($query)){
		$data[$nomor]['username']='gagal';
	}
	while($m=mysqli_fetch_array($query)){
		$data[$nomor]['id_user']=$m['id_user'];
		$data[$nomor]['username']=$m['username'];
		$nomor++;
		session_start();
		$_SESSION['sessionname'] = $m['username'];
	}

	return $data;

	}

	function uploadMasterData($type,$filename){
	$db = new koneksi();
	$con = $db->Koneksi();
	$nomor = 0;
	$data = null;
	$status='false';
	$i=0;
	$file = fopen($filename, "r");
	if($type=="dana"){
	$i=0;
		while (($emapData = fgetcsv($file, 10000, ";")) !== FALSE){

			if(!empty($emapData[3]) && $emapData[3]=='Jenis Penggunaan Dana'){
				$status='true';
			}
			if($status=='true'){
			if(!empty($emapData[3]) && $emapData[3]!='Jenis Penggunaan Dana'){
				//echo $emapData[1].' | '.str_replace(".", "",substr($emapData[2],3)).' | '.$emapData[3].' | '.$emapData[4].' | '.$emapData[5].' | '.$emapData[6].' | '.$emapData[7].' | '.$emapData[8].' | '.$emapData[9].' | '.$emapData[10].' | '.$emapData[11].'<br>';
				$dana=str_replace(".", "",substr($emapData[2],2));
			// $datadana=str_replace("","99",$dana);
			$query=mysqli_query($con,"INSERT INTO dana(Keterangan,Jumlah,JenisPengeluaran,Bulan,Tahun) VALUES ('$emapData[1]','$dana','$emapData[3]','$emapData[4]','$emapData[5]')");
			}
			}
		}
		$i=0;
		return $status;
	}
	else if($type=="prestasi"){
		while(($emapData = fgetcsv($file, 10000, ";")) !== FALSE){
			if(!empty($emapData[0]) && $emapData[0]=='JenisLomba'){
				$status='true';
			}
			if($status=='true'){
			if($i>0){
				//echo $emapData[1].' | '.$emapData[2].' | '.$emapData[3].' | '.$emapData[4].' | '.$emapData[5].' | '.$emapData[6].'<br>';
				$query=mysqli_query($con,"INSERT INTO prestasi(JenisLomba, Tingkat, Tanggal, Penyelenggara, Prestasi) VALUES ('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]')");
			}
			$i++;
			}
		}
		return $status;
	}
	else if($type=="nilai"){
		while(($emapData = fgetcsv($file, 10000, ";")) !== FALSE){
			if(!empty($emapData[1]) && $emapData[1]=='Kelas'){
				$status='true';
			}
			if($status=='true'){
			// if($i>0){
			if(!empty($emapData[1]) && $emapData[1]!='Kelas'){
				$rata=str_replace("-", "50",$emapData[4]);
				//echo $emapData[0].' | '.$emapData[1].' | '.$emapData[2].' | '.$emapData[3].' | '.$emapData[4].'<br>';
				$query=mysqli_query($con,"INSERT INTO nilai(NamaSiswa,Kelas,Generasi,Semester,RataRata,TahunAjaran) VALUES ('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$rata','$emapData[5]')");
			}
			// $i++;
			}
		}
		$i=0;
		return $status;
	}
	else if($type=="fasilitas"){
		while(($emapData = fgetcsv($file, 10000, ";")) !== FALSE){
			if(!empty($emapData[2]) && $emapData[2]=='Fasilitas'){
				$status='true';
			}
			if($status=='true'){
			if($i>0){
				//echo $emapData[0].' | '.$emapData[1].' | '.$emapData[2].' | '.$emapData[3].' | '.$emapData[4].'<br>';
				$query=mysqli_query($con,"INSERT INTO fasilitas(Nama,Jumlah,Fasilitas,Tahun) VALUES ('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]')");
			}
			$i++;
			}
		}
		return $status;
	}
	else if($type=="sdm"){
		while(($emapData = fgetcsv($file, 10000, ";")) !== FALSE){
			if(!empty($emapData[1]) && $emapData[1]=='Jabatan'){
				$status='true';
			}
			if($status=='true'){
			if($i>0){
				//echo $emapData[0].' | '.$emapData[1].' | '.$emapData[2].' | '.$emapData[3].' | '.$emapData[4].'<br>';
				$query=mysqli_query($con,"INSERT INTO sumberdayamanusia(Nama,Jabatan,GuruBidang,StatusKepegawaian,Tahun) VALUES ('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]')");
			}
			$i++;
			}
		}
		return $status;
	}

	fclose($file);

	}

	function GenerateFactAndDimensions(){
	$db = new koneksi();
	$con = $db->Koneksi();
	$nomor = 0;
	$data = null;
	//--Populate Dimension Table--
	$data=mysqli_query($con,"SELECT JenisPengeluaran from dana group by JenisPengeluaran");
	while($m=mysqli_fetch_array($data)){
		$jenis=$m['JenisPengeluaran'];
		$cek=mysqli_query($con,"SELECT * FROM dim_jenis_pengeluaran WHERE JenisPengeluaran ='$jenis'");
		$c=mysqli_fetch_array($cek);
		if(!empty($c)){
		}
		else{
		$sql=mysqli_query($con,"INSERT INTO dim_jenis_pengeluaran (JenisPengeluaran) VALUES ('$jenis')");
		}
	}
	$data2=mysqli_query($con,"SELECT Tingkat from prestasi GROUP BY Tingkat");
	while($n=mysqli_fetch_array($data2)){
		$tingkat=$n['Tingkat'];
		$cek2=mysqli_query($con,"SELECT * FROM dim_tingkat_prestasi WHERE Tingkat ='$tingkat'");
		$cc=mysqli_fetch_array($cek2);
		if(!empty($cc)){

		}
		else{
		$sql2=mysqli_query($con,"INSERT INTO dim_tingkat_prestasi (Tingkat) VALUES ('$tingkat')");
	}
	}
	$data3=mysqli_query($con,"SELECT Generasi from nilai GROUP BY Generasi");
	while($o=mysqli_fetch_array($data3)){
		$generasi=$o['Generasi'];
		$cek3=mysqli_query($con,"SELECT * FROM dim_generasi WHERE Generasi='$generasi'");
		$ccc=mysqli_fetch_array($cek3);
		if(!empty($ccc)){

		}
		else{
		$sql3=mysqli_query($con,"INSERT INTO dim_generasi (Generasi) VALUES ('$generasi')");
		}
	}
	$data4=mysqli_query($con,"SELECT GuruBidang from sumberdayamanusia GROUP BY GuruBidang");
	while($pp=mysqli_fetch_array($data4)){
		$gurubidang=$pp['GuruBidang'];
		$cek4=mysqli_query($con,"SELECT * FROM dim_guru_bidang WHERE GuruBidang='$gurubidang'");
		$cccc=mysqli_fetch_array($cek4);
		if(!empty($cccc)){

		}
		else{
		$sql4=mysqli_query($con,"INSERT INTO dim_guru_bidang (GuruBidang) VALUES ('$gurubidang')");
		}
	}
	$data5=mysqli_query($con,"SELECT Fasilitas from fasilitas GROUP BY Fasilitas");
	while($q=mysqli_fetch_array($data5)){
		$fasilitas=$q['Fasilitas'];
		$cek5=mysqli_query($con,"SELECT * FROM dim_jenis_fasilitas WHERE Fasilitas='$fasilitas'");
		$ccccc=mysqli_fetch_array($cek5);
		if(!empty($ccccc)){

		}
		else{
		$sql5=mysqli_query($con,"INSERT INTO dim_jenis_fasilitas (Fasilitas) VALUES ('$fasilitas')");
		}
	}
	//--End of Populate Dimension Table--

	//--Generate Fact Table Baru--
	// $drop=mysqli_query($con,"DROP TABLE IF EXISTS `fact_program`");
	// $drop2=mysqli_query($con,"DROP TABLE IF EXISTS `fact_prestasi`");
	// $drop3=mysqli_query($con,"DROP TABLE IF EXISTS `fact_nilai`");
	// $sql = "CREATE TABLE fact_program(
 //    id_data INT AUTO_INCREMENT PRIMARY KEY,
 //  	date_id INT NOT NULL,
 //  	id_program INT(10),
 //  	biaya INT(100)
	// )";
	// if(mysqli_query($con, $sql)){
 //    echo "Table created successfully.".'<br>';
	// } else{
 //    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
	// }
	// $sql2 = "CREATE TABLE fact_prestasi(
 //    id_data INT AUTO_INCREMENT PRIMARY KEY,
 //  	date_id INT NOT NULL,
 //  	id_tingkat INT(10),
 //  	JumlahPrestasi INT(100)
	// )";
	// if(mysqli_query($con, $sql2)){
 //    echo "Table created successfully.".'<br>';
	// } else{
 //    echo "ERROR: Could not able to execute $sql2. " . mysqli_error($con);
	// }
	// $sql3 = "CREATE TABLE fact_nilai(
 //    id_data INT AUTO_INCREMENT PRIMARY KEY,
 //  	date_id INT NOT NULL,
 //  	id_angkatan INT(10),
 //  	RataRata DOUBLE(20,1)
	// )";
	// if(mysqli_query($con, $sql3)){
 //    echo "Table created successfully.".'<br>';
	// } else{
 //    echo "ERROR: Could not able to execute $sql3. " . mysqli_error($con);
	// }
	//--End of Generate Fact Table Baru--

	//--Populate Fact Table with Dimension Data--z
	$query=mysqli_query($con,"SELECT b.id_jenis, t.date_id, a.*
	FROM
	(
	SELECT JenisPengeluaran,SUM(Jumlah) AS Jumlah,Bulan,Tahun
	FROM dana
	GROUP BY JenisPengeluaran,Bulan,Tahun) a
	INNER JOIN dim_time t ON CONCAT(a.Tahun,a.Bulan)= CONCAT(t.year,t.month)
	INNER JOIN dim_jenis_pengeluaran b ON a.JenisPengeluaran= b.JenisPengeluaran
	GROUP BY a.Bulan, a.Tahun, a.JenisPengeluaran");
	while($m=mysqli_fetch_array($query)){
		$idjenis=$m['id_jenis'];
		$iddate=$m['date_id'];
		$jumlah=$m['Jumlah'];
		//echo $idprogram.' '.$iddate.' '.$jumlah.'<br>';
		$cek=mysqli_query($con,"SELECT * FROM fact_dana WHERE date_id='$iddate'
		AND id_jenis='$idjenis' AND biaya='$jumlah'");
		$c=mysqli_fetch_array($cek);
		if(!empty($c)){

		}
		else{
		$populate=mysqli_query($con,"INSERT INTO fact_dana (date_id,id_jenis,biaya)
		VALUES ('$iddate','$idjenis','$jumlah')");
		}
	}
	$query2=mysqli_query($con,"SELECT b.id_tingkat, a.*, c.date_id FROM
	(
	SELECT count(Tingkat) as JumlahPrestasi, Tingkat,QUARTER(Tanggal) as Bulan, SUBSTRING(Tanggal,1,4) AS Tahun FROM prestasi GROUP BY Tingkat, Bulan, Tahun ORDER BY Tahun,Bulan) a
	INNER JOIN dim_tingkat_prestasi b ON a.Tingkat=b.Tingkat
	INNER JOIN dim_time c ON CONCAT(a.Bulan,a.Tahun)=CONCAT(c.month,c.year)
	GROUP BY a.Tingkat, a.Bulan, a.Tahun
	ORDER BY a.Tahun,a.Bulan");
	while($n=mysqli_fetch_array($query2)){
		$idtingkat=$n['id_tingkat'];
		$iddate=$n['date_id'];
		$jumlah=$n['JumlahPrestasi'];
		//echo $idtingkat.' '.$iddate.' '.$jumlah.'<br>';
		$cek2=mysqli_query($con,"SELECT * FROM fact_prestasi WHERE date_id='$iddate' AND id_tingkat='$idtingkat' AND JumlahPrestasi='$jumlah'");
		$cc=mysqli_fetch_array($cek2);
		if(!empty($cc)){

		}
		else{
		$populate=mysqli_query($con,"INSERT INTO fact_prestasi (date_id,id_tingkat,JumlahPrestasi) VALUES ('$iddate','$idtingkat','$jumlah')");
		}
	}
	$query3=mysqli_query($con,"SELECT AVG(a.RataRata) as Rata, b.date_id, c.id_generasi from nilai a
	INNER JOIN dim_time b ON a.TahunAjaran = b.year
	INNER JOIN dim_generasi c ON a.Generasi=c.Generasi
	GROUP BY a.Generasi,a.TahunAJaran
	ORDER By a.TahunAjaran, a.Generasi");
	while($o=mysqli_fetch_array($query3)){
		$idgenerasi=$o['id_generasi'];
		$iddate=$o['date_id'];
		$rata=$o['Rata'];
		//echo $idangkatan.' '.$iddate.' '.$jumlah.'<br>';
		$cek3=mysqli_query($con,"SELECT * FROM fact_nilai WHERE date_id='$iddate' AND id_generasi='$idgenerasi' AND RataRata='$rata'");
		$ccc=mysqli_fetch_array($cek3);
		if(!empty($ccc)){

		}
		else{
		$populate=mysqli_query($con,"INSERT INTO fact_nilai (date_id,id_generasi,RataRata) VALUES ('$iddate','$idgenerasi','$rata')");
		}
	}
	// $query4=mysqli_query($con,"SELECT count(a.Fasilitas) as JumlahFasilitas, b.date_id, c.id_fasilitas from fasilitas a
	// INNER JOIN dim_time b ON a.Tahun = b.year
	// INNER JOIN dim_jenis_fasilitas c ON a.Fasilitas=c.Fasilitas
	// GROUP BY a.Fasilitas,a.Tahun
	// ORDER BY a.Tahun, a.Fasilitas");
	// while($q=mysqli_fetch_array($query4)){
	// 	$idfasilitas=$q['id_fasilitas'];
	// 	$iddate=$q['date_id'];
	// 	$jlfasilitas=$q['JumlahFasilitas'];
	// 	// echo $idfasilitas.' '.$iddate.' '.$jlfasilitas.'<br>';
	// 	$cek4=mysqli_query($con,"SELECT * FROM fact_fasilitas WHERE date_id='$iddate' AND id_fasilitas='$idfasilitas' AND JumlahFasilitas='$jlfasilitas'");
	// 	$cccc=mysqli_fetch_array($cek4);
	// 	if(!empty($cccc)){

	// 	}
	// 	else {
	// 		$populate=mysqli_query($con,"INSERT INTO fact_fasilitas (date_id,id_fasilitas,JumlahFasilitas) VALUES ('$iddate','$idfasilitas','$jlfasilitas')");
	// 	}
	// }

	$query4=mysqli_query($con,"SELECT b.id_fasilitas, a.*, c.date_id FROM
	(
	SELECT count(Fasilitas) as JumlahFasilitas, Fasilitas,Tahun FROM fasilitas GROUP BY Fasilitas, Tahun ORDER BY Tahun) a
	INNER JOIN dim_jenis_fasilitas b ON a.Fasilitas=b.Fasilitas
	INNER JOIN dim_time c ON a.Tahun=c.year
	GROUP BY a.Fasilitas, a.Tahun
	ORDER BY a.Tahun");
	while($q=mysqli_fetch_array($query4)){
		$idfasilitas=$q['id_fasilitas'];
		$iddate=$q['date_id'];
		$jumlahf=$q['JumlahFasilitas'];
		//echo $idtingkat.' '.$iddate.' '.$jumlah.'<br>';
		$cek4=mysqli_query($con,"SELECT * FROM fact_fasilitas WHERE date_id='$iddate' AND id_fasilitas='$idfasilitas' AND JumlahFasilitas='$jumlahf'");
		$cccc=mysqli_fetch_array($cek4);
		if(!empty($cccc)){

		}
		else{
		$populate=mysqli_query($con,"INSERT INTO fact_fasilitas (date_id,id_fasilitas,JumlahFasilitas) VALUES ('$iddate','$idfasilitas','$jumlahf')");
		}
	}

	$query5=mysqli_query($con,"SELECT b.id_sdm, a.*, c.date_id FROM
	(
	SELECT count(GuruBidang) as JumlahGuruBidang, GuruBidang ,Tahun FROM sumberdayamanusia GROUP BY GuruBidang, Tahun ORDER BY Tahun) a
	INNER JOIN dim_guru_bidang b ON a.GuruBidang=b.GuruBidang
	INNER JOIN dim_time c ON a.Tahun=c.year
	GROUP BY a.GuruBidang, a.Tahun
	ORDER BY a.Tahun");
	while($s=mysqli_fetch_array($query5)){
		$idsdm=$s['id_sdm'];
		$iddate=$s['date_id'];
		$jumlah=$s['JumlahGuruBidang'];
		//echo $idtingkat.' '.$iddate.' '.$jumlah.'<br>';
		$cek5=mysqli_query($con,"SELECT * FROM fact_sdm WHERE date_id='$iddate' AND id_sdm='$idsdm' AND JumlahGuruBidang='$jumlah'");
		$ccccc=mysqli_fetch_array($cek5);
		if(!empty($ccccc)){

		}
		else{
		$populate=mysqli_query($con,"INSERT INTO fact_sdm (date_id,id_sdm,JumlahGuruBidang) VALUES ('$iddate','$idsdm','$jumlah')");
		}
	}

	//End of Populate Fact Table with Dimension Data--
	}

	function visualisasiProgramDanaTahunan(){
		$db = new koneksi();
		$con= $db->Koneksi();
		$nomor = 0;
		$data = null;

		$query=mysqli_query($con,"SELECT a.date_id, sum(a.biaya) as biaya, b.year  FROM fact_dana a
		INNER JOIN dim_time b ON a.date_id=b.date_id
		GROUP BY year");

		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['date_id']=$m['date_id'];
			$data[$nomor]['biaya']=$m['biaya'];
			$data[$nomor]['year']=$m['year'];
			$nomor++;
		}
		return $data;
	}
	function visualisasidanabulanan(){
		$db = new koneksi();
		$con= $db->Koneksi();
		$nomor = 0;
		$data = null;
		$query=mysqli_query($con,"SELECT a.date_id, sum(a.biaya) as biaya, b.month, b.year  FROM fact_dana a
		INNER JOIN dim_time b ON a.date_id=b.date_id
		GROUP BY b.month, b.year
		ORDER BY substr(b.date,2,7)
		");

		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['date_id']=$m['date_id'];
			$data[$nomor]['month']=$m['month'];
			$data[$nomor]['biaya']=$m['biaya'];
			$data[$nomor]['year']=$m['year'];
			$nomor++;
		}
		return $data;
	}
	function getYears(){
		$db = new koneksi();
		$con= $db->Koneksi();
		$nomor = 0;
		$data = null;

		$query=mysqli_query($con,"SELECT a.year FROM dim_time a
		INNER JOIN fact_dana b ON a.date_id=b.date_id
		GROUP BY b.date_id");

		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['year']=$m['year'];
			$nomor++;
		}
		return $data;
	}

	function getDataByYears($year){
		$db = new koneksi();
		$con= $db->Koneksi();
		$nomor = 0;
		$data = null;

			$query=mysqli_query($con,"SELECT a.id_jenis,a.date_id,c.JenisPengeluaran, sum(a.biaya) as biaya, b.year
		FROM fact_dana a
		INNER JOIN dim_time b ON a.date_id=b.date_id
		INNER JOIN dim_jenis_pengeluaran c ON a.id_jenis=c.id_jenis
		WHERE YEAR='$year'
		GROUP BY a.id_jenis
		");

		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['JenisPengeluaran']=$m['JenisPengeluaran'];
			$data[$nomor]['biaya']=$m['biaya'];
			$data[$nomor]['year']=$m['year'];
			$nomor++;
		}
		return $data;
	}

	function getDataBulanByYears(){
		$db = new koneksi();
		$con = $db->Koneksi();
		$nomor = 0;
		$data = null;

		$query=mysqli_query($con,"SELECT a.date_id, sum(a.biaya) as biaya, b.date, b.month, b.year  FROM fact_dana a
		INNER JOIN dim_time b ON a.date_id=b.date_id
		GROUP BY b.month, b.year
		ORDER BY b.date
		");
		// SORT($query);

		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['date_id']=$m['date_id'];
			$data[$nomor]['date']=$m['date'];
			$data[$nomor]['month']=$m['month'];
			$data[$nomor]['year']=$m['year'];
			$data[$nomor]['biaya']=$m['biaya'];
			$nomor++;
		}
		return $data;

	}

	function getDataPrestasiPerKategori(){
		$db = new koneksi();
		$con = $db->Koneksi();
		$nomor = 0;
		$data =null;

		$query=mysqli_query($con,"SELECT a.*, sum(a.JumlahPrestasi) as Jumlah, b.Tingkat, c.year FROM fact_prestasi a
		INNER JOIN dim_tingkat_prestasi b ON a.id_tingkat=b.id_tingkat
		INNER JOIN dim_time c ON a.date_id=c.date_id
		GROUP BY b.Tingkat, c.year
		ORDER BY c.year
		");

		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['Jumlah']=$m['Jumlah'];
			$data[$nomor]['Tingkat']=$m['Tingkat'];
			$data[$nomor]['year']=$m['year'];
			$nomor++;
		}
		return $data;
	}

	function getDataPrestasiPerTahun(){
		$db = new koneksi();
		$con = $db->Koneksi();
		$nomor = 0;
		$data =null;

		$query=mysqli_query($con,"SELECT a.date_id, sum(a.JumlahPrestasi) as jumlah, b.year FROM fact_prestasi a
		INNER JOIN dim_time b ON a.date_id=b.date_id
		GROUP BY year
		");

		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['jumlah']=$m['jumlah'];
			$data[$nomor]['year']=$m['year'];
			$nomor++;
		}
		return $data;
	}
	function getDataPrestasiPerTahunKecamatan(){
		$db = new koneksi();
		$con = $db->Koneksi();
		$nomor = 0;
		$data =null;

		$query=mysqli_query($con,"SELECT a.date_id, sum(a.JumlahPrestasi) as jumlah, b.year FROM fact_prestasi a
		INNER JOIN dim_time b ON a.date_id=b.date_id
		INNER JOIN dim_tingkat_prestasi c ON a.id_tingkat=c.id_tingkat
		where c.Tingkat='Kecamatan'
		GROUP BY year
		");

		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['jumlah']=$m['jumlah'];
			$data[$nomor]['year']=$m['year'];
			$nomor++;
		}
		return $data;
	}
	function getDataPrestasiPerTahunKabupaten(){
		$db = new koneksi();
		$con = $db->Koneksi();
		$nomor = 0;
		$data =null;

		$query=mysqli_query($con,"SELECT a.date_id, sum(a.JumlahPrestasi) as jumlah, b.year FROM fact_prestasi a
		INNER JOIN dim_time b ON a.date_id=b.date_id
		INNER JOIN dim_tingkat_prestasi c ON a.id_tingkat=c.id_tingkat
		where c.Tingkat='Kabupaten'
		GROUP BY year
		");

		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['jumlah']=$m['jumlah'];
			$data[$nomor]['year']=$m['year'];
			$nomor++;
		}
		return $data;
	}
	function getDataPrestasiPerTahunProvinsi(){
		$db = new koneksi();
		$con = $db->Koneksi();
		$nomor = 0;
		$data =null;

		$query=mysqli_query($con,"SELECT a.date_id, sum(a.JumlahPrestasi) as jumlah, b.year FROM fact_prestasi a
		INNER JOIN dim_time b ON a.date_id=b.date_id
		INNER JOIN dim_tingkat_prestasi c ON a.id_tingkat=c.id_tingkat
		where c.Tingkat='Provinsi'
		GROUP BY year
		");

		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['jumlah']=$m['jumlah'];
			$data[$nomor]['year']=$m['year'];
			$nomor++;
		}
		return $data;
	}

	function getDataPrestasiByTahun($year){
		$db = new koneksi();
		$con = $db->Koneksi();
		$nomor = 0;
		$data = null;

		$query=mysqli_query($con,"SELECT a.*, sum(a.JumlahPrestasi) as Jumlah, b.Tingkat, c.year FROM fact_prestasi a
		INNER JOIN dim_tingkat_prestasi b ON a.id_tingkat=b.id_tingkat
		INNER JOIN dim_time c ON a.date_id=c.date_id
		WHERE year='$year'
		GROUP BY b.Tingkat, c.year
		ORDER BY c.year
		");

		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['Jumlah']=$m['Jumlah'];
			$data[$nomor]['Tingkat']=$m['Tingkat'];
			$data[$nomor]['year']=$m['year'];
			$nomor++;
		}
		return $data;

	}
	function getDataPrestasiByTahunKecamatan($year){
		$db = new koneksi();
		$con = $db->Koneksi();
		$nomor = 0;
		$data = null;

		$query=mysqli_query($con,"SELECT a.*, sum(a.JumlahPrestasi) as Jumlah, b.Tingkat, c.year FROM fact_prestasi a
		INNER JOIN dim_tingkat_prestasi b ON a.id_tingkat=b.id_tingkat
		INNER JOIN dim_time c ON a.date_id=c.date_id
		WHERE year='$year' and b.Tingkat='Kecamatan'
		GROUP BY b.Tingkat, c.year
		ORDER BY c.year
		");

		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['Jumlah']=$m['Jumlah'];
			$data[$nomor]['Tingkat']=$m['Tingkat'];
			$data[$nomor]['year']=$m['year'];
			$nomor++;
		}
		return $data;

	}
	function getDataPrestasiByTahunKabupaten($year){
		$db = new koneksi();
		$con = $db->Koneksi();
		$nomor = 0;
		$data = null;

		$query=mysqli_query($con,"SELECT a.*, sum(a.JumlahPrestasi) as Jumlah, b.Tingkat, c.year FROM fact_prestasi a
		INNER JOIN dim_tingkat_prestasi b ON a.id_tingkat=b.id_tingkat
		INNER JOIN dim_time c ON a.date_id=c.date_id
		WHERE year='$year' and b.Tingkat='Kabupaten'
		GROUP BY b.Tingkat, c.year
		ORDER BY c.year
		");

		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['Jumlah']=$m['Jumlah'];
			$data[$nomor]['Tingkat']=$m['Tingkat'];
			$data[$nomor]['year']=$m['year'];
			$nomor++;
		}
		return $data;

	}
	function getDataPrestasiByTahunProvinsi($year){
		$db = new koneksi();
		$con = $db->Koneksi();
		$nomor = 0;
		$data = null;

		$query=mysqli_query($con,"SELECT a.*, sum(a.JumlahPrestasi) as Jumlah, b.Tingkat, c.year FROM fact_prestasi a
		INNER JOIN dim_tingkat_prestasi b ON a.id_tingkat=b.id_tingkat
		INNER JOIN dim_time c ON a.date_id=c.date_id
		WHERE year='$year' and b.Tingkat='Provinsi'
		GROUP BY b.Tingkat, c.year
		ORDER BY c.year
		");

		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['Jumlah']=$m['Jumlah'];
			$data[$nomor]['Tingkat']=$m['Tingkat'];
			$data[$nomor]['year']=$m['year'];
			$nomor++;
		}
		return $data;

	}
	function getDataPrestasiByTahunNasional($year){
		$db = new koneksi();
		$con = $db->Koneksi();
		$nomor = 0;
		$data = null;

		$query=mysqli_query($con,"SELECT a.*, sum(a.JumlahPrestasi) as Jumlah, b.Tingkat, c.year FROM fact_prestasi a
		INNER JOIN dim_tingkat_prestasi b ON a.id_tingkat=b.id_tingkat
		INNER JOIN dim_time c ON a.date_id=c.date_id
		WHERE year='$year' and b.Tingkat='Nasional'
		GROUP BY b.Tingkat, c.year
		ORDER BY c.year
		");

		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['Jumlah']=$m['Jumlah'];
			$data[$nomor]['Tingkat']=$m['Tingkat'];
			$data[$nomor]['year']=$m['year'];
			$nomor++;
		}
		return $data;

	}

	function getDataPrestasiBulan(){
		$db = new koneksi();
		$con = $db->Koneksi();
		$nomor = 0;
		$data = null;

		$query=mysqli_query($con,"SELECT a.*, sum(a.JumlahPrestasi) as Jumlah, b.Tingkat, c.year, c.month FROM fact_prestasi a
		INNER JOIN dim_tingkat_prestasi b ON a.id_tingkat=b.id_tingkat
		INNER JOIN dim_time c ON a.date_id=c.date_id
		GROUP BY c.month, c.year
		ORDER BY c.year, c.month
		");

		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['Jumlah']=$m['Jumlah'];
			$data[$nomor]['Tingkat']=$m['Tingkat'];
			$data[$nomor]['month']=$m['month'];
			$data[$nomor]['year']=$m['year'];
			$nomor++;
		}
		return $data;
	}

	function getDataPrestasiBulanByYears($year){
		$db = new koneksi();
		$con = $db->Koneksi();
		$nomor = 0;
		$data = null;

		$query=mysqli_query($con,"SELECT a.*, sum(a.JumlahPrestasi) as Jumlah, b.Tingkat, c.year, c.month FROM fact_prestasi a
		INNER JOIN dim_tingkat_prestasi b ON a.id_tingkat=b.id_tingkat
		INNER JOIN dim_time c ON a.date_id=c.date_id
		WHERE c.year='$year'
		GROUP BY c.month, c.year
		ORDER BY c.year, c.month
		");

		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['Jumlah']=$m['Jumlah'];
			$data[$nomor]['Tingkat']=$m['Tingkat'];
			$data[$nomor]['month']=$m['month'];
			$data[$nomor]['year']=$m['year'];
			$nomor++;
		}
		return $data;
	}
	function getDataPrestasiBulanByYearsKecamatan($year){
		$db = new koneksi();
		$con = $db->Koneksi();
		$nomor = 0;
		$data = null;

		$query=mysqli_query($con,"SELECT a.*, sum(a.JumlahPrestasi) as Jumlah, b.Tingkat, c.year, c.month FROM fact_prestasi a
		INNER JOIN dim_tingkat_prestasi b ON a.id_tingkat=b.id_tingkat
		INNER JOIN dim_time c ON a.date_id=c.date_id
		WHERE b.Tingkat='Kecamatan'
		GROUP BY c.month, c.year
		ORDER BY c.year, c.month
		");

		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['Jumlah']=$m['Jumlah'];
			$data[$nomor]['Tingkat']=$m['Tingkat'];
			$data[$nomor]['month']=$m['month'];
			$data[$nomor]['year']=$m['year'];
			$nomor++;
		}
		return $data;
	}
	function getDataPrestasiBulanByYearsKabupaten($year){
		$db = new koneksi();
		$con = $db->Koneksi();
		$nomor = 0;
		$data = null;

		$query=mysqli_query($con,"SELECT a.*, sum(a.JumlahPrestasi) as Jumlah, b.Tingkat, c.year, c.month FROM fact_prestasi a
		INNER JOIN dim_tingkat_prestasi b ON a.id_tingkat=b.id_tingkat
		INNER JOIN dim_time c ON a.date_id=c.date_id
		WHERE b.Tingkat='Kabupaten' AND c.year='$year'
		GROUP BY c.month, c.year
		ORDER BY c.year, c.month
		");

		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['Jumlah']=$m['Jumlah'];
			// $data[$nomor]['Tingkat']=$m['Tingkat'];
			$data[$nomor]['month']=$m['month'];
			$data[$nomor]['year']=$m['year'];
			$nomor++;
		}
		return $data;
	}
	function getDataPrestasiBulanByYearsProvinsi($year){
		$db = new koneksi();
		$con = $db->Koneksi();
		$nomor = 0;
		$data = null;

		$query=mysqli_query($con,"SELECT a.*, sum(a.JumlahPrestasi) as Jumlah, c.year, c.month FROM fact_prestasi a
		INNER JOIN dim_tingkat_prestasi b ON a.id_tingkat=b.id_tingkat
		INNER JOIN dim_time c ON a.date_id=c.date_id
		WHERE b.Tingkat='Provinsi'
		GROUP BY c.month, c.year
		ORDER BY c.year, c.month
		");

		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['Jumlah']=$m['Jumlah'];
			$data[$nomor]['month']=$m['month'];
			$data[$nomor]['year']=$m['year'];
			$nomor++;
		}
		return $data;
	}
	function getDataPrestasiBulanByYearsNasional($year){
		$db = new koneksi();
		$con = $db->Koneksi();
		$nomor = 0;
		$data = null;

		$query=mysqli_query($con,"SELECT a.*, sum(a.JumlahPrestasi) as Jumlah, c.year, c.month FROM fact_prestasi a
		INNER JOIN dim_tingkat_prestasi b ON a.id_tingkat=b.id_tingkat
		INNER JOIN dim_time c ON a.date_id=c.date_id
		WHERE b.Tingkat='Nasional'
		GROUP BY c.month, c.year
		ORDER BY c.year, c.month
		");

		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['Jumlah']=$m['Jumlah'];
			$data[$nomor]['month']=$m['month'];
			$data[$nomor]['year']=$m['year'];
			$nomor++;
		}
		return $data;
	}
	function getDataPrestasi2017(){
		$db = new koneksi();
		$con = $db->Koneksi();
		$nomor = 0;
		$data = null;

		$query=mysqli_query($con,"SELECT a.*, sum(a.JumlahPrestasi) as Jumlah, b.Tingkat, c.year, c.month FROM fact_prestasi a
		INNER JOIN dim_tingkat_prestasi b ON a.id_tingkat=b.id_tingkat
		INNER JOIN dim_time c ON a.date_id=c.date_id
		WHERE c.year='2017'
		GROUP BY c.month, c.year
		ORDER BY c.year, c.month
		");

		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['Jumlah']=$m['Jumlah'];
			$data[$nomor]['Tingkat']=$m['Tingkat'];
			$data[$nomor]['month']=$m['month'];
			$data[$nomor]['year']=$m['year'];
			$nomor++;
		}
		return $data;
	}

	function getPrestasiYears(){
		$db = new koneksi();
		$con= $db->Koneksi();
		$nomor = 0;
		$data = null;

		$query=mysqli_query($con,"SELECT a.year FROM dim_time a
		INNER JOIN fact_prestasi b ON a.date_id=b.date_id
		GROUP BY a.year");

		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['year']=$m['year'];
			$nomor++;
		}
		return $data;
	}
	function getPrestasiYearsProvinsi(){
		$db = new koneksi();
		$con= $db->Koneksi();
		$nomor = 0;
		$data = null;

		$query=mysqli_query($con,"SELECT a.year FROM dim_time a
		INNER JOIN fact_prestasi b ON a.date_id=b.date_id
		INNER JOIN dim_tingkat_prestasi c ON c.Tingkat=b.Tingkat
		WHERE c.Tingkat='Kecamatan'
		GROUP BY a.year");

		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['year']=$m['year'];
			$nomor++;
		}
		return $data;
	}

	function getYearFromDim(){
		$db = new koneksi();
		$con= $db->Koneksi();
		$nomor = 0;
		$data = null;

		$query=mysqli_query($con,"select year from dim_time group by year");

		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['year']=$m['year'];
			$nomor++;
		}
		return $data;

	}
	function getDataBulann(){
		$db = new koneksi();
		$con= $db->Koneksi();
		$nomor = 0;
		$data = null;

		$query=mysqli_query($con,"SELECT substr(date,1,8) AS bbln from dim_time group by substr(date,1,8)");

		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['bbln']=$m['bbln'];
			$nomor++;
		}
		return $data;

	}

	// Visualisasi SDM
	function getDataSDMPerTahun(){
		$db = new koneksi();
		$con = $db->Koneksi();
		$nomor = 0;
		$data =null;

		$query=mysqli_query($con,"SELECT sum(a.JumlahGuruBidang) as Jumlah, b.year from fact_sdm a
		INNER JOIN dim_time b ON a.date_id=b.date_id
		GROUP BY b.year");

		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['Jumlah']=$m['Jumlah'];
			$data[$nomor]['year']=$m['year'];
			$nomor++;
		}
		return $data;
	}
	function getSDMYears(){
		$db = new koneksi();
		$con= $db->Koneksi();
		$nomor = 0;
		$data = null;

		$query=mysqli_query($con,"SELECT a.year FROM dim_time a
		INNER JOIN fact_sdm b ON a.date_id=b.date_id
		GROUP BY a.year");

		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['year']=$m['year'];
			$nomor++;
		}
		return $data;
	}
	function getDataSDMByYears($year){
		$db = new koneksi();
		$con= $db->Koneksi();
		$nomor = 0;
		$data = null;

		$query=mysqli_query($con,"SELECT sum(a.JumlahGuruBidang) as Jumlah, b.year, c.GuruBidang from fact_sdm a
		INNER JOIN dim_time b ON a.date_id=b.date_id
		INNER JOIN dim_guru_bidang c ON a.id_sdm=c.id_sdm
		WHERE b.year='$year'
		GROUP BY b.year,c.GuruBidang
		ORDER BY b.year,c.GuruBidang");
		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['year']=$m['year'];
			$data[$nomor]['GuruBidang']=$m['GuruBidang'];
			$data[$nomor]['Jumlah']=$m['Jumlah'];
			$nomor++;
		}
		return $data;
	}


	// Visualisasi Nilai
	function getDataNilaiPerTahun(){
		$db = new koneksi();
		$con = $db->Koneksi();
		$nomor = 0;
		$data =null;

		$query=mysqli_query($con,"SELECT avg(a.RataRata) as Rata, b.year from fact_nilai a
		INNER JOIN dim_time b ON a.date_id=b.date_id
		GROUP BY b.year");

		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['Rata']=$m['Rata'];
			$data[$nomor]['year']=$m['year'];
			$nomor++;
		}
		return $data;
	}

	function getNilaiYears(){
		$db = new koneksi();
		$con= $db->Koneksi();
		$nomor = 0;
		$data = null;

		$query=mysqli_query($con,"SELECT a.year FROM dim_time a
		INNER JOIN fact_nilai b ON a.date_id=b.date_id
		GROUP BY a.year");

		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['year']=$m['year'];
			$nomor++;
		}
		return $data;
	}

	function getDataNilaiByYears($year){
		$db = new koneksi();
		$con= $db->Koneksi();
		$nomor = 0;
		$data = null;

		$query=mysqli_query($con,"SELECT avg(a.RataRata) as Rata, b.year, c.Generasi from fact_nilai a
		INNER JOIN dim_time b ON a.date_id=b.date_id
		INNER JOIN dim_generasi c ON a.id_generasi=c.id_generasi
		WHERE b.year='$year'
		GROUP BY b.year,c.Generasi
		ORDER BY b.year,c.Generasi");
		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['year']=$m['year'];
			$data[$nomor]['Generasi']=$m['Generasi'];
			$data[$nomor]['Rata']=$m['Rata'];
			$nomor++;
		}
		return $data;
	}

	// Visualisasi Fasilitas
	function getDataFasilitasPerTahun(){
		$db = new koneksi();
		$con = $db->Koneksi();
		$nomor = 0;
		$data =null;

		$query=mysqli_query($con,"SELECT sum(a.JumlahFasilitas) as JumlahF, b.year from fact_fasilitas a
		INNER JOIN dim_time b ON a.date_id=b.date_id
		GROUP BY b.year");

		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['JumlahF']=$m['JumlahF'];
			$data[$nomor]['year']=$m['year'];
			$nomor++;
		}
		return $data;
	}
	function getFasilitasYears(){
		$db = new koneksi();
		$con= $db->Koneksi();
		$nomor = 0;
		$data = null;

		$query=mysqli_query($con,"SELECT a.year FROM dim_time a
		INNER JOIN fact_fasilitas b ON a.date_id=b.date_id
		GROUP BY a.year");

		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['year']=$m['year'];
			$nomor++;
		}
		return $data;
	}
	function getDataFasilitasByYears($year){
		$db = new koneksi();
		$con= $db->Koneksi();
		$nomor = 0;
		$data = null;

		$query=mysqli_query($con,"SELECT sum(a.JumlahFasilitas) as JumlahF, b.year, c.Fasilitas from fact_fasilitas a
		INNER JOIN dim_time b ON a.date_id=b.date_id
		INNER JOIN dim_jenis_fasilitas c ON a.id_fasilitas=c.id_fasilitas
		WHERE b.year='$year'
		GROUP BY b.year,c.Fasilitas
		ORDER BY b.year,c.Fasilitas");
		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['year']=$m['year'];
			$data[$nomor]['Fasilitas']=$m['Fasilitas'];
			$data[$nomor]['JumlahF']=$m['JumlahF'];
			$nomor++;
		}
		return $data;
	}



	function comboDana(){
		$db = new koneksi();
		$con= $db->Koneksi();
		$nomor = 0;
		$data = null;

		$query=mysqli_query($con,"SELECT sum(a.biaya) as biaya FROM fact_dana a
		INNER JOIN dim_time b ON a.date_id=b.date_id
		GROUP BY b.year");

		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['biaya']=$m['biaya'];
			$nomor++;
		}
		return $data;

	}

	function comboPrestasi(){
		$db = new koneksi();
		$con= $db->Koneksi();
		$nomor = 0;
		$data = null;

		$query=mysqli_query($con,"SELECT a.*, sum(JumlahPrestasi) as Jumlah, b.year from fact_prestasi a
		INNER JOIN dim_time b ON a.date_id=b.date_id
		GROUP BY year");

		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['Jumlah']=$m['Jumlah'];
			$nomor++;
		}
		return $data;

	}

	function comboNilai(){
		$db = new koneksi();
		$con= $db->Koneksi();
		$nomor = 0;
		$data = null;

		$query=mysqli_query($con,"SELECT avg(a.RataRata) as RataRata, b.year from fact_nilai a
		INNER JOIN dim_time b ON a.date_id=b.date_id
		GROUP BY b.year");

		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['RataRata']=$m['RataRata'];
			$nomor++;
		}
		return $data;
	}
	function comboSDM(){
		$db = new koneksi();
		$con= $db->Koneksi();
		$nomor = 0;
		$data = null;

		$query=mysqli_query($con,"SELECT a.*, sum(JumlahGuruBidang) as JumlahGB, b.year from fact_sdm a
		INNER JOIN dim_time b ON a.date_id=b.date_id
		GROUP BY year");

		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['JumlahGB']=$m['JumlahGB'];
			$nomor++;
		}
		return $data;

	}

	function comboFasilitas(){
		$db = new koneksi();
		$con= $db->Koneksi();
		$nomor = 0;
		$data = null;

		$query=mysqli_query($con,"SELECT a.*, sum(JumlahFasilitas) as JumlahF, b.year from fact_fasilitas a
		INNER JOIN dim_time b ON a.date_id=b.date_id
		GROUP BY year");

		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['JumlahF']=$m['JumlahF'];
			$nomor++;
		}
		return $data;

	}

	function getDana(){
		$db = new koneksi();
		$con = $db->Koneksi();
		$nomor = 0;
		$data = null;

		$query=mysqli_query($con,"SELECT a.id_jenis, b.JenisPengeluaran from fact_dana a
		INNER JOIN dim_jenis_pengeluaran b ON a.id_jenis=b.id_jenis
		group by a.id_jenis");

		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['id_jenis']=$m['id_jenis'];
			$data[$nomor]['JenisPengeluaran']=$m['JenisPengeluaran'];
			$nomor++;
		}
		return $data;
	}


	function getDanaByID($id){
		$db = new koneksi();
		$con = $db->Koneksi();
		$nomor =0;
		$data = null;

		$query=mysqli_query($con,"SELECT a.id_jenis, SUM(a.biaya) as JumlahBiaya, b.JenisPengeluaran,c.year from fact_dana a
		INNER JOIN dim_jenis_pengeluaran b ON a.id_jenis=b.id_jenis
		INNER JOIN dim_time c ON a.date_id=c.date_id
		WHERE a.id_jenis='$id'
		GROUP BY b.JenisPengeluaran, c.year, a.id_jenis
		ORDER BY a.id_jenis,c.year");

		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['id_jenis']=$m['id_jenis'];
			$data[$nomor]['JumlahBiaya']=$m['JumlahBiaya'];
			$data[$nomor]['JenisPengeluaran']=$m['JenisPengeluaran'];
			$data[$nomor]['year']=$m['year'];
			$nomor++;
		}
		return $data;
	}

	function getPerformanceDana($year){
		$db = new koneksi();
		$con = $db->Koneksi();
		$nomor = 0;
		$data = null;

		$query=mysqli_query($con,"SELECT b.year, sum(a.biaya) as biaya from fact_dana a
		INNER JOIN dim_time b ON a.date_id=b.date_id
		where b.year='$year'");
		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['year']=$m['year'];
			$data[$nomor]['biaya']=$m['biaya'];
			$nomor++;
		}
		return $data;
	}

	function getPerformancePrestasi($year){
		$db = new koneksi();
		$con = $db->Koneksi();
		$nomor = 0;
		$data = null;

		$query=mysqli_query($con,"SELECT a.*, b.year, sum(a.JumlahPrestasi) Jumlah FROM fact_prestasi a
		INNER JOIN dim_time b ON a.date_id=b.date_id
		WHERE b.year='$year'");
		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['year']=$m['year'];
			$data[$nomor]['Jumlah']=$m['Jumlah'];
			$nomor++;
		}
		return $data;
	}

	function getPerformanceNilai($year){
		$db = new koneksi();
		$con = $db->Koneksi();
		$nomor = 0;
		$data = null;

		$query=mysqli_query($con,"SELECT b.year, avg(a.RataRata) Rata FROM fact_nilai a
		INNER JOIN dim_time b ON a.date_id=b.date_id
		WHERE b.year='$year'
		GROUP BY year");
		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['year']=$m['year'];
			$data[$nomor]['Rata']=$m['Rata'];
			$nomor++;
		}
		return $data;
	}

	function getPerformanceFasilitas($year){
		$db = new koneksi();
		$con = $db->Koneksi();
		$nomor = 0;
		$data = null;

		$query=mysqli_query($con,"SELECT b.year, sum(a.JumlahFasilitas) as fasilitas from fact_fasilitas a
		INNER JOIN dim_time b ON a.date_id=b.date_id
		where b.year='$year'");
		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['year']=$m['year'];
			$data[$nomor]['fasilitas']=$m['fasilitas'];
			$nomor++;
		}
		return $data;
	}

	function getPerformanceSDM($year){
		$db = new koneksi();
		$con = $db->Koneksi();
		$nomor = 0;
		$data = null;

		$query=mysqli_query($con,"SELECT b.year, sum(a.JumlahGuruBidang) as guru from fact_sdm a
		INNER JOIN dim_time b ON a.date_id=b.date_id
		where b.year='$year'");
		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['year']=$m['year'];
			$data[$nomor]['guru']=$m['guru'];
			$nomor++;
		}
		return $data;
	}

	function getDataKpi(){
		$db = new koneksi();
		$con = $db->Koneksi();
		$nomor = 0;
		$data = null;

		$query=mysqli_query($con,"SELECT * FROM kpi");
		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['kpi_dana']=$m['kpi_dana'];
			$data[$nomor]['kpi_prestasi']=$m['kpi_prestasi'];
			$data[$nomor]['kpi_nilai']=$m['kpi_nilai'];
			$data[$nomor]['kpi_sdm']=$m['kpi_sdm'];
			$data[$nomor]['kpi_fasilitas']=$m['kpi_fasilitas'];
			$data[$nomor]['year']=$m['year'];
			$nomor++;
		}
		return $data;
	}

	function getDataKpiByZone($zone){
		$db = new koneksi();
		$con = $db->Koneksi();
		$nomor = 0;
		$data = null;

		$query=mysqli_query($con,"SELECT * FROM kpi WHERE zone='$zone'");
		while($m=mysqli_fetch_array($query)){
			$data[$nomor]['kpi_dana']=$m['kpi_dana'];
			$data[$nomor]['kpi_prestasi']=$m['kpi_prestasi'];
			$data[$nomor]['kpi_nilai']=$m['kpi_nilai'];
			$data[$nomor]['kpi_sdm']=$m['kpi_sdm'];
			$data[$nomor]['kpi_fasilitas']=$m['kpi_fasilitas'];
			$data[$nomor]['year']=$m['year'];
			$nomor++;
		}
		return $data;
	}

	function updateKpi($dana,$prestasi,$nilai,$fasilitas,$sdm,$tahun){
		$db = new koneksi();
		$con = $db->Koneksi();
		$nomor = 0;
		$data = null;



		$cek=mysqli_query($con,"SELECT * FROM kpi");
		while($m=mysqli_fetch_array($cek)){
			$zone=$m['zone'];
			$id=$nomor+1;
			//echo $dana[$nomor].' '.$prestasi[$nomor].' '.$nilai[$nomor].'<br>';
			$query=mysqli_query($con,"UPDATE kpi SET kpi_dana='$dana[$nomor]', kpi_prestasi='$prestasi[$nomor]', kpi_nilai='$nilai[$nomor]', kpi_fasilitas='$fasilitas[$nomor]', kpi_sdm='$sdm[$nomor]', year='$tahun[$nomor]' WHERE id_data='$id'");
			$nomor++;
		}
	}
}
?>