<?php

include "../config/koneksi.php";

$id	= $_GET["id"];

if($delete = mysqli_query ($koneksi, "DELETE FROM tbl_jabatan WHERE kd_jabatan='$id'")){
	header("Location: jabatan.php");
	exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($koneksi));

?>