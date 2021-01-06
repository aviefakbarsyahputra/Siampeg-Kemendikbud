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
  <title>Persetujuan Cuti | Biro SDM KEMDIKBUD</title>
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
                  <small>Biro SDM KEMDIKBUD</small>
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
        <li class="">
          <a href="../home.php">
            <i class="fa fa-dashboard"></i> <span>Profile</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i> <span>Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pegawai.php"><i class="fa fa-file-text"></i> Data Pegawai</a></li>
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
            <li><a href="../session/session.php?id=datakinerja"><i class="fa fa-file-text"></i> Data Kinerja</a></li>
          </ul>
        </li>

         <li class="active">
          <a href="persetujuan_cuti.php">
            <i class="fa fa-list-alt"></i> <span>Persetujuan Cuti</span>
          </a>
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
        Persetujuan Cuti
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pengajuan Cuti</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">

            <div class="box-header with-border" align="center">
              <h4>Semua Data Cuti</h4>
            </div>

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Tgl Pengajuan</th>
                  <th>Jumlah Hari</th>
                  <th>Awal Cuti</th>
                  <th>Akhir Cuti</th>
                  <th>Keterangan</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    include '../config/koneksi.php';
                    $sql = mysqli_query($koneksi,"SELECT * FROM tbl_cuti");
                    if($sql==false){
                      die('gagal'.mysqli_error($sql));
                    }
                    $no = 1;
                    while($row = mysqli_fetch_array($sql)){
                      $date1 = date_create($row['mulai_cuti']);
                      $date2 = date_create($row['akhir_cuti']);
                      $diff = date_diff($date1,$date2);

                      // var_dump($diff);die();
                      ?>
                        <tr>
                          <td align=center><?php echo $no; ?></td>
                          <td align=center><?php echo $row['nama']; ?></td>
                          <td align=center><?php echo $row['tgl_pengajuan']; ?></td>
                          <td align=center><?php echo $diff->format("%a hari"); ?></td>
                          <td align=center><?php echo $row['mulai_cuti']; ?></td>
                          <td align=center><?php echo $row['akhir_cuti']; ?></td>
                          <td align=center><?php echo $row['keterangan']; ?></td>
                          <td align=center>
                            <?php 
                              if($row['status']=='Belum Dikonfirmasi'){
                                echo "<span class='label label-warning'>Belum Dikonfirmasi</span>";
                              }elseif($row['status']=='Disetujui'){
                                echo "<span class='label label-success'>Disetujui</span>";
                              }elseif($row['status']=='Tidak Disetujui'){
                                echo "<span class='label label-danger'>Tidak Disetujui</span>";
                              }
                            ?>
                          </td>
                          <td align=center>                        
                            <div class="input-group-btn">
                              <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">Action
                                <span class="fa fa-caret-down"></span>
                            </button>
                                <ul class="dropdown-menu">
                                  <li><a href="../proses_cuti.php?id=<?php echo $row['kd_cuti']; ?>&status=setuju">Setuju</a></li>
                                  <li><a href="../proses_cuti.php?id=<?php echo $row['kd_cuti']; ?>&status=tidak">Tidak Setuju</a></li>
                                </ul>
                              </div>
                            </td>
                      </tr>
                  <?php
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
</body>
</html>