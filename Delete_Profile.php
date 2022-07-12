<?php
    include 'db.php';
    include 'config.php';

        $profileId = $_GET['profile'];
        $query = "DELETE FROM tbl_204_clients WHERE id = '$profileId'";
        // echo "$query";

        $result = mysqli_query($connection , $query);

        header('Location: ' . 'Patients_Exceptions_Report.php?sort=message_sent');

?>