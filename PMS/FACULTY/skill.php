<?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];


include '../connection.php';
if(isset($_POST['update']))
{
           $domain=$_POST['domain'];
           $research=$_POST['research']; 
           $others=$_POST['others'];
           
           if (!empty($domain)|| !empty($research)||!empty($others))
           {
              
            $sql= "UPDATE `pmas`.`faculty` SET `domain` = '$domain', `research` = '$research', `others` = '$others' WHERE `faculty`.`f_id` = '$user';";
                mysqli_query($conn, $sql);
                $conn->close();
                header('Location:skill.php');  
           }
        else
            
        {
              echo 'Please fill up all fields';
              header('Location:skill.php');
        }  
}



if(empty($_SESSION['Email']))
{
header("location:index.php");
}
else
{
if($role=="Admin")
{
?>

<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
	body
	{
		background-image:url(../background.png);
		background-repeat: no-repeat; 
		background-attachment: fixed;
		background-size: 100% 100%;
	}
</style>
<title>Project Management System</title>
</head>
<div>
    <body> -->
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
    <link href="../css/facultystyles.css" rel="stylesheet">
  </head>
  <body>
<?php
   header('Location:../Admin.php');
   ?>
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
    <link rel="icon" type="image/png" href="../images/logo.png" type="image/x-icon">
    <title>Project Management System</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/facultystyles.css" rel="stylesheet">
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
    <div class="col-md-12">
      <div class="row">
          <div class="display-box">
            <form role="form" action="skill.php" method="post">
                        <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label>Domain   :<font color="red">*</font></label>
                                    </div>
                                    <input id="in" type="text" class="textbox" name="domain" style="color: #fff;">
                                </div>
                                <br>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label>Research  :<font color="red">*</font></label>
                                    </div>
                                    <input id="in" type="text" class="textbox" name="research" style="color: #fff;">
                                </div>
                                <br>
                            <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label>Other Skills: </label>
                                    </div>
                                    <input id="in" type="text" class="textbox" name="others" style="color: #fff;">
                                </div>
                            
                            <br>
                            <br>
                            <div class="text-center">
                                <input id="bt" type="submit" class="submit" name="update" value="Update" />
                            </div>
                   </form>
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

        <!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" type="text/css" href="../css.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style>
	body
	{
		background-image:url(../background.png);
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
    <th width="164" scope="col"><a href="../Admin.php"><img src="../logo1.png" alt="LOGO"/></a></th>
    <th width="646" scope="col"><font size="8" color="White">Project Managenent System</font></th>
    <th width="140" scope="col"><font color="White" size="5">
    <?php
    // print $role;
    // echo "<br/>";
    // print $user;
    ?>
        </font></th>
    <th width="63" scope="col">&nbsp;</th>
  </tr>
    </table>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="#99CCFF">
      <th width="7%" scope="col"> <h4>&nbsp;</h4></th>
    <th width="15%" scope="col"><a href="skill.php">Skill Matrix</a></th>
    <th width="14%" scope="col"><a href="view.php">View</a></th>
    <th width="15%" scope="col"><a href="mail.php">Mail</a></th>
    <th width="13%" scope="col"><a href="meeting.php">Meeting</a></th>
    <th width="15%" scope="col"><a href="#">Reprots</a></th>
    <th width="15%" scope="col"><a href="../logout.php">Logout</a></th>
    <th width="6%" scope="col">&nbsp;</th>
  </tr>
  </table>
      <form action="skill.php" method="post">
          <div style="background-color:beige; border:1px solid black; width:40%; margin-left:30%; margin-top:100px;">
              <br/>
              <table   cellspacing="05" cellpadding="05" align="center" width="100%">
    <tr>
      <td>&nbsp;</td>
      <td align="right"><font size="5">Domain : </font></td>
      <td><input id="in" type="text" name="domain"/><font color="red">*</font></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="right"><font size="5">Research : </font></td>
      <td><input id="in" type="text" name="research"/><font color="red">*</font></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="right"><font size="5">Other Skill (s) if any : </font></td>
      <td><input id="in" type="text" name="others"/></td>
      <td>&nbsp;</td>
    </tr>
    
    <tr>
        <td colspan="4" align="center"><input id="bt" type="submit" name="update" value="Update" /></td>
    </tr>
  </table>
          </div>
  </form> -->
 <?php
}
else   
{
?>
    <?php
   header('Location:../Admin.php');
   ?>
<?php
}
?>

    <?php
}
?>
    
    
    
  
