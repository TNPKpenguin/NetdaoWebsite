<?php
    $con= mysqli_connect("localhost","root","","ndclinic") or die("Error: " . mysqli_error($con));
    mysqli_query($con, "SET NAMES 'utf8' ");
    error_reporting( error_reporting() & ~E_NOTICE );
    date_default_timezone_set('Asia/Bangkok');
    
    $sql = "SELECT case_id FROM his_treat order by case_id DESC LIMIT 1";
    $query = mysqli_query($con,$sql);
    $row = $query->fetch_assoc();

    $caseid = $row['case_id'] + 1;

    setlocale(LC_TIME, 'th_TH');
    $date_time = date("Y-m-d H:i:s");
    $date_time_thai = date("Y-m-d H:i:s", strtotime($date_time));

    $hn = $_GET['hn'];
    $staff = 0;

    try{
        require_once "bdh.inc.php";

        $query = "INSERT INTO his_treat(case_id, date_treat, HN,staff_id) VALUES (?,?,?,?)";

        $stmt = $pdo->prepare($query);

        $stmt->execute([$caseid,$date_time_thai, $hn,$staff]);

        $pdo = null;
        $stmt = null;

        header("Location: ../disease.php?hn=".$_GET['hn']);
        die();
    }catch(PDOException $e){
        die("Query failed: ".$e->getMessage());
    }

?>