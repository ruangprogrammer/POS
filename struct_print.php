<?php
session_start();
include 'config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">

    <title>SATYA GRAHA WELLNESS CENTRE</title>

    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="print-body">

<section>

    <!--body wrapper start-->
    <div class="wrapper">
        <div class="panel">
            <div class="panel-body invoice">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-3">
                        <h1 class="invoice-title" style="color: #000">#<?php echo $_POST['id_orders']; ?><?php ?></h1>
                    </div>
                    <div class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-5 col-xs-offset-4 ">
                        <!--    <img class="inv-logo" src="images/invoice-logo.jpg" alt=""/>
                         Jl. Veteran No. 147 <br>
                                   Umbulharjo Yogyakarta <br>
                                   Tlp : +61 3 8376 6284 -->
                    </div>
                </div>
                <div class="invoice-address">
                    <div class="row">
                        <div class="col-md-5 col-sm-5 col-xs-5">

                            <p>
                                <strong>SATYA GRAHA WELLNESS CENTRE</strong><br>
                                Jl. Veteran No. 147 <br>
                                Umbulharjo Yogyakarta <br>
                                Tlp : +61 3 8376 6284
                            </p>

                        </div>
                        <div class="col-md-4 col-md-offset-3 col-sm-4 col-sm-offset-3 col-xs-4 col-xs-offset-3">

                            <h2 class="amnt-value">
                                Total <?php echo number_format(str_replace(".", "", $_POST['cash']), 0, ',', '.'); ?></h2>
                        </div>
                    </div>
                </div>
            </div>
            <hr>


            <table class="table table-bordered table-invoice">
                <thead>
                <tr style="background-color: #245df5;">
                    <th>No.</th>
                    <th>Kode</th>
                    <th class="text-center">Nama</th>
                    <th>Harga</th>
                    <th class="text-center">Durasi (Jam)</th>
                    <th class="text-center">Sub Total</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $CetakNota = mysqli_query($mysqli, "SELECT * FROM orders_detail,product 
                   WHERE orders_detail.product_id=product.product_id 
                   AND id_orders='$_POST[id_orders]'");
                $totalcetak = 0;
                $itemcetak = 0;
                $no = 1;
                while ($datacetak = mysqli_fetch_array($CetakNota)) {
                $subtotalcetak = +$datacetak['jumlah'] * $datacetak['product_harga'];
                $totalcetak += $subtotalcetak;
                $itemcetak += $datacetak['jumlah'];
                ?>

                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $datacetak['product_kode']; ?></td>
                    <td>
                        <p><?php echo $datacetak['product_name']; ?></p>
                    </td>
                    <td class="text-center">
                        Rp. <?php echo number_format($datacetak['product_harga'], 0, ',', '.'); ?></td>
                    <td class="text-center"><?php echo $datacetak['jumlah'] ?></td>
                    <td class="text-right"> Rp. <?php echo number_format($subtotalcetak, 0, ',', '.') ?></td>
                </tr>
                <?php
                }
                ?>
                <tr>
                    <td colspan="3" class="text-left" style="text-align: left;">
                        <h4>Keterangan</h4>
                        1. Barang yang sudah di beli tidak dapat ditukar<br>
                        2. Pembayaran dengan Cek/BG dianggap lunas <br>
                        3. Tanda ** menujukan Bonus<br>
                    </td>

                    <td class="text-right" colspan="2">
                        <p>Sub Total Rp.</p>
                        <p>Diskon Rp.</p>
                        <p>Pajak Rp.</p>
                        <p><strong>GRAND TOTAL Rp.</strong></p>
                    </td>
                    <td class="text-right">
                        <p> <?php echo number_format($totalcetak, 0, ',', '.'); ?></p>
                        <p> <?php echo $_POST['diskon']; ?>%</p>
                        <p> <?php echo $_POST['pajak'] ?></p>
                        <p>
                            <strong><?php echo number_format(str_replace(".", "", $_POST['cash']), 0, ',', '.'); ?></strong>
                        </p>
                    </td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>
    <!--body wrapper end -->

</section>

<!--
 Placed js at the end of the document so the pages load faster 
-->
<script src="assets/js/jquery-1.10.2.min.js"></script>
<script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/modernizr.min.js"></script>


<!--common scripts for all pages-->
<script src="assets/js/scripts.js"></script>

<script type="text/javascript">
    window.print();
</script>

</body>
</html>
