<?php
//session_start();
$id_session = session_id();
/*
if(empty($_SESSION['member_id'])){
    echo "tidak kosong";
    //header('location: index.php?hal=post-check');
}else{
    echo "kosong";
}
exit();*/
//echo "hgsdsd".$_SESSION['member_id']; exit();
//if(!empty($_SESSION['member_id'])){
$grand_total = mysqli_query($mysqli,"SELECT SUM(product_harga * jumlah) AS TOTAL FROM  
  `product`
  INNER JOIN `orders_temp` 
  ON (`product`.`product_id` = `orders_temp`.`product_id`) 
  WHERE orders_temp.id_session='" . $id_session . "'");
$rowGrandTotal = mysqli_fetch_array($grand_total);
?>
<div class="wrapper">
  <div class="row blog">
    <div class="col-md-7">
      <section class="panel">
        <div class="panel-body form-horizontal">
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-3 col-sm-3 control-label" style="text-align: left;"><b>No. Nota</b></label>
            <div class="col-lg-9">
              <input type="text" name="no_nota" value="<?php echo "121212"; ?>" class="form-control" disabled="">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-3 col-sm-3 control-label" style="text-align: left;"><b>Tanggal</b></label>
            <div class="col-lg-9">
              <input type="text" class="form-control" value="<?php echo date('Y-m-d'); ?>" disabled="">
            </div>
          </div>

                <!--   
                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-3 col-sm-3 control-label" style="text-align: left;"><b>Jenis Layanan</b></label>
                        <div class="col-lg-9">
                            <input type="text" class="jenis_layanan form-control">
                        </div>
                    </div> 
                  -->

                  <div class="form-group">
                    <label for="inputEmail1" class="col-lg-3 col-sm-3 control-label" style="text-align: left;"><b>Pelanggan</b></label>
                    <div class="col-lg-9">
                      <?php
                      if(!empty($_GET['id_pelanggan'])){
                        $sql_cekpelanggan = mysqli_query($mysqli,"select * from member where member_id='".$_GET['id_pelanggan']."'");
                                    // echo $sql_cekpelanggan;
                        $show_nama_pelanggan = mysqli_fetch_array($sql_cekpelanggan);
                        ?>
                        <input type="text" class="form-control" value="<?php echo $show_nama_pelanggan['member_name']; ?>" disabled="">
                        <?php
                      }else{
                        ?>
                        <input type="text" name="member_name" class="pelanggan form-control">
                        <?php                                
                      }
                      ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail1" class="col-lg-3 col-sm-3 control-label" style="text-align: left;"><b>Kode Layanan</b></label>
                    <div class="col-lg-9">
                      <input type="text" class="jenis_layanan form-control">
                    </div>
                  </div>

                  <div class="form-group">
                   <!--  <div class="col-lg-offset-3 col-lg-9">
                        <button type="submit" class="btn btn-primary">Cari</button>
                        <button type="submit" class="btn btn-primary">Baru</button>
                      </div> -->
                    </div>


                    <!--  </form> -->
                  </div>
                </section>
              </div>

              <div class="col-md-5">
                <div class="panel">
                  <div class="panel-body">
                    <h2>TOTAL</h2>
                    <h1><span id="grand_total"></span></h1>


                    <p><h2><span id="show_total_bayar"><?php echo number_format($rowGrandTotal['TOTAL'], 0, ',', '.'); ?></span></h2></p>



                  </div>
                </div>
              </div>




            </div>

  <!--   <div class="row blog">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label" style="text-align: left;"><b>Kode Layanan</b></label>
                        <div class="col-lg-10">
                            <input type="text" class="jenis_layanan form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  -->

  <div class="row blog">
    <div class="col-md-12">
      <div class="panel">
        <div class="panel-body">
         <table class="table table-bordered table-striped table-condensed">
          <thead>
            <tr>
              <th>No.</th>
              <td></td>
              <th>Kode</th>
              <th>Nama Layanan</th>
              <th>Durasi (Jam)</th>
              <th>Harga</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <?php

            $query = "SELECT *
            FROM
            `product`
            INNER JOIN `orders_temp` 
            ON (`product`.`product_id` = `orders_temp`.`product_id`) 
            WHERE orders_temp.id_session='" . $id_session . "'";

            $result = mysqli_query($mysqli,$query);
            $rows = mysqli_num_rows($result);
            $no = 0;
            $total = 0;

            if($rows > 0){
              while ($data = mysqli_fetch_array($result)) {
                $no++;
                $sub_total = +$data['product_harga'] * $data['jumlah'];
                $total += $sub_total;
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td> <a href="cart.php?mod=basket&act=del&id=<?php echo $data['id_orders_temp'] ?>"><i
                    class="fa fa-times" style="color: red"></i></a></td>
                    <td><?php echo $data['product_kode'] ?></td>
                    <td><?php echo $data['product_name'] ?></td>
                    <td width="20px">
                      <input type="number" class="form-control" value="<?php echo $data['jumlah']; ?>" onchange="updateCartItem(this, '<?php echo $data["id_orders_temp"]; ?>')" style="width: 63px;">
                      <!--   <input type="text" id="durasi" class="form-control" value="<?php //echo $data['jumlah']; ?>"> -->
                    </td>
                    <td><p id="harga">Rp. <?php echo number_format($data['product_harga'], 0, ',', '.'); ?></p></td>
                    <td><p id="subtot">Rp. <?php echo number_format($sub_total, 0, ',', '.'); ?></p></td>

                  </tr>
                  <?php
                }
              }else{
                echo "<tr><td colspan='7'><b>Layanan Kosong</b></td></tr>";
              }
              ?>
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>



  <!-- test start -->
  <div class="row blog">
    <div class="col-md-6">
      <section class="panel">
        <div class="panel-body">
          <form class="form-horizontal" role="form">

            <div class="form-group">
              <label for="inputEmail1" class="col-lg-3 col-sm-3 control-label" style="text-align: left;"><b>Kasir</b></label>
              <div class="col-lg-9">
                <?php
                $nama_petugas = mysqli_query($mysqli,"SELECT * FROM users WHERE user_id='".$_SESSION['user_id']."'");
                $data_petugas = mysqli_fetch_array($nama_petugas);

                ?>
                <input type="text" value="<?php  echo $data_petugas['user_name']; ?>" class="form-control" disabled="">
              </div>
            </div>

          </form>
        </div>
      </section>
    </div>
         <!-- <div class="col-md-2">
            <section class="panel"></section></div>
          -->
          <div class="col-md-6">
            <section class="panel">
              <div class="panel-body form-horizontal">
               <form method="POST" action="?hal=cetak">


                <div class="form-group">
                  <label for="inputEmail1" class="col-lg-3 col-sm-3 control-label" style="text-align: left;"><b>Sub Total</b></label>
                  <div class="col-lg-9">
                    <input type="text" id="cash" class="form-control"  onkeyup="sum();" value="<?php echo number_format($total, 0, ',', '.'); ?>" disabled="" />
                  </div></div>

                  <div class="form-group">
                    <label for="inputEmail1" class="col-lg-3 col-sm-3 control-label" style="text-align: left;"><b>Pajak</b></label>
                    <div class="col-lg-9"> <input type="text" id="pajak" name="pajak" class="form-control"  onkeyup="sum();" value="0" />
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail1" class="col-lg-3 col-sm-3 control-label" style="text-align: left;"><b>Diskon</b></label>
                    <div class="col-lg-9">
                      <input type="text" id="diskon" name="diskon" class="form-control"  onkeyup="sum();" value="0" /> 
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail1" class="col-lg-3 col-sm-3 control-label" style="text-align: left;"><b>Bayar</b></label>
                    <div class="col-lg-9"> <input type="text" id="bayar" class="form-control"  onkeyup="sum();" value="<?php echo number_format($total, 0, ',', '.'); ?>"/> 
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail1" class="col-lg-3 col-sm-3 control-label" style="text-align: left;"><b>Total yang harus di bayar</b></label>
                    <div class="col-lg-9"><input type="text" id="total_harga" name="cash" class="form-control"  onkeyup="sum();" value="<?php echo $total; ?>" readonly=""/>

                    </div></div>

                    <div class="form-group">
                      <label for="inputEmail1" class="col-lg-3 col-sm-3 control-label" style="text-align: left;"><b>Sisa</b></label>
                      <div class="col-lg-9">
                       <!--  <input type="hidden" name="cash" value="100000"> -->
                       <input type="text" class="form-control" id="kembali" readonly="" />

                       <!-- start test -->

<!-- 

                                Enter your name: <input type="text" id="fname" onkeyup="myFunction()">

                                <p>My name is: <span id="demo"></span></p>


                                 <p>My name is 22: <h1><span id="demo1">90</span></h1></p>

                                  <b>Total Harus dibayar : <span id="show_total_bayar">90</span></b>

                                <script>
                                function myFunction() {
                                    
                                    var x = document.getElementById("fname").value;

                                    document.getElementById("demo").innerHTML = x;
                                }
                                </script>
                              -->

                              <!-- start test end  -->
                            </div> 
                          </div>

                          <div class="form-group">
                            <label for="inputEmail1" class="col-lg-3 col-sm-3 control-label" style="text-align: left;"><b></b></label>
                            <div class="col-lg-9">
                             <button class="btn btn-primary" type="submit" name="simpan">Bayar</button>
                           </div> 
                         </div>

                       </form>
                     </div>
                     <!-- OPREKAN START -->
                     <!-- OPREKAN END  -->
                   </section>
                 </div>
               </div>
               <!-- test end  -->
             </div>

             <script>
              function updateCartItem(obj,id){
                $.get("cartAction.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){


                  console.log(data)

                  if(data == 'ok'){
                    location.reload();
                  }else{
                    alert('Cart update failed, please try again.');
                  }
                });
              }
            </script>



            <script>
              function formatRupiah(angka, prefix) {
                var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                if (ribuan) {
                  separator = sisa ? '.' : '';
                  rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
              }

              function sum() {      

                var cash = document.getElementById('cash').value;

                var pajak = document.getElementById('pajak').value;

      var diskon = document.getElementById('diskon').value; //

      var bayar = document.getElementById('bayar').value;   //inputan dari user

      var a = parseInt(cash.replace(/,.*|[^0-9]/g, ''), 10);     //total harga
      var b = parseInt(pajak.replace(/,.*|[^0-9]/g, ''), 10);     //pajak
      var c = parseInt(bayar.replace(/,.*|[^0-9]/g, ''), 10);     //bayar
      var d = parseInt(diskon.replace(/,.*|[^0-9]/g, ''), 10);    //diskon

      var harga_diskon = a - (a*(d/100));   //harga diskon ok

      var total_harga = harga_diskon + b;   //total yang harus di bayar

      var kembali = c - total_harga;      //kembalian 

      if (!isNaN(kembali)) {


        document.getElementById('total_harga').value = formatNum(total_harga);

        document.getElementById('grand_total').value = formatNum(total_harga);

        document.getElementById('kembali').value = formatNum(kembali);
/*
        var x = document.getElementById("kembali").value;

         document.getElementById("demo1").innerHTML = x;

         */


         var total_harus_dibayar = document.getElementById('total_harga').value;

        // console.log('aaaaaaaaaaaaaaaa : '+total_harus_dibayar);


         document.getElementById("show_total_bayar").innerHTML = total_harus_dibayar;



       }

     }


     function formatNum(rawNum) {
  rawNum = "" + rawNum; // converts the given number back to a string
  var retNum = "";
  var j = 0;
  for (var i = rawNum.length; i > 0; i--) {
    j++;
    if (((j % 3) == 1) && (j != 1))
      retNum = rawNum.substr(i - 1, 1) + "." + retNum;
    else
      retNum = rawNum.substr(i - 1, 1) + retNum;
  }
  return retNum;
}

/*var pajak_show = document.getElementById('pajak');
pajak_show.addEventListener('keyup', function (e) {
    pajak_show.value = formatRupiah(this.value);
});

var pajak_show = document.getElementById('total_harga');
pajak_show.addEventListener('keyup', function (e) {
    pajak_show.value = formatRupiah(this.value);
});


var bayar_show = document.getElementById('bayar');
bayar_show.addEventListener('keyup', function (e) {
    bayar_show.value = formatRupiah(this.value);
});  
*/

</script>
<?php

?>
