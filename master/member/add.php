<?php 
if (isset($_POST['simpan'])) {  
     $queryInsert  = mysqli_query($mysqli,"INSERT INTO member SET 
          member_id = '',
          member_kode = '".$_POST['member_kode']."',
          member_name = '".$_POST['member_name']."',
          member_kota = '".$_POST['member_kota']."',
          member_kabupaten ='".$_POST['member_kabupaten']."',
          member_alamat ='".$_POST['member_alamat']."',
          member_hp ='".$_POST['member_hp']."',
          member_pekerjaan ='".$_POST['member_pekerjaan']."',
          member_tgl_masuk = '".date('Y-m-d')."'");            

 }
 if ($queryInsert) {
   echo "<script> alert('Data Berhasil Disimpan'); location.href='index.php?hal=master/member/list' </script>";exit;
 }


?>
<!--body wrapper start-->
<div class="wrapper">
  <div class="row">
    <div class="col-lg-12">
      <section class="panel">
        <header class="panel-heading">
          Tambah Member
        </header>
        <div class="panel-body">
          <div class=" form">
            <form class="cmxform form-horizontal adminex-form"  method="POST" enctype="multipart/form-data"  action="">
              <?php
              $query = "SELECT max(member_kode) as maxKode FROM member";
              $hasil = mysqli_query($mysqli,$query);
              $data = mysqli_fetch_array($hasil);
              $kodeMember = $data['maxKode'];
              $noUrut = (int) substr($kodeMember, 3, 3);
              $noUrut++;
              $char = "KMR";
              $kodeMember = $char . sprintf("%03s", $noUrut);
              ?>
              <div class="form-group ">
                <label for="cname" class="control-label col-lg-2"  style="text-align: left;">Kode Member</label>
                <div class="col-lg-5">
                  <input class=" form-control" id="cname" name="member_kode" minlength="2" type="text" value="<?php echo $kodeMember; ?>" readonly="readonly"/>
                </div>
              </div>


              <div class="form-group ">
                <label for="cname" class="control-label col-lg-2"  style="text-align: left;">Nama</label>
                <div class="col-lg-5">
                  <input class=" form-control" id="cname" name="member_name" minlength="2" type="text" required />
                </div>
              </div>

              <div class="form-group ">
                <label for="cname" class="control-label col-lg-2"  style="text-align: left;">Alamat</label>
                <div class="col-lg-5">
                <textarea name="member_alamat" class=" form-control"></textarea>
                </div>
              </div>

              <div class="form-group ">
                <label for="cname" class="control-label col-lg-2"  style="text-align: left;">Nomor HP</label>
                <div class="col-lg-5">
                  <input class=" form-control" id="cname" name="member_hp" type="text" required />
                </div>
              </div>
              <div class="form-group ">
                <label for="cname" class="control-label col-lg-2"  style="text-align: left;">Kota</label>
                <div class="col-lg-5">
                  <input class=" form-control" id="cname" name="member_kota" type="text" required />
                </div>
              </div>
              <div class="form-group ">
                <label for="cname" class="control-label col-lg-2"  style="text-align: left;">Kabupaten</label>
                <div class="col-lg-5">
                  <input class=" form-control" id="cname" name="member_kabupaten" type="text" required />
                </div>
              </div>
                  <div class="form-group ">
                <label for="cname" class="control-label col-lg-2"  style="text-align: left;">Pekerjaan</label>
                <div class="col-lg-5">
                  <input class=" form-control" id="cname" name="member_pekerjaan" type="text" required />
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                  <button class="btn btn-primary" type="submit" name="simpan">Save</button>
                  <a href="?hal=master/member/list">
                    <button class="btn btn-default" type="button">Cancel</button>
                  </a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>
<!--body wrapper end-->
