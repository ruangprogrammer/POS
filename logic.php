<?php
require_once('config.php');
$kode_sql="select max(right(product_kode,4)) as kd_max from product";
//print_r($kode_sql);
//echo $kode; exit;
$result=mysqli_query($mysqli,$kode_sql);

$data=mysqli_fetch_array($result);

//echo $data['kd_max']+1; exit();

$isi_rekord=$data['kd_max']+1;

//echo $isi_rekord; exit();


$tmp=$isi_rekord++;

echo $tmp; exit();

$kd=sprintf('%04s',$tmp);


$kode="K".$kd;


echo $kode;
?>