<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $hn = $_POST["hn"];
    $name = $_POST["name"];
    $id = $_POST["id"];

    try{
        require_once "bdh.inc.php";
        
        $query = "INSERT INTO test (hn, name, id) VALUES (?, ?, ?);";
        $stmt = $pdo->prepare($query);

        $stmt->execute([$hn, $name, $id]);

        $pdo = null;
        $stmt = null;

        die();
        header("Location: ..web_netdao/index.php");
    }catch(PDOException $e){
        die("Query failed: ".$e->getMessage());
    }
    
}else{
    header("Location: ..web_netdao/index.php");
    //echo "error";
}