<?php

include '../config/koneksi.php';

$kdcuti = $_POST['kdcuti'];
$nama = $_POST['nama'];
$awal = $_POST['awalcuti'];
$akhir = $_POST['akhircuti'];
$keterangan = $_POST['keterangan'];
$tgl_skrg = $_POST['tglskrg'];
$konfirmasi = $_POST['konfirmasi'];

$cuti = mysqli_query($koneksi, "INSERT INTO tbl_cuti (kd_cuti,nama,mulai_cuti,akhir_cuti,keterangan,status,tgl_pengajuan) VALUES 
		('$kdcuti','$nama','$awal','$akhir','$keterangan','$konfirmasi','$tgl_skrg')");
	
if($cuti){
	echo "<script language='javascript'>
				alert('Berhasil Mengajukan, Harap Menunggu Konfirmasi');
				window.location='../pegawai/pengajuan_cuti.php';
		</script>";
}	
	

?>