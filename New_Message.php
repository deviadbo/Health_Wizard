<!DOCTYPE html>

<html>

    <head>

        <meta charset="UTF-8">
        <title> Health Wizard - Review Profile </title>
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
                <a href="Review Profile.php" class="prevBreadcrumbs"> Review Profile </a>
                <a href="#"> New Message </a>
            </section>

            <main>

                <section id="reportBuilder">
                    <section id="reportBuilderLeftSide">
                        <form id="newReport">
            
                            <label class="form-label" for="achieveGoalsInput"> Achieved Goals? yes - leave empty, no - type "not"</label>
                            <input id="achieveGoalsInput" type="text" class="form-control averageInput" name="achieveGoalsInput" >

                            <label class="form-label" for="lowestCompatibilityProductInput"> Product That Caught My Attention </label>
                            <input id="lowestCompatibilityProductInput" type="text" class="form-control averageInput" name="lowestCompatibilityProduct">
                
                            <label class="form-label" for="compatibilityInput"> Compatibility </label>
                            <br>
                            <input id="compatibilityInput" class="averageInput" type="range" name="compatibility" value="1">
                
                            <label class="form-label" for="unachievedGoalInput"> Unachieved Goal </label>
                            <input  id="unachievedGoalInput" class="form-control averageInput" type="text" name="unachievedGoal">
                            
                        </form>
                    </section>
            
                    <section id="message">
            

                        <?php

                            include 'db.php';
                            include 'config.php';

                            $user = htmlspecialchars($_GET["user"]);

                            $query ="SELECT * FROM tbl_204_clients AS clients
                                INNER JOIN tbl_204_health_profile AS health 
                                ON health.id = clients.id WHERE clients.id = $user";

                            $result = mysqli_query($connection , $query);
                            $row = mysqli_fetch_assoc($result);

                        ?>

                        <span>Dear</span>

                        <?php echo "<h3>$row[name]</h3>";?>
                        <span>, </span>
                        <br>
                        <span>During the examination of your last week consumption and your statements at</span>
                        <?php echo "<h3> $row[nutrition_diary_app] </h3>"; ?>
                        <span>, it was clear that you did </span>
                        <h3 id="achieveGoals"></h3>    
                        <span>achieve the goals you set for yourself. </span>
                        <span>The main product that caught my attention was </span>
                        <h3 id="lowestCompatibilityProduct"></h3>
                        <span>with </span>
                        <h3 id="compatibility"></h3>
                        <span>% compatibility.</span>
                        <span>Keep in mind, consuming food rich with </span>
                        <h3 id="unachievedGoal"></h3>
                        <span>can be more dangerous than you think, especially in combination with </span>
                        <?php echo "<h3> $row[nutritional_pro] </h3>"; ?>
                        <br>
                        <span>Health and success,</span>
                        <br>
                        <?php echo "<h3> $row[therapist] </h3>"; ?>

                        <button id="buildReport" type="button" class="btn btn-primary">
                            Send Message
                        </button>

                    </section>

                </section>

            </main>

            <footer>&copy Health Wizard</footer>

        </div>

        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class='modal-content'>
                <a href="Patients_Exceptions_Report.php?sort=message_sent" class="closeModal">&times; Message Sent Successfully</a>
            </div>

            <?php

                $update =  "UPDATE tbl_204_clients
                            SET msg_sent = true, msg_sent_time=CURRENT_TIMESTAMP
                            WHERE id = $user";
             
                mysqli_query($connection , $update);
                
            ?>
        
            <div class="clear"></div>

        </div>

    </body>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/message.js"> </script>

</html>