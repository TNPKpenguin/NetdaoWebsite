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
    $sql = "SELECT name_th FROM district WHERE province_code=(SELECT code FROM provinces WHERE name_th='.$province.')";
    $result = $conn->query($sql);

    // Check if there is data in the result
    if ($result->num_rows > 0) {
        // Loop through the data and generate table rows
        while ($row = $result->fetch_assoc()) {
            echo "<option value=".$row["name_th"].">".$row["name_th"]."</option>";
        }
    } else {
        echo "<option value="."-".">"."-"."</option>";
    }

    // Close the database connection
    $conn->close();
?>
