<?php 
if (isset($_GET['hapus'])) {
    $queryHapus = mysqli_query($mysqli,"DELETE FROM product where product_id = '" . $_GET['hapus'] . "'");
    if ($queryHapus) {
        echo "<script> alert('Data Berhasil Dihapus'); location.href='index.php?hal=master/product/list' </script>";
        exit;
    }
}
?>
<div class="wrapper">
 <div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Data Product Layanan
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix">

                        <div class="btn-group">
                            <a href="?hal=master/product/add">
                                <button  data-toggle="modal" class="btn btn-primary" >
                                    Add New <i class="fa fa-plus"></i>
                                </button>
                            </a>
                        </div>
                        
                        <div class="btn-group pull-right">
                        </div>
                    </div>
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode</th>
                                <th>Nama Layanan</th>
                                <th>Jenis Layanan</th>
                                <th>Harga perjam</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php 
                            $no = 0;
                            $queryProduct = mysqli_query($mysqli,"SELECT * FROM product ORDER BY product_id DESC");
                            while ($rowProduct  = mysqli_fetch_array($queryProduct)) {
                                $no++;
                               ?>
                               <tr class="">
                                <td><?php echo $no; ?></td>
                                <td><?php echo $rowProduct['product_kode']; ?></td>
                                <td><?php echo $rowProduct['product_name']; ?></td>
                                <td>
                                    <?php 
                                  
                                    $sql_layanan = mysqli_query($mysqli,"SELECT * FROM category WHERE category_id ='".$rowProduct['category_id']."'");
                                    $dataLayanan = mysqli_fetch_array($sql_layanan);

                                    echo $dataLayanan['category_name']; 
                                    ?>    
                                </td>
                                <td>Rp. <?php echo number_format($rowProduct['product_harga'], 0, ',', '.'); ?></td>
                                <td>
                                    <a href="?hal=master/product/edit&id=<?php echo $rowProduct['product_id']; ?>">
                                        <button class="btn btn-primary" type="submit"><i class="fa fa-edit" aria-hidden="true"></i> Edit</button></a>
                                        <a href="?hal=master/product/list&hapus=<?php echo $rowProduct['product_id']; ?>">
                                            <button class="btn btn-danger" type="submit" name="hapus"><i class="fa fa-trash-o"></i> Delete</button>
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>


