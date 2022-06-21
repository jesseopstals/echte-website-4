<?php
//--------------------------------------------------------------Login functions--------------------------------------------------------

function emptyCheck($userName, $pwd) {

    $result;

    if(empty($userName) || empty($pwd)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}


function uidExists($conn,$userName) {

    $stmt = mysqli_stmt_init($conn);
    $sql = "SELECT * FROM medewerker WHERE email = ? ";      //zorgt ervoor dat hij alles selecteert van naam bij medewerker

    if(!mysqli_stmt_prepare($stmt,$sql)){
        print "stmt failed";
        exit();
    }

    mysqli_stmt_bind_param($stmt,"s",$userName);             
    mysqli_stmt_execute($stmt);                             //zoekt ingevuled naam in database

    $resultData = mysqli_stmt_get_result($stmt); //selecteert hele row

    if($row = mysqli_fetch_assoc($resultData)){           
        return $row;

    }
    else {
        $result = false;
        return $result;

    }
    mysqli_stmt_close($stmt);
}



function loginUser($conn,$userName,$pwd) {
 $uidExists = uidExists($conn,$userName);

    if($uidExists === false){
        header("location:../views/index.php?error=usernamenotfound");
        exit();
    }
    $pwdDB = $uidExists["password"];                        //geeft pwddb de waarde van wahtwoord in database
    $checkpwd = $pwd == $pwdDB ? true : false;              //checkt database ww met ingevulde ww

    if($checkpwd === false) {
        header("location:../views/index.php?error=wrongpassword");
        exit();
    }
    else if ($checkpwd === true) {
        if( $uidExists["rang"] == "admin") {
        session_start();
        $_SESSION['userid'] = $uidExists["id"];
        $_SESSION['naam'] = $uidExists["naam"];
        $_SESSION['userName'] = $uidExists["email"];
        header("location:../views/admin.php");
        exit();
       }
        if( $uidExists["rang"] == "user") { 
        session_start();
      $_SESSION['userid'] = $uidExists["id"];
        $_SESSION['naam'] = $uidExists["naam"];
       $_SESSION['userName'] = $uidExists["email"];
       header("location:../views/clockin.php");
       exit();
    }
       
      else{
        header("location:../views/clockin.php?");
      }
 }
}





//------------------------------------------------Register-----------------------------------------
function db() {
    $servername = "localhost";
    $user = "root";
    $password = "";
    $dbname = "urenregistratiesysteem";

    // Create connectie
    $conn = new mysqli($servername, $user, $password, $dbname);

    // Checkt connectie
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

 

function StoreData() {
    $afdeling = $_POST['afdeling'];
    $project = $_POST['project'];
    $datum = $_POST['datum'];
    $uur = $_POST['uur'];
   



    // gebruik de connectie als variabel
    $conn = db();
  


    $sql = "INSERT INTO `urengegevens` (`afdeling`, `project`, `datum`, `uren`) VALUES ('$afdeling' , '$project', '$datum' , '$uur')";

   // Als de query goed is opgeslagen gaat die door anders krijg je een error
    if ($conn->query($sql) != TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

function DisplayData() {
    $conn = db();

    $sql = "SELECT * FROM `medewerker`";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        // output data of each row of your database
        while($row = $result->fetch_assoc()) {

            // admin table

        }
    }

    $conn->close();
}