<?php
//--------------------------------------------------------------Login functions--------------------------------------------------------

function emptyCheck($userName,$pwd) {

    $result;

    if(empty($userName) || empty($pwd)) {
        $result = true;
    }
    else{
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

    mysqli_stmt_bind_param($stmt,"s",$userName);             //zoekt ingevuled naam in database
    mysqli_stmt_execute($stmt);                              //selecteert hele row

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){           
        return $row;

    }
    else {
        $result = false;
        return $result;

    }
    mysqli_stmt_close($stmt);
}



function loginUser($conn,$userName,$pwd){
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
    session_start();
    $_SESSION['userid'] = $uidExists["id"];
    $_SESSION['userName'] = $uidExists["email"];
    header("location:../views/clockin.php?");
    exit();
 }





//------------------------------------------------Register-----------------------------------------
class User {

    // Properties of what a user can have
    public $afdeling;
    public $project;
    public $datum;
    public $uur;
  
    // constructor so i can spare some lines of code
    function __construct($afdeling, $project, $datum, $uur) {
        $this->afdeling = $afdeling;
        $this->project_naam = $project;
        $this->datum = $datum;
        $this->aantal_uur = $uur;
    }
}

function db() {
$servername = "localhost";
$username = "urenregistratiesysteem";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
  
}

function StoreData() {

    // use the connection in as an variable 
    $conn = db();
    
    // Hier maak ik een object van de class user en ik noem hem hier: $user
    $user = new User($afdeling, $project, $datum, $uur);

    $sql = "INSERT INTO `medewerker` (`afdeling`, `project_naam`, `datum`, `aantal_uren`) 
    VALUES ($user->afdeling , $user->project, $user->datum , $user->uur)";
 
    // if the query to store is correct it will pass if not it will return an error to the user
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



      }
    }

    $conn->close();
}
}

