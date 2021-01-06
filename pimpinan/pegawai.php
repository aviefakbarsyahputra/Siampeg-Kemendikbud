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
  <title> Pegawai | Biro SDM KEMDIKBUD</title>
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
        <li>
          <a href="../home.php">
            <i class="fa fa-dashboard"></i> <span>Profile</span>
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
            <li class="active"><a href="pegawai.php"><i class="fa fa-file-text"></i> Data Pegawai</a></li>
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

        <li>
          <a href="../session/session.php?id=persetujuan_cuti">
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
        Data Semua Pegawai
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Data Pegawai</li>
      </ol>
    </section>

<!-- Modal Popup -->
<div id="ModalAdd" class="modal fade modal-primary" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Tambah Pegawai</h4>
      </div>
      <div class="modal-body">
        <form id="modal-save" action="proses_pegawai.php?page=tambah" name="modal_popup" enctype="multipart/form-data" method="post" role="form">

            <div class="form-group">
              <label for="lvl">Level</label>
              <input name="lvl" type="text" class="form-control" value="pegawai" readonly>
            </div>

            <div class="form-group">
              <label for="user">NIP</label>
              <input name="user" type="text" class="form-control" id="user" placeholder="Masukkan NIP" required>
            </div>

            <div class="form-group">
              <label for="pass">Password</label>
              <input name="pass" type="password" class="form-control" id="pass" placeholder="Masukkan Password" required>
            </div>

            <div class="form-group">
              <label for="namapegawai">Nama Pegawai</label>
              <input name="namapegawai" type="text" class="form-control" id="namapegawai" placeholder="masukkan Nama" required>
            </div>

            <div class="form-group">
              <label for="no_hp">No HP</label>
              <input name="no_hp" type="number" class="form-control" id="no_hp" placeholder="masukkan Nomer HP" required>
            </div>

            <div class="form-group">
              <label for="alamat">Alamat</label>
                <textarea name="alamat" class="form-control" rows="4" id="alamat" placeholder="Masukkan Alamat" required></textarea>
            </div> 

            <div class="form-group">
              <label for="email">Email</label>
              <input name="email" type="email" class="form-control" id="email" placeholder="masukkan Email" required>
            </div>

            <div class="form-group">
                <label>Tanggal Masuk</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input name="tglmasuk" type="text" class="form-control pull-right" id="datepicker">
                </div>
              </div>

            <div class="form-group">
              <label>Jenis Kelamin</label>
              <select class="form-control" name="jk" required>
                <option value="">---Pilih---</option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>

            <div class="form-group">
              <label>Status Menikah</label>
              <select class="form-control" name="menikah" required>
                <option value="">---Pilih---</option>
                <option value="Sudah Menikah">Sudah Menikah</option>
                <option value="Belum Menikah">Belum Menikah</option>
              </select>
            </div>

            <div class="form-group">
              <label>Agama</label>
              <select class="form-control" name="agama" required>
                <option value="">---Pilih---</option>
                <option value="Islam">Islam</option>
                <option value="Hindu">Hindu</option>
                <option value="Kristen">Kristen</option>
                <option value="Budha">Budha</option>
              </select>
            </div>

            <div class="form-group">
              <label>Jabatan</label>
              <select class="form-control" name="jabatan" required>
                <option value="">---Pilih---</option>
                <?php
                include '../config/koneksi.php';
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
              <label>Foto</label>
              <input type="file" name="foto" required>
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

    <!-- Modal Edit -->
    <div id="ModalEdit" class="modal fade modal-primary" tabindex="-1" role="dialog"></div>

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
            <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalAdd"><i class="fa fa-plus"></i> Tambah Pegawai
            </button> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>NIP</th>
                  <th>Nama Pegawai</th>
                  <th>Alamat</th>
                  <th>Tanggal Masuk</th>
                  <th>Status Menikah</th>
                  <th>Agama</th>
                  <th>Jabatan</th>
                  <th>Golongan</th>
                  <th>Pangkat</th>
                  <th>Foto</th>
                  <!-- <th>Aksi</th> -->
                </tr>
                </thead>
                <tbody>
                  <?php
                    include '../config/koneksi.php';
      $sql = mysqli_query($koneksi, "SELECT akun.username,akun.nama,akun.no_hp, tbl_pegawai.* FROM akun INNER JOIN tbl_pegawai ON akun.username = tbl_pegawai.nip");
      
                    if($sql == false){
                      die("gagal" . mysqli_error($koneksi));
                    }
                    $no=1;
                    while ($row = mysqli_fetch_array ($sql)){
                    ?>
                        <tr>
                          <td align=center><?php echo $no; ?></td>
                          <td align=center><?php echo $row['username']; ?></td>
                          <td align=center><?php echo $row['nama']; ?></td>
                          <td align=center><?php echo $row['alamat']; ?></td>
                          <td align=center><?php echo $row['tanggal_masuk']; ?></td>
                          <td align=center><?php echo $row['status_menikah']; ?></td>
                          <td align=center><?php echo $row['agama'];?></td>
                          <td align=center><?php echo $row['jabatan']; ?></td>
                          <td align=center>
                            <?php if($row['golongan']=='1'){
                              echo "I";
                            }elseif($row['golongan']=='2'){
                              echo "II";
                            }elseif($row['golongan']=='3'){
                              echo "III";
                            }elseif($row['golongan']=='4'){
                              echo "IV";
                            }
                            ?>
                            </td>
                          <td align=center><?= $row['pangkat']; ?></td>
                          <td align=center width='15%'> 
                            <img src='../img/<?php echo $row['foto']; ?>' width='70%'>
                          </td>
                         <!--  <td align=center>
                       <a href='#' class='btn btn-danger fa fa-trash' onClick="confirm_delete('hapus_pegawai.php?id=<?php echo $row['nama']; ?>')">Hapus</a>
                          </td> -->
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

 <script type="text/javascript"> 
    // Dosen
    $(".open_modal").click(function(e) {
      var m = $(this).attr("id");
        $.ajax({
          url: "update_modal_pegawai.php",
          type: "GET",
          data : {id: m,},
          success: function (ajaxData){
          $("#ModalEdit").html(ajaxData);
          $("#ModalEdit").modal('show',{backdrop: 'true'});
          }
        });
      });
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