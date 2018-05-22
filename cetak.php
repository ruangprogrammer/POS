<?php
function isi_keranjang()
{
    include('config.php');
    $isikeranjang = array();
    $sid = session_id();
    $sql = mysqli_query($mysqli, "SELECT * FROM orders_temp WHERE id_session='$sid'");

    while ($r = mysqli_fetch_array($sql)) {
        $isikeranjang[] = $r;
    }
    return $isikeranjang;
}

$isikeranjang = isi_keranjang();
$jml = count($isikeranjang);
if ($jml == 0) {
    echo "<script> alert('Product masih kosong'); location.href='index.php?hal=pos' </script>";
    exit();
}
//$tgl_skrg = date("Y-m-d");
$jam_skrg = date("H:i:s");
// simpan data pemesanan

$query = "SELECT max(order_kode) as maxKode FROM orders";
$hasil = mysqli_query($mysqli, $query);
$data = mysqli_fetch_array($hasil);
$kodeOrders = $data['maxKode'];
$noUrut = (int)substr($kodeOrders, 3, 3);
$noUrut++;
$char = "TRX";
$kodeOrders = $char . sprintf("%03s", $noUrut);


mysqli_query($mysqli, "INSERT INTO 
    orders(order_kode,nama_petugas, tgl_order, jam_order) 
    VALUES ('$kodeOrders','" . $_SESSION['username'] . "',NOW(),'$jam_skrg')");
//exit();
// mendapatkan nomor orders
$id_orders = mysqli_insert_id($mysqli);
// panggil fungsi isi_keranjang dan hitung jumlah produk yang dipesan
// simpan data detail pemesanan
for ($i = 0; $i < $jml; $i++) {
    mysqli_query($mysqli, "INSERT INTO orders_detail(id_orders, product_id, jumlah) 
     VALUES('$id_orders',{$isikeranjang[$i]['product_id']}, {$isikeranjang[$i]['jumlah']})");

    mysqli_query($mysqli, "UPDATE product SET product_stock=product_stock - {$isikeranjang[$i]['jumlah']} WHERE product_id={$isikeranjang[$i]['product_id']}");

}
//exit();
for ($i = 0; $i < $jml; $i++) {

    // mysqli_query($mysqli,"DELETE FROM orders_temp WHERE id_orders_temp = {$isikeranjang[$i]['id_orders_temp']}");
}
$daftarproduk = mysqli_query($mysqli, "SELECT * FROM orders_detail,product 
   WHERE orders_detail.product_id=product.product_id 
   AND id_orders='$id_orders'");
?>
<!--header start -->

<!-- header end -->
<div class="wrapper">

    <div class="row blog">

        <div class="col-md-12">

            <div class="panel">
                <div class="panel-body">
                    <h1>Cash Rp. <?php echo number_format(str_replace(".", "", $_POST['cash']), 0, ',', '.'); ?></h1>
                </div>
            </div>

            <div class="panel">
                <div class="panel-body">
                    <div class="blog-post">
                        <div class="media">
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                    <tr style="background-color: #337ab7;color: #fff;">
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th style="text-align: center;">Durasi (Jam)</th>
                                        <th>Sub Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $total = 0;
                                    $no = 1;
                                    while ($data = mysqli_fetch_array($daftarproduk)) {
                                        $sub_total = +$data['product_harga'] * $data['jumlah'];
                                        $total += $sub_total;
                                        ?>

                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['product_kode']; ?></td>
                                            <td>
                                                <?php echo $data['product_name']; ?></td>
                                            <td style="text-align: right;">
                                                <?php echo number_format($data['product_harga'], 0, ',', '.'); ?></td>
                                            <td style="text-align: center;"><?php echo $data['jumlah']; ?></td>
                                            <td style="text-align: right;"><?php echo number_format($sub_total, 0, ',', '.'); ?></td>
                                        </tr>
                                    <?php }
                                    ?>
                                    <tr>
                                        <td colspan="4">
                                        </td>
                                        <td style="text-align: right;">
                                            Subtotal Rp.
                                        </td>
                                        <td style="text-align: right;">
                                            <?php echo number_format($total, 0, ',', '.'); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                        </td>
                                        <td style="text-align: right;">
                                            Diskon Rp.
                                        </td>
                                        <td style="text-align: right;">
                                            <?php
                                            if ($_POST['diskon'] > 0) {
                                                echo number_format($_POST['diskon'], 0, ',', '.');
                                            } else {
                                                echo "0";
                                            }
                                            ?> %

                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                        </td>
                                        <td style="text-align: right;">
                                            Pajak Rp.
                                        </td>
                                        <td style="text-align: right;">
                                            <?php
                                            if ($_POST['pajak'] > 0) {
                                                echo number_format($_POST['pajak'], 0, ',', '.');
                                            } else {
                                                echo "0";
                                            }
                                            ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="4">
                                        </td>
                                        <td style="text-align: right;">
                                            Grand Total Rp.
                                        </td>
                                        <td style="text-align: right;">
                                            <?php
                                            echo number_format(str_replace(".", "", $_POST['cash']), 0, ',', '.');
                                            ?>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td colspan="6" align="reight">

                                            <!-- print new -->
                                            <form method="post" action="struct_print.php" target="_blank">

                                                <input type="hidden" name="pajak"
                                                       value="<?php echo $_POST['pajak']; ?>">

                                                <input type="hidden" name="diskon"
                                                       value="<?php echo $_POST['diskon']; ?>">


                                                <input type="hidden" name="cash" value="<?php echo $_POST['cash']; ?>">

                                                <input type="hidden" name="id_orders" value="<?php echo $id_orders; ?>">

                                                <button class="btn btn-primary" type="submit">
                                                    <i class="fa fa-print"></i> print
                                                </button>
                                            </form>
                                            <!-- print end -->
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>