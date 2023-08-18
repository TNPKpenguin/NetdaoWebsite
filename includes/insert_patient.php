<?php
echo "success";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $hn = $_POST["hn"];
    $date = $_POST["date"];
    $id = $_POST["id"];

    if (isset($_POST["prename"])) {
        $prename = $_POST["prename"];
        echo "prename Selected pre-name: " . $prename;
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
        echo "province Selected pre-name: " . $province;
    } else {
        echo "province is not selected!";
    }
    
    
    if (isset($_POST["amphure"])) {
        $aumphur = $_POST["amphure"];
        echo "aumphur Selected pre-name: " . $amphure;
    } else {
        echo "aumphur is not selected!";
    }


    if (isset($_POST["district"])) {
        $tambon = $_POST["district"];
        echo "tambon Selected pre-name: " . $tambon;
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
        echo "up down Selected option: " . $up_or_down;
    } else {
        echo "up down Please select an option";
    }
    $day = $_POST["day"];
    $kum = $_POST["kum"];
    $thai_month = $_POST["thai_month"];
    $thai_year = $_POST["thai_year"];

    try{
        require_once "bdh.inc.php";
        
        $query = "INSERT INTO patient (HN, reg_date, id_person, fname, lname, birth_date, career, home_tel, phone_tel, nationality, p_status, contact_fname, contact_lname, contact_relationship, contact_tel, pre_name) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
        $query_address = "INSERT INTO address (HN, post_id, about_address) VALUES (?, ?, ?)";
        $query_thai_birth = "INSERT INTO thai_birth_date (HN, day, up_down, night, month, year) VALUES (?, ?, ?, ?, ?, ?)";


        $stmt = $pdo->prepare($query);
        $stmt2 = $pdo->prepare($query_address);
        $stmt3 = $pdo->prepare($query_thai_birth);

        $stmt->execute([$hn, $date, $id, $name, $lastname, $date2, $work, $home_phone, $tel_phone, $nationality, $status, $relation_name, $relation_lastname, $relationship, $relation_phone, $prename]);
        $stmt2->execute([$hn, $postcode, $address]);
        $stmt3->execute([$hn, $day, $up_or_down, $kum, $thai_month, $thai_year]);



        $pdo = null;
        $stmt = null;
        $stmt2 = null;
        $stmt3 = null;

        header("Location: ../history.php?hn=".$_POST['hn']);
        die();
    }catch(PDOException $e){
        echo "error";
    }
    
}else{
    // header("Location: ../add_patient.php");
    echo "error";
}