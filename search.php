<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jquery_autocomplite";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());


$sql = "SELECT id, employee_name as emp_name, employee_salary, employee_age 
		FROM employee 
		WHERE employee_name LIKE '%" . $_POST['query'] . "%' LIMIT 20";
$resultset = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
$array = array();
//$rows= mysqli_num_rows($conn,$sql);

//if($rows > o){

while ($rows = mysqli_fetch_assoc($resultset)) {
    $array [] = array("emp_name" => $rows['emp_name'], "href" => "profile.php?empid=" . $rows['id']);
}
/*}else{
		$array [] = array("emp_name"=>'data tidak ditemukan');	
}*/
echo json_encode($array);
?>