<?php

session_unset();
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">

    <title>Home</title>
</head>
<body onload="startTime()">
    <nav>
        <ul>
            <li><p id="clock" class="clock"></p></li>
            <li><p id="date" class="date"></p></li>
        </ul>
    </nav>
    <div class="container">
        <h1 style="font-size: 50px">Welcome, <br> Login to register your work! </h1>

        <div class="login">
            <h1>Login<h1>
            <form action='../php/login.php' method ="post">
            <div class="txt_field">
                <input type="text" name="email">
                <span></span>
                <label>Email</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password">
                <span></span>
                <label>Password</label>
            </div>
            <div class="error">
            <?php
                if(isset($_GET["error"])){
                    if($_GET["error"]=="emptyinput"){
                        echo "<div class='error'> <p class='error-message'>fill in all fields!</p> </div>";
                     }
                 else if ($_GET["error"]=="usernamenotfound"){
                     echo "<div class='error'> <p class='error-message'>username not found!</p> </div>";
                     }
                    else if ($_GET["error"]=="wrongpassword"){
                      echo "<div class='error'> <p class='error-message'>wrong password!</p> </div>";
                     }
                    }?>
                </div>
            <input type="submit" value="Login" name="submit">
            </form>     
        </div>
    </div>


    <script src="../js/clock.js"></script>
</body>


</html>