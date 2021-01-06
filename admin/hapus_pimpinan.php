<?php

include "../config/koneksi.php";

$id	= $_GET["id"];
$hapus = mysqli_query ($koneksi, "DELETE FROM akun WHERE nama='$id'");
$delete = mysqli_query ($koneksi, "DELETE FROM tbl_pimpinan WHERE nama='$id'");

if($hapus && $delete){
	header("Location: pimpinan.php");
}else{
	die ("Terdapat Kesalahan : ".mysqli_error($koneksi));	
}
?>