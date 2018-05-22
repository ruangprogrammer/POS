<?php 

$id = $_GET['id'];
$queryProduct = mysqli_query($mysqli,"SELECT * FROM product where product_id = '".$id."'");
$rowProduct = mysqli_fetch_array($queryProduct);

if (isset($_POST['update'])) {  
  $queryInsert  = mysqli_query($mysqli,"UPDATE product SET 
    product_kode ='".$_POST['product_kode']."',
    product_name = '".$_POST['product_name']."',
    category_id = '".$_POST['jenis_layanan']."',
    product_harga ='".$_POST['product_harga']."'
    WHERE product_id='".$_POST['product_id']."'");         
}
if ($queryInsert) {
 echo "<script> alert('Data Berhasil Disimpan'); location.href='index.php?hal=master/product/list' </script>";exit;
}


?>
<div class="wrapper">
  <div class="row">
    <div class="col-lg-12">
      <section class="panel">
        <header class="panel-heading">
         Edit Produk Layanan
       </header>
       <div class="panel-body">
        <div class=" form">
          <form class="cmxform form-horizontal adminex-form"  method="POST" enctype="multipart/form-data"  action="">
            <input type="hidden" name="product_id" value="<?php echo $rowProduct['product_id']; ?>">
            <div class="form-group ">
              <label for="cname" class="control-label col-lg-2"  style="text-align: left;">Kode</label>
              <div class="col-lg-5">
                <input class=" form-control" id="cname" name="product_kode" type="text" value="<?php echo $rowProduct['product_kode']; ?>" readonly="readonly"/>
              </div>
            </div>

            <div class="form-group ">
              <label for="cname" class="control-label col-lg-2"  style="text-align: left;">Nama</label>
              <div class="col-lg-5">
                <input class=" form-control" id="cname" name="product_name" type="text" value="<?php echo $rowProduct['product_name']; ?>" required />
              </div>
            </div>
            <div class="form-group ">
              <label for="cname" class="control-label col-lg-2"  style="text-align: left;">Jenis</label>
              <div class="col-lg-5">
                <select name="jenis_layanan" class="form-control " >
                  <option value="">--pilih kategori--</option>
                  <?php 
                  $no = 0;
                  $queryCategory = mysqli_query($mysqli,"SELECT * FROM category ORDER BY category_id DESC");
                  while ($rowCategory  = mysqli_fetch_array($queryCategory)) {
                    if($rowProduct['category_id'] == $rowCategory['category_id']){
                      ?>
                      <option value="<?php echo $rowCategory['category_id']; ?>" selected><?php echo $rowCategory['category_name'] ?></option>
                      <?php

                    }else{
                      ?>
                      <option value="<?php echo $rowCategory['category_id']; ?>"><?php echo $rowCategory['category_name'] ?></option>
                      <?php }
                    } ?>
                  </select>
                </div>
              </div>

              <div class="form-group ">
                <label for="cname" class="control-label col-lg-2"  style="text-align: left;">Harga per jam</label>
                <div class="col-lg-5">
                  <input class=" form-control" id="cname" name="product_harga" type="text" value="<?php echo $rowProduct['product_harga']; ?>" required />
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                  <button class="btn btn-primary" type="submit" name="update">Update</button>
                  <a href="?hal=master/product/list">
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

