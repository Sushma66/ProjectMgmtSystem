<?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];
include '../connection.php';
if(isset($_POST['allocate']))
        {
           $id=$_POST['facultyid'];  
           $sql= "INSERT INTO `pmas`.`request` (`request_id`, `s_id`, `f_id`) VALUES ('', '$user', '$id');";
           mysqli_query($conn, $sql);
           $conn->close();
           header('Location:skill.php');          
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
<!--   <div> -->
  <!-- <body>
     <div class="container-fluid">
  <div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12 topnavbar">
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
    <br><br> -->
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
<?php
}
?>
  <?php
}
?>
</br></br>


<div class="container-fluid" align="center">
  <div class="row justify-content-center">
    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
      <form method="post" action="skill.php"> 
      <div class="display-box">
        <h3><u>Skills</u></h3>
        <div class="message1">
        <label style="float: center;"></label>
        <?php
            include '../connection.php';
             $sql="select f_id from faculty";
             $result=  mysqli_query($conn, $sql)
        ?> 
        <select name="faculty">
             <option selected="selected"><h3>Supervisors</h3></option>
             <?php
                 while($row = mysqli_fetch_assoc($result))
                 {
                     $category= $row['f_id'];
             ?>
            <option selected="selected" value="<?php echo $category; ?>"><?php echo $category;?></option>
            <?php
                 }
            ?>
        </select>  
        <br/>
        <br>
        <input id="bt" type="submit" class="submit" name="asses" value="View Skill Matrix"/><br/>       
      </div>
      </div>
      </form>
    </div>
  </div>
</div>

</br></br>

<?php
           if (isset($_POST['asses']))
            {   
                $fid=$_POST['faculty'];          
        ?>

<div class="container-fluid" align="center">
  <div class="row justify-content-center">
    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
       <div class="display-box"  style="padding-left: 4%">
        <form method="post" action="skill.php">
          <div class="input-group">
           <div class="input-group-prepend">
              <label>Faculty ID : </label>
            </div>  
              <input id="in" type="text" class="textbox" style="color: #fff;" name="facultyid" readonly value="<?php echo $fid;?>" readonly>
          </div> 
        <?php
            $sql1="select * from faculty where f_id ='$fid' ";
            $rec=mysqli_query($conn, $sql1);
            while ($std= mysqli_fetch_assoc($rec))
            {
         ?>  

          <div class="input-group">
            <div class="input-group-prepend">   
              <label>Name : </label>
            </div>   
              <input  id="in" type="text" class="textbox" style="width:50%, color: #fff;" name="stid" readonly value="<?php echo $std['name'];?>"/> 
          </div>

          <div class="input-group">
            <div class="input-group-prepend">
              <label>Qualification : </label>
            </div>  
               <input id="in" type="text" class="textbox" style="width:50%, color: #fff;" name="faqu" readonly value="<?php echo $std['qualification'];?>"/> 
          </div>

          <div class="input-group">
            <div class="input-group-prepend">
              <label>Domain : </label>
            </div>  
                <input id="in" type="text" class="textbox" style="width:50%, color: #fff;" name="fad" readonly value="<?php echo $std['domain'];?>"/> 
          </div>

          <div class="input-group">
            <div class="input-group-prepend">
              <label>Research : </label>
            </div>    
                <input id="in" type="text" class="textbox" style="width:50%, color: #fff;" name="far" readonly value="<?php echo $std['research'];?>"/> 
          </div>

          <div class="input-group">
            <div class="input-group-prepend">
              <label>Others : </label>
            </div>
                <input id="in" type="text" class="textbox" style="width:50%, color: #fff;" name="fao" readonly value="<?php echo $std['others'];?>"/> 
          </div>
          <br>
          <div class="text-center">
                <input id="bt" type="submit" class="submit" name="allocate" readonly value="Request For Allocate"/> 
          </div>      
         <?php
            }
        }
         ?>       
        <!-- <div class="message">
        <label style="float: left;"></label>
      </div> -->
      </form>
      </div>
    </div>
    </div>
  </div>
  </br>
</br>
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