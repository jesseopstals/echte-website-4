
<?php
session_start()

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="../Images/Gilde.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <title>clock in</title>
</head>
<body onload="startTime()">
    <nav>
        <ul>
            <li><p id="clock" class="clock"></p></li>
            <li ><a class="logout" href="../php/logout.php">logout</a></li> 
            <li><p id="date" class="date"></p></li>
        </ul>
    </nav>
    <div class="container">
        <h1>Welcome, <br> Register your work here! </h1>

        <div class="login">
           <h1 style="padding: 1%">Clock in</h1>
            <form method="POST" action="clockin.php">
                <div style="display: flex;">
                    <div class="txt_field">
                        <label>Department</label>
                        <input type="text" name="afdeling">
                        <!--<select name="afdeling">!-->
                             <!--<option value="volvo">Volvo</option><!-->
                             <!--<option value="saab">Saab</option><!-->
                             <!--<option value="mercedes">Mercedes</option><!-->
                              <!--<option value="audi">Audi</option><!-->
                         <!--</select><!-->                  
                        <span></span>
                    </div>
                    <div class="txt_field">
                        <label>Project</label>
                        <input type="text" name="project">
                        <!--<select name="afdeling">!-->
                            <!--<option value="volvo">Volvo</option>!-->
                            <!--<option value="saab">Saab</option>!-->
                            <!--<option value="mercedes">Mercedes</option>!-->
                            <!--<option value="audi">Audi</option>!-->
                        <!--</select>!-->
                        <span></span>
                    </div>
                </div>
                <div style="display: flex;">
                    <div class="txt_field">
                        <label>Date</label>
                        <input type="Date" name="datum" >
                        <span></span>
                    </div>
                    <div class="txt_field">
                        <label>Amount of Hours</label>
                        <input type="Number" name="uur">
                        <span></span>
                    </div>
                </div>
                <div class="error">
                <?php
                    if(isset($_GET["error"])) {
                        if($_GET["error"] == "emptyinput") {
                            echo "<div class='error'> <p class='error-message'>fill in all fields!</p> </div>";
                        }
                        else if ($_GET["error"] == "usernamenotfound") {
                        echo "<div class='error'> <p class='error-message'>username not found!</p> </div>";
                        }
                        else if ($_GET["error"] == "wrongpassword") {
                        echo "<div class='error'> <p class='error-message'>wrong password!</p> </div>";
                        }
                    }
                        ?>
                    </div>
                <input type="submit" value="Clock in" id="submit" name="submit">    
                <?php
                    include "../php/functions.php";
                    if (isset($_POST["submit"])) {
                        StoreData($_SESSION['naam'],$_SESSION['userName']);
                    }
                ?>
            </form>
        </div>
</div>

    <script src="../js/clock.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer></script>
</body>
</html>