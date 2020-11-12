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
		<div class="col-md-12 topnavbar">
      <div style="float: left; padding-right: 1%;">
        <img src="images/logo.png" height="80"/>
      </div>
      <br>
      <div style="float: left;">
        <a style="font-family: Arial; font-size: 130%; color: #fff; font-weight: 600">BMS</a><br />
        <a style="font-family: Calibri; color: #fff; font-size: 118%; font-weight: 600">INSTITUTE OF TECHNOLOGY</a>
      </div>

       <div class="col-md-12">
        <ul class="nav">
        <li class="nav-item">
          <a class="nav-link active" href="ADMIN/student.php">
            <span class="material-icons hidden-md-down">face</span><br class="hidden-md-down"> Student
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="ADMIN/faculty.php">
            <span class="material-icons hidden-md-down">assignment_ind</span><br class="hidden-md-down"> Faculty
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="ADMIN/stsearch.php">
            <span class="material-icons hidden-md-down">search</span><br class="hidden-md-down"> Student Search
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="ADMIN/fa_search.php">
            <span class="material-icons hidden-md-down">book_online</span><br class="hidden-md-down">Faculty Search
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="ADMIN/allocate.php">
            <span class="material-icons hidden-md-down">mediation</span><br class="hidden-md-down"> Allocate
          </a>
        </li>
                <li class="nav-item">
          <a class="nav-link" href="ADMIN/skill.php">
            <span class="material-icons hidden-md-down">insights</span><br class="hidden-md-down"> Skill Matrix
          </a>
        </li>
                <li class="nav-item">
          <a class="nav-link" href="ADMIN/report.php">
            <span class="material-icons hidden-md-down">description</span><br class="hidden-md-down"> Reports
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">
            <span class="material-icons hidden-md-down">power_settings_new</span><br class="hidden-md-down"> Logout
          </a>
        </li>
      </ul>
      </div>
    </div>
    </div>
  </div>
  <div class="container-fluid">
  <div class="row mid-row">
    <div class="col-md-12 col-lg-12">
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
    <div class="col-md-12 topnavbar">
      <div style="float: left; padding-right: 1%;">
        <img src="images/logo.png" height="80"/>
      </div>
      <br>
      <div style="float: left;">
        <a style="font-family: Arial; font-size: 130%; color: #fff; font-weight: 600">BMS</a><br />
        <a style="font-family: Calibri; color: #fff; font-size: 118%; font-weight: 600">INSTITUTE OF TECHNOLOGY</a>
      </div>
      <div class="col-md-12">
        <ul class="nav">
        <li class="nav-item">
          <a class="nav-link active" href="FACULTY/skill.php">
            <span class="material-icons hidden-md-down">insights</span><br class="hidden-md-down"> Skill Matrix
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="FACULTY/view.php">
            <span class="material-icons hidden-md-down">view_module</span><br class="hidden-md-down"> View
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="FACULTY/mail.php">
            <span class="material-icons hidden-md-down">email</span><br class="hidden-md-down"> Mail
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="FACULTY/meeting.php">
            <span class="material-icons hidden-md-down">book_online</span><br class="hidden-md-down"> Meeting
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="FACULTY/#">
            <span class="material-icons hidden-md-down">description</span><br class="hidden-md-down"> Reports
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">
            <span class="material-icons hidden-md-down">power_settings_new</span><br class="hidden-md-down"> Logout
          </a>
        </li>
      </ul>
      </div>
    </div>
    </div>
  </div>
  <div class="container-fluid">
  <div class="row mid-row">
    <div class="col-md-12 col-lg-12">
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
  </body>
</html>
    <!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style>
	body
	{
		background-image:url(home.png);
		background-repeat: no-repeat; 
		background-attachment: fixed;
		background-size: 100% 100%;
	}
        a link{
            text-decoration: none;
        }
