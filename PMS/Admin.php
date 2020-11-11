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

    <title>Bootstrap 4, from LayoutIt!</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style type="text/css">
      body{
           background: url('https://bmsit.ac.in/public/assets/images/slider/main.jpg'); 
           background-position: center;
           background-repeat: no-repeat; 
           background-attachment: fixed;
           background-size: 100% 100%;
         }
       h3{
          color:white;
         }
       a{
         color:yellow;
        }
       a:hover {
          color: green;
          background-color: transparent;
          text-decoration: underline;
         }
       a:active {
          color: red;
          background-color: transparent;
          text-decoration: underline;
        }

    </style>

  </head>
<body>
    <div class="container-fluid">
  <div class="row">
    <div class="col-md-4">
      <img alt="BMSIT Logo" src="images/logo.png" width="200" height="100" class="rounded">
    </div>
    <div class="col-md-6">
      <h3 class="text-danger text-left">
        Project Management System
      </h3>
    </div>
    <div class="col-md-2">
      <h3>
       <?php
       print $role;
       ?>
     </h3>
    </div>
  </div>
  <div class="row">
    <div class="col-md-1">
       
      <a href="ADMIN/student.php">
        Add Student
      </a>
    </div>
    <div class="col-md-1">
       
      <a href="ADMIN/faculty.php">
        Add Faculty
      </a>
    </div>
    <div class="col-md-1">
       
      <a href="ADMIN/stsearch.php">
        Search Student
      </a>
    </div>
    <div class="col-md-1">
       
      <a href="ADMIN/fa_search.php">
        Search Faculty
      </a>
    </div>
    <div class="col-md-1">
       
      <a href="ADMIN/allocate.php">
        Allocate
      </a>
    </div>
    <div class="col-md-1">
       
      <a href="ADMIN/skill.php">
        Skill Matrix
      </a>
    </div>
    <div class="col-md-1">
       
      <a href="ADMIN/report.php">
        Reports
      </a>
    </div>
    <div class="col-md-1">
       
      <a href="logout.php">
        Logout
      </a>
    </div>
    <div class="col-md-4">
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
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
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
    print $role;
    echo "<br/>";
    print $user;
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
</table>
 <?php
}
else   
{
?>
      <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
    print $role;
    echo "<br/>";
    print $user;
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
</table>
<p>
  <?php
}
?>
    
    
</p>
<p>&nbsp;</p>
  </table>
</table></body>