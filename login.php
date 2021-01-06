<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['user'])){
	header ('location: home.php');
session_destroy();
}
?>
<html>
<head>
	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Biro Sumber Daya Manusia |Kementian Pendidikan Dan Kebudayaan</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
</head>

<link rel="stylesheet" type="text/css" href="bower_components/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="bower_components/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="bower_components/bootstrap/css/style.css">
<body>
	<div class="middlePage">
		<div class="page-header">
  			<h2 class="title"><center>Biro SDM Kementrian Pendidikan Dan Kebudayaan</center></h2>
		</div>

	<div class="panel panel-primary">
  		<div class="panel-heading">
    	<h3 class="panel-title">Silahkan Login</h3>
  	</div>

  	<div class="panel-body">

    <div class="row">

  	<!-- logo gambar -->
	<div class="col-md-5">
		<img src="img/logo-tut-wuri.png" class="img-thumbnail">
	</div>
	<!-- /logo gambar -->

    <div class="col-md-7">
		<form class="form-horizontal" name="login" method="post" action="session/session.php?id=login">
			<fieldset>
			  <div class="spacing">Nomer Induk Pegawai</div>
			  <input name="user" type="text" placeholder="Masukan NIP" class="form-control input-md" required>
			  <div class="spacing">Password</div>
			  <input name="pass" type="password" placeholder="Masukan Password" class="form-control input-md" required>
			  <div class="spacing"></div>
			  <!-- <div class="spacing"><a href="#"><small> Lupa Password?</small></a><br/></div> -->
        	<!-- <div class="pull-left"><a href="register.php"><small> Registrasi</small></a><br/></div> -->
			  <button name="submit" type="submit" class="btn btn-info btn-sm pull-right">Login</button>
			</fieldset>
		</form>
	</div>
	</div>
		<div class="pull-right"><?php $tgl=date('l, d-m-Y'); echo $tgl;?></div>
	</div>
	</div>

<p><a href=""></a>Kemdikbud</p>
	</div>
</body>
<!-- Bootstrap Core JavaScript -->
 <script src="bower_components/bootstrap/js/bootstrap.min.js"></script>
 <script src="bower_components/bootstrap/js/bootstrap.js"></script>
</html>
