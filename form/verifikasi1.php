<!DOCTYPE html>
<?php
session_start();
$user = $_SESSION['user'];
$awal = date_create();
// var_dump($_SESSION['level']);die();

$nama=$_SESSION['nama'];
$foto=$_SESSION['foto'];
$verif=$_SESSION['kode']; //ambil di session sms
$id=$_SESSION['id'];

$_SESSION['kode'] =$verif;

if ($id=='again') {
	$user=$_SESSION['user'];
	$_SESSION['user']=$user;
}elseif($id == 'login'){
	$user=$_SESSION['user'];
	$_SESSION['user']=$user;
}

?>
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Biro Sumber Daya Manusia|KEMDIKBUD</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<link rel="stylesheet" type="text/css" href="../bower_components/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../bower_components/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../bower_components/bootstrap/css/style.css">
	<script src="http://code.jquery.com/jquery-1.10.2.min.js" type="text/javascript"></script>

	<script type="text/javascript">
        $(document).ready(function() {
              var detik = 0;
              var menit = 2;
              var ket = 0;
            function hitung() {
                var c = setTimeout(hitung,1000);
				$('#timer').html(
                      '<h3>' + menit + ' : ' + detik + '</h3>'
                );
                detik --;
                if(detik < 0) {
                    detik = 59;
                    menit --;
                    if(menit < 0 ) {
						alert('Verifikasi Time Out!');
						clearTimeout(c);						
						// Fungsi Dibawah Diaktifkan Jika Ketika Session Habis Ingin Langsung Berpindah Ke Halaman Login/ Awal
						window.location.href="../home.php";
                    }
                }
            }
            hitung();
      });
    </script>
</head>
<body>
	<div class="middlePage">
		<div class="page-header">
  			<h2 class="title"><center>Biro Sumber Daya Manusia KEMDIKBUD</center></h2>
		</div>
	<div class="panel panel-default">
  	<div class="panel-body">
	<form role="form" name="verify" method="post" action="../session/sessionverify.php?id=<?php echo $id ?>">
		<fieldset>
		    		<h3><center>Verifikasi</center></h3>
					<div style="background:#20B2AA" id="timer" align="center"></div>
					<h4>Silahkan cek sms dan masukan kode verifikasi</h4>
					<input style="width:50%" type="text" class="form-input" name="verify" placeholder="Kode Verifikasi" value="<?php //echo $verif ?>" required>
					<input type="submit" class="btn btn-primary active" name="submit" value="Verifikasi"/>
						<table style="float:right;">
							<td><a href="../session/session.php?id=<?=$id?>&user=<?= $user ?>" class="btn-user" style="margin-right: 25px;text-decoration:none;margin-left: 7px;">Tidak SMS? Kirim Ulang</a></td>
						</table>
				</fieldset>
			</form>
	</div>
	</div>

<p><a href=""></a>KEMDIKBUD</p>
	</div>
    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/js/bootstrap.min.js"></script>

</body>
