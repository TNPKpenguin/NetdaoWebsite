<?php
if (isset($_POST['dob'])) {
    $dob = $_POST['dob'];
    
    $birthDate = new DateTime($dob);
    $today = new DateTime();
    $ageInterval = $today->diff($birthDate);
    
    echo $ageInterval->y;
}
?>