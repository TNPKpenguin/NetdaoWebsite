<?php
// Assuming you have a database connection established
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "ndclinic";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$output = '';

if (isset($_POST['query'])) {
    $searchText = $_POST['query'];
    if ($searchText == "all") {
        $query = "SELECT HN, id_person, fname, lname FROM patient";
    }else if(empty($searchText)){
        $query = "SELECT HN, id_person, fname, lname FROM patient";
    } else {
        $query = "SELECT HN, id_person, fname, lname FROM patient WHERE HN LIKE '$searchText%' or fname  LIKE '$searchText%' or id_person  LIKE '$searchText%'";
    }
    
    $result = mysqli_query($conn, $query);

    if ($result) {
        if ($result->num_rows > 0) {
            $output = "<tr>
                        <th>เลขที่ทั่วไป</th>
                        <th>เลขบัตรประชาชน</th>
                        <th>ชื่อ - นามสกุล</th>
                        <th>แก้ไข</th>
                        <th>ลบ</th>
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                $output .= "<tr>
                                <td>{$row['HN']}</td>
                                <td>{$row['id_person']}</td>
                                <td>{$row['fname']} {$row['lname']}</td>
                                <td><a href='edit/edit_patient.php?hn={$row['HN']}'><button class='btn btn-outline-primary' id='delete-button'>Edit</button></a></td>
                                <td><button class='delete-button' value='{$row['HN']}'>Delete</button></td>
                            </tr>";
            }
        } else {
            $output .= "<tr><td colspan='5'>No results found</td></tr>";
        }
    } else {
        $output .= "<tr><td colspan='5'>Query failed</td></tr>";
    }
    echo $output;
}
mysqli_close($conn);
?>

<script>
$(document).ready(function () {
    $(document).on("click", ".delete-button", function () {
        var hn = $(this).val();

        var confirmDelete = confirm("Are you sure you want to delete this record with HN: " + hn + "?");
        if (confirmDelete) {
            $.ajax({
                type: "POST", 
                url: "includes/delete_patient.php",
                data: { hn: hn }, 
                success: function(response) {
                    alert("Record with HN: " + hn + " has been deleted!");
                    location.reload();
                },
                error: function(xhr, status, error) {
                    alert("An error occurred while deleting the record: " + error);
                }
            });
        }
    });
});

</script>