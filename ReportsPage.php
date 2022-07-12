<!DOCTYPE html>

<html>

    <head>

        <meta charset="UTF-8">
        <title> Health Wizard - Report Page </title>
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
                    <li class="even"><a href="Patients_Exceptions_Report.php?sort=message_sent"> Patients' Exceptions Report</a></li>
                    <li class="odd"><a href="New_Report.php"> Create Report </a></li>
                    <li class="even selected"><a href="#"> Last Reports</a></li>
                    <li class="odd"><a href="#"> Patients List </a></li>
                    <li class="even"><a href="#" > Products List </a></li>
                </ul>
            </nav>

            <!-- breadcrumbs -->
            <section id="breadcrumbsContainer">
                <a href="index.php" class="prevBreadcrumbs"> Home Page </a>
                <a href="#"> Last Reports </a>
                <a href="login.php" class="logout"> 
                    <img  src="images/logout.png" alt="logout">
                </a> 
            </section>

            <main>

                <!-- list of main object -->
                <table id="patientsReportTable">

                    <tr class="tableTitle">

                        <th>Admin creator</th>
                        <th id="sel_fid">Selected fields</th>
                        <th>Creation time</th>
                        <th>Actions</th>

                    </tr>

                    <?php
                        include 'db.php';
                        include 'config.php';

                        $therapistName = $_SESSION['user_name'];

                        $query ="SELECT * FROM tbl_204_reports ORDER BY time desc";

                        $result = mysqli_query($connection , $query);

                        $numOfRows = 0;

                        while($row = mysqli_fetch_assoc($result)) {
                            
                            if($numOfRows++  % 2 == 0) {
                                echo "<tr class='odd row'>";
                            } else {
                                echo "<tr class='row'>";
                            }
                            
                            echo "<td>";
                            echo $row["admin"];
                            echo "</td>";
                            echo "<td>";
                            echo $row["fields"];
                            echo "</td>";
                            echo "<td>";
                            echo $row["time"];
                            echo "</td>";
                          
                            echo "<td> <button class='reviewProfileBtn'> <a href='$row[link]'>
                                Open Report</a> </button>";

                            $reportId = $row["id"];
                                echo "<button class='reviewProfileBtn delProfileBtn'>
                                <a href='DeleteReport.php?reportID=$reportId'>
                                    Delete Report</a> </button></td>";
                        }
                        
                        //release returned data
                        mysqli_free_result($result);

                    ?>

                </table>

            </main>
            
        </div>

        <footer>&copy Health Wizard</footer>

        <div class="clear"></div>

    </body>

</html>