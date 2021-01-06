 <?php 
  include "../config/koneksi.php";
  // membuat query max untuk kode barang
  $carikode = mysqli_query($koneksi,"select max(kd_pegawai) from tbl_pegawai") or die (mysql_error());
  // menjadikannya array
  $datakode = mysqli_fetch_array($carikode);
  // jika $datakode
  if ($datakode) {
   // membuat variabel baru untuk mengambil kode mulai dari 3
   $nilaikode = substr($datakode[0], 3);
   // menjadikan $nilaikode ( int )
   $kode = (int) $nilaikode;
   // setiap $kode di tambah 1
   $kode = $kode + 1;
   // hasil untuk menambahkan kode 
   // angka 3 untuk menambahkan tiga angka setelah B dan angka 0 angka yang berada di tengah
   // atau angka sebelum $kode
   $hasilkode = "PEG".str_pad($kode, 3, "0", STR_PAD_LEFT);
  } else {
   $hasilkode = "PEG001";
  }
 ?>