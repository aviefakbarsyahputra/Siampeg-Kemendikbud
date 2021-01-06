<!DOCTYPE html>
<?php
session_start();
include 'config/koneksi.php';
	//proses jika tombol rubah di klik
		//membuat variabel untuk menyimpan data inputan yang di isikan di form
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$password_lama			= $_POST['password_lama'];
		$password_baru			= $_POST['password_baru'];
		$konfirmasi_password	= $_POST['konfirmasi_password'];
		
		//cek dahulu ke database dengan query SELECT
		//kondisi adalah WHERE (dimana) kolom password adalah $password_lama di encrypt m5
		//encrypt -> md5($password_lama)
		$password_lama	= md5($password_lama);
		$cek 			= mysqli_query($koneksi,"SELECT password FROM akun WHERE password='$password_lama'");
		$row 			= mysqli_num_rows($cek);
		if($row){
			//kondisi ini jika password lama yang dimasukkan sama dengan yang ada di database
			//membuat kondisi minimal password adalah 5 karakter
			if(strlen($password_baru) >= 5){
				//jika password baru sudah 5 atau lebih, maka lanjut ke bawah
				//membuat kondisi jika password baru harus sama dengan konfirmasi password
				if($password_baru == $konfirmasi_password){
					//jika semua kondisi sudah benar, maka melakukan update kedatabase
					//query UPDATE SET password = encrypt md5 password_baru
					//kondisi WHERE id user = session id pada saat login, maka yang di ubah hanya user dengan id tersebut
					$password_baru 	= md5($password_baru);
					$user = $_SESSION['user']; //ini dari session saat login
					$update 		= mysqli_query($koneksi,"UPDATE akun SET password='$password_baru' WHERE username='$user' ");
					if($update){
						//kondisi jika proses query UPDATE berhasil
						echo "<script>
							alert('Ubah Password Berhasil');
							window.location='home.php';
						</script>";
					}else{
						//kondisi jika proses query gagal
						echo "<script>
							alert('Gagal Ubah Password');
						</script>";
					}					
				}else{
					//kondisi jika password baru beda dengan konfirmasi password
					echo "<script>
							alert('Konfirmasi Password Tidak Sama');
						</script>";
				}
			}else{
				//kondisi jika password baru yang dimasukkan kurang dari 5 karakter
				echo "<script>
							alert('Minimal password baru adalah 5 karakter');
						</script>";
			}
		}else{
			//kondisi jika password lama tidak cocok dengan data yang ada di database
			echo "<script>
					alert('Password Lama Tidak Sesusai');
				</script>";
		}
	}
	?>
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Ubah Password | BKPSDM Kota Tangerang</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<link rel="stylesheet" type="text/css" href="bower_components/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bower_components/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bower_components/bootstrap/css/style.css">
</head>
<body>
	<div class="middlePage">
		<div>
  			<h2 class="title"><center>Ubah Password</center></h2>
		</div>

	<div class="panel panel-default">
  	<div class="panel-body">
  		<form role="form" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label>Password Lama</label>
                  <input type="password" class="form-control" name="password_lama" placeholder="Masukkan Password Lama" required>
                </div>
                <div class="form-group">
                  <label>Password Baru</label>
                  <input type="password" class="form-control" name="password_baru" placeholder="Masukkan Password Baru" required>
                </div>
                <div class="form-group">
                  <label>Konfirmasi Password</label>
                  <input type="password" class="form-control" name="konfirmasi_password" placeholder="Konfirmasi Password Baru" required>
                </div>
              <!-- /.box-body -->

              <div class="box-footer pull-right">
                <a href="home.php" type="submit" class="btn btn-danger">Kembali</a>
              </div>
              <div class="box-footer pull-left">
                <button type="submit" name="submit" class="btn btn-success">Ubah</button>
              </div>
          </div>
            </form>
  	</div>
	</div>

<p><a href=""></a>KOMINFO</p>
	</div>
    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/js/bootstrap.min.js"></script>

</body>
