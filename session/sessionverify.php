<?php

$kodev = $_POST['verify'];
session_start();
$id	= $_GET['id'];
// $flag	= $_GET['flag'];
$a = date("d-m-Y h:i:s");
$b = $_SESSION['timeA'];
$login = strtotime($a);
$mulai = strtotime($b);
$user = $_SESSION['user'];
$nama 	= $_SESSION['nama'];
$foto 	= $_SESSION['foto'];
$verif 	= $_SESSION['kode'];
$diff = $login-$mulai;
$jam   = floor($diff / (60 * 60));
$menit = $diff - $jam * (60 * 60);
$menit1 = floor( $menit / 60 );
// var_dump($verif,$kodev);die();
// $diff  = $mulai->diff($login);

	if ($menit1>=2) {
		session_unset();
		session_destroy();
		echo"
			<script language='javascript'>
				alert('Masa Berlaku Kode Verifikasi Telah Habis Silahkan Login Kembali');
				window.location='../login.php';
			</script>
		";
	}

if($kodev == $verif){
	if($id == 'again'){
		echo"
				<script language='javascript'>
					window.location='../home.php?page=home';
				</script>
			";
		// sendemail();
		$_SESSION['nama']=$nama;
		$_SESSION['foto']=$foto;
		include "../config/koneksi.php";
	}elseif($id == 'login'){
		echo"
				<script language='javascript'>
					window.location='../home.php?page=home';
				</script>
			";
		// sendemail();
		$_SESSION['nama']=$nama;
		$_SESSION['foto']=$foto;
		include "../config/koneksi.php";
	}elseif($id == 'datakinerja_admin'){
		echo "<script>
				alert('Anda Berhasil Masuk!!!');
				window.location='../admin/data_kinerja.php';
			</script>";
		$_SESSION['nama']=$nama;
		$_SESSION['foto']=$foto;
		include "../config/koneksi.php";
	}elseif($id == 'datakinerja'){
		echo "<script>
				alert('Anda Berhasil Masuk!!!');
				window.location='../data_kinerja.php';
			</script>";
		$_SESSION['nama']=$nama;
		$_SESSION['foto']=$foto;
		include "../config/koneksi.php";
	}elseif($id == 'persetujuan_cuti'){
		echo "<script>
				alert('Anda Berhasil Masuk!!!');
				window.location='../pimpinan/persetujuan_cuti.php';
			</script>";
		$_SESSION['nama']=$nama;
		$_SESSION['foto']=$foto;
		include "../config/koneksi.php";
	}elseif($id == 'gantipassword'){
		echo "<script>
				window.location='../ganti.php';
			</script>";
		$_SESSION['nama']=$nama;
		$_SESSION['foto']=$foto;
		include "../config/koneksi.php";
	}elseif($id == 'naikjabatan' || $id=='ulang'){
		include '../config/koneksi.php';
		$jabatan = $_SESSION['jabatan'];
		$golongan = $_SESSION['golongan'];
		$pangkat = $_SESSION['pangkat'];
		$nm_pimpinan = $_SESSION['nm_pimpinan'];
		$naik = mysqli_query($koneksi, "UPDATE tbl_pimpinan SET jabatan='$jabatan', golongan='$golongan', pangkat='$pangkat' WHERE nama='$nm_pimpinan' ");
		echo "<script>
				alert('Anda Berhasil Menaikkan Jabatan Pimpinan');
				window.location='../admin/naik_jabatan.php';
			</script>";
		$_SESSION['nama']=$nama;
		$_SESSION['foto']=$foto;
	}elseif($id == 'naikjabatan_peg'){
		
		include '../config/koneksi.php';
		$jabatan = $_SESSION['jabatan'];
		$golongan = $_SESSION['golongan'];
		$pangkat = $_SESSION['pangkat'];
		$nm_pegawai = $_SESSION['nm_pegawai'];
		$naik = mysqli_query($koneksi, "UPDATE tbl_pegawai SET jabatan='$jabatan', golongan='$golongan', pangkat='$pangkat' WHERE nama='$nm_pegawai' ");
		echo "<script>
				alert('Anda Berhasil Menaikkan Jabatan Pegawai');
				window.location='../admin/naik_jabatan_pegawai.php';
			</script>";
		$_SESSION['nama']=$nama;
		$_SESSION['foto']=$foto;
	}
}else{
	if($id == 'login'){
		echo"
			<script language='javascript'>
				alert('Kode Verifikasi Tidak Sesuai!');
				window.location='../login.php';
			</script>
		";
		session_unset();
		session_destroy();
		}elseif($id == 'update' || $id == 'create' || $id=='login'){
			if ( $user == 'admin'){
			echo"
				<script language='javascript'>
					alert('Kode Verifikasi Tidak Sesuai!');
					window.location='../home.php';
				</script>
			";
		}else{
			echo"
				<script language='javascript'>
					alert('Kode Verifikasi Tidak Sesuai!');
					window.location='../home.php';
				</script>
			";
		}
	}elseif($id == 'datakinerja'){
		echo "<script language='javascript'>
				alert('Kode Verifikasi Tidak Sesuai!!');
				window.location='../home.php';
			</script>";
	}elseif($id == 'datakinerja_admin'){
		echo "<script language='javascript'>
				alert('Kode Verifikasi Tidak Sesuai!!');
				window.location='../home.php';
			</script>";
	}elseif($id == 'persetujuan_cuti'){
		echo "<script language='javascript'>
				alert('Kode Verifikasi Tidak Sesuai!!');
				window.location='../home.php';
			</script>";
	}elseif($id == 'gantipassword'){
		echo "<script language='javascript'>
				alert('Kode Verifikasi Tidak Sesuai!!');
				window.location='../home.php';
			</script>";
	}elseif($id == 'naikjabatan'){
		echo "<script language='javascript'>
				alert('Kode Verifikasi Tidak Sesuai!!');
				window.location='../home.php';
			</script>";
	}elseif($id == 'naikjabatan_peg'){
		echo "<script language='javascript'>
				alert('Kode Verifikasi Tidak Sesuai!!');
				window.location='../home.php';
			</script>";
	}
}
?>
