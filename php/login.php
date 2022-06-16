<?php

if(isset($_POST["submit"])){ 
    $userName = $_POST['email'];
    $pwd = $_POST['password'];


    require "functions.php";
    require "db.connection.php";

    if(emptyCheck($userName,$pwd) !== false){
        header("location:../views/index.php?error=emptyinput");
        exit();
    }


    loginUser($conn, $userName, $pwd);

}
else {
    header("location:../views/index.php?");
    exit();
}