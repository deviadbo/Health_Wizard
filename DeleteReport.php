<?php
    include 'db.php';
    include 'config.php';

        $reportID = $_GET['reportID'];
        // echo "$reportID";
        $query = "DELETE FROM tbl_204_reports WHERE id = '$reportID'";
        // echo "$query";

        $result = mysqli_query($connection , $query);

        header('Location: ' . 'ReportsPage.php');

?>