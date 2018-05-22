<?php 
if (isset($_GET['hapus'])) {
  $cekUser = mysqli_query($mysqli,"SELECT * FROM users WHERE user_id = '".$_GET['hapus']."'");
  $dataUser = mysqli_fetch_array($cekUser);
  if(($dataUser['user_level'] == 'Admin') AND ($dataUser['user_id'] == '31')){
   echo "<script> alert('Maaf User Level Administrator tidak bisa dihapus'); location.href='index.php?hal=master/user/list' </script>";exit;
 }else{
  $queryHapus = mysqli_query($mysqli,"DELETE FROM users where user_id = '".$_GET['hapus']."'");
   $file = "assets/images/user/".$dataUser['user_foto'];
   unlink($file);
  if ($queryHapus) {
    echo "<script> alert('Data Berhasil Dihapus'); location.href='index.php?hal=master/user/list' </script>";exit;
  }
}

}
?>
<div class="wrapper">
 <div class="row">
  <div class="col-sm-12">
    <section class="panel">
      <header class="panel-heading">
        Data User
        <span class="tools pull-right">
          <a href="javascript:;" class="fa fa-chevron-down"></a>
          <a href="javascript:;" class="fa fa-times"></a>
        </span>
      </header>
      <div class="panel-body">
        <div class="adv-table editable-table ">
          <div class="clearfix">
            <div class="btn-group">
              <a href="?hal=master/user/add">
                <button  data-toggle="modal" class="btn btn-primary" data-target="#myModal">
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
                <th>Foto</th>
                <th>Nama Lengkap</th>
                <th>Username</th>
                <th>Level</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
             <?php 
             $no = 0;
             $queryUsers = mysqli_query($mysqli,"SELECT * FROM users ORDER BY user_id DESC");
             while ($rowUsers  = mysqli_fetch_array($queryUsers)) {
               ?>
               <tr class="">
                <td width="25px"><img src="assets/images/user/<?php echo $rowUsers['user_foto']; ?>" width="100px" ></td>
                <td><?php echo $rowUsers['user_name']; ?></td>
                <td><?php echo $rowUsers['user_username']; ?></td>
                <td><?php echo $rowUsers['user_level'];?></td>
                <td><?php if($rowUsers['user_status'] == 'Y'){?>
                  <button class="btn btn-success" type="submit"><i class="fa fa-check-square-o"></i> Active</button>

                  <?php }else{ ?>
                  <button class="btn btn-danger" type="submit"><i class="fa fa-ban"></i> Not Active</button>

                  <?php    } ?></td>
                  <td>
                    <a href="?hal=master/user/edit&id=<?php echo $rowUsers['user_id']; ?>">
                      <button class="btn btn-primary" type="submit"><i class="fa fa-edit" aria-hidden="true"></i> Edit</button></a>
                      <a href="?hal=master/user/list&hapus=<?php echo $rowUsers['user_id']; ?>">
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