<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "ndclinic";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["date"])) {
    $date = $_POST["date"];

    $stmt5 = $conn->prepare("DELETE FROM link_drug WHERE date_treat = ?");
    $stmt5->bind_param("s", $date);
    if ($stmt5->execute()) {
        echo "Drug link record deleted successfully<br>";
    } else {
        echo "Error deleting drug link record: " . $stmt5->error . "<br>";
    }
     $stmt5->close();
}

$conn->close();

?>
