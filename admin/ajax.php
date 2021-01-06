<?php

if(isset($_GET['golongan']) && !empty($_GET['golongan'])){
	include '../config/koneksi.php';

	$id = $_GET['golongan'];

	$sql = mysqli_query($koneksi, "SELECT * FROM tbl_pangkat WHERE id_golongan='$id' ");
	$count = mysqli_num_rows($sql);

	if($count >0){
		while ($row = mysqli_fetch_array($sql)){

			echo "<option value='".$row['pangkat']."'>".$row['pangkat']."</option>";
		}
	}else{
		echo "<option>Pangkat Tidak Tersedia</option>";
	}

}else{
	echo "<h1>Terjadi Kesalahan</h1>";
}

?>