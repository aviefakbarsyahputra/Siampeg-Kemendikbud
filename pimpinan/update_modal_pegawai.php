<?php

include "../config/koneksi.php";

$id	= $_GET["id"];
 $sql = mysqli_query($koneksi, "SELECT akun.username,akun.password,akun.nama,akun.no_hp, tbl_pegawai.* FROM akun INNER JOIN tbl_pegawai ON akun.nama = tbl_pegawai.nama WHERE tbl_pegawai.nama = '$id' ");
if($sql == false){
	die ("Terjadi Kesalahan : ". mysqli_error($koneksi));
}
while($row = mysqli_fetch_array($sql)){

?>

<!-- Modal Popup -->
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Update Data Pimpinan</h4>
      </div>
      <div class="modal-body">
        <form id="modal-save" action="proses_pegawai.php?page=edit" name="modal_popup" enctype="multipart/form-data" method="post" role="form">

          <div class="form-group">
              <label for="lvl">Level</label>
              <input name="lvl" type="text" class="form-control" value="pimpinan" readonly>
            </div>

          <div class="form-group">
              <label for="kdpegawai">Kode Pegawai</label>
              <input name="kdpegawai" type="text" class="form-control" id="kdpegawai" value="<?php echo $row['kd_pegawai']; ?>" readonly>
          </div>

          <div class="form-group">
              <label for="user">NIP</label>
              <input name="user" type="text" class="form-control" value="<?php echo $row['username']?>" readonly>
            </div>

            <div class="form-group">
              <label for="pass">Password</label>
              <input name="pass" type="password" class="form-control" value="<?php echo $row['password']?>" readonly>
            </div>

            <div class="form-group">
              <label for="nama">Nama Pimpinan</label>
              <input name="nama" type="text" class="form-control" value="<?php echo $row['nama']?>" readonly>
            </div>

            <div class="form-group">
              <label for="no_hp">No HP</label>
              <input name="no_hp" type="text" class="form-control" id="no_hp" value="<?php echo $row['no_hp']?>">
            </div>

            <div class="form-group">
              <label for="alamat">Alamat</label>
              <input name="alamat" type="text" class="form-control" id="alamat" value="<?php echo $row['alamat']?>">
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input name="email" type="email" class="form-control" id="email" value="<?php echo $row['email']?>">
            </div>

            <div class="form-group">
              <label>Jenis Kelamin</label>
              <select class="form-control" name="jk">
                <option <?php if($row['jenis_kelamin']=="Laki-Laki"){
                			echo "selected";
                		};?> 
                		value="Laki-Laki">Laki-Laki
                </option>
                <option <?php if($row['jenis_kelamin']=="Perempuan"){
                			echo "selected";
                		};?> 
                		value="Perempuan">Perempuan
                </option>
              </select>
            </div>

            <div class="form-group">
              <label>Status Menikah</label>
              <select class="form-control" name="menikah">
                <option <?php if($row['status_menikah']=="Sudah Menikah"){
                			echo "selected";
                		};?> 
                		value="Sudah Menikah">Sudah Menikah
                </option>
                <option <?php if($row['status_menikah']=="Belum Menikah"){
                			echo "selected";
                		};?> 
                		value="Belum Menikah">Belum Menikah
                </option>
              </select>
            </div>

            <div class="form-group">
              <label>Agama</label>
              <select class="form-control" name="agama">
                <option <?php if($row['agama']=="Islam"){
                			echo "selected";
                		};?> 
                		value="Islam">Islam
                </option>
                <option <?php if($row['agama']=="Hindu"){
                      echo "selected";
                    };?> 
                    value="Hindu">Hindu
                </option>
                <option <?php if($row['agama']=="Kristen"){
                      echo "selected";
                    };?> 
                    value="Kristen">Kristen
                </option>
                <option <?php if($row['agama']=="Budha"){
                      echo "selected";
                    };?> 
                    value="Budha">Budha
                </option>
              </select>
            </div>

            <div class="form-group">
              <label>Jabatan</label>
              <select class="form-control" name="jabatan" required>
                <?php
                $sql = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai");
                
                while ($row = mysqli_fetch_array($sql)){
                ?>
                  <option value="<?php echo $row['nama_jabatan'];?>"> 
                    <?php echo $row['nama_jabatan'];?>
                  </option>
                <?php 
                  } 
                ?>


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
              <label>Foto</label>
              <input type="file" name="foto">
            </div>
              
          <div class="modal-footer">
            <button class="btn btn-success" type="submit">Update</button>
            <button type="reset" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Batal</button>
          </div>
        </form>

      </div>
    </div>
  </div>

<?php
	}
?>