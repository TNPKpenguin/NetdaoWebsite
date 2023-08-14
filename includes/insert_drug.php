<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $case_id = $_POST("");
    $drug_id = $_drug_id("");
    $tablet = $_POST("");
    $amount = $_POST("");
    $perday = $_POST("");
    $sum = $_POST("");
    $note = $_POST("");
    $date_treat = $_POST("");

    try{
        require_once "bdh.inc.php";

        $query = "INSERT INTO link_drug(`case_id`, `drug_no`, `drug_id`, `tablet`, `amount`, `perday`, `sum`,`note`, `date_treat`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $pdo->prepare($query);

        $stmt->execute([$case_id, $drug_id, $tablet , $amount, $perday, $sum,  $temp, $note, $date_treat]);

        $pdo = null;
        $stmt = null;

        header("Location: ../drug.php");
        die();
    }catch(PDOException $e){
        die("Query failed: ".$e->getMessage());
    }
    
}else{
    // header("Location: ../add_patient.php");
    echo "error";
}