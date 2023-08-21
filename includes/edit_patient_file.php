<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $hn = $_POST["hn"];
    $date = $_POST["date"];
    $id = $_POST["id"];

    if (isset($_POST["prename"])) {
        $prename = $_POST["prename"];
    } else {
        echo "Pre-name is not selected!";
    }

    $name = $_POST["name"];
    $lastname = $_POST["lastname"];
    $date2 = $_POST["date2"];
    $age2 = $_POST["age2"];
    $nationality = $_POST["nationality"];
    $status = $_POST["status"];
    $work = $_POST["work"];
    $tel_phone = $_POST["tel_phone"];
    $home_phone = $_POST["home_phone"];
    $address = $_POST["address"];

    if (isset($_POST["province"])) {
        $province = $_POST["province"];
    } else {
        echo "province is not selected!";
    }
    
    
    if (isset($_POST["amphure"])) {
        $aumphur = $_POST["amphure"];
    } else {
        echo "aumphur is not selected!";
    }


    if (isset($_POST["district"])) {
        $tambon = $_POST["district"];
    } else {
        echo "tambon is not selected!";
    }

    $postcode = $_POST["zip_code"];
    $relationship = $_POST["relationship"];
    $relation_name = $_POST["relation_name"];
    $relation_lastname = $_POST["relation_lastname"];
    $relation_phone = $_POST["relation_phone"];
    if (isset($_POST["radio"])) {
        $up_or_down = $_POST["radio"];
    } else {
        echo "up down Please select an option";
    }
    $day = $_POST["day"];
    $kum = $_POST["kum"];
    $thai_month = $_POST["thai_month"];
    $thai_year = $_POST["thai_year"];

    try{
        require_once "bdh.inc.php";

        $query = "UPDATE patient SET reg_date=?,id_person=?,fname=?,lname=?,birth_date=?,career=?,
        home_tel=?,phone_tel=?,nationality=?,p_status=?,contact_fname=?,contact_lname=?,
        contact_relationship=?,contact_tel=?,pre_name=? WHERE HN = $hn";

        $query_address = "UPDATE `address` SET post_id=?,about_address=? WHERE HN=$hn";

        $query_thai_birth = "UPDATE `thai_birth_date` SET `day`=?,up_down=?,night=?,`month`=?,`year`=? WHERE HN=$hn";

        $stmt = $pdo->prepare($query);
        $stmt2 = $pdo->prepare($query_address);
        $stmt3 = $pdo->prepare($query_thai_birth);

        $stmt->execute([$date, $id, $name, $lastname, $date2, $work, $home_phone, $tel_phone, $nationality, $status, $relation_name, $relation_lastname, $relationship, $relation_phone, $prename]);
        $stmt2->execute([$postcode, $address]);
        $stmt3->execute([$day, $up_or_down, $kum, $thai_month, $thai_year]);

        $pdo = null;
        $stmt = null;
        $stmt2 = null;
        $stmt3 = null;

        header("Location: ../edit/edit_history.php?hn=".$_POST['hn']);
        die();
    }catch(PDOException $e){
        echo $e;
    }
    
}else{
    echo "error";
}