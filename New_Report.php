<?php
    include 'db.php';
    include 'config.php';

    session_start();
    if(!isset($_SESSION['user_name'])) {
        header('Location: ' . URL . 'login.php');
    }
?>

<!DOCTYPE html>

<html>

    <head>

        <meta charset="UTF-8">
        <title> Health Wizard - Report Crtate </title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
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
                    <li class="odd selected"><a href="#"> Create Report </a></li>
                    <li class="even"><a href="ReportsPage.php"> Last Reports </a></li>
                    <li class="odd"><a href="#"> Patients List </a></li>
                    <li class="even"><a href="#"> Products List </a></li>
                </ul>
            </nav>

            <!-- breadcrumbs -->
            <section id="breadcrumbsContainer">
                <a href="index.php" class="prevBreadcrumbs"> Home Page </a>
                <a href="#"> New Report </a>
            </section>

            <main>

                <section id="reportBuilder">
        
                    <section id="reportBuilderLeftSide">
                        <br>
                        <p id="repTitle">Create new Report</p>
                        <form id="newReport" method='GET' action="reportBuilder.php">
                            <div id="fild">
                                <p>Deatils:</p>
                                <label>
                                    <input type="checkbox" id="cb1" name="name" value="1" class="form-check-input">
                                    Full Name<br>
                                </label>
                                <br>    
                                <label>
                                    <input type="checkbox" id="cb2" name="age" value="1" class="form-check-input">
                                    Age<br>
                                </label>
                                <label>
                                    <input type="checkbox" id="cb3" name="npro" value="1" class="form-check-input">
                                    Nutritional profile<br>
                                </label>
                                <label>
                                    <input type="checkbox" id="cb4" name="ndapp" value="1" class="form-check-input">
                                    Nutrition diary application <br>
                                </label>
                                <label>
                                    <input type="checkbox" id="cb5" name="lsts" value="1" class="form-check-input">
                                    Last sync <br>
                                </label>
                                <label>
                                    <input type="checkbox" id="cb11" name="trp" value="1" class="form-check-input">
                                    Therapist <br>
                                </label>
                                <br>
                                <p>Goals:</p>
                                <label>
                                    <input type="checkbox" id="cb6" name="mpro" value="1" class="form-check-input">
                                    More protein <br>
                                </label>
                                <label>
                                    <input type="checkbox" id="cb7" name="lesg" value="1" class="form-check-input">
                                    Less sugar <br>
                                </label>
                                <label>
                                    <input type="checkbox" id="cb8" name="gltf" value="1" class="form-check-input">              
                                    Gluten free <br>
                                </label>
                                <label>
                                    <input type="checkbox" id="cb9" name="lesm" value="1" class="form-check-input">
                                    Less sodium <br>
                                </label>
                                <label>
                                    <input type="checkbox" id="cb10" name="plod" value="1" class="form-check-input">
                                    Paleo diet <br>
                                </label>
                                <label>
                                    <input type="checkbox" id="cb12" name="veg" value="1" class="form-check-input">
                                    Vegen <br>
                                </label>

                                <br>

                                <button id="selectAllBtn" type="button" class="btn btn-primary">Select All</button>
                                <button id="buildReportBtn" type="sumbit" class="btn btn-primary">Build Report</button>
                            </div>
                            
                        </form>

                    </section>
            
                    <section id="message">
                        <br>
                        <h2>Selected Fields</h2>

                        <p id="f1" class="fid"> - Full Name <p>
                        <p id="f2" class="fid"> - Age </p>
                        <p id="f3" class="fid"> - Nutritional profile </p>
                        <p id="f4" class="fid"> - Nutrition diary application</p>
                        <p id="f5" class="fid"> - Last sync</p>
                        <p id="f11" class="fid"> - Therapist </p>
                        <p id="f6" class="fid"> - Goals: More protein </p>
                        <p id="f7" class="fid"> - Goals: Less sugar</p>
                        <p id="f8" class="fid"> - Goals: Gluten free</p>
                        <p id="f9" class="fid"> - Goals: Less sodium</p>
                        <p id="f10" class="fid"> - Goals:Paleo diet </p>
                        <p id="f12" class="fid"> - Goals:Vegen </p>
                 
                    </section>

                </section>

            </main>

            <footer>&copy Health Wizard</footer>

            <div class="clear"></div>

        </div>

        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
            <a href="reportBuilder.php"
            class="closeModal">&times; Report Created Successfully</a>
            </div>
        
        </div>

    </body>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/report.js"> </script>

</html>