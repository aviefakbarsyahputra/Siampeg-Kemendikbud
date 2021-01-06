<?php
require 'smsgateway/autoload.php';

use SMSGatewayMe\Client\ApiClient;
use SMSGatewayMe\Client\Configuration;
use SMSGatewayMe\Client\Api\MessageApi;
use SMSGatewayMe\Client\Model\SendMessageRequest;
$connection = @fsockopen("www.google.com",80);
$time = date("d-m-Y h:i:s");
$id = $_GET['id'];
$_SESSION['timeA']=$time;
date_default_timezone_set("Asia/Jakarta");

function login(){
	global $time,$user,$pass,$dnama,$duser,$dpass,$dno,$foto; 
	include "../config/koneksi.php";
	$query = "Select * From akun Where username='$user' And password='$pass'";
	$sql = mysqli_query($koneksi,$query);
	$ambil = mysqli_fetch_array($sql);
	$dnama = $ambil['nama'];
	$duser = $ambil['username'];
	$dpass = $ambil['password'];
	$dno = $ambil['no_hp'];
	$dlevel = $ambil['level'];
	$foto = $ambil['foto'];
	$_SESSION['level'] = $dlevel;
}
function again(){
	global $time,$user,$pass,$dnama,$duser,$dpass,$dno,$foto; 
	include "../config/koneksi.php";
	$query = "Select * From akun Where username='$user'";
	$sql = mysqli_query($koneksi,$query);
	$ambil = mysqli_fetch_array($sql);
	$dnama = $ambil['nama'];
	$duser = $ambil['username'];
	$dpass = $ambil['password'];
	$dno = $ambil['no_hp'];
	$dlevel = $ambil['level'];
	$foto = $ambil['foto'];
	$_SESSION['level'] = $dlevel;
}
function sha512(){
	global $time,$code,$dnama,$duser;
	require "../algoritma/hash.php";
	$hash = new \phpseclib\Crypt\Hash('sha512');
	$string = bin2hex($hash->hash($dnama.$duser.$time));
	$code= hexdec(substr($string,0,10));
}

