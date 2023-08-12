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
<link rel="stylesheet" href="css/Treatment.css">
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
                    <li class="active"><a href="Treatment.php">รายการการรักษา</a></li>
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

                <br>
                <div class="container mt-4">

                    <div class="form-outline mb-4">
                        <h3 id="hn">เลขที่ทั่วไป : </h3>
                    </div>
                    <div id="datatable">
                    </div>    
                    <br><br>
                    <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                    <th>ครั้งที่</th>
                    <th>วันที่</th>
                    <th>การวินิจฉัย</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                    </tr>
                </thead>
                <tbody>
                <?php include('display_data.php'); ?>
                </tbody>
                </table>

                <br>
                <div align="right">
                    <a href="disease.php"><button type="button" class="btn btn-primary"><span class="bi bi-plus-square-fill"></span>Add</button></a>
                </div>  
                    </div> 
                 </div>
                </form>
            </div>
        </div>
                </div>
            </div>
        </div>

  <!-- Link Bootstrap JS and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="javascript/store.js"></script>
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
