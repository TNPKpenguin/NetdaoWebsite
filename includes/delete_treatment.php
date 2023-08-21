<?php
try{
    $conn = mysqli_connect("localhost","root","","ndclinic") or die("Error: " . mysqli_error($conn));
    mysqli_query($conn, "SET NAMES 'utf8' ");
    error_reporting( error_reporting() & ~E_NOTICE );
    date_default_timezone_set('Asia/Bangkok');

    $stmt = $conn->prepare("DELETE FROM his_treat WHERE case_id = ?");
    $stmt->bind_param("i", $_GET['case_id']);

    if ($stmt->execute()) {
        // Deletion successful
        echo "Product deleted successfully.";
    } else {
        // Deletion failed
        echo "Error deleting product: " . $conn->error;
    }

    $stmt->close();

    $stmt2 = $conn->prepare("DELETE FROM link_sym WHERE case_id = ?");
    $stmt2->bind_param("i", $_GET['case_id']);

    if ($stmt2->execute()) {
        // Deletion successful
        echo "Product deleted successfully.";
    } else {
        // Deletion failed
        echo "Error deleting product: " . $conn->error;
    }

    $stmt2->close();

    $stmt3 = $conn->prepare("DELETE FROM link_drug WHERE case_id = ?");
    $stmt3->bind_param("i", $_GET['case_id']);

    if ($stmt3->execute()) {
        // Deletion successful
        echo "Product deleted successfully.";
    } else {
        // Deletion failed
        echo "Error deleting product: " . $conn->error;
    }

    $stmt3->close();

    header("Location: ../Treatment.php?hn=".$_GET['hn']);
    die();
}catch(PDOException $e){
    die("Query failed: ".$e->getMessage());
}
?>