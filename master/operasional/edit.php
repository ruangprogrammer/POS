<?php 

$id = $_GET['id'];
$queryOperasional = mysqli_query($mysqli,"SELECT * FROM operasional where op_id = '".$id."'");
$rowOperasional = mysqli_fetch_array($queryOperasional);

if (isset($_POST['update'])) {  
  $queryInsert  = mysqli_query($mysqli,"UPDATE operasional SET 
    op_name = '".$_POST['op_name']."',
    op_desc = '".$_POST['op_desc']."',
    op_price = '".$_POST['op_price']."'
    WHERE op_id='".$_POST['op_id']."'");         
}
if ($queryInsert) {
 echo "<script> alert('Data Berhasil diubah'); location.href='index.php?hal=master/operasional/list' </script>";exit;
}

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
              <input type="hidden" name="op_id" value="<?php echo $rowOperasional['op_id']; ?>">
              <div class="form-group ">
                <label for="cname" class="control-label col-lg-2"  style="text-align: left;">Nama Operasional</label>
                <div class="col-lg-5">
                  <input class=" form-control" id="cname" name="op_name" type="text" value="<?php echo $rowOperasional['op_name']; ?>" required/>
                </div>
              </div>

              <div class="form-group ">
                <label for="cname" class="control-label col-lg-2"  style="text-align: left;">Deskripsi</label>
                <div class="col-lg-5">
                  <textarea name="op_desc" class=" form-control" required><?php echo $rowOperasional['op_desc']; ?></textarea>
                </div>
              </div>

              <div class="form-group ">
                <label for="cname" class="control-label col-lg-2"  style="text-align: left;">Jumlah Pengeluaran / Nominal</label>
                <div class="col-lg-5">
                  <input class=" form-control" id="cname" name="op_price" type="number" value="<?php echo $rowOperasional['op_price']; ?>" required/>
                </div>
              </div>

              <div class="form-group ">
                <label for="cname" class="control-label col-lg-2"  style="text-align: left;">Tanggal</label>
                <div class="col-lg-5">
                  <input class="form-control" id="cname" name="op_create_date" type="text" value="<?php echo $rowOperasional['op_create_date'] ?>" disabled=""/>
                </div>
              </div>

              <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                  <button class="btn btn-primary" type="submit" name="update">Save</button>
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
