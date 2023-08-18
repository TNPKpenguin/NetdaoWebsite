<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $hn = $_POST["hn"];
    $his = $_POST["his"];
    $fam_his = $_POST["fam_his"];
    $food_his = $_POST["food_his"];
    $drug_his = $_POST["drug_his"];
    $disease_his = $_POST["disease_his"];

    try{
        require_once "bdh.inc.php";
        
        $query = "UPDATE patient SET his_sick = ?, his_fam_sick = ?, food_allergy = ?, drug_allergy = ?, congenital_disease = ? WHERE hn = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$his, $fam_his, $food_his, $drug_his, $disease_his, $hn]);


        $pdo = null;
        $stmt = null;

        header("Location: ../MeasureH2.php?hn=".$_POST['hn']);
        die();
    }catch(PDOException $e){
        die("Query failed: ".$e->getMessage());
    }
    
}else{
    // header("Location: ../add_patient.php");
    echo "error";
}