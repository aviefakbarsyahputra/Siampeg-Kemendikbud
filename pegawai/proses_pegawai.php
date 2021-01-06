<?php
include '../config/koneksi.php';
$page = $_GET['page'];

switch ($_GET['page']) {
	case 'edit':
		$nama_pegawai = ucwords($_POST['nama']);
		$no_hp = $_POST['no_hp'];
		$pendidikan = ucwords($_POST['pendidikan']);
		$alamat = ucwords($_POST['alamat']);
		$email = $_POST['email'];
		$jeniskelamin = $_POST['jk'];
		$status_menikah = $_POST['menikah'];
		$agama = $_POST['agama'];

		$sumber = $_FILES['foto']['tmp_name'];
		$path = "../img/";
		$foto = $_FILES['foto']['name'];
		if($foto=="") {
			$editakun = mysqli_query($koneksi,"UPDATE akun SET no_hp='$no_hp' WHERE nama='$nama_pegawai'");
			$editpeg = mysqli_query($koneksi, "UPDATE tbl_pegawai SET alamat='$alamat', 
																		   email='$email', 
																		   jenis_kelamin='$jeniskelamin', 
																		   status_menikah='$status_menikah',
																		   pendidikan='$pendidikan', 
																		   agama='$agama' WHERE nama='$nama_pegawai' ");
			header("Location: ../home.php");	
		}elseif(move_uploaded_file($sumber, $path.$foto)){
			$editakun = mysqli_query($koneksi,"UPDATE akun SET no_hp='$no_hp', foto='$foto' WHERE nama='$nama_pegawai'");
			$editpeg = mysqli_query($koneksi, "UPDATE tbl_pegawai SET alamat='$alamat', 
																		  email='$email', 
																		  jenis_kelamin='$jeniskelamin', 
																		  status_menikah='$status_menikah', 
																		  pendidikan='$pendidikan', 
																		  agama='$agama',
																		  foto='$foto' WHERE nama='$nama_pegawai' ");
			header("Location: ../home.php");
		}else{
			die("Update Gagal");
		}
		break;
	default:
		header('Location : ../home.php');
		break;
	}
?>