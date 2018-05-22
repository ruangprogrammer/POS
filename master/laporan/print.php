<?php
session_start();
error_reporting(0);
include("../../config.php");
//echo $sql
/*$sql = "SELECT *
FROM 
`product` 
JOIN `orders_detail` 
ON (`product`.`product_id` = `orders_detail`.`product_id`)
JOIN `orders` 
ON (`orders`.`id_orders` = `orders_detail`.`id_orders`) GROUP BY product.product_id";
$resultTransaksi=mysqli_query($mysqli,$sql);*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">
    <title>Laporan Penjualan</title>
    <link href="../../assets/css/style.css" rel="stylesheet">
    <link href="../../assets/css/style-responsive.css" rel="stylesheet">
</head>
<body class="print-body">

<div class="wrapper">
    <div class="panel">
        <!--       <div class="panel-body invoice">
                <div class="row">
                  <div class="col-md-4 col-sm-4 col-xs-3">
                    <h1 class="invoice-title">invoice</h1>
                  </div>
                  <div class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-5 col-xs-offset-4 ">
                    <img class="inv-logo" src="images/invoice-logo.jpg" alt=""/>
                    <p>121 King Street, Melbourne <br/>
                      Victoria 3000 Australia <br/>
                    Phone: +61 3 8376 6284</p>
                  </div>
                </div>
                <div class="invoice-address">
                  <div class="row">
                    <div class="col-md-5 col-sm-5 col-xs-5">
                      <h4 class="inv-to">Invoice To</h4>
                      <h2 class="corporate-id">Envato</h2>
                      <p>
                        121 King Street, Melbourne<br>
                        Victoria 3000 Australia<br>
                        Phone: +61 3 8376 6284,
                        Email : info@envato.com
                      </p>

                    </div>
                    <div class="col-md-4 col-md-offset-3 col-sm-4 col-sm-offset-3 col-xs-4 col-xs-offset-3">
                      <div class="inv-col"><span>Invoice#</span> 432134-A</div>
                      <div class="inv-col"><span>Invoice Date :</span> 22 March 2014</div>
                      <h1 class="t-due">TOTAL DUE</h1>
                      <h2 class="amnt-value">$ 3120.00</h2>
                    </div>
                  </div>
                </div>
              </div> -->

        <table class="table table-bordered table-invoice" border="0">
            <tbody>

            <tr>
                <td style="text-align: left;">
                    <h4>Pendapatan dari Penjualan</h4>
                </td>
                <td class="text-right">
                    <h4>Rp. 20.000.000</h4>
                </td>
            </tr>

            <tr>
                <td style="text-align: left;">
                    Penjualan
                </td>
                <td class="text-right">
                    Rp. 20.000.000
                </td>
            </tr>

            <tr>
                <td style="text-align: left;">
                    Diskon
                </td>
                <td class="text-right">
                    Rp. 20.000.000
                </td>
            </tr>

            <tr>
                <td style="text-align: left;">
                    <h4>Total Pendapatan
                    </h4>
                </td>
                <td class="text-right">
                    Rp. 20.000.000
                </td>
            </tr>

            <tr>
                <td style="text-align: left;">
                    <h4>Harga Pokok Penjualan
                    </h4>
                </td>
                <td class="text-right">
                    Rp. 20.000.000
                </td>
            </tr>

            <tr>
                <td style="text-align: left;">
                    Pendapatan Bersih
                </td>
                <td class="text-right">
                    Rp. 20.000.000
                </td>
            </tr>

            <tr>
                <td style="text-align: left;">
                    <h4>Total Harga Pokok Penjualan
                    </h4>
                </td>
                <td class="text-right">
                    Rp. 20.000.000
                </td>
            </tr>

            <tr>
                <td style="text-align: left;">
                    <h4>Laba Kotor
                    </h4>
                </td>
                <td class="text-right">
                    Rp. 20.000.000
                </td>
            </tr>

            <tr>
                <td style="text-align: left;">
                    <h4>Biaya Operasional
                    </h4>
                </td>
                <td class="text-right">
                    Rp. 20.000.000
                </td>
            </tr>

            <?php
            $sql_op = mysqli_query($mysqli, "SELECT * FROM Operasional ORDER BY op_id");
            while ($data_op = mysqli_fetch_array($sql_op)) {
                //for($i=0;$i<3;$i++){
                ?>
                <tr>
                    <td style="text-align: left;">
                        <?php echo $data_op['op_name']; ?>

                    </td>
                    <td class="text-right">
                        Rp. <?php echo $data_op['op_price'] ?>
                    </td>
                </tr>
                <?php
            }
            ?>

            <tr>
                <td style="text-align: left;">
                    <h4>Total Biaya
                    </h4>
                </td>
                <td class="text-right">
                    Rp. 20.000.000
                </td>
            </tr>

            <tr>
                <td style="text-align: left;">
                    <h4>Pendapatan Bersih Operasional
                    </h4>
                </td>
                <td class="text-right">
                    Rp. 20.000.000
                </td>
            </tr>

            <tr>
                <td style="text-align: left;">
                    <h4>Biaya Lainya
                    </h4>
                </td>
                <td class="text-right">
                    Rp. 20.000.000
                </td>
            </tr>


            <tr>
                <td style="text-align: left;">
                    <h4>Biaya Lainya
                    </h4>
                </td>
                <td class="text-right">
                    Rp. 20.000.000
                </td>
            </tr>

            <tr>
                <td style="text-align: left;">
                    <h4>Total Biaya Lainya
                    </h4>
                </td>
                <td class="text-right">
                    Rp. 20.000.000
                </td>
            </tr>

            <tr>
                <td style="text-align: left;">
                    <h4>Pendapatan Bersih
                    </h4>
                </td>
                <td class="text-right">
                    Rp. 20.000.000
                </td>
            </tr>

            <!-- <tr>
              <td style="text-align: left;">
                <h4 >Payment Method sdsdsd</h4>
              </td>
              <td class="text-right">
                <h4>Rp. 20.000.000</h4>
              </td>
            </tr>
            <tr>
              <td style="text-align: left;">
                <h4>Payment Method sdsdsd</h4>
              </td>
              <td class="text-right">
                <h4>Rp. 20.000.000</h4>
              </td>
            </tr>
            <tr>
              <td style="text-align: left;">
                <h4>Payment Method sdsdsd</h4>
              </td>
              <td class="text-right">
                <h4>Rp. 20.000.000</h4>
              </td>
            </tr>
            <tr>
              <td style="text-align: left;">
                <h4 >Payment Method sdsdsd</h4>
              </td>
              <td class="text-right">
                <h4>Rp. 20.000.000</h4>
              </td>
            </tr> -->
            <!--  <tr><td colspan="5"><hr></td></tr> -->

            </tbody>
        </table>
    </div>
</div>
<!--   <section> -->
<!--body wrapper start-->


<!-- 
                <div class="panel-body invoice">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-3">

                        </div>
                        <div class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-5 col-xs-offset-4 ">
                        </div>
                    </div>
                    <div class="invoice-address">
                      <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                           <p>
                            <p>21 Mei 2018</p>
                            <h4>Pendapatan</h4>
                            <h4>Pendapatan dari Penjualan </h4>
                            <h4>Penjualan</h4>
                            <h4>Diskon</h4>
                            <hr>
                            <h4>Total Pendapatan dari Penjualan</h4>
                            <h4>Harga Pokok Penjualan</h4>
                            <h4>Diskon</h4>
                            <hr>
                             <h4>Total Harga Pokok Penjualan</h4>
                            <h4>Laba Kotor</h4>
                            <h4>Biaya Operasional</h4>
                            <h4>Total Biaya</h4>
                            <h4>Pendapatan Bersih</h4>
                            <h4>Biaya Lainya</h4>
                             <h4>Biaya Lainya</h4>
                            <h4><font color=red>Total Biaya Lainnya</font></h4>
                            <hr>
                            Pendapatan Bersih
                           </p>
                       </div>
                   </div>
               </div>
           </div>
         -->


<script src="../../assets/js/jquery-1.10.2.min.js"></script>
<script src="../../assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src="../../assets/js/bootstrap.min.js"></script>
<script src="../../assets/js/modernizr.min.js"></script>
<script src="../../assets/js/scripts.js"></script>
<script type="text/javascript">
    window.print();
</script>
</body>
</html>
<!-- 

http://localhost/porto/download/pos-coffee/master/laporan/print.php
file:///E:/server/POS_SATYA_GRAHA_WELLNESS_CENTRE/interface/laporan%20penjualan%20wellness.pdf
 -->