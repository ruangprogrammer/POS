<?php 

$id = $_GET['id'];
$queryMember = mysqli_query($mysqli,"SELECT * FROM member where member_id = '".$id."'");
$rowMember = mysqli_fetch_array($queryMember);

if (isset($_POST['update'])) {  
    $queryInsert  = mysqli_query($mysqli,"UPDATE member SET 
    member_name = '".$_POST['member_name']."',
    member_kota = '".$_POST['member_kota']."',
    member_kabupaten ='".$_POST['member_kabupaten']."',
    member_alamat ='".$_POST['member_alamat']."',
    member_hp ='".$_POST['member_hp']."',
    member_pekerjaan ='".$_POST['member_pekerjaan']."' WHERE member_id='".$_POST['member_id']."'");         
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
          Edit Member  <?php echo $rowMember['member_name'] ?>
        </header>
        <div class="panel-body">
          <div class=" form">
           <form class="cmxform form-horizontal adminex-form"  method="POST" enctype="multipart/form-data"  action="">
            <input type="hidden"  name="member_id" value="<?php echo $rowMember['member_id']; ?>">
            <div class="form-group ">
              <label for="cname" class="control-label col-lg-2"  style="text-align: left;">Nama</label>
              <div class="col-lg-5">
                <input class="form-control" id="cname" name="member_name" type="text" value="<?php echo $rowMember['member_name']; ?>" required/>
              </div>
            </div>

            <div class="form-group ">
              <label for="cname" class="control-label col-lg-2"  style="text-align: left;">Alamat</label>
              <div class="col-lg-5">
                <textarea name="member_alamat" class=" form-control" required><?php echo $rowMember['member_alamat']; ?></textarea>
              </div>
            </div>

            <div class="form-group ">
              <label for="cname" class="control-label col-lg-2"  style="text-align: left;">Nomor HP</label>
              <div class="col-lg-5">
                <input class=" form-control" id="cname" name="member_hp" type="text" value="<?php echo $rowMember['member_hp']; ?>" required />
              </div>
            </div>
            <div class="form-group ">
              <label for="cname" class="control-label col-lg-2"  style="text-align: left;">Kota</label>
              <div class="col-lg-5">
               <input class="form-control" id="cname" name="member_kota" type="text" value="<?php echo $rowMember['member_kota']; ?>" required />
              </div>
            </div>
            <div class="form-group ">
              <label for="cname" class="control-label col-lg-2"  style="text-align: left;">Kabupaten</label>
              <div class="col-lg-5">
                <input class="form-control" id="cname" name="member_kabupaten" type="text" value="<?php echo $rowMember['member_kabupaten']; ?>" required />
              </div>
            </div>
            <div class="form-group ">
              <label for="cname" class="control-label col-lg-2"  style="text-align: left;">Pekerjaan</label>
              <div class="col-lg-5">
                <input class="form-control" id="cname" name="member_pekerjaan" type="text" value="<?php echo $rowMember['member_pekerjaan']; ?>" required />
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-offset-2 col-lg-10">
                <button class="btn btn-primary" type="submit" name="update">Update</button>
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
