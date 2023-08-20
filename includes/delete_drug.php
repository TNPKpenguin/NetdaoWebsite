<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "ndclinic";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["case"])) {
    $case = $_POST["case"];
    $no = $_POST["no"];

    $stmt1 = $conn->prepare("DELETE FROM link_drug WHERE case_id = {$case} and drug_no = {$no}");

    echo $dataArray[0];
    if ($stmt1->execute()) {
        echo "Address record deleted successfully<br>";
    } else {
        echo "Error deleting address record: " . $stmt1->error . "<br>";
    }
    $stmt1->close();
}

$conn->close();

?>