function sms(){
	global $time,$code,$verif,$dno;
	$userkey="al0dxz";
	$passkey="iipwh4tudq";
	$verif = substr(rand(10,100),0,6);
	$msg = "Kode Verifikasi Anda : " .$verif.  ". Kode Ini Hanya Berlaku Selama 2 Menit";

	// Configure client
	$config = Configuration::getDefaultConfiguration();
	$config->setApiKey('Authorization', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTU0NTA1ODkyMSwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjE2NTM3LCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.KUZ8VPfdnbjDC2aZVg2i0zmsHDaaAUEtpulPm_AIHlI');
	$apiClient = new ApiClient($config);
	$messageClient = new MessageApi($apiClient);

	// Sending a SMS Message
	$sendMessageRequest2 = new SendMessageRequest([
		'phoneNumber' => $dno,
		'message' => $msg,
		'deviceId' => 106940
	]);
	$sendMessages = $messageClient->sendMessages([
		$sendMessageRequest2
	]);
	print_r($sendMessages);
}

if($connection){
	session_start();
	if($id == 'login'){
	$user = $_POST['user'];
	$pass = md5($_POST['pass']);
	login();
		if($user==$duser && $pass==$dpass){
			sms();
			$_SESSION['nama']=$dnama;
			$_SESSION['foto']=$foto;
			$_SESSION['kode']=$verif;
			$_SESSION['id']=$id;
			$_SESSION['user']=$user;
			$_SESSION['timeA']=$time;
		echo"
				<script language='javascript'>
					window.location='../form/verifikasi.php';
				</script>";
		}else{
			echo"	
				<script language='javascript'>
					alert('Username atau Password salah');
					window.location='../login.php';
				</script>";
		}	
	}elseif($id=='again'){
		if(isset($_GET['user'])){
			$user = $_GET['user'];
			again();
			sha512();
			sms();
			$_SESSION['nama']=$dnama;
			$_SESSION['foto']=$foto;
			$_SESSION['kode']=$verif;
			$_SESSION['id']=$id;
			$_SESSION['user']=$user;
			$_SESSION['timeA']=$time;
			echo"
				<script language='javascript'>
					window.location='../form/verifikasi.php';
				</script>
			";
		}else{
			echo"
				<script language='javascript'>
					alert('Maaf percobaan habis silahkan login kembali');
					window.location='../login.php';
					
				</script>
			";
		}
	}elseif($id == 'datakinerja_admin'){
		if(isset($_SESSION['user'])){
			$user = $_SESSION['user'];
			again();
			sha512();
			sms();
			$_SESSION['nama']=$dnama;
			$_SESSION['foto']=$foto;
			$_SESSION['kode']=$verif;
			$_SESSION['id']=$id;
			$_SESSION['timeA']=$time;
			// var_dump($user,$id,$dnama,$foto,$verif);die();
			echo"
				<script language='javascript'>
					window.location='../form/verifikasi1.php';
				</script>
			";
		}else{
			echo"
				<script language='javascript'>
					alert('Maaf Anda Salah');
					window.location='../home.php';
				</script>
			";
		}
	}elseif($id == 'datakinerja'){
		if(isset($_SESSION['user'])){
			$user = $_SESSION['user'];
			again();
			sha512();
			sms();
			$_SESSION['nama']=$dnama;
			$_SESSION['foto']=$foto;
			$_SESSION['kode']=$verif;
			$_SESSION['id']=$id;
			$_SESSION['timeA']=$time;
			// var_dump($user,$id,$dnama,$foto,$verif);die();
			echo"
				<script language='javascript'>
					window.location='../form/verifikasi1.php';
				</script>
			";
		}else{
			echo"
				<script language='javascript'>
					alert('Maaf Anda Salah');
					window.location='../home.php';
				</script>
			";
		}
	}elseif($id == 'persetujuan_cuti'){
		if(isset($_SESSION['user'])){
			$user = $_SESSION['user'];
			again();
			sha512();
			sms();
			$_SESSION['nama']=$dnama;
			$_SESSION['foto']=$foto;
			$_SESSION['kode']=$verif;
			$_SESSION['id']=$id;
			$_SESSION['timeA']=$time;
			// var_dump($user,$id,$dnama,$foto,$verif);die();
			echo"
				<script language='javascript'>
					window.location='../form/verifikasi1.php';
				</script>
			";
		}else{
			echo"
				<script language='javascript'>
					alert('Maaf Anda Salah');
					window.location='../home.php';
				</script>
			";
		}
	}elseif($id == 'naikjabatan'){
		if(isset($_SESSION['user'])){
			$user = $_SESSION['user'];
			//untuk dikirim ke db
			$jabatan = $_POST['jabatan'];
			$golongan = $_POST['golongan'];
			$pangkat = $_POST['pangkat'];
			$nm_pimpinan = $_POST['nm_pimpinan'];

			$_SESSION['jabatan']= $jabatan;
			$_SESSION['golongan']= $golongan;
			$_SESSION['pangkat']= $pangkat;
			$_SESSION['nm_pimpinan']=$nm_pimpinan;
			// var_dump($golongan,$pangkat,$jabatan,$nm_pimpinan,$user);die();
			// var_dump($_SESSION);die();

			again();
			sha512();
			sms();
			$_SESSION['nama']=$dnama;
			$_SESSION['foto']=$foto;
			$_SESSION['kode']=$verif;
			$_SESSION['id']=$id;
			$_SESSION['timeA']=$time;
			echo"
				<script language='javascript'>
					window.location='../form/verifikasi1.php';
				</script>
			";
		}else{
			echo "gagal";
		}
	}elseif($id=='ulang'){
		if(isset($_SESSION['user'])){
			$user = $_SESSION['user'];
			$jabatan = $_SESSION['jabatan'];
			$golongan = $_SESSION['golongan'];
			$pangkat = $_SESSION['pangkat'];
			$nm_pimpinan = $_SESSION['nm_pimpinan'];

			again();
			sha512();
			sms();
			$_SESSION['nama']=$dnama;
			$_SESSION['foto']=$foto;
			$_SESSION['kode']=$verif;
			$_SESSION['id']=$id;
			$_SESSION['timeA']=$time;
			echo"
				<script language='javascript'>
					window.location='../form/verifikasi1.php';
				</script>
			";

		}
	}elseif($id == 'naikjabatan_peg'){
		if(isset($_SESSION['user'])){
			$user = $_SESSION['user'];
			again();
			sha512();
			sms();
			$_SESSION['nama']=$dnama;
			$_SESSION['foto']=$foto;
			$_SESSION['kode']=$verif;
			$_SESSION['id']=$id;
			$_SESSION['timeA']=$time;

			//untuk dikirim ke db
			$jabatan = $_POST['jabatan'];
			$golongan = $_POST['golongan'];
			$pangkat = $_POST['pangkat'];
			$nm_pegawai = $_POST['nm_pegawai'];
			$_SESSION['jabatan']= $jabatan;
			$_SESSION['golongan']= $golongan;
			$_SESSION['pangkat']= $pangkat;
			$_SESSION['nm_pegawai']=$nm_pegawai;
			echo"
				<script language='javascript'>
					window.location='../form/verifikasi1.php';
				</script>
			";
		}else{
			echo"
				<script language='javascript'>
					alert('Maaf Anda Salah');
					window.location='../home.php';
				</script>
			";
		}
	}elseif($id == 'gantipassword'){
		if(isset($_SESSION['user'])){
			$user = $_SESSION['user'];
			again();
			sha512();
			sms();
			$_SESSION['nama']=$dnama;
			$_SESSION['foto']=$foto;
			$_SESSION['kode']=$verif;
			$_SESSION['id']=$id;
			$_SESSION['timeA']=$time;
			echo"
				<script language='javascript'>
					window.location='../form/verifikasi1.php';
				</script>
			";
		}else{
			echo"
				<script language='javascript'>
					alert('Maaf Kode Verfikasi Salah!!!');
					window.location='../home.php';
				</script>
			";
		}
	}			
}else{
	echo"
		<script language='javascript'>
				alert('Tidak Ada koneksi internet');
				window.history.back();
			</script>
		";
		if($id=="login"){
			session_unset();
			session_destroy();
		}
}

?>