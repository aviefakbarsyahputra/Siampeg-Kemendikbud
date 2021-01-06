<?php
include "../config/koneksi.php";

$kode_jabatan = $_POST['kdjabatan'];
$nama_jabatan = $_POST['jabatan'];

if ($add = mysqli_query($koneksi, "INSERT INTO tbl_jabatan (kd_jabatan,nama_jabatan) VALUES 
	('$kode_jabatan', '$nama_jabatan')")){
		header("Location: jabatan.php");
	}
die ("Terdapat kesalahan : ". mysqli_error($koneksi));
?>