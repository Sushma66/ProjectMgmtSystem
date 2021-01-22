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
    $file_ext =  strtolower(end($file_ext));
    $allowed = array('docx','doc','txt','pdf');
    
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
                    $sql = "UPDATE project SET ppf='$file_name_new' WHERE s_id='$user'";
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
                    $sql = "UPDATE project SET psf='$file_name_new' WHERE s_id='$user'";
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
    <link href="../css/projectstyles.css" rel="stylesheet">
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
    <link href="../css/projectstyles.css" rel="stylesheet">
  </head>
<div>
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
<!-- </div> -->
    <br><br>
<?php
}
?>
<p>
  <?php
}
?>    
</p>

<form method="post" action="project.php" enctype="multipart/form-data">
<!--  <div class="container-fluid" align="center"> -->
  <div class="row justify-content-center" align="center">
     <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
      <div class="display-box">
        <h4>Project Proposal</h4>
        <br>
        <div class="message1">
        <label style="float: center;"></label>
        <input type="file" name="ppf"/><br/><br/>
        <input id="bt" type="submit" class="submit" name="bppf" value="Upload"/>
        <br/>
      </div>
      </div>
    </div>

     <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
      <div class="display-box" >
        <h4>Project Specification</h4>   
        <br> 
        <div class="message1">
        <label style="float: center;"></label>
        <input type="file" name="psf"/><br/><br/>
        <input id="bt" type="submit" class="submit" name="bpsf" value="Upload"/>
        <br/>
      </div>
      </div>
    </div>
  </div>
<!-- </div> -->
</form>

<form method="post" action="project.php"> 
<!--   <div class="container-fluid" align="center"> -->
  <div class="row justify-content-center" align="center">
    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
      <div class="display-box text-container">
        <h4>Feedback</h4>    
        <br>
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