</style>
<title>Project Management System</title>
</head>
<div>
<body>
    <table width="100%"  border="0"cellspacing="00" cellpadding="00">
  <tr bgcolor="#D2691E">
    <th width="74" scope="col">&nbsp;</th>
    <th width="164" scope="col"><img src="images/logo1.png" alt="LOGO"></th>
    <th width="646" scope="col"><font size="8" color="White">Project Managenent System</font></th>
    <th width="140" scope="col"><font color="White" size="5">
    <?php
    //print $role;
    //echo "<br/>";
    //print $user;
    ?>
        </font></th>
    <th width="63" scope="col">&nbsp;</th>
  </tr>
    </table>
  <table width="100%" border="0" cellspacing="00" cellpadding="00">
      <tr bgcolor="#99CCFF">
      <th width="7%" scope="col"><h4>&nbsp;</h4></th>
      <th width="15%" scope="col"><a href="FACULTY/skill.php">Skill Matrix</a></th>
      <th width="14%" scope="col"><a href="FACULTY/view.php">View</a></th>
      <th width="15%" scope="col"><a href="FACULTY/mail.php">Mail</a></th>
      <th width="13%" scope="col"><a href="FACULTY/meeting.php">Meeting</a></th>
      <th width="15%" scope="col"><a href="FACULTY/#">Reprots</a></th>
    <th width="15%" scope="col"><a href="logout.php">Logout</a></th>
    <th width="6%" scope="col">&nbsp;</th>
  </tr>
       <tr>
        <td colspan="10"><img src="home.png" height="50%" width="100%"></img></td>
    </tr>
</table>-->
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
    <div class="col-md-12 topnavbar">
      <div style="float: left; padding-right: 1%;">
        <img src="images/logo.png" height="80"/>
      </div>
      <br>
      <div style="float: left;">
        <a style="font-family: Arial; font-size: 130%; color: #fff; font-weight: 600">BMS</a><br />
        <a style="font-family: Calibri; color: #fff; font-size: 118%; font-weight: 600">INSTITUTE OF TECHNOLOGY</a>
      </div>
      <div class="col-md-12">
        <ul class="nav">
        <li class="nav-item">
          <a class="nav-link active" href="STUDENT/project.php">
            <span class="material-icons hidden-md-down">article</span><br class="hidden-md-down"> Project
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="STUDENT/skill.php">
            <span class="material-icons hidden-md-down">insights</span><br class="hidden-md-down">View Skill Matrix
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="STUDENT/mail.php">
            <span class="material-icons hidden-md-down">email</span><br class="hidden-md-down"> Mail
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">
            <span class="material-icons hidden-md-down">power_settings_new</span><br class="hidden-md-down"> Logout
          </a>
        </li>
      </ul>
      </div>
    </div>
    </div>
    </div>
  <div class="container-fluid">
  <div class="row mid-row">
    <div class="col-md-12 col-lg-12">
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
  </body>
</html>
      <!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style>
	body
	{
		background-image:url(home.png);
		background-repeat: no-repeat; 
		background-attachment: fixed;
		background-size: 100% 100%;
                
	}
        a link{
            text-decoration: none;
        }
</style>
<title>Project Management System</title>
</head>
<div>
<body>
    <table width="100%"  border="0"cellspacing="00" cellpadding="00">
  <tr bgcolor="#D2691E">
    <th width="74" scope="col">&nbsp;</th>
    <th width="164" scope="col"><img src="images/logo1.png" alt="LOGO"></th>
    <th width="646" scope="col"><font size="8" color="White">Project Managenent System</font></th>
    <th width="140" scope="col"><font color="White" size="5">
	<?php
   // print $role;
    //echo "<br/>";
   // print $user;
    ?></font></th>
    <th width="63" scope="col">&nbsp;</th>
  </tr>
    </table>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="#99CCFF">
      <th width="7%" scope="col"><h4>&nbsp;</h4></th>
    <th width="13%" scope="col"><a href="STUDENT/project.php">Project</a></th>
    <th width="12%" scope="col">&nbsp;</th>
    <th width="13%" scope="col"><a href="STUDENT/skill.php">View Skill Matrix</a></th>
    <th width="11%" scope="col">&nbsp;</th>
    <th width="13%" scope="col"><a href="STUDENT/mail.php">Mail</a></th>
    <th width="12%" scope="col">&nbsp;</th>
    <th width="13%" scope="col"><a href="logout.php">Logout</a></th>
    <th width="6%" scope="col">&nbsp;</th>
  </tr>
       <tr>
        <td colspan="10"><img src="home.png" height="50%" width="100%"></img></td>
    </tr>
</table>
<?php
}
?>
</table> -->
<p>
  <?php
}
?>    
</p>
<p>&nbsp;</p>
  </table>
</table></body>