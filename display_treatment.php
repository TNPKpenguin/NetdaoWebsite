<?php
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
    $sql = "SELECT * FROM his_treat WHERE case_id=";
    $result = $conn->query($sql);

    // Check if there is data in the result
    if ($result->num_rows > 0) {
        // Loop through the data and generate table rows
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td><div class='d-flex align-items-center'><div class='ms-3'><p class='fw-bold mb-1'>" . $row['HN'] . "</p></div></div></td>";
            echo "<td><p class='fw-normal mb-1'>" . $row['id_person'] . "</p></td>";
            echo "<td>" . $row['fname']. " " . $row['lname'] . "</td>";
            // Add icons for "bin" and "edit" actions
            echo '<td><button type="button" class="btn btn-outline-primary">Edit</button></td>';
            echo "<td><button class='delete-button' value='{$row['HN']}'>Delete</button></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No data found</td></tr>";
    }

    // Close the database connection
    $conn->close();
?>


<script>
$(document).ready(function () {
    $(document).on("click", ".delete-button", function () {
        var hn = $(this).val();

        var confirmDelete = confirm("Are you sure you want to delete this record with HN: " + hn + "?");
        if (confirmDelete) {
            $.ajax({
                type: "POST", 
                url: "includes/delete_treatment.php",
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
