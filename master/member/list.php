<?php 
if (isset($_GET['hapus'])) {
    $queryHapus = mysqli_query($mysqli,"DELETE FROM member where member_id = '" . $_GET['hapus'] . "'");
    if ($queryHapus) {
        echo "<script> alert('Data Berhasil Dihapus'); location.href='index.php?hal=master/member/list' </script>";
        exit;
    }
}
?>
<div class="wrapper">
 <div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Data Member
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix">

                        <div class="btn-group">
                            <a href="?hal=master/member/add">
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
                                <th>Kode Member</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No HP</th>
                                <th>Pekerjaan</th>
                                <th>Tgl Masuk member</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 0;
                            $queryMember = mysqli_query($mysqli,"SELECT * FROM member ORDER BY member_id DESC");
                            while ($rowMember  = mysqli_fetch_array($queryMember)) {
                                $no++;
                               ?>
                               <tr class="">
                                <td><?php echo $no; ?></td>
                                <td><?php echo $rowMember['member_kode'];?></td>
                                <td><?php echo $rowMember['member_name']; ?></td>
                                <td><?php echo $rowMember['member_alamat'];?></td>
                                <td><?php echo $rowMember['member_hp'];?></td>
                                <td><?php echo $rowMember['member_pekerjaan']; ?></td>
                                <td><?php echo $rowMember['member_tgl_masuk']; ?></td>
                                <td>
                                    <a href="?hal=master/member/edit&id=<?php echo $rowMember['member_id']; ?>">
                                        <button class="btn btn-primary" type="submit"><i class="fa fa-edit" aria-hidden="true"></i> Edit</button></a>
                                        <a href="?hal=master/member/list&hapus=<?php echo $rowMember['member_id']; ?>">
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


