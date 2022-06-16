<?php

    $servername = "localhost";
    $username = "root";
    $password = "";

    // Database name
    $dbname = "urenregistratiesysteem";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection if not connected it will return a message
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // rob wtf doe jij allemaal??????
    // db.connection.php ???????????????????????????????????????? HAHAHAHAH :joy: :skull: :clown: