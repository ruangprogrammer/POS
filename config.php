<?php 
define("DATABASE_HOST", "localhost"); //database host
define("DATABASE_NAME", "pos_satya_graha_wellness_centre"); //nama database
define("DATABASE_USER", "root"); //user database
define("DATABASE_PASSWORD", ""); // password
$mysqli = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
global $mysqli;
?>