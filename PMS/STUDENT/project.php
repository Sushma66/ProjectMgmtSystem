<?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];

if(isset($_POST['bppf'])){
if (isset($_FILES['ppf']))
{
    $file= $_FILES['ppf'];
    //file properties
    $file_name=$file['name'];
    $file_temp=$file['tmp_name'];
    $file_size=$file['size'];
    $file_error=$file['error'];
    // work out the extension
    $file_ext = explode('.', $file_name);
    $file_ext=  strtolower(end($file_ext));
    $allowed= array('docx','doc','txt','pdf');
    
    if(in_array($file_ext, $allowed))
    {
        if($file_error===0)
        {
            if($file_size<=9999999999)
            {
                $file_name_new=uniqid('',TRUE).'.'.$file_ext;
                $file_destination='../ppf/'.$file_name_new;
                if(move_uploaded_file($file_temp, $file_destination))
                {
                    //echo $file_destination;
                    include '../connection.php';
                    $sql = "UPDATE project SET ppf='$file_name' WHERE s_id='$user'";
                    mysqli_query($conn, $sql);
                    $conn->close();
                    header('Location:project.php'); 
                }
            }
        }
    }
}
}
elseif(isset($_POST['bpsf']))
{
if (isset($_FILES['psf']))
{
    $file= $_FILES['psf'];
    //file properties
    $file_name=$file['name'];
    $file_temp=$file['tmp_name'];
    $file_size=$file['size'];
    $file_error=$file['error'];
    // work out the extension
    $file_ext = explode('.', $file_name);
    $file_ext=  strtolower(end($file_ext));
    $allowed= array('docx','doc','txt','pdf');
    
    if(in_array($file_ext, $allowed))
    {
        if($file_error===0)
        {
            if($file_size<=9999999999)
            {
                $file_name_new=uniqid('',TRUE).'.'.$file_ext;
                $file_destination='../psf/'.$file_name_new;
                if(move_uploaded_file($file_temp, $file_destination))
                {
                    //echo $file_destination;
                    include '../connection.php';
                    $sql = "UPDATE project SET psf='$file_name' WHERE s_id='$user'";
                    mysqli_query($conn, $sql);
                    $conn->close();
                    header('Location:project.php'); 
                }
            }
        }
    }
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
</head>  -->

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
    <link href="../css/studentstyles.css" rel="stylesheet">
  </head>

<div>
<body>
<?php
header('Location:../Admin.php');
}
elseif($role=="Faculty")    
{
    header('Location:../Admin.php');
?>   
<?php
}
else   
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
        a link{
            text-decoration: none;
        }
</style>
<title>Project Management System</title>
</head>  -->

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
    <link href="../css/studentstyles.css" rel="stylesheet">
  </head>
<div>
<body>
  <!-- <table width="100%"  border="0"cellspacing="00" cellpadding="00">
  <tr bgcolor="#D2691E">
    <th width="74" scope="col">&nbsp;</th>
    <th width="164" scope="col"><a href="../Admin.php"><img src="../logo1.png" alt="LOGO"/></a></th>
    <th width="646" scope="col"><font size="8" color="White">Project Managenent System</font></th>
    <th width="140" scope="col"><font color="White" size="5">
  <?php
    //print $role;
    //echo "<br/>";
    //print $user;
    ?></font></th>
    <th width="63" scope="col">&nbsp;</th>
  </tr>
    </table>
  <table width="100%" border="0" cellspacing="00" cellpadding="00">
      <tr bgcolor="#99CCFF">
          <th width="7%" scope="col"><h4>&nbsp;</h4></th>
          <th width="13%" scope="col"><a href="project.php">Project</a></th>
    <th width="12%" scope="col">&nbsp;</th>
    <th width="13%" scope="col"><a href="skill.php">View Skill Matrix</a></th>
    <th width="11%" scope="col">&nbsp;</th>
    <th width="13%" scope="col"><a href="mail.php">Mail</a></th>
    <th width="12%" scope="col">&nbsp;</th>
    <th width="13%" scope="col"><a href="../logout.php">Logout</a></th>
    <th width="6%" scope="col">&nbsp;</th>
  </tr> -->



  <!--   <div class="container-fluid">
  <div class="row">
    <div class="col-md-12 topnavbar">
      <div style="float: left; padding-right: 1%;">
        <img src="../images/logo.png" height="80"/>
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
    </div> -->

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
          <a class="nav-link" href="project.php">
            <span class="material-icons hidden-sm-down hidden-md-down">article</span>&nbsp;&nbsp;&nbsp; Project
          </a>
          <a class="nav-link" href="skill.php">
            <span class="material-icons hidden-sm-down hidden-md-down">insights</span>&nbsp;&nbsp;&nbsp; View Skill Matrix
          </a>
          <a class="nav-link" href="mail.php">
            <span class="material-icons hidden-sm-down hidden-md-down">email</span>&nbsp;&nbsp;&nbsp; Mail
          </a>
          <a class="nav-link" href="../logout.php">
            <span class="material-icons hidden-sm-down hidden-md-down">power_settings_new</span>&nbsp;&nbsp;&nbsp; Logout
          </a>
          <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <span class="material-icons">reorder</span>
          </a>
    </div>
  </div>
</div>
    <br><br>
<?php
}
?>
<!-- </table> -->
<p>
  <?php
}
?>    
</p>

