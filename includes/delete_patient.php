<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "ndclinic";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["hn"])) {
    $hn = $_POST["hn"];

    $stmt1 = $conn->prepare("DELETE FROM address WHERE hn = ?");
    $stmt1->bind_param("s", $hn);

    if ($stmt1->execute()) {
        echo "Address record deleted successfully<br>";
    } else {
        echo "Error deleting address record: " . $stmt1->error . "<br>";
    }
    $stmt1->close();

    $stmt2 = $conn->prepare("DELETE FROM bio_information WHERE hn = ?");
    $stmt2->bind_param("s", $hn);

    if ($stmt2->execute()) {
        echo "Bio information record deleted successfully<br>";
    } else {
        echo "Error deleting bio information record: " . $stmt2->error . "<br>";
    }
    $stmt2->close();

    $stmt3 = $conn->prepare("DELETE FROM thai_birth_date WHERE hn = ?");
    $stmt3->bind_param("s", $hn);

    if ($stmt3->execute()) {
        echo "Thai birth date record deleted successfully<br>";
    } else {
        echo "Error deleting Thai birth date record: " . $stmt3->error . "<br>";
    }
    $stmt3->close();

    $stmt4 = $conn->prepare("SELECT case_id FROM his_treat WHERE hn = ?");
    $stmt4->bind_param("s", $hn);
    $stmt4->execute();
    $result = $stmt4->get_result();

    $case_ids = array();
    while ($row = $result->fetch_assoc()) {
        $case_ids[] = $row['case_id'];
    }
    $stmt4->close();

    foreach ($case_ids as $case_id) {
        $stmt5 = $conn->prepare("DELETE FROM link_drug WHERE case_id = ?");
        $stmt5->bind_param("s", $case_id);
        if ($stmt5->execute()) {
            echo "Drug link record deleted successfully<br>";
        } else {
            echo "Error deleting drug link record: " . $stmt5->error . "<br>";
        }
        $stmt5->close();

        $stmt6 = $conn->prepare("DELETE FROM link_sym WHERE case_id = ?");
        $stmt6->bind_param("s", $case_id);
        if ($stmt6->execute()) {
            echo "Symptom link record deleted successfully<br>";
        } else {
            echo "Error deleting symptom link record: " . $stmt6->error . "<br>";
        }
        $stmt6->close();
    }

    $stmt7 = $conn->prepare("DELETE FROM his_treat WHERE hn = ?");
    $stmt7->bind_param("s", $hn);
    if ($stmt7->execute()) {
        echo "Treatment history record deleted successfully<br>";
    } else {
        echo "Error deleting treatment history record: " . $stmt7->error . "<br>";
    }
    $stmt7->close();

    $stmt8 = $conn->prepare("DELETE FROM patient WHERE hn = ?");
    $stmt8->bind_param("s", $hn);

    if ($stmt8->execute()) {
        echo "Patient record deleted successfully<br>";
    } else {
        echo "Error deleting patient record: " . $stmt8->error . "<br>";
    }
    $stmt8->close();
}

$conn->close();

?>
