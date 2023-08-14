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
            echo '<td><button type="button" class="btn btn-outline-primary">Delete</button></td>';
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No data found</td></tr>";
    }

    // Close the database connection
    $conn->close();
?>
