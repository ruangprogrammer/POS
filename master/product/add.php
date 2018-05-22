<?php 
if (isset($_POST['simpan'])) {  
 $queryInsert  = mysqli_query($mysqli,"INSERT INTO product SET 
  product_id ='',
  product_kode ='".$_POST['product_kode']."',
  product_name = '".$_POST['product_name']."',
  category_id = '".$_POST['jenis_layanan']."',
  product_harga ='".$_POST['product_harga']."'
  ");            

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
         Add Produk Layanan
       </header>
       <div class="panel-body">
        <div class=" form">
          <form class="cmxform form-horizontal adminex-form"  method="POST" enctype="multipart/form-data"  action="">

            <?php          
            $query = "SELECT max(product_kode) as maxKode FROM product";
            $hasil = mysqli_query($mysqli,$query);
            $data = mysqli_fetch_array($hasil);
            $kodeProduct = $data['maxKode'];
            $noUrut = (int) substr($kodeProduct, 3, 3);
            $noUrut++;
            $char = "KLN";
            $kodeProduct = $char . sprintf("%03s", $noUrut);
            ?>
            <div class="form-group ">
              <label for="cname" class="control-label col-lg-2"  style="text-align: left;">Kode Layanan</label>
              <div class="col-lg-5">
                <input class=" form-control" id="cname" name="product_kode" type="text" value="<?php echo $kodeProduct; ?>" readonly="readonly"/>
              </div>
            </div>

            <div class="form-group ">
              <label for="cname" class="control-label col-lg-2"  style="text-align: left;">Nama</label>
              <div class="col-lg-5">
                <input class=" form-control" id="cname" name="product_name" type="text" required />
              </div>
            </div>
            <div class="form-group ">
              <label for="cname" class="control-label col-lg-2"  style="text-align: left;">Jenis Layanan</label>
              <div class="col-lg-5">

                <select name="jenis_layanan" class="form-control" required>
                  <option value="">--Pilih Janis Layanan--</option>
                  <?php 
                  $no = 0;
                  $queryCategory = mysqli_query($mysqli,"SELECT * FROM category ORDER BY category_id DESC");
                  while ($rowCategory  = mysqli_fetch_array($queryCategory)) {
                    ?>
                    <option value="<?php echo $rowCategory['category_id']; ?>"><?php echo $rowCategory['category_name'] ?></option>
                    <?php } ?>
                  </select>


                </div>
              </div>

              <div class="form-group ">
                <label for="cname" class="control-label col-lg-2"  style="text-align: left;">Harga per jam</label>
                <div class="col-lg-5">
                  <input class=" form-control" id="cname" name="product_harga" type="number" required />
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                  <button class="btn btn-primary" type="submit" name="simpan">Save</button>
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

