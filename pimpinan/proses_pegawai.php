<?php
include '../config/koneksi.php';
$page = $_GET['page'];

switch ($_GET['page']) {
	case 'tambah':
		$nip = $_POST['user'];
		$password = md5($_POST['pass']);
		$nama_pegawai = $_POST['namapegawai'];
		$no_hp = $_POST['no_hp'];
		$lvl = $_POST['lvl'];
		//masukan table pegawai
		$alamat = $_POST['alamat'];
		$email = $_POST['email'];
		$tglmasuk = $_POST['tglmasuk'];
		$jeniskelamin = $_POST['jk'];
		$status_menikah = $_POST['menikah'];
		$agama = $_POST['agama'];
		$jabatan = $_POST['jabatan'];

		$sumber = $_FILES['foto']['tmp_name'];
		$path = "../img/";
		$foto = $_FILES['foto']['name'];

		if(move_uploaded_file($sumber, $path.$foto)){
			$akun = mysqli_query($koneksi, "INSERT INTO akun (username,password,nama,no_hp,level,foto) VALUES 
				('$nip','$password','$nama_pegawai','$no_hp','$lvl','$foto')");

			$add = mysqli_query($koneksi, "INSERT INTO tbl_pegawai (nip,nama,alamat,email,tanggal_masuk,jenis_kelamin,status_menikah,agama,nama_jabatan,foto) VALUES 
			('$nip','$nama_pegawai','$alamat', '$email','$tglmasuk','$jeniskelamin','$status_menikah','$agama','$jabatan','$foto')");
			header("Location: pegawai.php");
		}else{
			die("error".mysqli_error($koneksi));
		}
		break;
	case 'edit':
		$id = $_POST['nama'];
		$no_hp = $_POST['no_hp'];
		$alamat = $_POST['alamat'];
		$email = $_POST['email'];
		$tglmasuk = $_POST['tglmasuk'];
		$jeniskelamin = $_POST['jk'];
		$status_menikah = $_POST['menikah'];
		$agama = $_POST['agama'];
		$jabatan = $_POST['jabatan'];

		$editakun = mysqli_query($koneksi,"UPDATE akun SET no_hp='$no_hp' WHERE nama='$id'");

		$editpegawai = mysqli_query($koneksi, "UPDATE tbl_pegawai SET alamat='$alamat', email='$email',tanggal_masuk='$tglmasuk', jenis_kelamin='$jeniskelamin', status_menikah='$status_menikah', agama='$agama', nama_jabatan='$jabatan' WHERE nama='$id' ");

		if($editakun && $editpegawai){
			header("Location: pegawai.php");
		}else{
			die('gagal update');
		}
		break;
	default:
		header('Location : pegawai.php');
		break;
	}
?>