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

    $sql = "SELECT * FROM link_sym l,symptoms s WHERE l.sym_id = s.sym_id and case_id = (SELECT case_id FROM his_treat WHERE HN='{$_GET['hn']}' ORDER by case_id DESC LIMIT 1);";
    $result = $conn->query($sql);

    // Check if there is data in the result
    if ($result->num_rows > 0) {
        // Loop through the data and generate table rows
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td><div class='d-flex align-items-center'><div class='ms-3'><p class='fw-bold mb-1'>" . $row['sym_no'] . "</p></div></div></td>";
            echo "<td><p class='fw-normal mb-1'>" . $row['sym_name'] . "</p></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No data found</td></tr>";
    }

    // Close the database connection
    $conn->close();
?>
