<?php
    include 'db.php';
    include 'config.php';

    session_start();

    if(!empty($_POST["loginMail"])) { // true if form was submitted
        
        $query  = "SELECT * FROM tbl_204_admins WHERE email='" 
            . $_POST["loginMail"] 
            . "' and password = '"
            . $_POST["loginPass"]
            ."'";

        $result = mysqli_query($connection , $query);
        $row    = mysqli_fetch_array($result);
        
        if(is_array($row)) {
            // echo 'Authentication success !';
            $_SESSION["user_name"] = $row['name'];
            $_SESSION["user_profession"] = $row['profession'];
            $_SESSION["user_img"] = $row['img'];

            header('Location: ' . 'index.php');

        } else {
            // echo 'Authentication failed !';
            $message = "Invalid username or password !";
        }
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Login</title>

    <link rel="stylesheet" href="css/style.css">

  </head>
  <body>

    <div class="login-wrap">
        <div class="login-html">
            <div id="logoContainer">
                <a href="#" class="logo"></a>
                <p> Health Wizard </p>
            </div> 

            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
            <div class="login-form">
                <form class="sign-in-htm" action="#" method="post">
                    <div class="group">
                        <label for="loginMail" class="label">Email</label>
                        <input name="loginMail" id="loginMail" type="email" class="input">
                    </div>
 
                    <div class="group">
                        <label for="loginPass" class="label">Password</label>
                        <input name="loginPass" id="loginPass" type="password" class="input" data-type="password">
                    </div>
                    <div class="group">
                        <input id="check" type="checkbox" class="check" checked>
                        <label for="check"><span class="icon"></span> Keep me Signed in</label>
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Sign In">
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <a href="#">Forgot Password?</a>
                    </div>

                    <div class="error-message"> <?php if(isset($message)) { echo $message; } ?></div>   
                </form>

                <form class="sign-up-htm" action="#" method="post">
                    <div class="group">
                        <label for="user" class="label">Name</label>
                        <input id="user" type="text" class="input">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Password</label>
                        <input id="pass" type="password" class="input" data-type="password">
                    </div>
  
                    <div class="group">
                        <label for="email" class="label">Email Address</label>
                        <input id="email" type="email" class="input">
                    </div>

                    <div class="group">
                        <label for="phone" class="label">Phone Number</label>
                        <input id="phone" type="phone" class="input">
                    </div>

                    <div class="group">
                        <label for="age" class="label">Age</label>
                        <input id="age" type="text" class="input">
                    </div>

                    <div class="group">
                        <input type="submit" class="button" value="Sign Up">
                    </div>

                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <label for="tab-1">Already Member?</a>
                    </div>
                    <div class="error-message"><?php if(isset($message)) { echo $message; } ?></div>
                </form>

            </div>
        </div>

    </div>

  </body>
  
</html>


