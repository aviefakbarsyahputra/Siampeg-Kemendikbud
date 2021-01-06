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
  <title> Dashboard | SDM KEMDIKBUD</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="bower_components/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
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
              <img src="img/<?php echo $_SESSION ['foto'] ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['nama'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="img/<?php echo $_SESSION ['foto'] ?>" class="img-circle" alt="admin">
                <p>
                  <?php echo $_SESSION['nama'] ?>
                  <small>Biro SDM KEMDIKBUD</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div class="pull-left">
                  <a href="session/session.php?id=gantipassword" class="btn btn-info btn-flat"><i class=""></i> Ganti Password</a>
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
          <img src="img/<?php echo $_SESSION ['foto'] ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <span>Selamat Datang,</span>
          <h5><?php echo $_SESSION['nama']?></h5>
        </div>
      </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php
        if($_SESSION['level']=='admin'){
          include 'hal_admin.php';
        }elseif($_SESSION['level']=='pimpinan'){
          include 'hal_pimpinan.php';
        }elseif($_SESSION['level']=='pegawai'){
          include 'hal_pegawai.php';
        }else{
          echo "Error";
        }
      ?>
    <!-- < /.sidebar menu -->
    </section>
  </div>
  <!-- /.sidebar -->

<?php if($_SESSION['level']=='admin'){ ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
          <?php
          include "config/koneksi.php";
          // Pimpinan
          $sql = mysqli_query($koneksi,"SELECT * FROM tbl_pimpinan");
          $countP = mysqli_num_rows($sql);
          //pegawai
          $sql = mysqli_query($koneksi,"SELECT * FROM tbl_pegawai");
          $countPeg = mysqli_num_rows($sql);
          ?>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?= $countP ?></h3>

              <p>Total Pimpinan</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="admin/pimpinan.php" class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $countPeg;?></h3>

              <p>Total Pegawai</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="admin/pegawai.php" class="small-box-footer">Lihat Detail  <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

  </div>
<?php } ?>

<?php if($_SESSION['level']=='pimpinan'){
        include 'config/koneksi.php';
        $user = $_SESSION['nama'];
        $sql = mysqli_query($koneksi, "SELECT * FROM tbl_pimpinan WHERE nama='$user' ");
        $ambil = mysqli_fetch_array($sql);
        $nip = $ambil['nip'];
        $nama = $ambil['nama'];
        $alamat = $ambil['alamat'];
        $foto = $ambil['foto'];
        $email = $ambil['email'];
        $kelamin = $ambil['jenis_kelamin'];
        $status = $ambil['status_menikah'];
        $agama = $ambil['agama'];
        $jabatan = $ambil['jabatan'];
        $jabatan = $ambil['jabatan'];
        $golongan = $ambil['golongan'];
        $pangkat = $ambil['pangkat'];
        $pend = $ambil['pendidikan'];
     ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profile
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-3 ">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="img img-responsive" src='img/<?php echo $foto ?>' width='90%'>

              <h3 class="profile-username text-center"><?php echo $nama ?></h3>

              <p class="text-muted text-center"><?php echo $nip ?></p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>  

        <div class="col-xs-9">
          <div class="box box-primary">
            <div class="box-body">
              <strong class="spacing">Nama Lengkap :</strong>
              <p class="text-muted">
                <?php echo $nama ?>
              </p><hr>
              <strong class="spacing">Jabatan :</strong>
              <p class="text-muted">
                <?php echo $jabatan ?>
              </p><hr>
              <strong class="spacing">Golongan :</strong>
              <p class="text-muted">
                <?php echo $golongan ?>
              </p><hr>
               <strong class="spacing">Pangkat :</strong>
              <p class="text-muted">
                <?php echo $pangkat ?>
              </p><hr>
              <strong class="spacing">Alamat :</strong>
              <p class="text-muted">
                <?php echo $alamat ?>
              </p><hr>
              <strong class="spacing">Email :</strong>
              <p class="text-muted">
                <?php echo $email ?>
              </p><hr>
              <strong class="spacing">Jenis Kelamin :</strong>
              <p class="text-muted">
                <?php echo $kelamin ?>
              </p><hr>
              <strong class="spacing">Status Menikah :</strong>
              <p class="text-muted">
                <?php echo $status ?>
              </p><hr>
              <strong class="spacing">Agama :</strong>
              <p class="text-muted">
                <?php echo $agama ?>
              </p><hr>
              <strong class="spacing">Pendidikan :</strong>
              <p class="text-muted">
                <?php echo $pend ?>
              </p>

              <div class="box-footer" align="center">
                <!-- Modal Edit -->
                <div id="ModalEditPimpin" class="modal fade modal-primary" tabindex="-1" role="dialog">
                </div>
                <a href="#" align='center' class='open_modalpimpin btn btn-warning fa fa-pencil' id='<?php echo $nama; ?>'> Ubah</a>
              </div>

            </div>
          </div>
        </div>  

  
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php 
    }
  ?>