<form method="post" action="project.php" enctype="multipart/form-data">
 <div class="container-fluid" align="center">
  <div class="row justify-content-center">
     <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
      <div class="display-box">
        <h3><u>Project Proposal</u></h3>
        <div class="message1">
        <label style="float: center;"></label>
        <input type="file" name="ppf"/><br/><br/>
        <input id="bt" type="submit" class="submit" name="bppf" value="upload"/>
        <br/>
      </div>
      </div>
    </div>
    </br></br><br><br>

     <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
      <div class="display-box" >
        <h3><u>Project Specification</u></h3>    
        <div class="message1">
        <label style="float: center;"></label>
        <input type="file" name="psf"/><br/><br/>
        <input id="bt" type="submit" class="submit" name="bpsf" value="upload"/>
        <br/>
      </div>
      </div>
    </div>
  </div>
</div>
</form>
<br><br>

<form method="post" action="project.php"> 
  <div class="container-fluid" align="center">
  <div class="row justify-content-center">
    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
      <div class="display-box" >
        <h3><u>Feedback</u></h3>    
        <div class="message1">
        <label style="float: center;"></label>
        <?php
          if(isset ($_POST['feedback']))
          {
            include '../connection.php';
            $sql1="select * from project where s_id ='$user' ";
            $rec=mysqli_query($conn, $sql1);
            while($std=mysqli_fetch_assoc($rec))
            {
        ?>
        <div class="form-control">
        <!-- <textarea name="feedback" width="100%" height="auto" float="justify-content-center" readonly="  readonly" placeholder="FEEDBACK"> -->
        <?php echo $std['remark'];
        ?>
        <!-- </textarea> -->
        </div></br>
        <?php 
            }
          }
        ?>
         </br>
        <input id="bt"  type="submit" class="submit" name="feedback" value="Get Feedback"/><br/>
      </div>
      </div>
    </div>
  </div>
</div> 
<br/><br>
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


<!-- <div style="background-color: #D2691E; width: 70%; margin-left: 15%; margin-top: 0px; ">
    <br/><br /><br />
<form method="post" action="project.php" enctype="multipart/form-data">
    
 <table width="100%" border="0" cellspacing="05" cellpadding="05">
  <tr>
    <th width="12%" scope="col">&nbsp;</th>
    <th width="37%" scope="col">&nbsp;</th>
    <th width="37%" scope="col">&nbsp;</th>
    <th width="13%" scope="col">&nbsp;</th>
  </tr> 
  <tr>
    <td>&nbsp;</td>
    <td align="center"><div style="background-color: beige;"><br/><h3>Project  Proposal</h3><br /><input type="file" name="ppf"/><br/><br/><input type="submit" name="bppf" value="upload"/><br/><br/></div></td>
    <td align="center"><div style="background-color: beige;"><br/><h3>Project  Specification</h3><br /><input type="file" name="psf"/><br/><br/><input type="submit" name="bpsf" value="upload"/><br/><br/></div></td>
    <td>&nbsp;</td>
  </tr> 
</form>
</table>
    <br /><br /> -->



 <!-- <form method="post" action="project.php"> 
    <div style="background-color: beige; width: 30%; margin-left: 35%">
        <table align="center">
    <tr>
    <td>&nbsp;<br/><br/></td>
    <?php
 // if(isset ($_POST['feedback']))
{
   // include '../connection.php';
     //               $sql1="select * from project where s_id ='$user' ";
       //             $rec=mysqli_query($conn, $sql1);
                    
         //           while($std=mysqli_fetch_assoc($rec))
                    {
                        ?>
    
    <td colspan="2" align="center"><textarea name="feedback" rows="5" cols="30" readonly="readonly" placeholder="FEEDBACK">
    <?php 
    //echo $std['remark'];?> </textarea> </td>  <td></td> </tr>
                      <?php 
                    }
}?>
    <tr> 
        <td></td>
        <td colspan="2" align="center"><input type="submit" name="feedback" value="Get Feedback"/><br/><br/></td>
    <td>&nbsp;</td>
  </tr></form>
  
</table>
   </div>       </body><br /><br /> </div>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body></div></html>
 -->