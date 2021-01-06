<?php
	include "config/koneksi.php";

	$id = $_GET['id'];
	$status = $_GET['status'];
	// var_dump($id);die();
	
	if($status == 'setuju'){
		$sql = mysqli_query($koneksi, "UPDATE tbl_cuti set status='Disetujui' WHERE kd_cuti='$id'");
		if($sql){
			header("Location: pimpinan/persetujuan_cuti.php");
		}else{
			echo "Gagal";
		}
	}elseif($status == 'tidak'){
		$sql = mysqli_query($koneksi, "UPDATE tbl_cuti set status='Tidak Disetujui' WHERE kd_cuti='$id'");
		if($sql){
			header("Location: pimpinan/persetujuan_cuti.php");
		}else{
			echo "Gagal";
		}
	}
?>