<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    setlocale(LC_TIME, 'th_TH');
    $hn = $_POST["hn"];
    $date_time = date("Y-m-d H:i:s");
    $date_time_thai = date("Y-m-d H:i:s", strtotime($date_time) + 5 * 3600);
    $weight = $_POST["weight"];
    $height = $_POST["height"];
    $temp = $_POST["temp"]; 
    $blood_pressure = $_POST["blood_pressure"];
    $pulse = $_POST["pulse"];
    $breath = $_POST["breath"];
    
    try{
        require_once "bdh.inc.php";
        
        $query = "UPDATE bio_information SET date_measure=?, weight=?, height=?, pulse=?,	breath=?,	temperature=?, blood_pressure=? WHERE hn = ?";

        $stmt = $pdo->prepare($query);

        $stmt->execute([$date_time_thai, $weight, $height, $pulse, $breath,  $temp, $blood_pressure,  $hn]);

        $pdo = null;
        $stmt = null;

        header("Location: ../Treatment.php?hn=".$_POST['hn']);
        die();
    }catch(PDOException $e){
        die("Query failed: ".$e->getMessage());
    }
    
}else{
    // header("Location: ../add_patient.php");
    echo "error";
}