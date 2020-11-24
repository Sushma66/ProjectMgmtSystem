<?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];

include '../connection.php';
        if(isset($_POST['submit']))
        {
           $sid=$_POST['sid']; 
           $fid=$_POST['fid'];
           $date=$_POST['dat'];
           $time=$_POST['tem'];
           $dec=$_POST['des']; 
           
           
          if (!empty($date)||!empty($time)||!empty($dec))
           {
              
            $sql= "INSERT INTO `pmas`.`meeting` (`meeting_id`, `f_id`, `s_id`, `date`, `time`, `desc`) VALUES ('', '$fid', '$sid', '$date', '$time', '$dec');";
                mysqli_query($conn, $sql);
                $conn->close();
                header('Location:meeting.php');  
           }
        else
            
        {
              echo 'Please fill up all fields';
              header('Location:meeting.php');
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
        <link href="../css/meeting.css" rel="stylesheet">
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
 <?php
}
 else   
{
?>
    
<?php
header("location:../Admin.php");
}
?>
<?php
}
?>
<div class="col-md-12">
  <div class="row">
    <div class="display-box">
      <form role="form" action="meeting.php" method="post">
        <h4 style="text-align: center;">MEETING DETAILS</h4>
        <br>
        <div class="input-group">
          <div class="input-group-prepend">
            <label>Faculty ID   :</label>
          </div>
          <input id="in" type="text" name="fid" class="textbox" value="<?php echo $user;?>" readonly/>
          <!-- <input id="in" type="text" class="textbox" name="domain" style="color: #fff;"> -->
        </div>
        <br>
        <div class="input-group">
          <div class="input-group-prepend">
            <label>Student ID:</label>
          </div>
          <?php
          include '../connection.php';
          $sql="select s_id from project where f_id='$user';";
          $result=  mysqli_query($conn, $sql)
          ?>
          <select name="sid" class="dropdown">
            <option selected>Supervisory</option>
            <?php
            while($row = mysqli_fetch_assoc($result))
            {
              $category= $row['s_id'];
              ?>
              <option selected="selected" value="<?php echo $category; ?>"><?php echo $category;?></option>
              <?php
            }
            ?>
          </select>
          <!-- <input id="in" type="text" class="textbox" name="research" style="color: #fff;"> -->
        </div>
        <br>
        <div class="input-group">
          <div class="input-group-prepend">
            <label>Date: <font color="red">*</font></label>
          </div>
          <input id="in" class="textbox" type="date" name="dat" />
        </div>
        <br>
        <div class="input-group">
          <div class="input-group-prepend">
            <label>Time: <font color="red">*</font></label>
          </div>
          <input id="in" type="time" name="tem" class="textbox" />
        </div>
        <br>
        <div class="input-group">
          <div class="input-group-prepend">
            <label>Description: <font color="red">*</font></label>
          </div>
          <textarea id="in" name="des" cols="22" rows="5"></textarea>
        </div>
        <br>
        <div class="text-center">
          <input type="submit" class="submit" name="submit" value="Submit" />
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