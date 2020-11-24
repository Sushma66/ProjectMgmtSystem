<?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];
if(empty($_SESSION['Email']))
{
header("location:index.php");
}
else
{
if($role=="Admin")
{
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Project Management System</title>
    <link rel="icon" type="image/png" href="images/logo.png" type="image/x-icon">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style2.css" rel="stylesheet">

    

  </head>
  <body >
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 topnavbar">
          <div style="float: left; padding-right: 1%;">
            <a href="Admin.php"><img src="images/logo.png" height="80"/></a>
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
          <a class="nav-link" href="ADMIN/student.php">
            <span class="material-icons hidden-sm-down hidden-md-down">face</span>&nbsp;&nbsp;&nbsp; Student
          </a>
          <a class="nav-link" href="ADMIN/faculty.php">
            <span class="material-icons hidden-sm-down hidden-md-down">assignment_ind</span>&nbsp;&nbsp;&nbsp; Faculty
          </a>
          <a class="nav-link" href="ADMIN/stsearch.php">
            <span class="material-icons hidden-sm-down hidden-md-down">search</span>&nbsp;&nbsp;&nbsp; Student Search
          </a>
          <a class="nav-link" href="ADMIN/fa_search.php">
            <span class="material-icons hidden-sm-down hidden-md-down">book_online</span>&nbsp;&nbsp;&nbsp; Faculty Search
          </a>
          <a class="nav-link" href="ADMIN/allocate.php">
            <span class="material-icons hidden-sm-down hidden-md-down">mediation</span>&nbsp;&nbsp;&nbsp; Allocate
          </a>
          <a class="nav-link" href="ADMIN/skill.php">
            <span class="material-icons hidden-sm-down hidden-md-down">insights</span>&nbsp;&nbsp;&nbsp; Skill Matrix
          </a>
          <a class="nav-link" href="ADMIN/report.php">
            <span class="material-icons hidden-sm-down hidden-md-down">description</span>&nbsp;&nbsp;&nbsp; Reports
          </a>
          <a class="nav-link" href="logout.php">
            <span class="material-icons hidden-sm-down hidden-md-down">power_settings_new</span>&nbsp;&nbsp;&nbsp; Logout
          </a>
          <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <span class="material-icons">reorder</span>
          </a>
        </div>  
      </div>
  <div class="row">
    <div class="col-md-12">
      <div class="display-box">
        <h2><u>WELCOME</u></h2>
        <br>
        <!--<div>-->
          <span class="material-icons">person</span>
        <!--</div>-->
        <div class="message">
        <label style="float: center;">
          <?php
            print $role;
          ?>
        </label>
      </div>
      </div>
    </div>
  </div>
</div>
</div>

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
   

 <?php
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
    <link rel="icon" type="image/png" href="images/logo.png" type="image/x-icon">
    <title>Project Management System</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style2.css" rel="stylesheet">
  </head>
  <body>
    <div class="container-fluid">
  <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 topnavbar">
          <div style="float: left; padding-right: 1%;">
            <a href="Admin.php"><img src="images/logo.png" height="80"/></a>
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
          <a class="nav-link" href="FACULTY/skill.php">
            <span class="material-icons hidden-sm-down hidden-md-down">insights</span>&nbsp;&nbsp;&nbsp; Skill Matrix
          </a>
          <a class="nav-link" href="FACULTY/view.php">
            <span class="material-icons hidden-sm-down hidden-md-down">view_module</span>&nbsp;&nbsp;&nbsp; View
          </a>
          <a class="nav-link" href="FACULTY/mail.php">
            <span class="material-icons hidden-sm-down hidden-md-down">email</span>&nbsp;&nbsp;&nbsp; Mail
          </a>
          <a class="nav-link" href="FACULTY/meeting.php">
            <span class="material-icons hidden-sm-down hidden-md-down">book_online</span>&nbsp;&nbsp;&nbsp; Meeting
          </a>
          <a class="nav-link" href="FACULTY/report.php">
            <span class="material-icons hidden-sm-down hidden-md-down">description</span>&nbsp;&nbsp;&nbsp; Reports
          </a>
          <a class="nav-link" href="logout.php">
            <span class="material-icons hidden-sm-down hidden-md-down">power_settings_new</span>&nbsp;&nbsp;&nbsp; Logout
          </a>
          <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <span class="material-icons">reorder</span>
          </a>
        </div>  
      </div>
  <div class="row">
    <div class="col-md-12">
      <div class="display-box">
        <h2><u>WELCOME</u></h2>
        <br>
        <!--<div>-->
          <span class="material-icons">person</span>
        <!--</div>-->
        <div class="message">
        <label style="float: center;">
          <?php
            print $role;
            echo "<br/>";
            print $user;
          ?>
        </label>
      </div>
      </div>
    </div>
  </div>
</div>
</div>

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
 <?php
}
else   
{
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" type="image/png" href="images/logo.png" type="image/x-icon">
    <title>Project Management System</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style2.css" rel="stylesheet">
  </head>
  <body>
    <div class="container-fluid">
  <div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12 topnavbar">
          <div style="float: left; padding-right: 1%;">
            <a href="Admin.php"><img src="images/logo.png" height="80"/></a>
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
          <a class="nav-link" href="STUDENT/project.php">
            <span class="material-icons hidden-sm-down hidden-md-down">article</span>&nbsp;&nbsp;&nbsp; Project
          </a>
          <a class="nav-link" href="STUDENT/skill.php">
            <span class="material-icons hidden-sm-down hidden-md-down">insights</span>&nbsp;&nbsp;&nbsp; View Skill Matrix
          </a>
          <a class="nav-link" href="STUDENT/mail.php">
            <span class="material-icons hidden-sm-down hidden-md-down">email</span>&nbsp;&nbsp;&nbsp; Mail
          </a>
          <a class="nav-link" href="logout.php">
            <span class="material-icons hidden-sm-down hidden-md-down">power_settings_new</span>&nbsp;&nbsp;&nbsp; Logout
          </a>
          <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <span class="material-icons">reorder</span>
          </a>
        </div>  
      </div>
  <div class="row">
    <div class="col-md-12">
      <div class="display-box">
        <h2><u>WELCOME</u></h2>
        <br>
        <!--<div>-->
          <span class="material-icons">person</span>
        <!--</div>-->
        <div class="message">
        <label style="float: center;">
          <?php
            print $role;
            echo "<br/>";
            print $user;
          ?>
        </label>
      </div>
      </div>
    </div>
  </div>
</div>
</div>

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
     
<?php
}
?>
</table>
<p>
  <?php
}
?>    
</p>
<p>&nbsp;</p>
  </table>
</table></body>