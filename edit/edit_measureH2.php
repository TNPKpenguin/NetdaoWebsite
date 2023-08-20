<?php
$con= mysqli_connect("localhost","root","","ndclinic") or die("Error: " . mysqli_error($con));
mysqli_query($con, "SET NAMES 'utf8' ");
error_reporting( error_reporting() & ~E_NOTICE );
date_default_timezone_set('Asia/Bangkok');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>เพิ่มข้อมูลผู้ป่วย</title>
        <!-- Link Bootstrap CSS -->
        
    </head>
    <body>
        <link rel="stylesheet" href="../css/Treatment.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script type="text/javascript" src="https://formden.com/static/cdn/formden.js"></script>
        <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
        <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>
        <?php
        $sql= "SELECT * FROM patient where HN='{$_GET['hn']}'";
        $query = mysqli_query($con, $sql);
        $row = $query->fetch_assoc();
        ?>
        <div class="wrapper">
            <nav id="sidebar">
                <!-- Sidebar Header -->
                <div class="sidebar-header">
                    <h3>กรอกข้อมูลคนไข้</h3>
                </div>
                <!-- Sidebar Links -->
                <ul class="list-unstyled components">
                    <li class="disabled-link"><a href="add_patient.php">ข้อมูลผู้ป่วย</a></li>
                    <li class="disabled-link"><a href="history.php">ประวัติการเจ็บป่วย</a></li>
                    <li class="actives"><a href="MeasureH2.php">ข้อมูลสุขภาพ</a></li>
                    <li class="disabled-link"><a href="Treatment.php">รายการการรักษา</a></li>
                    <li class="disabled-link"><a href="disease.php">การวินิจฉัย</a></li>
                    <li class="disabled-link"><a href="drug.php">การจ่ายยา</a></li>
                </ul>
            </nav>

            <div id="content">
                <button type="button" id="sidebarCollapse" class="navbar-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <!-- Add your content here on the right side of the sidebar -->
        <div class="content-right">
        <?php

            $servername = "127.0.0.1";
            $username = "root";
            $password = "";
            $dbname = "ndclinic";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM patient WHERE HN = '{$_GET['hn']}';";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            $sql2 = "SELECT * FROM bio_information WHERE HN = '{$_GET['hn']}';";
            $result2 = $conn->query($sql2);
            $row2 = $result2->fetch_assoc();
            if ($result->num_rows > 0) {
                    echo '<form action="../includes/edit_measure_file.php" method="post">';
                    echo '    <div class="header">';
                    echo '        <div class="container mt-5">';
                    echo '            <div class="row g-3">';
                    echo '                <div class="col-md-12 form-group">';
                    echo '                    <label for="name">เลขที่ทั่วไป</label>';
                    echo '                    <input type="text" class="form-control" id="hn" name="hn" placeholder="เลขที่ทั่วไป" readonly value="'.$row["HN"].'">';
                    echo '                </div>';
                    echo '            </div>';
                    echo '        </div>';
                    echo '    </div>';
                    echo '    <br><br><br>';
                    echo '    <div class="first-box">';
                    echo '        <div class="container mt-5">';
                    echo '            <div class="row g-3">';
                    echo '                <div class="col-md-6 form-group">';
                    echo '                    <label id="head-label" for="name">ชื่อ</label>';
                    echo '                    <input class="w3-input" type="text" placeholder="" name="name" disabled id="name" value="'.$row["fname"].'">';
                    echo '                </div>';
                    echo '                <div class="col-md-6 form-group">';
                    echo '                    <label id="head-label" for="name">นามสกุล</label>';
                    echo '                    <input class="w3-input " type="text" placeholder="" name="lastname" disabled id="lastname" value="'.$row["lname"].'">';
                    echo '                </div>';
                    echo '            </div>';
                    echo '            <br><br><br><br><br>';
                    echo '            <div class="row g-3">';
                    echo '                <div class="col-md-6 form-group">';
                    echo '                    <label id="head-label" for="name">น้ำหนัก</label>';
                    echo '                    <input class="w3-input" type="text" placeholder="" name="weight" value="'.$row2["weight"].'">';
                    echo '                </div>';
                    echo '                <div class="col-md-6 form-group">';
                    echo '                    <label id="head-label" for="name">ส่วนสูง</label>';
                    echo '                    <input class="w3-input" type="text" placeholder="" name="height" value="'.$row2["height"].'">';
                    echo '                </div>';
                    echo '            </div>';
                    echo '            <br><br><br><br><br>';
                    echo '            <div class="row g-3">';
                    echo '                <div class="col-md-6 form-group">';
                    echo '                    <label id="head-label" for="name">อุณหภูมิ</label>';
                    echo '                    <input class="w3-input" type="text" placeholder="" name="temp" value="'.$row2["temperature"].'">';
                    echo '                </div>';
                    echo '                <div class="col-md-6 form-group">';
                    echo '                    <label id="head-label" for="name">ความดันเลือด</label>';
                    echo '                    <input class="w3-input" type="text" placeholder="" name="blood_pressure" value="'.$row2["blood_pressure"].'">';
                    echo '                </div>';
                    echo '            </div>';
                    echo '            <br><br><br><br><br>';
                    echo '            <div class="row g-3">';
                    echo '                <div class="col-md-6 form-group">';
                    echo '                    <label id="head-label" for="name">ชีพจร</label>';
                    echo '                    <input class="w3-input" type="text" placeholder="" name="pulse" value="'.$row2["pulse"].'">';
                    echo '                </div>';
                    echo '                <div class="col-md-6 form-group">';
                    echo '                    <label id="head-label" for="name">การหายใจ</label>';
                    echo '                    <input class="w3-input" type="text" placeholder="" name="breath" value="'.$row2["breath"].'">';
                    echo '                </div>';
                    echo '            </div>';
                    echo '            <div class="col-md-12 form-group" style="width:100%; margin-top:30px">';
                    echo '                <div class="d-grid gap-2 d-md-flex justify-content-md-end">';
                    echo '                    <button type="submit">ถัดไป</button>';
                    echo '                </div>';
                    echo '            </div>';
                    echo '        </div>';
                    echo '    </div>';
                    echo '</form>';
            }

        ?>
        


                                
        <!-- Link Bootstrap JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="javascript/store.js"></script>

        <!-- Include Date Range Picker -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
        <script>
            $(document).ready(function(){
                var date_input=$('input[name="date"]'); //our date input has the name "date"
                var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
                date_input.datepicker({
                    format: 'mm/dd/yyyy',
                    container: container,
                    todayHighlight: true,
                    autoclose: true,
                })
            })

            $(document).ready(function () {
                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').toggleClass('active');
                    $(this).toggleClass('active');
                });
            });

            $(document).ready(function() {
                $("#weight").on('change', function(){
                    var value = $(this).val();
                    window.alert(value);
                })
            })
        </script>
    </body>
</html>