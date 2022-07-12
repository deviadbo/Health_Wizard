<!DOCTYPE html>

<html>

    <head>

        <meta charset="UTF-8">
        <title> Health Wizard - Review Profile </title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">

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
                        include 'db.php';
                        include 'config.php';
                        session_start();
                        if(!isset($_SESSION['user_name'])) {
                            header('Location: ' . URL . '/login.php');}

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
                    <li class="even selected"><a href="Patients_Exceptions_Report.php?sort=message_sent"> Patients' Exceptions Report</a></li>
                    <li class="odd"><a href="New_Report.php"> Create Report </a></li>
                    <li class="even"><a href="ReportsPage.php"> Last Reports </a></li>
                    <li class="odd"><a href="#"> Patients List </a></li>
                    <li class="even"><a href="#"> Products List </a></li>
                </ul>
            </nav>

            <!-- breadcrumbs -->
            <section id="breadcrumbsContainer">
                <a href="index.php" class="prevBreadcrumbs"> Home Page </a>
                <a href="Patients_Exceptions_Report.php?sort=message_sent" class="prevBreadcrumbs"> Patients' Exceptions Report </a>
                <a href="#"> Review Profile </a>
                <a href="login.php" class="logout"> 
                    <img  src="images/logout.png" alt="logout">
                </a> 
            </section>

            <main>
                <section id="reviewProfileLeftSide">

                    <?php
                        
                        $user = htmlspecialchars($_GET["user"]);
                        $query = "SELECT * FROM tbl_204_clients AS clients
                            INNER JOIN tbl_204_health_profile AS health 
                            ON health.id = clients.id WHERE clients.id = $user";

                        $result = mysqli_query($connection , $query);
                        $row = mysqli_fetch_assoc($result);

                        echo "<img id='patientImg' src='$row[img]'>";
                        echo "<p id='patientName'> $row[name] </p>";
                        echo "<div id='dit1'>";
                        echo "<p id='patientAgeTitle' class='patientTitle'>Age:</p>";
                        echo "<p id='patientAge' class='patientDit'>$row[age]</p>";
                        echo "<p id='patientNutTitle' class='patientTitle'>Nutritional profile: </p>";
                        echo "<p id='patientNut' class='patientDit'>$row[nutritional_pro]</p>";
                        echo "<p id='patientGoalsTitle' class='patientTitle'>$row[name]'s goals for the upcoming week</p>";

                        echo "<section id='ChecksGroup'>";
                        
                            echo "<div id='ChecksLeft'>";
                                echo " <div class='form-check'>";
                                    if($row["protein"]) 
                                        echo "<input class='form-check-input' type='checkbox' value='' id='flexCheckDisabled' disabled checked>";
                                    else 
                                        echo "<input class='form-check-input' type='checkbox' value='' id='flexCheckDisabled' disabled>";
                                    
                                    echo "<label class='form-check-label' for='flexCheckDisabled'>";
                                        echo "More protein";
                                    echo "</label>";
                                echo "</div>";

                                echo " <div class='form-check'>";
                                    if($row["less_sugar"]) 
                                        echo "<input class='form-check-input' type='checkbox' value='' id='flexCheckDisabled' disabled checked>";
                                    else 
                                        echo "<input class='form-check-input' type='checkbox' value='' id='flexCheckDisabled' disabled>";
                                    
                                    echo "<label class='form-check-label' for='flexCheckDisabled'>";
                                        echo "Less Sugar";
                                    echo "</label>";
                                echo "</div>";
                            echo "</div>";

                            echo "<div id='ChecksMid'>";
                                echo " <div class='form-check'>";
                                    if($row["gluten_free"]) 
                                        echo "<input class='form-check-input' type='checkbox' value='' id='flexCheckDisabled' disabled checked>";
                                    else 
                                        echo "<input class='form-check-input' type='checkbox' value='' id='flexCheckDisabled' disabled>";
                                    
                                    echo "<label class='form-check-label' for='flexCheckDisabled'>";
                                        echo "Gluten Free";
                                    echo "</label>";
                                echo "</div>";

                                echo "<div class='form-check'>";
                                    if($row["less_sodium"]) 
                                        echo "<input class='form-check-input' type='checkbox' value='' id='flexCheckDisabled' disabled checked>";
                                    else 
                                        echo "<input class='form-check-input' type='checkbox' value='' id='flexCheckDisabled' disabled>";
                                    
                                    echo "<label class='form-check-label' for='flexCheckDisabled'>";
                                        echo "Less Sodium";
                                    echo "</label>";
                                echo "</div>";

                            echo "</div>";

                            echo "<div id='ChecksRight'>";

                                echo " <div class='form-check'>";
                                    if($row["vegan"])
                                        echo "<input class='form-check-input' type='checkbox' value='' id='flexCheckDisabled' disabled checked>";
                                    else 
                                        echo "<input class='form-check-input' type='checkbox' value='' id='flexCheckDisabled' disabled>";
                                    
                                    echo "<label class='form-check-label' for='flexCheckDisabled'>";
                                        echo "Vegan";
                                    echo "</label>";
                                echo "</div>";

                                echo " <div class='form-check'>";
                                    if($row["paleo"])
                                        echo "<input class='form-check-input' type='checkbox' value='' id='flexCheckDisabled' disabled checked>";
                                    else
                                        echo "<input class='form-check-input' type='checkbox' value='' id='flexCheckDisabled' disabled>";
                                    
                                    echo "<label class='form-check-label' for='flexCheckDisabled'>";
                                        echo "Paleo Diet";
                                    echo "</label>";
                                echo "</div>";

                            echo "</div>";

                        echo "</section>";

                        echo "<p id='patientAppTitle' class='patientTitle'>Nutrition diary application:</p>";
                        echo "<p id='patientApp' class='patientDit'>$row[nutrition_diary_app]</p>";
                        echo "<p id='patientSyncTitle' class='patientTitle'>Last sync:</p>";
                        echo "<p id='patientSync' class='patientDit'>$row[last_sync]</p>";

                    ?>

                </section>

                <div id="verticalLineReviewProfile"></div>

                <section id="ReviewProfile-RightSide">

                    <?php echo "<p id='patientPur' class='patientTitle'>$row[name]'s Last Purchases</p>"; ?>

                    <div id="rightSide">
                        <table id="TowRowTable">
                            <tr class="tableTitleTowRow">
                                <th> </th>
                                <th>Product name</th>
                                <th>Purchase Time</th>
                                <th>Compatibility</th>
                                <th>Product info
                                </th>
                            </tr>
                            <tr class="trtRow">
                                <td>
                                    <img class="zoomIn" src="images/zoom-in.svg" onmouseover="zoomInImg('firstPur')" onmouseout="regularZoomImg('firstPur')">
                                    <img id="firstPur" src="images/pangea2.png">
                                </td>
                                <td>Pangea Protein Bar</td>
                                <td>01/02/2020, 9:00</td>
                                <td> <p class="greenText">94%</p></td>
                                <td><a href="#">
                                        <img class="moreDetails" src="images/info-circle-fill.svg">Click for more details</a>
                                </td>
                            </tr>
                            <tr class="trtRow">
                                <td>
                                    <img class="zoomIn" src="images/zoom-in.svg" onmouseover="zoomInImg('secondPur')" onmouseout="regularZoomImg('secondPur')">
                                    <img id="secondPur" src="images/NV.png">
                                </td>
                                <td>Nature Valley Crunchy</td>
                                <td>01/02/2020, 9:00</td>
                                <td> <p class="redText">40%</p></td>
                                <td><a href="#">
                                        <img class="moreDetails" src="images/info-circle-fill.svg">Click for more details</a>
                                </td>
                            </tr>
                        </table>

                        <a href="#" class="VA-Link">View All</a>

                    </div>

                    <?php
                        echo "<p id='patientRep' class='patientTitle'>$row[name]'s Last Reports From $row[nutrition_diary_app]</p>";
                    ?>
                    

                    <div>
                        <table id="TowRowTable2">
                            <tr class="tableTitleTowRow">
                                <th>Product name</th>
                                <th>Date & Time</th>
                                <th>Compatibility</th>
                                <th>Goals</th>
                            </tr>
                            <tr class="trtRow">
                                <td>Elit Chocolate Cake</td>
                                <td>01/02/2020, 9:00</td>
                                <td>
                                    <div class="redText">20%</div>
                                </td>
                                <td>
                                    <p class="redText">More Protein, Vegan, <br> Less Sugar, </p>
                                    <p class="orangeText">Less Sodium</p>
                                </td>
                            </tr>
                            <tr class="trtRow">
                                <td>Nature Valley Crunchy</td>
                                <td>01/02/2020, 9:00</td>
                                <td>
                                    <div class="orangeText">40%</div>
                                </td>
                                <td>
                                    <p class="greenText">More Protein,</p>
                                    <p class="redText"> Vegan, <br>Less Sugar,</p>
                                    <p class="orangeText">Less Sodium </p>
                                </td>
                            </tr>
                        </table>

                        <a href="#" class="VA-Link">View All</a>
                    </div>

                    <button id="buildReport" type="button" class="btn btn-success">
                        <?php 
                            $userId = $row["id"];
                            echo "<a href='New_Message.php?user=$userId'> Send $row[name] a Message</a>";
                        ?> 
                        
                    </button>
                    
                </section>

            </main>

            <footer>&copy Health Wizard</footer>

            <div class="clear"></div>

        </div>

    </body>

    <script src="js/zoomInOut.js"> </script>

</html>