<?php 
if (isset($_POST['simpan'])) {  
     $queryInsert  = mysqli_query($mysqli,"INSERT INTO operasional SET 
          op_id = '',
          op_name = '".$_POST['op_name']."',
          op_desc = '".$_POST['op_desc']."',
          op_price = '".$_POST['op_price']."',
          op_user_id = '".$_POST['op_user_id']."',
          op_create_date = '".date('Y-m-d')."'");            

 }
 if ($queryInsert) {
   echo "<script> alert('Data Berhasil Disimpan'); location.href='index.php?hal=master/operasional/list' </script>";exit;
 }

$sql_petugas = mysqli_query($mysqli,"SELECT * FROM users WHERE user_id='".$_SESSION['user_id']."'");

$data_petugas = mysqli_fetch_array($sql_petugas);

?>
<!--body wrapper start-->
<div class="wrapper">
  <div class="row">
    <div class="col-lg-12">
      <section class="panel">
        <header class="panel-heading">
          Tambah Biaya Operasional
        </header>
        <div class="panel-body">
          <div class=" form">
            <form class="cmxform form-horizontal adminex-form"  method="POST" enctype="multipart/form-data"  action="">


              <div class="form-group ">
                <label for="cname" class="control-label col-lg-2"  style="text-align: left;">Petugas</label>
                <div class="col-lg-5">
                  <input type="hidden" name="op_user_id" value="<?php echo $data_petugas[user_id]; ?>">
                  <input class=" form-control" id="cname" name="op_petugas" type="text" value="<?php echo $data_petugas[user_name];?>" disabled=""/>
                </div>
              </div>

              <div class="form-group ">
                <label for="cname" class="control-label col-lg-2"  style="text-align: left;">Nama Operasional</label>
                <div class="col-lg-5">
                  <input class=" form-control" id="cname" name="op_name" type="text" required/>
                </div>
              </div>

              <div class="form-group ">
                <label for="cname" class="control-label col-lg-2"  style="text-align: left;">Deskripsi</label>
                <div class="col-lg-5">
                <textarea name="op_desc" class=" form-control" required></textarea>
                </div>
              </div>

              <div class="form-group ">
                <label for="cname" class="control-label col-lg-2"  style="text-align: left;">Jumlah Pengeluaran / Nominal</label>
                <div class="col-lg-5">
                  <input class=" form-control" id="cname" name="op_price" type="number" required />
                </div>
              </div>

    <!--       <div class="form-group ">
                <label for="cname" class="control-label col-lg-2"  style="text-align: left;">Tanggal</label>
                <div class="col-lg-5">
                  <input class="form-control form-control-inline input-medium default-date-picker" id="cname" name="op_create_date" type="text" required />
                </div>
              </div>
 -->
              <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                  <button class="btn btn-primary" type="submit" name="simpan">Save</button>
                  <a href="?hal=master/operasional/list">
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
