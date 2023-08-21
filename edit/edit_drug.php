<?php
    $con= mysqli_connect("localhost","root","","ndclinic") or die("Error: " . mysqli_error($con));
    mysqli_query($con, "SET NAMES 'utf8' ");
    error_reporting( error_reporting() & ~E_NOTICE );
    date_default_timezone_set('Asia/Bangkok');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple Website</title>
  <!-- Link Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
        <?php include('script.php');?>
        <link rel="stylesheet" href="../css/drug.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script type="text/javascript" src="https://formden.com/static/cdn/formden.js"></script>
        <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
        <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>
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
                    <li class="disabled-link"><a href="MeasureH2.php">ข้อมูลสุขภาพ</a></li>
                    <li class="disabled-link"><a href="Treatment.php">รายการการรักษา</a></li>
                    <li class="disabled-link"><a href="disease.php">การวินิจฉัย</a></li>
                    <li class="actives"><a href="drug.php">การจ่ายยา</a></li>
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

        <form action="../includes/insert_drug_edit.php" method="post">
        <div class="header">
                <div class=container mt-5>
                        <div class="row g-3">
                            <div class="col-md-12 form-group">
                                <label for="name">เลขที่ทั่วไป</label>
                                <input type="text" class="form-control" name="hn" id="hn" placeholder="เลขที่ทั่วไป" readonly value="<?php echo $_GET['hn']?>">
                            </div>

                            <div class="bootstrap-iso" style="background-color: rgb(82, 206, 255)">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-0 col-sm-0 col-xs-0">
                                                <div class="form-group">
                                                    <div class="col-sm-10 col-sm-offset-2">
                                                        <input name="_honey" style="display:none" type="text"/>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>

            <div class="datatable">
                <div class="container mt-4">
                    <div class="form-outline mb-4">
                        </div>
                            <div id="datatable">
                            <div class="table-container" style="height: 400px; overflow: auto;">
                                <table class="table table-bordered">
                                    <thead class="thead-dark" style="position: sticky; top: 0;">
                                        <tr>
                                            <th>ประเภทยา</th>
                                            <th>ชื่อยา</th>
                                            <th>จำนวนยาต่อมื้อ</th>
                                            <th>จำนวนมื้อต่อวัน</th>
                                            <th>จำนวนวัน</th>
                                            <th>รวม</th>
                                            <th>หมายเหตุ</th>
                                            <th>แก้ไข</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                            $sql = "SELECT * FROM link_drug WHERE case_id = {$_GET['case_id']}";
                                            $query = mysqli_query($con, $sql);

                                            while ($row = $query->fetch_assoc()) {
                                                $sql = "SELECT drug_name FROM drug WHERE drug_id = '{$row['drug_id']}'";
                                                $query2 = mysqli_query($con, $sql);
                                                $row2 = $query2->fetch_assoc();
                                                $drug_name = $row2["drug_name"];

                                                $sql = "SELECT drug_type FROM drug WHERE drug_name = '{$drug_name}'";
                                                $query3 = mysqli_query($con, $sql);
                                                $row3 = $query3->fetch_assoc();
                                                $drug_type = $row3["drug_type"];

                                                echo "<tr>";
                                                echo "<td><div class='d-flex align-items-center'><div class='ms-3'><p class='fw-bold mb-1'>" . $drug_type . "</p></div></div></td>";
                                                echo "<td><p class='fw-normal mb-1'>" . $drug_name . "</p></td>";
                                                echo "<td>" . $row['tablet']. "</td>";
                                                echo "<td><div class='d-flex align-items-center'><div class='ms-3'><p class='fw-bold mb-1'>" . $row['perday'] . "</p></div></div></td>";
                                                echo "<td><p class='fw-normal mb-1'>" . $row['amount'] . "</p></td>";
                                                echo "<td><div class='d-flex align-items-center'><div class='ms-3'><p class='fw-bold mb-1'>" . $row['sum'] . "</p></div></div></td>";
                                                echo "<td><p class='fw-normal mb-1'>" . $row['note'] . "</p></td>";
                                                echo "<td><button type='button' class='delete-button' value=".$row['case_id'].",".$row['drug_no']."".">Delete</button></td>";
                                                echo "</tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
            <br>

            <div class="container mt-4">
            <div class="row">
                <!-- First Column -->
                <div class="col-sm-5">
                    <div class="table-container" style="height: 250px; overflow: auto;">
                        <table class="table table-bordered">
                            <thead class="thead-dark" style="position: sticky; top: 0;">
                                <tr>
                                    <th>ประเภทยา</th>
                                    <th>ชื่อยา</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "SELECT * FROM link_drug WHERE case_id = (SELECT case_id FROM his_treat WHERE HN='{$_GET['hn']}' ORDER by case_id DESC LIMIT 1)";
                                    $query = mysqli_query($con, $sql);

                                    $row = $query->fetch_assoc();

                                    $sql = "SELECT * FROM link_drug WHERE case_id = (SELECT case_id FROM his_treat WHERE HN='{$_GET['hn']}' ORDER by case_id DESC LIMIT 1)";
                                    $query = mysqli_query($con, $sql);

                                    while ($row = $query->fetch_assoc()) {
                                        $sql = "SELECT drug_name FROM drug WHERE drug_id = '{$row['drug_id']}'";
                                        $query2 = mysqli_query($con, $sql);
                                        $row2 = $query2->fetch_assoc();
                                        $drug_name = $row2["drug_name"];

                                        $sql = "SELECT drug_type FROM drug WHERE drug_name = '{$drug_name}'";
                                        $query3 = mysqli_query($con, $sql);
                                        $row3 = $query3->fetch_assoc();
                                        $drug_type = $row3["drug_type"];

                                        
                                        echo "<tr>";
                                        echo "<td><div class='d-flex align-items-center'><div class='ms-3'><p class='fw-bold mb-1'>" . $drug_type . "</p></div></div></td>";
                                        echo "<td><p class='fw-normal mb-1'>" . $drug_name . "</p></td>";
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Second Column -->
                <div class="col-sm-7">
                    <div class="forth-box">
                                <div >
                                    <div class="container mt-5">
                                            <div class="row g-3">                    
                                                <div class="col-sm-2" id="day">
                                                    <label id="head-label" class="visually-hidden" for="inlineFormSelectPref">ประเภทยา</label>
                                                    <select class="form-select" id="drug_type">
                                                    <option selected disabled>-</option>
                                                        <?php include('../drug_type.php'); ?>
                                                    </select>
                                                </div>

                                                

                                                <div class="col-sm-2" id="day">
                                                    <label id="head-label" class="visually-hidden" for="inlineFormSelectPref">ชื่อยา</label>
                                                    <select class="form-select" id="drug_name" name="drug_name">
                                                    </select>
                                                </div>
                                                
                                                <br>
                                                <div class="up-down">
                                                    <form class="w1-container w1-card-2">
                                                    <div class="up_down" style="margin-right : 40px; margin-left:20px">
                                                        <input type="radio" name="radio" value="ก่อนอาหาร" checked>  ก่อนอาหาร
                                                        <br><br>
                                                        <input type="radio" name="radio" value="หลังอาหาร">  หลังอาหาร
                                                    </div>  
                                                </div> 
                                            </div> 
                                            <br><br>

                                            <div class="col-sm-2" id="day">
                                                    <label id="head-label" class="visually-hidden" for="inlineFormSelectPref">วิธีจ่ายยา</label>
                                                    <select class="form-select" id="tablet" name="tablet">
                                                    <option selected disabled>-</option>
                                                    <option value="1">oid</option>
                                                    <option value="2">bid</option>
                                                    <option value="3">tid</option>
                                                    </select>
                                                </div> 
                                            

                                            <div class="col-sm-2">        
                                                    <label id="head-label"  for="email">จำนวนต่อครั้ง</label>
                                                    <input type="text" name="amount" id="amount" class="form-control" placeholder="เบอร์ผู้ติดต่อ" aria-label="State">
                                                    
                                            </div> 
                                               
                                            <div class="col-sm-2">        
                                                    <label id="head-label"  for="email">จำนวนวัน</label>
                                                    <input type="text" name="perday" id="perday" class="form-control" placeholder="เบอร์ผู้ติดต่อ" aria-label="State">   
                                            </div> 


                                            <!-- <div class="col-sm-2">        
                                                    <label id="head-label"  for="email">สรุป</label>
                                                    <input type="text" class="form-control" placeholder="เบอร์ผู้ติดต่อ" aria-label="State">        
                                            </div>   -->
                                        </div>
                                        <div class="col-md-11 form-group" style="margin-top:20px">
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                <a href="patient.php" style="margin-left:30px">
                                                <button type="submit">บันทึก</button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <a href="../Treatment.php?hn=<?php echo $_GET['hn']; ?>">
                                            <button type="button" class="btn btn-primary">ถัดไป</button>
                                        </a>
                                        <a href="../patient.php" style="margin-left:30px">
                                            <button type="button" class="btn btn-primary">จบการทำงาน</button>
                                        </a>
                                    </div>
                                </div>                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

        <!-- Include Date Range Picker -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>


        <script>
            $(document).ready(function () {
                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').toggleClass('active');
                    $(this).toggleClass('active');
                });
            });

            $(document).ready(function () {
                $(document).on("click", ".delete-button", function () {
                    var hn = $(this).val();
                    sub = hn.split(",");
                    var confirmDelete = confirm("Are you sure you want to delete this record ?");
                    if (confirmDelete) {

                        $.ajax({
                            type: "POST", 
                            url: "../includes/delete_drug.php",
                            data: { case: sub[0], no: sub[1]}, 
                            success: function(response) {
                                alert("Record has been deleted!");
                                location.reload();
                            },
                            error: function(xhr, status, error) {
                                alert("An error occurred while deleting the record: " + error);
                            }
                        });
                    }else{
                        alert("Cancled");
                    }
                });
            });
        </script>

    </body>
</html>

<?php include('script.php');?>