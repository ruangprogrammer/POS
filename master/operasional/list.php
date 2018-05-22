<?php 
if (isset($_GET['hapus'])) {
    $queryHapus = mysqli_query($mysqli,"DELETE FROM operasional where op_id = '" . $_GET['hapus'] . "'");
    if ($queryHapus) {
        echo "<script> alert('Data Berhasil Dihapus'); location.href='index.php?hal=master/operasional/list' </script>";
        exit;
    }
}
?>
<div class="wrapper">
   <div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Data Operasional
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix">

                        <div class="btn-group">
                            <a href="?hal=master/operasional/add">
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
                                <th>Nama Operasional</th>
                                <th>Deskripsi</th>
                                <th>Nominal</th>
                                <th>Petugas</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 0;
                            $queryOP = mysqli_query($mysqli,"SELECT * FROM operasional ORDER BY op_id DESC");
                            while ($rowOP  = mysqli_fetch_array($queryOP)) {
                                $no++;
                                ?>
                                <tr class="">
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $rowOP['op_name'];?></td>
                                    <td><?php echo $rowOP['op_desc'];?></td>
                                    <td>Rp. <?php echo number_format($rowOP['op_price'], 0, ',', '.'); ?></td>
                                    <td>
                                        <?php
                                            $nama_petugas = mysqli_query($mysqli,"SELECT * FROM users WHERE user_id='".$rowOP['op_user_id']."'");
                                            $data_petugas = mysqli_fetch_array($nama_petugas);
                                            echo $data_petugas['user_name']; 
                                        ?>
                                    </td>
                                    <td><?php echo $rowOP['op_create_date']; ?></td>
                                    <td>
                                        <a href="?hal=master/operasional/edit&id=<?php echo $rowOP['op_id']; ?>">
                                            <button class="btn btn-primary" type="submit"><i class="fa fa-edit" aria-hidden="true"></i> Edit</button></a>
                                            <a href="?hal=master/operasional/list&hapus=<?php echo $rowOP['op_id']; ?>">
                                                <button class="btn btn-danger" type="submit" name="hapus"><i class="fa fa-trash-o"></i> Delete</button>
                                            </a>
                                    </td>
                                    </tr>
                                    <?php  } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>


