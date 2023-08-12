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
    $sql = "SELECT name_th FROM provinces";
    $result = $conn->query($sql);

    // Check if there is data in the result
    if ($result->num_rows > 0) {
        // Loop through the data and generate table rows
        while ($row = $result->fetch_assoc()) {
            echo "<option value=".$row["name_th"].">".$row["name_th"]."</option>";
        }
    } else {
        echo "<tr><td colspan='5'>No data found</td></tr>";
    }

    // Close the database connection
    $conn->close();
?>
