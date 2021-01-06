<?php
session_start();
if(!isset($_SESSION['user'])){
  header('location: login.php');
}
?>
<!DOCTYPE html>
<hmtl>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Jabatan | Biro SDM KEMDIKBUD</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="../bower_components/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
   <!-- DataTables -->
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <div class="main-header">
    <!-- Logo -->
    <a href="../home.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SDM</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SDM </b>KEMDIKBUD</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../img/<?php echo $_SESSION ['foto'] ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['nama'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../img/<?php echo $_SESSION ['foto'] ?>" class="img-circle" alt="User Image">
                <p>
                  <?php echo $_SESSION['nama'] ?>
                  <small>SDM KEMDIKBUD</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="../session/session.php?id=gantipassword" class="btn btn-info btn-flat"><i class=""></i> Ganti Password</a>
                </div>
                <div class="pull-right">
                  <a href="../logout.php" class="btn btn-danger btn-flat"><i class="fa fa-sign-out"></i> Logout</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </div>

  <!-- Left side column. contains the logo and sidebar -->
  <div class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../img/<?php echo $_SESSION ['foto'] ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <span>Selamat Datang,</span>
          <h5><?php echo $_SESSION['nama']?></h5>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
       <!--  <li class="header">MAIN NAVIGATION</li> -->
        <li>
          <a href="../home.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li class="treeview active">
          <a href="#">
            <i class="fa fa-database"></i> <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pimpinan.php"><i class="fa fa-file-text"></i> Data Pimpinan</a></li>
            <li><a href="pegawai.php"><i class="fa fa-file-text"></i> Data Pegawai</a></li>
            <li class="active"><a href="jabatan.php"><i class="fa fa-file-text"></i> Data Jabatan</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i> <span> Penilaian</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../session/session.php?id=datakinerja_admin"><i class="fa fa-file-text"></i> Data Kinerja</a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-briefcase"></i> <span> Data Kenaikan Jabatan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="naik_jabatan.php"><i class="fa fa-file-text"></i> Jabatan Pimpinan</a></li>
            <li><a href="naik_jabatan_pegawai.php"><i class="fa fa-file-text"></i> Jabatan Pegawai</a></li>
          </ul>
        </li>

      </ul>
    </section>
  </div>
  <!-- /.sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Semua Jabatan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Jabatan</li>
      </ol>
    </section>

<!-- Penulisan untuk kode otomatis -->
 <?php 
  include "../config/koneksi.php";
  // membuat query max untuk kode barang
  $carikode = mysqli_query($koneksi,"select max(kd_jabatan) from tbl_jabatan") or die (mysql_error());
  // menjadikannya array
  $datakode = mysqli_fetch_array($carikode);
  // jika $datakode
  if ($datakode) {
   // membuat variabel baru untuk mengambil kode mulai dari 1
   $nilaikode = substr($datakode[0], 2);
   // menjadikan $nilaikode ( int )
   $kode = (int) $nilaikode;
   // setiap $kode di tambah 1
   $kode = $kode + 1;
   // hasil untuk menambahkan kode 
   // angka 3 untuk menambahkan tiga angka setelah B dan angka 0 angka yang berada di tengah
   // atau angka sebelum $kode
   $hasilkode = "JB".str_pad($kode, 3, "0", STR_PAD_LEFT);
  } else {
   $hasilkode = "JB001";
  }
 ?>


<!-- Modal Popup -->
<div id="ModalAdd" class="modal fade modal-primary" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Tambah Jabatan</h4>
      </div>
      <div class="modal-body">
        <form id="modal-save" action="tambah_jabatan.php" name="modal_popup" enctype="multipart/form-data" method="post" role="form">

          <div class="form-group">
            <div class="form-group">
              <label for="kdjabatan">Kode Jabatan</label>
              <input name="kdjabatan" type="text" class="form-control" id="kdjabatan" 
              value="<?php echo $hasilkode;?>" readonly>
            </div>

            <div class="form-group">
              <label for="jabatan">Nama Jabatan</label>
              <input name="jabatan" type="text" class="form-control" id="jabatan" placeholder="masukkan jabatan">
            </div>
            
          </div>
              
          <div class="modal-footer">
            <button class="btn btn-success" type="submit">Tambah</button>
            <button type="reset" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Batal</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>


<!-- Modal Popup untuk delete--> 
    <div class="modal fade modal-primary" id="modal_delete">
      <div class="modal-dialog">
        <div class="modal-content" style="margin-top:100px;">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" style="text-align:center;">Yakin Ingin Menghapus?</h4>
          </div>    
          <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
            <a href="#" class="btn btn-success" id="delete_link">Hapus</a>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <!-- modal -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalAdd"><i class="fa fa-plus"></i> Tambah Jabatan
            </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="1">Nomer</th>
                  <th>Kode Jabatan</th>
                  <th>Nama Jabatan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    include '../config/koneksi.php';
                    $sql = mysqli_query($koneksi, "SELECT * From tbl_jabatan");
                    if($sql == false){
                      die("gagal" . mysqli_error($koneksi));
                    }
                    $no=1;
                    while ($row = mysqli_fetch_array ($sql)){
                      echo "
                        <tr>
                          <td align=center>$no</td>
                          <td align=center>$row[kd_jabatan]</td>
                          <td align=center>$row[nama_jabatan]</td>
                          <td align=center>
                          <a href='#' class='btn btn-danger fa fa-trash' onClick='confirm_delete(\"hapus_jabatan.php?id=$row[kd_jabatan]\")'>Hapus
                          </a>
                          </td>

                        </tr>";
                    $no++;   
                    }
                  ?>
                </tbody>
              </table>
            </div>
            
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2017 <a href="">Denny Aris</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/js/bootstrap.min.js"></script>
<!-- daterangepicker -->
<script src="../bower_components/moment/min/moment.min.js"></script>
<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
<!-- Slimscroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  //Date picker
    $('#datepicker').datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true
    })
    $('#datepicker2').datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true
    })
//Date range picker
    $('#reservation').daterangepicker()

</script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

  <!-- Javascript Delete -->
  <script>
    function confirm_delete(delete_url){
      $("#modal_delete").modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href', delete_url);
    }
  </script>

</body>
</html>