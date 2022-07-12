<?php include 'db.php'; include 'config.php';?> 

<!DOCTYPE html>

<html>

    <head>

        <meta charset="UTF-8">
        <title> Health Wizard - Report</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="js/fetchJson.js"> </script>
       
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
                    <li class="even selected"><a href="ReportsPage.php"> Last Reports </a></li>
                    <li class="odd"><a href="#"> Patients List </a></li>
                    <li class="even"><a href="#" > Products List </a></li>
                </ul>
            </nav>

            <!-- breadcrumbs -->
            <section id="breadcrumbsContainer">
                <a href="index.php" class="prevBreadcrumbs"> Home Page </a>
                <a href="#"> Report </a>
                <a href="login.php" class="logout"> 
                    <img  src="images/logout.png" alt="logout">
                </a> 
            </section>

            <main>

                <!-- list of main object -->
                <table id="patientsReportTable">

                    <tr class="tableTitle">

                   <?php
                        $string = "reportBuilder.php?";
                        $field = "";
                        if (isset($_GET['name'])) {
                            echo "<th>Name</th>"; 
                            $string .= 'name=1';
                            $field .= "Name, ";
                        }
                        if (isset($_GET['age'])) {
                            echo "<th>Age</th>";
                            $string .= '&age=1';
                            $field .= "Age, ";
                        }
                        if (isset($_GET['trp'])) {
                            echo "<th>Therapist</th>";
                            $string .= '&age=1';
                            $field .= "Therapist, ";
                        }
                        if (isset($_GET['npro'])) {
                            echo "<th>Nutritional profile</th>";
                            $string .= '&npro=1';
                            $field .= "Nutritional profile, ";
                        }
                        if (isset($_GET['mpro'])) {
                            echo "<th>More protein</th>";
                            $string .= '&mpro=1';
                            $field .= "More protein, ";
                        }
                        if (isset($_GET['lesg'])) {
                            echo "<th>Less sugar</th>";
                            $string .= '&lesg=1';
                            $field .= "Less sugar, ";
                        }
                        if (isset($_GET['gltf'])) {
                            echo "<th>Gluten free</th>";
                            $string .= '&gltf=1';
                            $field .= "Gluten free, ";
                        }
                        if (isset($_GET['lesm'])) {
                            echo "<th>Less sodium</th>";
                            $string .= '&lesm=1';
                            $field .= "Less sodium, ";
                        }
                        if (isset($_GET['plod'])) {
                            echo "<th>Paleo diet</th>";
                            $string .= '&plod=1';
                            $field .= "Paleo diet, ";
                        }
                        if (isset($_GET['veg'])) {
                            echo "<th>Vegen</th>";
                            $string .= '&veg=1';
                            $field .= "Vegen, ";
                        }
                        if (isset($_GET['ndapp'])) {
                            echo "<th>Nutrition diary app</th>";
                            $string .= '&ndapp=1';
                            $field .= "Nutrition diary app, ";
                        }
                        if (isset($_GET['lsts'])) {
                            echo "<th>Last sync</th>";
                            $string .= '&lsts=1';
                            $field .= "Last sync ";
                        }
     
                        echo "<th>Actions</th>";
                        echo "</tr>";
  
                        //insert report info to tbl_204_reports
                        //if the prev page was New_Report      
                        $if_insert = false;
                        $url = $_SERVER['HTTP_REFERER'];
                        $token = strtok($url, "/");
                        while ($token !== false) {
                            if ($token == "New_Report.php")
                                {$if_insert = true;}
                            $token = strtok("/");
                        }

                        if ($if_insert == true) {
                            $therapistName = $_SESSION['user_name'];
                            $query = "INSERT INTO `tbl_204_reports` (`id` ,`admin` ,`fields`,`link`, `time`)
                            VALUES (NULL , '$therapistName',  '$field', '$string', CURRENT_TIMESTAMP)";
                            $result = mysqli_query($connection , $query);
                            echo "The report was created successfully!<br><br>";
                        }
                        /****************/
                       
                        //Read the report

                        $query ="SELECT *
                                FROM tbl_204_clients c
                                INNER JOIN tbl_204_health_profile hp
                                ON hp.id = c.id";

                        $result = mysqli_query($connection , $query);
                        $numOfRows = 0;
                        while($row = mysqli_fetch_assoc($result)) {
                            
                            if($numOfRows++  % 2 == 0) 
                                echo "<tr class='odd row'>";
                            else 
                                echo "<tr class='row'>";
                            
                            if (isset($_GET['name'])) {
                                echo "<td>";
                                echo $row["name"];
                                echo "</td>";
                            }
                            if (isset($_GET['age'])) {
                                echo "<td>";
                                echo $row["age"];
                                echo "</td>";
                            }
                            if (isset($_GET['trp'])) {
                                echo "<td>";
                                echo $row["therapist"];
                                echo "</td>";
                            }
                            if (isset($_GET['npro'])) {
                                echo "<td>";
                                echo $row["nutritional_pro"];
                                echo "</td>";
                            }
                            if (isset($_GET['mpro'])) {
                                echo "<td>";
                                echo $row["protein"];
                                echo "</td>";
                            }
                            if (isset($_GET['lesg'])) {
                                echo "<td>";
                                echo $row["less_sugar"];
                                echo "</td>";
                            }
                            if (isset($_GET['gltf'])) {
                                echo "<td>";
                                echo $row["gluten_free"];
                                echo "</td>";}
                            if (isset($_GET['lesm'])) {
                                echo "<td>";
                                echo $row["less_sodium"];
                                echo "</td>";
                            }
                            if (isset($_GET['plod'])) {
                                echo "<td>";
                                echo $row["paleo"];
                                echo "</td>";
                            }
                            if (isset($_GET['veg'])) {
                                echo "<td>";
                                echo $row["vegan"];
                                echo "</td>";
                            }
                            if (isset($_GET['ndapp'])) {
                                echo "<td>";
                                echo $row["nutrition_diary_app"];
                                echo "</td>";
                            }
                            if (isset($_GET['lsts'])) {
                                echo "<td>";
                                echo $row["last_sync"];
                                echo "</td>";
                            }

                            $userId = $row["id"];
                            echo "<td> <button class='reviewProfileBtn'> <a href='Review Profile.php?user=$userId'>
                                    Review Profile</a> 
                                </button>";
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