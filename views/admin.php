<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/clock.js"></script>   
	<title>Overview</title>
</head>
<body onload="startTime()">
    <nav>
        <ul>
            <li><p id="clock" class="clock"></p></li>
            <li><p id="date" class="date"></p></li>
            <li><a href="adminNL.php">Nederlands</a></li>
            <li ><a class="logout" href="../php/logout.php">logout</a></li> 
        </ul>
    </nav>
   <div class="container">
      <h1>Admin page, here you can see everyone's work!</h1>
      <table style="overflow-x: auto; background: white; width: 50%; margin-top: 4%; border-radius: 0px;">
            <tr>
               <th>ID</th>
               <th>Department</th>
               <th>Project</th>
               <th>Date</th>
               <th>Hours</th>
            </tr>

            <?php
               include "../php/functions.php";
               DisplayData();
            ?>
         </table>
   </div>
</body>
</html>