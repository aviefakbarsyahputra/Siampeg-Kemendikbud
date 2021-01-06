<?php
include 'config/koneksi.php';
$bulan = $_POST['bulan'];
$nama = $_POST['namapegawai'];
$n1 = $_POST['n1'];
$n2 = $_POST['n2'];
$n3 = $_POST['n3'];
$n4 = $_POST['n4'];
$n5 = $_POST['n5'];
$n6 = $_POST['n6'];
$n7 = $_POST['n7'];
$n8 = $_POST['n8'];
$n9 = $_POST['n9'];
$n10 = $_POST['n10'];
$total = ($n1)+($n2)+($n3)+($n4)+($n5)+($n6)+($n7)+($n8)+($n9)+($n10);

$sql = mysqli_query($koneksi, "SELECT * FROM tbl_kinerja WHERE nama='$nama' ");
$row = mysqli_num_rows($sql);
if ($row != 0) {
	echo "<script>alert('Mohon Maaf Nilai Sudah Ada');
 			window.location='data_kinerja.php';</script>";
	}else{
		$sql = mysqli_query($koneksi, "INSERT INTO tbl_kinerja (id_bulan,nama,nilai) VALUES ('$bulan','$nama','$total') ");
		if ($sql) {
			echo "<script>alert('Anda Berhasil Menilai!!');
			window.location='data_kinerja.php';</script>";
		}else{
			echo "<script>alert('Anda Tidak Berhasil Menilai!!');
			window.location='data_kinerja.php';</script>";
		}
		
	}
?>