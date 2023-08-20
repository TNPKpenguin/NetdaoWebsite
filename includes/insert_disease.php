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

    $sql2 = "SELECT count(*) FROM `link_sym` WHERE case_id = $case_id";
    $query2 = mysqli_query($con, $sql2);
    $row2 = $query2->fetch_assoc();
    $sym_no = $row2['count(*)']+1;

    $sym_id = $_POST["name_disease"];
    $des = $_POST["des"];

    $sql2 =  "SELECT * FROM his_treat WHERE case_id = '{$case_id}'";
    $query2 = mysqli_query($con, $sql2);
    $row2 = $query2->fetch_assoc();
    $date_treat = $row2["date_treat"];

    try{
        require_once "bdh.inc.php";

        $query = "INSERT INTO link_sym (case_id, sym_no, date_treat, sym_id, sym_des)  VALUES (?, ?, ?, ?, ?)";

        $stmt = $pdo->prepare($query);

        $stmt->execute([$case_id, $sym_no, $date_treat, $sym_id, $des]);

        $pdo = null;
        $stmt = null;

        header("Location: ../disease.php?hn=".$_POST['hn']);
        die();
    }catch(PDOException $e){
        die("Query failed: ".$e->getMessage());
    }
    
}else{
    // header("Location: ../add_patient.php");
    echo "error";
}