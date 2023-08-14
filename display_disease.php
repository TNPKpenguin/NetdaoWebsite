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

    $sql = "SELECT HN, id_person FROM patient";
    $result = $conn->query($sql);

    // Check if there is data in the result
    if ($result->num_rows > 0) {
        // Loop through the data and generate table rows
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td><div class='d-flex align-items-center'><div class='ms-3'><p class='fw-bold mb-1'>" . $row['HN'] . "</p></div></div></td>";
            echo "<td><p class='fw-normal mb-1'>" . $row['id_person'] . "</p></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No data found</td></tr>";
    }

    // Close the database connection
    $conn->close();
?>
