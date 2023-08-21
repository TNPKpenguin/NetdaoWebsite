<?php
try{
    $conn = mysqli_connect("localhost","root","","ndclinic") or die("Error: " . mysqli_error($conn));
    mysqli_query($conn, "SET NAMES 'utf8' ");
    error_reporting( error_reporting() & ~E_NOTICE );
    date_default_timezone_set('Asia/Bangkok');

    $stmt = $conn->prepare("DELETE FROM link_sym WHERE case_id = ? and sym_no=?");
    $stmt->bind_param("ii", $_GET['case_id'],$_GET['sym_no']);

    if ($stmt->execute()) {
        // Deletion successful
        echo "Product deleted successfully.";
    } else {
        // Deletion failed
        echo "Error deleting product: " . $conn->error;
    }

    $stmt->close();

    header("Location: ../edit/edit_disease.php?hn=".$_GET['hn']."&case_id=".$_GET['case_id']);
    die();
}catch(PDOException $e){
    die("Query failed: ".$e->getMessage());
}
?>