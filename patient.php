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
  <br>
  <div class="container mt-4">

    <div class="form-outline mb-4">
      <input type="search" class="form-control" id="datatable-search-input" placeholder="Search" style="text-align: center;">
      <!-- <label class="form-label" for="datatable-search-input">Search</label> -->
      </div>
      <div id="datatable">
    </div>    
    <br>
    <table class="table align-middle mb-0 bg-white">
  <thead class="bg-light">
    <tr>
      <th>เลขที่ทั่วไป</th>
      <th>เลขบัตรประชาชน</th>
      <th>ชื่อ - นามสกุล</th>
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
  <a href="add_patient.php"><button type="button" class="btn btn-primary"><span class="bi bi-plus-square-fill"></span>Add</button></a>
</div>



  <!-- Link Bootstrap JS and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
