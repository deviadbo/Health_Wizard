<!DOCTYPE html>

<html>

    <head>

        <meta charset="UTF-8">
        <title> Health Wizard - Patients' Exceptions Report </title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="js/fetchJson.js"> </script>
        <script src="js/deleteProfile.js"> </script>

    </head>

    <body>

        <div class="wrapper">

            <header>

                <!-- search bar -->
                <form action="#" method="get">
                    <input id="searchBar" type="text" placeholder="Search...">
                </form>

                <!-- logo and app name -->
                <div id="logoContainer">
                    <a href="index.php" class="logo"></a>
                    <p> Health Wizard </p>
                </div>

                      <!-- profile picture and job -->
                    <a href="" id="nameJobImg">
                        <?php
                            session_start();
                            if(!isset($_SESSION['user_name'])) {
                                header('Location: ' . URL . 'login.php');}
                            echo "<p>";
                                echo $_SESSION["user_name"];
                                echo "<br> </b>";
                                echo $_SESSION["user_profession"];
                            echo "</p>";
                        ?>
                        <img src="<?php echo $_SESSION['user_img']; ?>" alt="Profile Picture"/>
                    </a>

            </header>

            <div class="clear"></div>

            <!-- nav -->
            <nav>
                <ul class="navItem" id="nav1">
                    <li class="odd"> <a href="index.php"> Home Page </a></li>
                    <li class="even selected"><a href="#"> Patients' Exceptions Report</a></li>
                    <li class="odd"><a href="New_Report.php"> Create Report </a></li>
                    <li class="even"><a href="ReportsPage.php"> Last Reports </a></li>
                    <li class="odd"><a href="#"> Patients List </a></li>
                    <li class="even"><a href="#" > Products List </a></li>
                </ul>
            </nav>

            <!-- breadcrumbs -->
            <section id="breadcrumbsContainer">
                <a href="index.php" class="prevBreadcrumbs"> Home Page </a>
                <a href="#"> Patients' Exceptions Report </a>
                <a href="login.php" class="logout"> 
                    <img  src="images/logout.png" alt="logout">
                </a> 
            </section>

            <main>

                <!-- list of main object -->
                <table id="patientsReportTable">

                    <tr class="tableTitle">

                        <th>Name<a href="?sort=name" class="fa fa-sort"></a></th>
                        <th>Age<a href="?sort=age" class="fa fa-sort"></a></th>
                        <th>Details</th>
                        <th>Therapist<a href="?sort=therapist" class="fa fa-sort"></a></th>
                        <th>Message Sent<a href="?sort=message_sent" class="fa fa-sort"></a></th>
                        <th>Message Time<a href="?sort=message_time" class="fa fa-sort"></a></th>
                        <th>Actions</th>

                    </tr>

                    <?php
                        include 'db.php';
                        include 'config.php';

                        $therapistName = $_SESSION['user_name'];

                        $query ="SELECT *
                                FROM tbl_204_clients
                                WHERE (therapist = '$therapistName'
                                AND exception = '1')
                                ORDER BY"; 

                        if ($_GET['sort'] == 'name') { $query .= " name"; }
                        else if ($_GET['sort'] == 'age') { $query .= " age"; }
                        else if ($_GET['sort'] == 'therapist') { $query .= " therapist"; }
                        else if ($_GET['sort'] == 'message_time') { $query .= " msg_sent_time"; }
                        else { $query .= " msg_sent"; }

                        $result = mysqli_query($connection , $query);

                        $numOfRows = 0;

                        while($row = mysqli_fetch_assoc($result)) {
                            
                            if($numOfRows++  % 2 == 0) 
                                echo "<tr class='odd row'>";
                            else 
                                echo "<tr class='row'>";
                            
                            echo "<td>";
                            echo $row["name"];
                            echo "</td>";
                            echo "<td>";
                            echo $row["age"];
                            echo "</td>";
                            echo "<td class='desc'>";
                            echo "<script> (getNutritionalProfile($row[id])) </script>";
                            echo "</td>";
                            echo "<td>";
                            echo "$row[therapist]";
                            echo "</td>";

                            if($row["msg_sent"] == false) 
                                echo "<td class='messageSentNo'>";
                            else 
                                echo "<td class='messageSentYes'>";
                            
                            echo "</td>";
                            echo "<td>";
                            echo "$row[msg_sent_time]";
                            echo "</td>";
                            $userId = $row["id"];
                            echo "<td> <button class='reviewProfileBtn'> <a href='Review Profile.php?user=$userId'>
                                Review Profile</a> </button>";
                            echo "<button class='reviewProfileBtn delProfileBtn'> <a href='Delete_Profile.php?profile=$userId'>
                                Delete Profile</a> </button></td>";
                        }

                        mysqli_free_result($result);

                    ?>

                </table>

            </main>
            
        </div>

        <footer>&copy Health Wizard</footer>

        <div class="clear"></div>

    </body>

</html>