<?php
session_start();
if(isset($_SESSION['userName'])){

} 
else{
header("location:index.php");

}
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
            <li ><a class="logout" href="../php/logout.php">logout</a></li>
            <li><p id="clock" class="clock"></p></li>
            <li><p id="date" class="date"></p></li>
        </ul>
    </nav>
    <div class="container">
        <h1 style="font-size: 50px">Welcome, <br> To your most relaible clock-in website! </h1>

        <div class="login">
           <h1>Login<h1>
            <form method ="post">
            <div class="txt_field">
                <input type="text" name="afdeling">
                <span></span>
                <label>Department</label>
            </div>
            <div class="txt_field">
                <input type="text" name="project">
                <span></span>
                <label>Project</label>
            </div>
            <div class="txt_field">
                <input type="Date" name="date">
                <span></span>
                <label>Date</label>
            </div>
            <div class="txt_field">
                <input type="Number" name="uur">
                <span></span>
                <label>Amount of hours</label>
            </div>
            <input type="submit" value="Login" name="submit">    
            </form>     
        </div>
</div>

    <script src="../js/clock.js"></script>
</body>
</html>