<?php if($_SESSION['level']=='pegawai'){
        include 'config/koneksi.php';
        $user = $_SESSION['nama'];
        $sql = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE nama='$user' ");
        $ambil = mysqli_fetch_array($sql);
        $nip = $ambil['nip'];
        $nama = $ambil['nama'];
        $alamat = $ambil['alamat'];
        $foto = $ambil['foto'];
        $email = $ambil['email'];
        $kelamin = $ambil['jenis_kelamin'];
        $status = $ambil['status_menikah'];
        $agama = $ambil['agama'];
        $jabatan = $ambil['jabatan'];
        $golongan = $ambil['golongan'];
        $pangkat = $ambil['pangkat'];
        $pend = $ambil['pendidikan'];

        $sql = mysqli_query($koneksi, "SELECT * FROM tbl_kinerja WHERE nama='$user' ");
        $ambil = mysqli_fetch_array($sql);
        $nilai = $ambil['nilai'];
     ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profile
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-3 ">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="img img-responsive" src='img/<?php echo $foto ?>' width='90%'>

              <h3 class="profile-username text-center"><?php echo $nama ?></h3>

              <p class="text-muted text-center"><?php echo $nip ?></p>
            </div>
            <!-- /.box-body -->
          </div>

<!-- kinerja -->
          <div class="box box-primary">
             <h3 align="center">Nilai Kinerja</h3>
                <div class="box-body" align="center">
                   <input type="text" class="knob" value="<?= $nilai ?>" data-width="90" data-height="90" data-fgColor="#f56954" readonly>
                </div>
          </div>

        </div>  

        <div class="col-xs-9">
          <div class="box box-primary">
            <div class="box-body">
              <strong class="spacing">Nama Lengkap :</strong>
              <p class="text-muted">
                <?php echo $nama ?>
              </p><hr>
              <strong class="spacing">Jabatan :</strong>
              <p class="text-muted">
                <?php echo $jabatan ?>
              </p><hr>
               <strong class="spacing">Golongan :</strong>
              <p class="text-muted">
                <?php echo $golongan ?>
              </p><hr>
               <strong class="spacing">Pangkat :</strong>
              <p class="text-muted">
                <?php echo $pangkat ?>
              </p><hr>
              <strong class="spacing">Alamat :</strong>
              <p class="text-muted">
                <?php echo $alamat ?>
              </p><hr>
              <strong class="spacing">Email :</strong>
              <p class="text-muted">
                <?php echo $email ?>
              </p><hr>
              <strong class="spacing">Jenis Kelamin :</strong>
              <p class="text-muted">
                <?php echo $kelamin ?>
              </p><hr>
              <strong class="spacing">Status Menikah :</strong>
              <p class="text-muted">
                <?php echo $status ?>
              </p><hr>
              <strong class="spacing">Agama :</strong>
              <p class="text-muted">
                <?php echo $agama ?>
              </p><hr>
              <strong class="spacing">Pendidikan :</strong>
              <p class="text-muted">
                <?php echo $pend ?>
              </p>

              <div class="box-footer" align="center">
                <!-- Modal Edit -->
                <div id="ModalEdit" class="modal fade modal-primary" tabindex="-1" role="dialog">
                </div>
                <a href="#" align='center' class='open_modal btn btn-warning fa fa-pencil' id='<?php echo $nama; ?>'> Ubah</a>
              </div>

            </div>
          </div>
        </div>  

  
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php 
    }
  ?>

  <footer class="main-footer">
    <strong>Copyright &copy; 2017 <a href="">Avif Akbarsyah</a>.</strong> All rights
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
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- jQuery Knob -->
<script src="bower_components/jquery-knob/js/jquery.knob.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>

<script type="text/javascript"> 
    $(".open_modal").click(function(e) {
      var m = $(this).attr("id");
        $.ajax({
          url: "pegawai/update_profil_pegawai.php",
          type: "GET",
          data : {id: m,},
          success: function (ajaxData){
          $("#ModalEdit").html(ajaxData);
          $("#ModalEdit").modal('show',{backdrop: 'true'});
          }
        });
      });
  </script>

  <script type="text/javascript"> 
    $(".open_modalpimpin").click(function(e) {
      var m = $(this).attr("id");
        $.ajax({
          url: "pimpinan/update_profil.php",
          type: "GET",
          data : {id: m,},
          success: function (ajaxData){
          $("#ModalEditPimpin").html(ajaxData);
          $("#ModalEditPimpin").modal('show',{backdrop: 'true'});
          }
        });
      });
  </script>

<script>
  $(function () {
    /* jQueryKnob */

    $(".knob").knob({
      /*change : function (value) {
       //console.log("change : " + value);
       },
       release : function (value) {
       console.log("release : " + value);
       },
       cancel : function () {
       console.log("cancel : " + this.value);
       },*/
      draw: function () {

        // "tron" case
        if (this.$.data('skin') == 'tron') {

          var a = this.angle(this.cv)  // Angle
              , sa = this.startAngle          // Previous start angle
              , sat = this.startAngle         // Start angle
              , ea                            // Previous end angle
              , eat = sat + a                 // End angle
              , r = true;

          this.g.lineWidth = this.lineWidth;

          this.o.cursor
          && (sat = eat - 0.3)
          && (eat = eat + 0.3);

          if (this.o.displayPrevious) {
            ea = this.startAngle + this.angle(this.value);
            this.o.cursor
            && (sa = ea - 0.3)
            && (ea = ea + 0.3);
            this.g.beginPath();
            this.g.strokeStyle = this.previousColor;
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
            this.g.stroke();
          }

          this.g.beginPath();
          this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
          this.g.stroke();

          this.g.lineWidth = 2;
          this.g.beginPath();
          this.g.strokeStyle = this.o.fgColor;
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
          this.g.stroke();

          return false;
        }
      }
    });
    /* END JQUERY KNOB */
  });
</script>