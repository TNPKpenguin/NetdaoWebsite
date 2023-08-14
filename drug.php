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
        <link rel="stylesheet" href="css/drug.css">
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
                    <li><a href="add_patient.php">ข้อมูลผู้ป่วย</a></li>
                    <li><a href="history.php">ประวัติการเจ็บป่วย</a></li>
                    <li><a href="MeasureH2.php">ข้อมูลสุขภาพ</a></li>
                    <li><a href="Treatment.php">รายการการรักษา</a></li>
                    <li><a href="disease.php">การวินิจฉัย</a></li>
                    <li class="active"><a href="drug.php">การจ่ายยา</a></li>
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


        <div class="header">
            <div class="container mt-5">
                    <form>
                        <div class="row g-3">
                            <div class="col-md-4 form-group">
                                <label id="head-label" for="name">เลขที่ทั่วไป : </label>
                            </div>

                            <div class="col-md-4 form-group">
                                <label id="head-label" for="name">ชื่อ - นามสกุล</label>
                            </div>

                            <div class="col-md-4 form-group">
                                <label id="head-label" for="name">อายุ</label>
                            </div>

                            <div class="col-md-4 form-group">
                                <label id="head-label" for="name">น้ำหนัก</label>
                            </div>

                            <div class="col-md-4 form-group">
                                <label id="head-label" for="name">ส่วนสูง</label>
                                </div>  
                            </div> 
                        </div>
                    </form>
                </div>

                
                <div class="container mt-4">
                    <div class="form-outline mb-4">
                        </div>
                            <div id="datatable">
                        </div>    
                        <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                        <th>ประเภทยา</th>
                        <th>ชื่อยา</th>
                        <th>จำนวนยาต่อมื้อ</th>
                        <th>จำนวนมื้อต่อวัน</th>
                        <th>จำนวนวัน</th>
                        <th>รวม</th>
                        <th>หมายเหตุ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include('display_data.php'); ?>
                    </tbody>
                </table>
            </div>


            <br><br><br><br><br><br>

            <div class="container mt-4">
            <div class="row">
                <!-- First Column -->
                <div class="col-sm-6">
                    <div id="datatable">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ประเภทยา</th>
                                    <th>ชื่อยา</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php include('display_data.php'); ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Second Column -->
                <div class="col-sm-6">
                    <div class="forth-box">
                            <form>
                                <div class="forth-box">
                                    <div class="container mt-5">
                                        <form>
                                            <div class="row g-3">                    
                                                <div class="col-sm-2" id="day">
                                                    <label id="head-label" class="visually-hidden" for="inlineFormSelectPref">ประเภทยา</label>
                                                    <select class="form-select" id="inlineFormSelectPref">
                                                    <option selected disabled>-</option>
                                                    <?php include('drug_type.php'); ?>
                                                    </select>
                                                </div>

                                                

                                                <div class="col-sm-2" id="day">
                                                    <label id="head-label" class="visually-hidden" for="inlineFormSelectPref">วิธีจ่ายยา</label>
                                                    <select class="form-select" id="inlineFormSelectPref">
                                                    <option selected disabled>-</option>
                                                    <option value="1">oid</option>
                                                    <option value="2">bid</option>
                                                    <option value="3">tid</option>
                                                    </select>
                                                </div> 
                                                
                                                <br>
                                                <div class="up-down">
                                                    <form class="w1-container w1-card-2">
                                                        <div>
                                                            <input class="w3-radio" type="radio" name="gender" value="male" checked>
                                                            <label>ขึ้น</label></p>
                                                        </div>
                                                        <div>
                                                            <input class="w3-radio" type="radio" name="gender" value="male" checked>
                                                            <label>ขึ้น</label></p>
                                                        </div>
                                                    </form>  
                                                </div> 
                                            </div> 

                                            <div class="col-sm-2" id="day">
                                                    <label id="head-label" class="visually-hidden" for="inlineFormSelectPref">ชื่อยา</label>
                                                    <select class="form-select" id="inlineFormSelectPref">
                                                    <option selected>-</option>
                                                    <option value="1">นาย</option>
                                                    <option value="2">นาง</option>
                                                    <option value="3">นางสาว</option>
                                                    <option value="4">เด็กชาย</option>
                                                    <option value="5">เด็กหญิง</option>
                                                    </select>
                                            </div>

                                            <div class="col-sm-2">        
                                                    <label id="head-label"  for="email">จำนวนต่อครั้ง</label>
                                                    <input type="text" class="form-control" placeholder="เบอร์ผู้ติดต่อ" aria-label="State">
                                                    
                                            </div> 
                                               
                                            <div class="col-sm-2">        
                                                    <label id="head-label"  for="email">จำนวนวัน</label>
                                                    <input type="text" class="form-control" placeholder="เบอร์ผู้ติดต่อ" aria-label="State">   
                                            </div> 


                                            <!-- <div class="col-sm-2">        
                                                    <label id="head-label"  for="email">สรุป</label>
                                                    <input type="text" class="form-control" placeholder="เบอร์ผู้ติดต่อ" aria-label="State">        
                                            </div>   -->
                                        </div>
                                        <div class="col-md-12 form-group" style="width:100%; margin-top:30px">
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                <a href="MeasureH2.php" class="btn btn-primary active" role="button" aria-pressed="true">ถัดไป</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
        </script>

    </body>
</html>
