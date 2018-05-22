<?php 
if (isset($_POST['simpan'])) {   // echo "ywetgwas"; exit();
 
  $cek_user = mysqli_query($mysqli,"SELECT * FROM users WHERE user_username ='".$_POST['user_username']."'");
  $rows = mysqli_num_rows($cek_user);

  if ($rows > 0) { 
   echo "<script> alert('username di gunakan'); location.href='index.php?hal=master/user/add' </script>";exit;
 }

 if (!empty($_FILES) && $_FILES['user_foto']['size'] >0 && $_FILES['user_foto']['error'] == 0){

          $random = substr(number_format(time() * rand(),0,'',''),0,10); 
          $foto = $random.$_FILES['user_foto']['name'];  
          $move = move_uploaded_file($_FILES['user_foto']['tmp_name'],'assets/images/user/'.$foto);
        
          if ($move) { 
                    $queryInsert  = mysqli_query($mysqli,"INSERT INTO users SET 
                              user_foto = '".$foto."',
                              user_name = '".$_POST['user_name']."',
                              user_username = '".$_POST['user_username']."',
                              user_password = '".md5($_POST['user_password'])."',
                              user_level = '".$_POST['user_level']."',
                              user_status = '".$_POST['user_status']."'");
          }



      //  if ($move) {     echo "ada gambar "; exit();

      /*   $queryInsert  = mysqli_query($mysqli,"INSERT INTO users SET 
          user_foto = '".$foto."',
          user_name = '".$_POST['user_name']."',
          user_username = '".$_POST['user_username']."',
          user_password = '".md5($_POST['user_password'])."',
          user_level = '".$_POST['user_level']."',
          user_status = '".$_POST['user_status']."')");*/

     //  }else{   echo "gamabar kosong"; exit();

       /* echo "INSERT INTO users SET 
          user_name = '".$_POST['user_name']."',
          user_username = '".$_POST['user_username']."',
          user_password = '".md5($_POST['user_password'])."',
          user_level = '".$_POST['user_level']."',
          user_status = '".$_POST['user_status']."'"; exit();



        $queryInsert  = mysqli_query($mysqli,"INSERT INTO users SET 
          user_name = '".$_POST['user_name']."',
          user_username = '".$_POST['user_username']."',
          user_password = '".md5($_POST['user_password'])."',
          user_level = '".$_POST['user_level']."',
          user_status = '".$_POST['user_status']."'");           */
    //  }
}else{
   $queryInsert  = mysqli_query($mysqli,"INSERT INTO users SET 
          user_name = '".$_POST['user_name']."',
          user_username = '".$_POST['user_username']."',
          user_password = '".md5($_POST['user_password'])."',
          user_level = '".$_POST['user_level']."',
          user_status = '".$_POST['user_status']."'");
 
}

if ($queryInsert) {
 echo "<script> alert('Data Berhasil Disimpan'); location.href='index.php?hal=master/user/list' </script>";exit;
}


}

?>
<div class="wrapper">
  <div class="row">
    <div class="col-lg-12">
      <section class="panel">
        <header class="panel-heading">
         ADD USER
       </header>
       <div class="panel-body">
        <div class=" form">
          <form class="cmxform form-horizontal adminex-form" id="commentForm" method="POST" enctype="multipart/form-data" action="">
            <div class="form-group ">
              <label for="cname" class="control-label col-lg-2">Nama Lengkap</label>
              <div class="col-lg-7">
                <input class=" form-control" id="cname" name="user_name" type="text"/>
              </div>
            </div>
            <div class="form-group ">
              <label for="cname" class="control-label col-lg-2">Foto</label>
              <div class="col-lg-7">
                <input class=" form-control" id="cname" name="user_foto" type="file"/>
              </div>
            </div>
            <div class="form-group ">
              <label for="cname" class="control-label col-lg-2">username</label>
              <div class="col-lg-7">
                <input class=" form-control" id="cname" name="user_username" type="text"/>
              </div>
            </div>
            <div class="form-group ">
              <label for="cname" class="control-label col-lg-2">password</label>
              <div class="col-lg-7">
                <input class=" form-control" name="user_password" type="password"/>
              </div>
            </div>
            <div class="form-group ">
              <label for="cemail" class="control-label col-lg-2">Level</label>
              <div class="col-lg-7">
                <select name="user_level" class="form-control " >
                  <option value="">--pilih level--</option>
                  <option value="Admin">Admin</option>
                  <option value="Kasir">Kasir</option>
                  <option value="Pemilik">Pemilik</option>
                </select>
              </div>
            </div>
            <div class="form-group ">
              <label for="cemail" class="control-label col-lg-2">Status</label>
              <div class="col-lg-3">
                <select name="user_status" class="form-control " >
                  <!--   <select name="user_status" required="" class="form-control " > -->
                    <option value="">-- status --</option>
                    <option value="Y">Active</option>
                    <option value="N">Not Active</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <div class="col-lg-offset-2 col-lg-7">
                  <button class="btn btn-primary" type="submit" name="simpan">Save</button>
                  <a href="?hal=master/user/list">
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

