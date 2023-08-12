<?php
  $con= mysqli_connect("localhost","root","","ndclinic") or die("Error: " . mysqli_error($con));
  mysqli_query($con, "SET NAMES 'utf8' ");
  error_reporting( error_reporting() & ~E_NOTICE );
  date_default_timezone_set('Asia/Bangkok');  
 
 
  if (isset($_POST['function']) && $_POST['function'] == 'provinces') {
  	$code = $_POST['code'];
  	$sql = "SELECT * FROM district WHERE province_code='$code'";
  	$query = mysqli_query($con, $sql);
  	echo '<option value="" selected disabled>-กรุณาเลือกอำเภอ-</option>';
  	foreach ($query as $value) {
  		echo '<option value="'.$value['code'].'">'.$value['name_th'].'</option>';
  	}
  }
 
 
if (isset($_POST['function']) && $_POST['function'] == 'amphures') {
    $id = $_POST['code'];
    $sql = "SELECT * FROM subdistrict WHERE district_code='$id'";
    $query = mysqli_query($con, $sql);
    echo '<option value="" selected disabled>-กรุณาเลือกตำบล-</option>';
    foreach ($query as $value2) {
      echo '<option value="'.$value2['code'].'">'.$value2['name_th'].'</option>';
      
    }
  }
 
  if (isset($_POST['function']) && $_POST['function'] == 'districts') {
    $id = $_POST['id'];
    $sql = "SELECT * FROM subdistrict WHERE code='$id'";
    $query3 = mysqli_query($con, $sql);
    $result = mysqli_fetch_assoc($query3);
    echo $result['zip_code'];
    exit();
  }
?>