<?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];

// include '../connection.php';

if(empty($_SESSION['Email']))
{
header("location:index.php");
}
else
{
if($role=="Admin")
{
  // header("location:../Admin.php?image=image.php");
?>
  <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="icon" type="image/png" href="../images/logo.png" type="image/x-icon">
        <title>Project Management System</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/mail.css" rel="stylesheet">
  </head>
  <body>
    
 <?php
 header("location:../Admin.php");
}
elseif($role=="Faculty")    
{
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="icon" type="image/png" href="../images/logo.png" type="image/x-icon">
        <title>Project Management System</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/meeting.css" rel="stylesheet">
  </head>
    <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 topnavbar">
          <div class="message-box">
            <label style="float: right;" class="message">
            <?php
            print $role;
            echo "<br/>";
            print $user;
            ?> 
            </label>
          </div>
          <div style="float: left; padding-right: 1%;">
            <a href="../Admin.php"><img src="../images/logo.png" height="80"/></a>
          </div>
          <br>
          <div>
            <a class="bms" style="color: #fff;">BMS</a><br />
            <a class="institute" style="color: #fff;">INSTITUTE OF TECHNOLOGY</a>
            <a class="bmsit" style="color: #fff;">BMSIT</a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="topnav" id="myTopnav">
          <a class="nav-link" href="skill.php">
            <span class="material-icons hidden-sm-down hidden-md-down">insights</span>&nbsp;&nbsp;&nbsp; Skill Matrix
          </a>
          <a class="nav-link" href="view.php">
            <span class="material-icons hidden-sm-down hidden-md-down">view_module</span>&nbsp;&nbsp;&nbsp; View
          </a>
          <a class="nav-link" href="mail.php">
            <span class="material-icons hidden-sm-down hidden-md-down">email</span>&nbsp;&nbsp;&nbsp; Mail
          </a>
          <a class="nav-link" href="meeting.php">
            <span class="material-icons hidden-sm-down hidden-md-down">book_online</span>&nbsp;&nbsp;&nbsp; Meeting
          </a>
          <a class="nav-link" href="report.php">
            <span class="material-icons hidden-sm-down hidden-md-down">description</span>&nbsp;&nbsp;&nbsp; Reports
          </a>
          <a class="nav-link" href="../logout.php">
            <span class="material-icons hidden-sm-down hidden-md-down">power_settings_new</span>&nbsp;&nbsp;&nbsp; Logout
          </a>
          <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <span class="material-icons">reorder</span>
          </a>
        </div>  
      </div>
      <br><br>
    <div style="overflow-x:auto;">
    <table width="60%" cellpadding="05" cellspacing="01" border="0" align="center">
            <?php
                echo "<tr>";
                echo "<th>"."Meeting ID"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Faculty ID"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Student ID"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Date"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Time"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Description"."</th>";
                echo "</tr>";
                include '../connection.php';
                        $sql1="select * from meeting where f_id = '$user' ";
                        $rec=mysqli_query($conn, $sql1);
                        while ($std=mysqli_fetch_assoc($rec))
                        {
                           ?> <tr bgcolor="beige" align="center"><?php
                            echo "<td>".$std['meeting_id']."<td/>";
                            echo "<td>".$std['f_id']."<td/>"; 
                            echo "<td>".$std['s_id']."<td/>"; 
                            echo "<td>".$std['date']."<td/>"; 
                            echo "<td>".$std['time']."<td/>"; 
                            echo "<td>".$std['desc']."<td/>"; 
                            ?>  </tr> <?php 
                        }
            ?>
        </table>
      </div>
    </form>

    <?php
}
?>
</table>
  <?php
}
?>
<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
      <script src="js/scripts.js"></script>
      <script type="text/javascript">
        function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
      </script>    
  </body>
</html>