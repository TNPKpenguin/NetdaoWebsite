<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    setlocale(LC_TIME, 'th_TH');
    $date_time = date("Y-m-d H:i:s");
    $date_time_thai = date("Y-m-d H:i:s", strtotime($date_time) + 5 * 3600);
    $case_id = $_POST["case_id"];
    $sym_no = $POST["sym_no"];
    $sym_id = $POST["sym_id"];
    $sym_des = $_POST["sym_des"];

    try{
        require_once "bdh.inc.php";

        $query = "INSERT INTO link_sym (case_id, sym_no, date_treat, sym_id, sym_des)  VALUES (?, ?, ?, ?, ?)";

        $stmt = $pdo->prepare($query);

        $stmt->execute([$date_time_thai, $hn, $weight, $height, $pulse, $breath,  $temp, $blood_pressure]);

        $pdo = null;
        $stmt = null;

        header("Location: ../Treatment.php");
        die();
    }catch(PDOException $e){
        die("Query failed: ".$e->getMessage());
    }
    
}else{
    // header("Location: ../add_patient.php");
    echo "error";
}