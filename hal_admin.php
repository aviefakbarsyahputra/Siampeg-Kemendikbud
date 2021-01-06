<!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu" data-widget="tree">
      <li class="active">
        <a href="home.php">
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
            <li><a href="admin/pimpinan.php"><i class="fa fa-file-text"></i> Data Pimpinan</a></li>
            <li><a href="admin/pegawai.php"><i class="fa fa-file-text"></i> Data Pegawai</a></li>
            <li><a href="admin/jabatan.php"><i class="fa fa-file-text"></i> Data Jabatan</a></li> 
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
            <li><a href="session/session.php?id=datakinerja_admin"><i class="fa fa-file-text"></i> Data Kinerja</a></li>
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
            <li><a href="admin/naik_jabatan.php"><i class="fa fa-file-text"></i> Jabatan Pimpinan</a></li>
            <li><a href="admin/naik_jabatan_pegawai.php"><i class="fa fa-file-text"></i> Jabatan Pegawai</a></li>
          </ul>
        </li>

    </ul>