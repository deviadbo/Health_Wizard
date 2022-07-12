<?php
    include 'db.php';
    include 'config.php';

    session_start();

    if(!isset($_SESSION['user_name'])) {
        header('Location: ' . URL . '/login.php');
    }

?>

<!DOCTYPE html>

<html>

    <head>

        <meta charset="UTF-8">
        <title> Health Wizard - Home Page </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/phoneMenu.js"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/style.css">
       
     <!-- Load an icon library to show a hamburger menu (bars) on small screens -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>

        <div class="wrapper">

            <header>

                <!-- nav (only mobile) -->
                <!-- Top Navigation Menu -->
                <!-- <div class="mobileNav">
                    <a href="#" class="active" id="mob_nav">Logo</a>
                    <div id="myLinks">
                        <a href="#"> Home Page </a>
                        <a href="Patients_Exceptions_Report.php?sort=message_sent"> Patients' Exceptions Report</a>
                        <a href="New_Report.php"> Create Report </a>
                        <a href="ReportsPage.php"> Last Reports</a>
                        <a href="#"> Patients List </a>
                        <a href="#" > Products List </a>
                    </div>
                    <a href="javascript:void(0);" class="icon" onclick="myFunction()" id="myLinks">
                        <i class="fa fa-bars"></i>
                    </a>
                </div> -->


                <!-- search bar -->
                <form action="#" method="get">
                    <input id="searchBar" type="search" placeholder="Search">
                </form>

                <!-- logo and app name -->
                <div id="logoContainer">
                    <a href="#" class="logo"></a>
                    <p> Health Wizard </p>
                </div> 

                <!-- profile picture and job -->
                <a href="" id="nameJobImg">
                    <?php

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
                    <li class="odd selected"> <a href="#"> Home Page </a></li>
                    <li class="even"><a href="Patients_Exceptions_Report.php?sort=message_sent"> Patients' Exceptions Report</a></li>
                    <li class="odd"><a href="New_Report.php"> Create Report </a></li>
                    <li class="even"><a href="ReportsPage.php"> Last Reports </a></li>
                    <li class="odd"><a href="#"> Patients List </a></li>
                    <li class="even"><a href="#" > Products List </a></li>
                </ul>
            </nav>

            <!-- breadcrumbs -->
            <section id="breadcrumbsContainer">
                <a href="#"> Home Page </a>
                <a href="login.php" class="logout"> 
                    <img  src="images/logout.png" alt="logout">
                </a> 
            </section>

                   

            <!-- Top Navigation Menu -->
            <div class="mobileNav">
            
                <!-- Navigation links (hidden by default) -->
                <div id="myLinks">
                    <a href="#"> Home Page </a>
                    <a href="Patients_Exceptions_Report.php?sort=message_sent"> Patients' Exceptions Report</a>
                    <a href="New_Report.php"> Create Report </a>
                    <a href="ReportsPage.php"> Last Reports </a>
                    <a href="#"> Patients List </a>
                    <a href="#" > Products List </a>
                </div>
                <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                </a>
            </div>

            <main>

                <!-- left side -->
                <section id=HomePageleftSide>

                    <div id="todo">
                        <p> TO DO </p>
                    </div>
                    <section id="reviewPatients">

                        <p id="reviewPatientsTitle"> Review Patients </p>
                        <a href="Patients_Exceptions_Report.php?sort=message_sent" id="reviewPatientsSub1Icon" class="reviewPatientsSub">Patients exceeded their goals</a>

                        <?php

                            $query = "SELECT count(*)
                                FROM tbl_204_clients AS clients
                                INNER JOIN tbl_204_health_profile AS health ON health.id = clients.id
                                WHERE (therapist = '$_SESSION[user_name]'
                                AND exception = '1')";
                            $result = mysqli_query($connection, $query);
                            $row = mysqli_fetch_array($result);
              
                            echo "<div class='notifications'>";
                            if($row[0] < 9)
                                echo "$row[0]";
                            else
                                echo "9+";
                            echo "</div>"

                        ?>

                        <a href="#" id="reviewPatientsSub2Icon" class="reviewPatientsSub">New Patients </a>

                        <div class="notifications">9+</div>

                    </section>

                    <div class="horizontalLineLeftSide"></div>

                    <section id="reviewProducts">
                        
                        <p id="reviewProductsTitle"> Review Products </p>

                        <a href="#" id="reviewProductsSub1Icon" class="reviewProductsSub">Inaccurate product nutritional values</a>

                        <div class="notifications notificationsProducts">3</div>

                        <a href="#" id="reviewProductsSub2Icon" class="reviewProductsSub">New Products</a>

                        <div class="notifications notificationsProducts">7</div>

                    </section>

                </section>


                <div id="verticalLine"></div>


                <!-- rigth side -->
                <section id="HomePagerightSide">

                    <div id="top3Title">
                        <p> Top 3 Of The Week </p>
                    </div>

                    <a href="#">
                        <section id="first" class="zoomHover">
                            <img src="images/pangea1.png" alt="Protein Bar">
                            <p class="textBelowImg"> Pangea Protein Bar </p>
                        </section>
                    </a>
                    

                    <section class="horizontalLineRightSide"></section>

                    <a href="#">

                        <section id="second" class="zoomHover">
                            <img src="images/pangea2.png" alt="Protein Bar">
                            <p class="textBelowImg"> Pangea Protein Bar </p>
                        </section>
                    </a>

                    <section class="horizontalLineRightSide"></section>

                    <a href="#">

                        <section id="third" class="zoomHover">
                            <img src="images/pangea3.png" alt="Protein Bar">
                            <p class="textBelowImg"> Pangea Protein Bar </p>
                        </section>
                    </a>
                </section>

                <div class="clear"></div>

            </main>

        </div>

        <footer>&copy Health Wizard</footer>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>
    
</html>