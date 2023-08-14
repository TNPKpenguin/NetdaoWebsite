<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>เพิ่มข้อมูลผู้ป่วย</title>
        <!-- Link Bootstrap CSS -->
        
    </head>
    <body onload="updateVariableValueDisplay()">
        <link rel="stylesheet" href="css/history.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
                    <li class="active"><a href="history.php">ประวัติการเจ็บป่วย</a></li>
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
        <form action="includes/insert_history.php" method="post">
            <div class="header">
                <div class=container mt-5>
                        <div class="row g-3">
                            <div class="col-md-12 form-group">
                                <label for="name">เลขที่ทั่วไป</label>
                                <input type="text" class="form-control" id="hn" name="hn" placeholder="เลขที่ทั่วไป" readonly>
                            </div>
                            </div>
                        </div>
                </div>
            </div>


            <br>
            <div class="first-box">
                <div class="container mt-5">
                        <div class="row g-3">
                            <div class="col-md-6 form-group">
                                <label for="exampleFormControlTextarea1">ประวัติการเจ็บป่วย</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="13s" name="his"></textarea>
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="exampleFormControlTextarea1">ประวัติการเจ็บป่วยในครอบครัว</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="13" name="fam_his"></textarea>
                            </div>
                        </div>

                        <br><br>

                        <div class="row g-3">
                        <div class="col-md-4 form-group">
                                <label for="exampleFormControlTextarea1">การแพ้อาหาร</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="13" name="food_his"></textarea>
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="exampleFormControlTextarea1">การแพ้ยา</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="13" name="drug_his"></textarea>
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="exampleFormControlTextarea1">โรคประจำตัว</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="13" name="disease_his"></textarea>
                            </div>
                            <div class="col-md-12 form-group" style="width:100%; margin-top:30px">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <a href="MeasureH2.php"><button type="submit" onclick="saveToLocalStorage()">ถัดไป</button></a>
                                </div>
                            </div>
                        </div>     
                </div>
            </div>  
        </div>
        </form>
        



                                
        <!-- Link Bootstrap JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="javascript/store.js"></script>
        </script>
        <script src=
    "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">
        </script>
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
        </script>
    </body>
</html>