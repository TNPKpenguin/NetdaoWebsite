<?php
$con= mysqli_connect("localhost","root","","ndclinic") or die("Error: " . mysqli_error($con));
mysqli_query($con, "SET NAMES 'utf8' ");
error_reporting( error_reporting() & ~E_NOTICE );
date_default_timezone_set('Asia/Bangkok');

$sql = "SELECT * FROM drug where drug_type = '{$_GET['drug_type']}'";

$query = mysqli_query($con, $sql);

$json = array();

while($result = mysqli_fetch_assoc($query)) {    
    array_push($json, $result);
}
echo json_encode($json,JSON_UNESCAPED_UNICODE);
?>