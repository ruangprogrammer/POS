<?php
error_reporting(0);
$sql = "SELECT *
FROM 
`product` 
JOIN `orders_detail` 
ON (`product`.`product_id` = `orders_detail`.`product_id`)
JOIN `orders` 
ON (`orders`.`id_orders` = `orders_detail`.`id_orders`) GROUP BY product.product_id";
$resultProduct = mysqli_query($mysqli, $sql);
?>
<div class="wrapper">
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    Laporan Penjualan
                    <span class="tools pull-right">
                        <a href="javascript:;" class="fa fa-chevron-down"></a>
                        <a href="javascript:;" class="fa fa-times"></a>
                    </span>
                </header>
                <div class="panel-body">
                    <div class="adv-table editable-table ">
                        <div class="clearfix">
                            <!-- start -->
                            <div class="btn-group pull-right">
                                <a href="<?php //echo SITE_HOST;?>http://localhost/POS_SATYA_GRAHA_WELLNESS_CENTRE/master/laporan/print.php"
                                   target="_blank">
                                    <button class="btn btn-primary" type="submit" name="hapus"><i
                                                class="fa fa-print"></i> Print
                                    </button>
                                </a>
                            </div>
                            <br><br>
                            <br><br>
                            <!-- end -->
                        </div>
                        <div class="space15"></div>
                      
                        <table class="table table-bordered table-invoice" border="0">
                            <tbody>

                            <tr>
                                <td style="text-align: left;" colspan="2">
                                    <h4>Pendapatan dari Penjualan</h4>
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
                                    <h4 style="color: red">Total Harga Pokok Penjualan
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
                            $total_op=0;
                            $sql_op = mysqli_query($mysqli, "SELECT * FROM Operasional ORDER BY op_id");
                            while ($data_op = mysqli_fetch_array($sql_op)) {
                                $total_op +=$data_op['op_price'];
                                ?>
                                <tr>
                                    <td style="text-align: left;">
                                        <?php echo $data_op['op_name']; ?>

                                    </td>
                                    <td class="text-right">
                                       Rp. <?php echo number_format($data_op['op_price'],0,',','.'); ?>
                       
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>

                            <tr>
                                <td style="text-align: left;">
                                    <h4 style="color: red;">Total Biaya
                                    </h4>
                                </td>
                                <td class="text-right">
                                    Rp. <?php echo number_format($total_op,0,',','.'); ?>
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
                                    Biaya Lainya
                                    
                                </td>
                                <td class="text-right">
                                    Rp. 20.000.000
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align: left;">
                                    <h4 style="color: red">Total Biaya Lainya
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
                            </tbody>
                        </table>
                        <!--  </div> -->
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
