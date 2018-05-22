<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kasir";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());


$sql = "SELECT *
		FROM member
		WHERE member_name LIKE '%".$_POST['query']."%'";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
$array = array();
//$rows= mysqli_num_rows($conn,$sql);

//if($rows > o){

while( $rows = mysqli_fetch_assoc($resultset) ) {	
	$array [] = array("emp_namep"=>$rows['member_name'],"href"=>"?hal=pos&id_pelanggan=".$rows['member_id']);
}


/*}else{
		$array [] = array("emp_name"=>'data tidak ditemukan');	
}*/
echo json_encode($array);
?>