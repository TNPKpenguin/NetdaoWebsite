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
<body onload="updateVariableValueDisplay()">
<link rel="stylesheet" href="css/disease.css">
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
            $sql= "SELECT DISTINCT(sym_pos) FROM symptoms";
            $query = mysqli_query($con, $sql);

            $sql2= "SELECT sym_name FROM symptoms WHERE sym_pos like 'ระบบทางเดินอาหาร'";
            $query2 = mysqli_query($con, $sql2); 
        ?>
        <div class="wrapper">
            <nav id="sidebar">
                <!-- Sidebar Header -->
                <div class="sidebar-header">
                    <h3>กรอกข้อมูลคนไข้</h3>
                </div>
                <!-- Sidebar Links -->
                <ul class="list-unstyled components">
                    <li><a href="add_patient.php">ข้อมูลผู้ป่วย</a></li>
                    <li><a href="history.php">ประวัติการเจ็บป่วย</a></li>
                    <li><a href="MeasureH2.php">ข้อมูลสุขภาพ</a></li>
                    <li><a href="Treatment.php">รายการการรักษา</a></li>
                    <li class="active"><a href="disease.php">การวินิจฉัย</a></li>
                    <li><a href="drug.php">การจ่ายยา</a></li>
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
            <form action="includes/insert_disease.php" method="post">
            <div class="header">
                <div class=container mt-5>
                        <div class="row g-3">
                            <div class="col-md-9 form-group">
                                <label for="name">เลขที่ทั่วไป</label>
                                <input type="text" class="form-control" id="name" placeholder="เลขที่ทั่วไป">
                            </div>

                            <div class="bootstrap-iso" style="background-color: rgb(82, 206, 255)">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-0 col-sm-0 col-xs-0">
                                            <div class="form-group ">
                                                <label class="control-label col-sm-2 requiredField" for="date" style="padding-left:33px">
                                                    Date
                                                </label>
                                            <div class="col-sm-16" style="padding-left:18px">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                <input class="form-control" id="date" name="date" placeholder="MM/DD/YYYY" type="text"/>
                                                </div>
                                            </div>
                                            </div>
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

                                           
    <div class="container">
    <div class="row">
        <!-- <div class="col">
            <br><br><br><br><br>
            <img src="src/test.png" alt="..." class="rounded mx-auto d-block">
        </div> -->

        
        <div class="col">
        <br><br>
            <div class="first-box">
                    <div class="form-group">
                        <!-- <label for="name">ระบบ</label> -->
                        <label for="system_name">ระบบ</label>
                        <div class="col-sm-12" id="day">
                            <select class="form-control" id="sytem_disease" style="margin-bottom:20px; width:100%; height:35px" name="day">
                                <option selected disabled>-</option>
                                <?php foreach ($query as $value) { ?>
                                <option value="<?=$value['sym_pos']?>"><?=$value['sym_pos']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">ชื่อโรค</label>
                        <div class="col-sm-12" id="day">
                            <select class="form-control" id="name_disease" style="margin-bottom:20px; width:100%; height:35px" name="day">
                            </select>
                        </div>
                    </div>

                    <br>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">ประวัติการเจ็บป่วย</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
                    </div>

                    <button type="button" class="btn btn-primary">บันทึก</button>

                    <div class="form-outline mb-1">
                    </div>
                    <div id="datatable">
                    </div>    
                    <br><br>
                    <table class="table align-middle mb-0 bg-white">
                        <thead class="bg-light">
                            <tr>
                                <th>ลำดับที่</th>
                                <th>ชื่อโรค</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <?php include('display_data.php'); ?> -->
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
                              
            

  <!-- Link Bootstrap JS and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="javascript/store.js"></script>
</body>
</html>

<?php include('includes/script.php');?>