<?php
$con= mysqli_connect("localhost","root","","ndclinic") or die("Error: " . mysqli_error($con));
mysqli_query($con, "SET NAMES 'utf8' ");
error_reporting( error_reporting() & ~E_NOTICE );
date_default_timezone_set('Asia/Bangkok');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $sql = "SELECT * FROM his_treat WHERE HN='{$_POST['hn']}' ORDER by case_id DESC LIMIT 1";
    $query = mysqli_query($con, $sql);
    $row = $query->fetch_assoc();
    $case_id = $row['case_id'];

    $drug_id = $_POST['drug_name'];

    if (isset($_POST["radio"])) {
        $pre_or_post = $_POST["radio"];
    } else {
        echo "up down Please select an option";
    }
    
    $sql2 =  "SELECT * FROM his_treat WHERE case_id = '{$case_id}'";
    $query2 = mysqli_query($con, $sql2);
    $row2 = $query2->fetch_assoc();
    $date_treat = $row2["date_treat"];


    $tablet = $_POST["tablet"];
    $amount = $_POST["amount"];
    $perday = $_POST["perday"];
    $sum = $tablet * $amount * $perday;
    
    $sql2 = "SELECT count(*) FROM link_drug WHERE case_id = '{$case_id}'";
    $query2 = mysqli_query($con, $sql2);
    $row2 = $query2->fetch_assoc();
    $sym_no = $row2['count(*)']+1;

    try{
        require_once "bdh.inc.php";

        $query = "INSERT INTO link_drug(`case_id`, `drug_no`, `drug_id`, `tablet`, `amount`, `perday`, `sum`,`note`, `date_treat`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $pdo->prepare($query);

        $stmt->execute([$case_id,  $sym_no, $drug_id, $tablet , $amount, $perday, $sum,  $pre_or_post, $date_treat]);

        $pdo = null;
        $stmt = null;

        header("Location: ../edit/edit_drug.php?hn=".$_POST['hn']);
        die();
    }catch(PDOException $e){
        die("Query failed: ".$e->getMessage());
    }
    
}else{
    // header("Location: ../add_patient.php");
    echo "error";
}