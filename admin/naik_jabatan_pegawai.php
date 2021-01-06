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
  <title> Data Kenaikan Jabatan | Biro SDM KEMDIKBUD</title>
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
              <img src="../img/<?php echo $_SESSION ['foto'] ?>" class="user-image" alt="admin">
              <span class="hidden-xs"><?php echo $_SESSION['nama'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../img/<?php echo $_SESSION ['foto'] ?>" class="img-circle" alt="admin">
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
          <img src="../img/<?php echo $_SESSION ['foto'] ?>" class="img-circle" alt="admin">
        </div>
        <div class="pull-left info">
          <span>Selamat Datang,</span>
          <h5><?php echo $_SESSION['nama']?></h5>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
       <!--  <li class="header">MAIN NAVIGATION</li> -->
        <li class="">
          <a href="../home.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i> <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pimpinan.php"><i class="fa fa-file-text"></i> Data Pimpinan</a></li>
            <li><a href="pegawai.php"><i class="fa fa-file-text"></i> Data Pegawai</a></li>
            <li><a href="jabatan.php"><i class="fa fa-file-text"></i> Data Jabatan</a></li>
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

        <li class="treeview active">
          <a href="#">
            <i class="fa fa-briefcase"></i> <span> Data Kenaikan Jabatan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="naik_jabatan.php"><i class="fa fa-file-text"></i> Jabatan Pimpinan</a></li>
            <li class="active"><a href="naik_jabatan_pegawai.php"><i class="fa fa-file-text"></i> Jabatan Pegawai</a></li>
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
        Kenaikan Jabatan Pegawai
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Data Kenaikan Jabatan Pegawai</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-6 col-md-offset-3">
          <div class="box box-primary">
            <!-- <div class="box-header">
              asem
            </div> -->
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="post" action="../session/session.php?id=naikjabatan_peg">

                <div class="form-group">
                  <label>Nama</label>
                  <select id="nm_pegawai" class="form-control" name="nm_pegawai" onchange="changeValue(this.value)" required>
                    <option value="">---Pilih---</option>
                    <?php
                    include '../config/koneksi.php';
                    $result = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai");
                    $jsArray = "var data = new Array();\n";
                    while ($row = mysqli_fetch_array($result)){
              echo '<option value="'.$row['nama'].'">'.$row['nama'].'</option>';
                    $jsArray .= "data['".$row['nama']."'] = {jabatan:'".addslashes($row['jabatan'])."', golongan:'".addslashes($row['golongan'])."',pangkat:'".addslashes($row['pangkat'])."'};\n";
                      } 
                    ?>
                  </select>
                </div>

              <div class="form-group">
                <label>Jabatan</label>
                <input type='text' id="tampil_jabatan" class='form-control' readonly>
              </div>

              <div class="form-group col-xs-6">
                <label>Golongan</label>
                <input type='text' id="tampil_gol" class='form-control pull-left' readonly>
              </div>

              <div class="form-group col-xs-6">
                <label>Pangkat</label>
                <input type='text' id="tampil_pangkat" class='form-control pull-right' readonly>
              </div>

            <div class="form-group">
              <label>Jabatan Baru</label>
              <select class="form-control" name="jabatan" required>
                <option value="">---Pilih---</option>
                <?php
                $sql = mysqli_query($koneksi, "SELECT * FROM tbl_jabatan");
                while ($row = mysqli_fetch_array($sql)){
                ?>
                  <option value="<?php echo $row['nama_jabatan'];?>"> 
                    <?php echo $row['nama_jabatan'];?>
                  </option>
                <?php 
                  } 
                ?>
              </select>
            </div>

            <div class="form-group">
              <label>Golongan Baru</label>
              <select class="form-control" name="golongan" id="golongan" required>
                <option value="">---Pilih---</option>
                <?php
                  include '../config/koneksi.php';
                  $sql = mysqli_query($koneksi, "SELECT * FROM tbl_golongan");
                  while ($row = mysqli_fetch_array($sql)){
                ?>
                <option value="<?= $row['id']?>"><?= $row['golongan']?></option>
                <?php 
                  }
                ?>
              </select>
            </div>

            <div class="form-group">
              <label>Pangkat Baru</label>
              <select class="form-control" name="pangkat" id="pangkat" required>
                <option value="">---Pilih---</option>
              </select>
            </div>


              <div class="box-footer" align="center">
               <button class="btn btn-primary">Naik Jabatan</button>
              </div>

            </form>
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
$(document).ready(function()
{
    $("button").click(function()
    {
        $('#modal_delete').modal('show');
    });
});
</script>

  <!-- chained dropdown -->
<script type="text/javascript">
  $(document).ready(function(){
    $('#golongan').on('change',function(){
      var golonganID = $(this).val();
      if(golonganID){
        $.get(
            "ajax.php",
            {golongan: golonganID}, //kirim ke ajax
            function(data){
              $('#pangkat').html(data);
            }
          );
      }else{
          $('#pangkat').html('<option>Pilih Golongan Dahulu</option>');
      }

    });
  });
</script>

<script>    
<?php echo $jsArray ?>  
  function changeValue(nm_pegawai){  
    document.getElementById('tampil_jabatan').value = data[nm_pegawai].jabatan;  
    document.getElementById('tampil_gol').value = data[nm_pegawai].golongan;  
    document.getElementById('tampil_pangkat').value = data[nm_pegawai].pangkat;
  };  
</script> 

</body>
</html>