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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <link rel="stylesheet" href="css/add_patient.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script type="text/javascript" src="https://formden.com/static/cdn/formden.js"></script>
        <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
        <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>
        <?php include('includes/script.php');?>
        <?php
            $sql_provinces = "SELECT * FROM provinces";
            $query = mysqli_query($con, $sql_provinces);
        ?>
        <div class="wrapper">
            <nav id="sidebar">
                <!-- Sidebar Header -->
                <div class="sidebar-header">
                    <h3>กรอกข้อมูลคนไข้</h3>
                </div>
                <!-- Sidebar Links -->
                <ul class="list-unstyled components">
                    <li class="active"><a href="add_patient.php">ข้อมูลผู้ป่วย</a></li>
                    <li><a href="history.php">ประวัติการเจ็บป่วย</a></li>
                    <li><a href="MeasureH2.php">ข้อมูลสุขภาพ</a></li>
                    <li><a href="Treatment.php">รายการการรักษา</a></li>
                    <li><a href="disease.php">การวินิจฉัย</a></li>
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
        <main>
        <form action="includes/insert_patient.php" method="post"> 
        <div class="header">
            <div class=container mt-5>
                    <div class="row g-3">
                        <div class="col-md-9 form-group">
                            <label for="name">เลขที่ทั่วไป</label>
                            <input type="text" class="form-control" id="hn" placeholder="เลขที่ทั่วไป" name="hn">
                        </div>

                        <div class="bootstrap-iso" style="background-color: rgb(82, 206, 255)">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-0 col-sm-0 col-xs-0">
                                        
                                        <div class="form-group ">
                                            <label class="control-label col-sm-2 requiredField" for="date" style="padding-left:33px">
                                                Date
                                            </label>
                                        <br>
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

        <main>     
        <div class="first-box">
            <div class="container mt-5">

                    <div class="row g-3">
                        <div class="col-md-12 form-group">
                            <label id="head-label" for="id">หมายเลขบัตรประชาชน/เลขหนังสือเดินทาง/เลขต่างด้าว</label>
                            <input class="w3-input" type="text" placeholder="" name="id">
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-sm-1">
                            <label class="visually-hidden" name="pre_name">คำนำหน้า</label>
                            <br>
                            <select class="form-select" id="prename" name="prename">
                            <option selected>-</option>
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว">นางสาว</option>
                            <option value="เด็กชาย">เด็กชาย</option>
                            <option value="เด็กหญิง">เด็กหญิง</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="name">ชื่อ</label>
                            <input class="w3-input" type="text" placeholder="" name="name" id="name">
                        </div>
                        <div class="col-sm-5">
                            <label for="lastname">นามสกุล</label>
                            <input class="w3-input" type="text" placeholder="" name="lastname" id="lastname">
                        </div>
                    </div>    

                    <div class="row g-3">
                    <div class="bootstrap-iso" style="background-color: rgb(255, 255, 255)">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-0 col-sm-0 col-xs-0">
                                        
                                        <div class="form-group ">
                                            <label class="control-label col-sm-2 requiredField" for="date" style="padding-left:33px">
                                                Date
                                            </label>
                                        <br>
                                        <div class="col-sm-16" style="padding-left:18px">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                            <input class="form-control" id="date2" name="date2" placeholder="MM/DD/YYYY" type="text"/>
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
                        <div class="col-md-4 form-group">
                            <label for="age">อายุ</label>
                            <input class="w3-input" type="text" placeholder="" name="age2">
                        </div>
                        <div class="col-md-5 form-group">
                            <label for="nationality">สัญชาติ</label>
                            <input class="w3-input" type="text" placeholder="" name="nationality">
                        </div>

                        <div class="col-sm-1">
                            <label class="visually-hidden" for="status">สถานภาพ</label>
                            <br>
                            <select class="form-select" id="inlineFormSelectPref" name="status">
                            <option selected>-</option>
                            <option value="โสด">โสด</option>
                            <option value="หม้าย">หม้าย</option>
                            <option value="หย่าร้าง">หย่าร้าง</option>
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="work">อาชีพ</label>
                            <input class="w3-input" type="text" placeholder="" name="work">
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="tel_phone">เบอร์โทรศัพท์มือถือ</label>
                            <input class="w3-input" type="text" placeholder="" name="tel_phone">
                        </div>
                        <div class="col-md-4 form-group">
                            <label name="tel_home">เบอร์โทรศัพท์บ้าน</label>
                            <input class="w3-input" type="text" placeholder="" name="home_phone">
                        </div>
                    </div>
                    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
            </div>
        </div>
        
        <div class="second-box">
            <div class="container">
                    <div class="row g-3">
                        <div class="col-md-12 form-group">
                            <label id="head-label" for="address">ที่อยู่ปัจจุบัน</label>
                            <input class="w3-input" type="text" placeholder="" name="address">
                        </div>


                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="sel1">จังหวัด:</label>
                                <select class="form-control" name="province" id="province">
                                        <option value="" selected disabled>-กรุณาเลือกจังหวัด-</option>
                                        <?php foreach ($query as $value) { ?>
                                        <option value="<?=$value['code']?>"><?=$value['name_th']?></option>
                                        <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                    <label for="sel1">อำเภอ:</label>
                                    <select class="form-control" name="amphure" id="amphure">
                                    </select>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="sel1">ตำบล:</label>
                                <select class="form-control" name="district" id="district">
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <label for="sel1">รหัสไปรษณีย์:</label>
                            <input type="text" name="zip_code" id="zip_code" class="form-control" readonly value="">
                        </div>
                    </div>
                    </div>    
                    
            </div>
        
        <div class="third-box">
            <div class="container mt-5">
                    <div class="row g-3">

                        <div class="col-sm-2">
                            <label id="head-label" class="visually-hidden" for="pre_name2">เกี่ยวข้องเป็น</label>
                            <select class="form-select" id="prename" name="relationship" style="width:130px">
                            <option selected >-</option>
                            <option value="พ่อ">พ่อ</option>
                            <option value="แม่">แม่</option>
                            <option value="ญาติ">ญาติ</option>
                            <option value="อื่นๆ">อื่นๆ</option>
                            </select>
                        </div>

                        <div class="col-sm-3">
                            <label id="head-label" for="relation_name">ชื่อผู้ติดต่อ</label>
                            <input class="w3-input" type="text" placeholder="" name="relation_name">
                        </div>
                        <div class="col-sm-3">
                            <label id="head-label" for="relation_lastname">นามสกุลผู้ติดต่อ</label>
                            <input class="w3-input" type="text" placeholder="" name="relation_lastname">
                        </div>

                           
                        <div class="col-sm-4">
                            <label id="head-label" for="relation_phone">เบอร์ผู้ติดต่อ</label>
                            <input class="w3-input" type="text" placeholder="" name="relation_phone">
                        </div>  
                    </div> 
                 </div>
            </div>
        </div>

        <div class="forth-box">
            <div class="container mt-5">
                    <div class="row g-3">                    
                        <div class="up_down" style="margin-right : 40px; margin-left:20px">
                            <input type="radio" name="radio" value="ข้างขึ้น" checked>  ขึ้น
                            <br><br>
                            <input type="radio" name="radio" value="ข้าางแรม">  แรม
                        </div>                          

                        <div class="col-sm-2" id="day">
                            <label id="head-label-day" class="visually-hidden" for="day">วัน</label>
                            <select class="form-select" id="inlineFormSelectPref" style="width:140px;" name="day">
                            <option selected>-</option>
                            <option value="อาทิตย์">อาทิตย์</option>
                            <option value="จันทร์">จันทร์</option>
                            <option value="อังคาร">อังคาร</option>
                            <option value="พุธ">พุธ</option>
                            <option value="พฤหัสบดี">พฤหัสบดี</option>
                            <option value="ศุกร์">ศุกร์</option>
                            <option value="เสาร์">เสาร์</option>
                            </select>
                        </div>
                        <div class="col-sm-2">        
                            <label id="head-label"  for="kum">ค่ำ</label>
                            <input class="w3-input" type="text" placeholder="" name="kum">              
                        </div>  

                        <div class="col-sm-3">                 
                            <label id="head-label"  for="thai_month">เดือนเกิดไทย</label>
                            <input class="w3-input" type="text" placeholder="" name="thai_month">
                        </div>  

                        <div class="col-sm-3">                 
                            <label id="head-label"  for="thai_year">ปีเกิดไทย</label>
                            <input class="w3-input" type="text" placeholder="" name="thai_year">
                        </div>
                        <div>
                                <a href="history.php"><button type="submit" onclick="saveToLocalStorage()">ถัดไป</button></a>
                            </div>
                         </div> 
                    </div>
            </div>
        </div>
                </div>
            </div>
        </div>
        </form>
        <main>



                                
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

            $(document).ready(function(){
                var date_input=$('input[name="date2"]'); //our date input has the name "date"
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
        </script>
    </body>
</html>

<?php include('includes/script.php');?>
