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
</div>
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
    <div class="row" style="width: 100%; margin: 0;">
       <div class="col-md-6 col-lg-6" style="padding: 0;">
        <div class="display-box">
          <h5>Project Proposal</h5>
          <br />
          <div>
            <input type='file' name="ppf">
            <!-- <label id="fileLabel">Choose file</label> -->
          </div>
          <br/>
          <input type="submit" class="submit" name="bppf" value="Upload"/>
        </div>
      </div>
      <br><br>
      <div class="col-md-6 col-lg-6" style="padding: 0;">
        <div class="display-box">
          <h5>Project Specification</h5>
          <br />
          <div>
            <input type='file' name="psf">
            <!-- <label id="fileLabel" style="margin-left: 2%; color: #fff;">No file chosen</label> -->
          </div>
          <br/>
          <input type="submit" class="submit" name="bpsf" value="Upload"/>
        </div>
      </div> 
    </div>
    </form> 
    <form method="post" action="project.php"> 
    <div class="row" style="width: 100%; margin: 0;">
      <div class="col-md-12 col-lg-12" style="padding: 0;">
        <div class="display-box text-container">
          <?php
           if(isset ($_POST['feedback']))
          {
            include '../connection.php';
            $sql1="select * from project where s_id ='$user' ";
            $rec=mysqli_query($conn, $sql1);
            while($std=mysqli_fetch_assoc($rec))
            {
            ?>
            <textarea name="feedback" rows="5" cols="30" readonly="readonly" placeholder="FEEDBACK">
            <?php echo $std['remark'];?>
            </textarea>
            <br>
            <?php 
            }
            }
            ?>
            <input type="submit" name="feedback" class="submit feedback-submit" value="Get Feedback"/>
        </div>
      </div>
    </div>
    </form> 
</div>
<script type="text/javascript">
  // window.pressed = function(){
  //   var a = document.getElementById('aa');
  //   if(a.value == "")
  //   {
  //       fileLabel.innerHTML = "Choose file";
  //   }
  //   else
  //   {
  //       var theSplit = a.value.split('\\');
  //       fileLabel.innerHTML = theSplit[theSplit.length-1];
  //   }
  // }

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