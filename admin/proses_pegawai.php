<?php
include '../config/koneksi.php';
$page = $_GET['page'];

switch ($_GET['page']) {
	case 'tambah':
		$nip = $_POST['user'];
		$password = md5($_POST['pass']);
		$nama_pegawai = ucwords($_POST['namapegawai']);
		$no_hp = $_POST['no_hp'];
		$lvl = $_POST['lvl'];
		//masukan table pegawai
		$alamat = ucwords($_POST['alamat']);
		$email = $_POST['email'];
		$tglmasuk = $_POST['tglmasuk'];
		$jeniskelamin = $_POST['jk'];
		$status_menikah = $_POST['menikah'];
		$pendidikan = ucwords($_POST['pendidikan']);
		$agama = $_POST['agama'];
		$jabatan = $_POST['jabatan'];
		$golongan = $_POST['golongan'];
		$pangkat = $_POST['pangkat'];

		$sumber = $_FILES['foto']['tmp_name'];
		$path = "../img/";
		$foto = $_FILES['foto']['name'];

		if(move_uploaded_file($sumber, $path.$foto)){
			$akun = mysqli_query($koneksi, "INSERT INTO akun (username,password,nama,no_hp,level,foto) VALUES 
				('$nip','$password','$nama_pegawai','$no_hp','$lvl','$foto')");

	$add = mysqli_query($koneksi, "INSERT INTO tbl_pegawai (nip,nama,alamat,email,tanggal_masuk,jenis_kelamin,status_menikah,pendidikan,agama,jabatan,golongan,pangkat,foto) VALUES 
			('$nip','$nama_pegawai','$alamat','$email','$tglmasuk','$jeniskelamin','$status_menikah','$pendidikan','$agama','$jabatan','$golongan','$pangkat','$foto')");

			header("Location: pegawai.php");
		}else{
			die("error".mysqli_error($koneksi));
		}
		break;
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
			header("Location: pegawai.php");	
		}elseif(move_uploaded_file($sumber, $path.$foto)){
			$editakun = mysqli_query($koneksi,"UPDATE akun SET no_hp='$no_hp', foto='$foto' WHERE nama='$nama_pegawai'");
			$editpeg = mysqli_query($koneksi, "UPDATE tbl_pegawai SET alamat='$alamat', 
																		  email='$email', 
																		  jenis_kelamin='$jeniskelamin', 
																		  status_menikah='$status_menikah', 
																		  pendidikan='$pendidikan', 
																		  agama='$agama',
																		  foto='$foto' WHERE nama='$nama_pegawai' ");
			header("Location: pegawai.php");
		}else{
			die("Update Gagal");
		}
		break;
	default:
		header('Location : pegawai.php');
		break;
	}
?>