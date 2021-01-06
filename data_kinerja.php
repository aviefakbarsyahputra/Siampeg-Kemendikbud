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
  <title> Data Kinerja | Biro Sumber Daya Manusia Kemdikbud</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="bower_components/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
   <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <div class="main-header">
    <!-- Logo -->
    <a href="home.php" class="logo">
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
              <img src="img/<?php echo $_SESSION ['foto'] ?>" class="user-image" alt="admin">
              <span class="hidden-xs"><?php echo $_SESSION['nama'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="img/<?php echo $_SESSION ['foto'] ?>" class="img-circle" alt="admin">
                <p>
                  <?php echo $_SESSION['nama'] ?>
                  <small>Biro SDM Kemdikbud</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="../session/session.php?id=gantipassword" class="btn btn-info btn-flat"><i class=""></i> Ganti Password</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-danger btn-flat"><i class="fa fa-sign-out"></i> Logout</a>
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
          <img src="img/<?php echo $_SESSION ['foto'] ?>" class="img-circle" alt="admin">
        </div>
        <div class="pull-left info">
          <span>Selamat Datang,</span>
          <h5><?php echo $_SESSION['nama']?></h5>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <!-- <li class="header">MAIN NAVIGATION</li> -->
        <li class="">
          <a href="home.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <?php if($_SESSION['level'] == 'admin'){ ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i> <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="admin/pimpinan.php"><i class="fa fa-file-text"></i> Data Pimpinan</a></li>
            <li><a href="pimpinan/pegawai.php"><i class="fa fa-file-text"></i> Data Pegawai</a></li>
            <li><a href="admin/jabatan.php"><i class="fa fa-file-text"></i> Data Jabatan</a></li>
          </ul>
        </li>
        <?php } ?>

        <?php if($_SESSION['level'] == 'pimpinan'){ ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i> <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pimpinan/pegawai.php"><i class="fa fa-file-text"></i> Data Pegawai</a></li>
          </ul>
        </li>
        <?php } ?>

        <li class="treeview active">
          <a href="#">
            <i class="fa fa-database"></i> <span> Penilaian</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="data_kinerja.php"><i class="fa fa-file-text"></i> Data Kinerja</a></li>
          </ul>
        </li>

        <?php if($_SESSION['level'] == 'pimpinan'){ ?>
        <li>
          <a href="session/session.php?id=persetujuan_cuti">
            <i class="fa fa-list-alt"></i> <span>Persetujuan Cuti</span>
          </a>
        </li>
        <?php } ?>
        
      </ul>
    </section>
  </div>
  <!-- /.sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Penilaian Kinerja
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li> Data Kinerja</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-6 col-md-offset-3">
          <div class="box box-primary">

            <div class="box-header with-border" align="center">
              <h4>Form Penilaian Kinerja</h4>
            </div>
              
            <div class="box-body no-padding">
              <form role="form" method="post" action="proses_nilai.php" name="formnilai">
                <div class="box-header">
                  <label>NIP</label>

                  <select class="form-control" name="namapegawai" onChange="disable()" required>
                    <option value="">---Pilih---</option>
                    <?php
                    include 'config/koneksi.php';
                    $sql = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai");
                    while ($row = mysqli_fetch_array($sql)){
                    ?>
                      <option value="<?php echo $row['nama'];?>"> 
                        <?php echo $row['nama'];?>  ||  <?php echo $row['jabatan']; ?>
                      </option>
                    <?php 
                      } 
                    ?>
                  </select>
                  <select class="form-control" name="bulan" id="" required>
                  <option value="">---Pilih Bulan---</option>
                  <?php
                    include 'config/koneksi.php';
                    $sql = mysqli_query($koneksi, "SELECT * FROM bulan");
                    while ($row = mysqli_fetch_array($sql)){
                    ?>
                      <option value="<?php echo $row['id'];?>"> 
                        <?php echo $row['bulan'];?>
                      </option>
                    <?php 
                      } 
                  ?>
                  </select>
                </div>

                 <table class="table table-striped table-bordered">
                <tr>
                  <th style="width: 5px">No</th>
                  <th>Aspek Soft Skill</th>
                  <th style="width: 60px">Nilai</th>
                </tr>
                <tr>
                  <td style="width: 5px" align="center">1</td>
                  <td>Bertanggung Jawab Pada Pekerjaan</td>
                  <td style="width: 60px"><input type="number" name="n1" min="1" max="10" required disabled></td>
                </tr>
                <tr>
                  <td style="width: 5px" align="center">2</td>
                  <td>Terbuka terhadap kritik/masukan yang konstruktif</td>
                  <td style="width: 60px"><input type="number" name="n2" min="1" max="10" required disabled></td>
                </tr>
                <tr>
                  <td style="width: 5px" align="center">3</td>
                  <td>Mengenali kelemahan diri dan berusaha mencari solusi atas kelemahannya</td>
                  <td style="width: 60px"><input type="number" name="n3" min="1" max="10" required disabled></td>
                </tr>
                <tr>
                  <td style="width: 5px" align="center">4</td>
                  <td>Memiliki kepedulian dan bisa bekerja sama terhadap lingkungan kerja, atasan maupun rekan sekerja.</td>
                  <td style="width: 60px"><input type="number" name="n4" min="1" max="10" required disabled></td>
                </tr>
                <tr>
                  <td style="width: 5px" align="center">5</td>
                  <td>Memberikan ide, saran, dan solusi yang kreatif/konstruktif</td>
                  <td style="width: 60px"><input type="number" name="n5" min="1" max="10" required disabled></td>
                </tr>
                <tr>
                  <td style="width: 5px" align="center">6</td>
                  <td>Memiliki kemauan belajar yang kuat</td>
                  <td style="width: 60px"><input type="number" name="n6" min="1" max="10" required disabled></td>
                </tr>
                <tr>
                  <td style="width: 5px" align="center">7</td>
                  <td>Memiliki kemampuan adaptasi yang baik</td>
                  <td style="width: 60px"><input type="number" name="n7" min="1" max="10" required disabled></td>
                </tr>
                <tr>
                  <td style="width: 5px" align="center">8</td>
                  <td>Memiliki daya tahan terhadap stress (tekanan) kerja</td>
                  <td style="width: 60px"><input type="number" name="n8" min="1" max="10" required disabled></td>
                </tr>
                <tr>
                  <td style="width: 5px" align="center">9</td>
                  <td>Disiplin Kerja</td>
                  <td style="width: 60px"><input type="number" name="n9" min="1" max="10" required disabled></td>
                </tr>
                <tr>
                  <td style="width: 5px" align="center">10</td>
                  <td>Pengerjaan Tugas Tepat Waktu</td>
                  <td style="width: 60px"><input type="number" name="n10" min="1" max="10" required disabled></td>
                </tr>
              </table>
                <div class="box-footer">
                  <button type="submit" class="btn btn-success pull-right">Masukkan Nilai</button>
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
    <strong>Copyright &copy; 2017 <a href="">Kemdikbud</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/js/bootstrap.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
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

    //aktifin disable
    function disable(){
      if(document.formnilai.namapegawai.value != "")
        document.formnilai.n1.disabled=false;
        document.formnilai.n2.disabled=false;
        document.formnilai.n3.disabled=false;
        document.formnilai.n4.disabled=false;
        document.formnilai.n5.disabled=false;
        document.formnilai.n6.disabled=false;
        document.formnilai.n7.disabled=false;
        document.formnilai.n8.disabled=false;
        document.formnilai.n9.disabled=false;
        document.formnilai.n10.disabled=false;
      elseif
        document.formnilai.n1.disabled=true;
        document.formnilai.n2.disabled=true;
        document.formnilai.n3.disabled=true;
        document.formnilai.n4.disabled=true;
        document.formnilai.n5.disabled=true;
        document.formnilai.n6.disabled=true;
        document.formnilai.n7.disabled=true;
        document.formnilai.n8.disabled=true;
        document.formnilai.n9.disabled=true;
        document.formnilai.n10.disabled=true;  
    }
  </script>

</body>
</html>