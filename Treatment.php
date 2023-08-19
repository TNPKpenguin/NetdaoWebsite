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
                    <li class="disabled-link"><a href="add_patient.php">ข้อมูลผู้ป่วย</a></li>
                    <li class="disabled-link"><a href="history.php">ประวัติการเจ็บป่วย</a></li>
                    <li class="disabled-link"><a href="MeasureH2.php">ข้อมูลสุขภาพ</a></li>
                    <li class="active"><a href="Treatment.php">รายการการรักษา</a></li>
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
                <div class="header">
                <div class=container>
                        <div class="row g-3">
                            <div class="col-md-12 form-group">
                                <label for="name">เลขที่ทั่วไป</label>
                                <input type="text" class="form-control" id="hn" name="hn" placeholder="เลขที่ทั่วไป" disabled value="<?php echo $_GET['hn']?>">
                                </div>
                            </div>
                        </div>
                </div>
            </div>
                <div class="container mt-4">
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
                <?php
                        $hn = isset($_GET['hn']) ? $_GET['hn'] : '';
                    // Connect to the MySQL database
                        $servername = "127.0.0.1";
                        $username = "root";
                        $password = "";
                        $dbname = "ndclinic";

                        $conn = new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                    // Fetch data from the "users" table
                    $sql = "SELECT * FROM his_treat WHERE HN='$hn'";
                    $result = $conn->query($sql);

                    $sql = "SELECT * FROM link_drug WHERE case_id = (SELECT case_id FROM his_treat WHERE HN='{$_GET['hn']}' ORDER by case_id DESC LIMIT 1)";
                    $query = mysqli_query($con, $sql);

                    $row1 = $query->fetch_assoc();

                    $sql = "SELECT * FROM link_drug WHERE case_id = (SELECT case_id FROM his_treat WHERE HN='{$_GET['hn']}' ORDER by case_id DESC LIMIT 1)";
                    $query = mysqli_query($con, $sql);

                    if ($result->num_rows > 0) {
                        $count = 1;
                        while ($row = $result->fetch_assoc()) {
                            $sql = "SELECT drug_name FROM drug WHERE drug_id = '{$row1['drug_id']}'";
                            $query2 = mysqli_query($con, $sql);
                            $row2 = $query2->fetch_assoc();
                            $drug_name = $row2["drug_name"];

                            echo "<tr>";
                            echo "<td><div class='d-flex align-items-center'><div class='ms-3'><p class='fw-bold mb-1'>" . $count . "</p></div></div></td>";
                            echo "<td><p class='fw-normal mb-1'>" . $row['date_treat'] . "</p></td>";
                            echo "<td>" . $drug_name. "</td>";
                            // Add icons for "bin" and "edit" actions
                            echo '<td><button type="button" class="btn btn-outline-primary">Edit</button></td>';
                            echo '<td><button type="button" class="btn btn-outline-primary">Delete</button></td>';
                            echo "</tr>";
                            $count += 1;
                        }
                    } else {
                        echo "<tr><td colspan='5'>No data found</td></tr>";
                    }

                    // Close the database connection
                    $conn->close();
                ?>
                </tbody>
                </table>

                <br>
                <div align="right">
                    
                    <button type="button" class="btn btn-primary" onclick="window.location.href = 'includes/insert_treatment.php?hn='+encodeURIComponent('<?php echo $_GET['hn']?>')"><span class="bi bi-plus-square-fill"></span>Add</button>
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
