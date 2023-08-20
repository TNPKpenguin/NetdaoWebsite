<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Search</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <br>
      <div class="container mt-4">
        <div class="form-outline mb-4">
          <input type="search" class="form-control" id="search" name="search" placeholder="Search" style="text-align: center;">
          <br>
      </div>
    <div class="table-container" style="height: 600px; overflow: auto;">
      <table class="table align-middle mb-0 bg-white"  id="result">
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
  </tbody>
</table>
</div>
<br>
<br>
<div align="right">
<a href="add_patient.php"><button type="submit">Add</button></a>
</div>

<script>
$(document).ready(function(){
    $("#search").keyup(function(){
        var searchText = $(this).val();
        $.ajax({
            url: "search.php",
            method: "POST",
            data: {query: searchText},
            success: function(data){
                $("#result").html(data);
            }
        });
    });

    // Trigger the AJAX call on page load (when the search box is empty)
    $("#search").trigger("keyup");
});

var searchText = $(this).val();

if (searchText === "") {
    $.ajax({
        url: "search.php",
        method: "POST",
        data: {query: searchText},
        success: function(data){
            $("#result").html(data);
        }
    });
}
</script>

</body>
</html>
