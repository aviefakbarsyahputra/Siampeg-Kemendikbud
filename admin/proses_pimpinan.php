<?php
include '../config/koneksi.php';
$page = $_GET['page'];

switch ($_GET['page']) {
	case 'tambah':
		$nip = $_POST['user'];
		$password = md5($_POST['pass']);
		$nama_pimpinan = ucwords($_POST['nama']);
		$no_hp = $_POST['no_hp'];
		$lvl = $_POST['lvl'];
		//masukan table pimpinan
		$pendidikan = ucwords($_POST['pendidikan']);
		$alamat = ucwords($_POST['alamat']);
		$email = $_POST['email'];
		$jeniskelamin = $_POST['jk'];
		$status_menikah = $_POST['menikah'];
		$agama = $_POST['agama'];
		$jabatan = $_POST['jabatan'];
		$golongan = $_POST['golongan'];
		$pangkat = $_POST['pangkat'];

		$sumber = $_FILES['foto']['tmp_name'];
		$path = "../img/";
		$foto = $_FILES['foto']['name'];

		if(move_uploaded_file($sumber, $path.$foto)){
		$akun = mysqli_query($koneksi, "INSERT INTO akun (username,password,nama,no_hp,level,foto) VALUES 
				('$nip','$password','$nama_pimpinan','$no_hp','$lvl','$foto')");

		$add = mysqli_query($koneksi, "INSERT INTO tbl_pimpinan (nip,nama,alamat,email,jenis_kelamin,status_menikah,pendidikan,agama,jabatan,golongan,pangkat,foto) VALUES 
			('$nip','$nama_pimpinan','$alamat','$email','$jeniskelamin','$status_menikah','$pendidikan','$agama','$jabatan','$golongan','$pangkat','$foto')");
			header("Location: pimpinan.php");
		}else{
			die("gagal".mysqli_error($koneksi));
		}
		break;
	case 'edit':
		$nama_pimpinan = ucwords($_POST['nama']);
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
			$editakun = mysqli_query($koneksi,"UPDATE akun SET no_hp='$no_hp' WHERE nama='$nama_pimpinan'");
			$editpimpin = mysqli_query($koneksi, "UPDATE tbl_pimpinan SET alamat='$alamat', 
																		   email='$email', 
																		   jenis_kelamin='$jeniskelamin', 
																		   status_menikah='$status_menikah',
																		   pendidikan='$pendidikan', 
																		   agama='$agama' WHERE nama='$nama_pimpinan' ");
			header("Location: pimpinan.php");	
		}elseif(move_uploaded_file($sumber, $path.$foto)){
			$editakun = mysqli_query($koneksi,"UPDATE akun SET no_hp='$no_hp', foto='$foto' WHERE nama='$nama_pimpinan'");
			$editpimpin = mysqli_query($koneksi, "UPDATE tbl_pimpinan SET alamat='$alamat', 
																		  email='$email', 
																		  jenis_kelamin='$jeniskelamin', 
																		  status_menikah='$status_menikah', 
																		  pendidikan='$pendidikan', 
																		  agama='$agama',
																		  foto='$foto' WHERE nama='$nama_pimpinan' ");
			header("Location: pimpinan.php");
		}else{
			die("Update Gagal");
		}
		break;
	default:
		header('Location : pimpinan.php');
		break;
	}
?>