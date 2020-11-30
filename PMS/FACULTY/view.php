<?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];

 include '../connection.php';
// $sql="select s_id from project where f_id='$user';"; 
//$record=mysqli_query($conn, $sql);
if (isset($_POST['ppf']))
{
    $file=$_POST['file_name'];
    if(!empty($file)){
      header('Content-Description: File Transfer');
      header('Content-Type:doc/pdf');
      header('Content-Disposition: attachment; filename="'.$file.'"');
      readfile('ppf/'.$file);
      exit();
    }
    else {
      echo 'no file';
    }
}
elseif (isset($_POST['psf']))
{
    $file=$_POST['file_name1'];
    if(!empty($file)) {
      header('Content-type:doc/pdf');
      header('Content-Disposition: attachment; filename="'.$file.'"');
      readfile('psf/'.$file);
      exit();
    }
    else {
    
    }
}
elseif (isset($_POST['assess']))
{
    $feed=$_POST['assessmen'];
    $prid=$_POST['pid'];
    if(!empty($feed)) {
      $sql2= "UPDATE `pmas`.`project` SET `remark` = '$feed' WHERE `project`.`p_id` = '$prid';";
      mysqli_query($conn, $sql2);
      $conn->close();
      header('Location:view.php');
    }
    else {
      header('Location:view.php');          
    }
}
elseif (isset($_POST['rem'])) {
    $re=$_POST['remainder'];
    $stuid=$_POST['stid'];
    //$stuid;
    $sql3= "INSERT INTO `pmas`.`mail` (`mail_id`, `s_id`, `f_id`, `msg`) VALUES ('', '$stuid', '$user', '$re');";
    mysqli_query($conn, $sql3);
    $conn->close();
    header('Location:view.php');
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
    <link href="../css/view.css" rel="stylesheet">
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
    <link href="../css/view.css" rel="stylesheet">
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
  <div class="row">
    <div class="col-md-12">
      <div class="display-box">
        <form method="post" action="view.php">
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <div class="dropdown-container">
              <?php
              include '../connection.php';
              $sql="select s_id from project where f_id='$user';";
              $result=  mysqli_query($conn, $sql);
              ?>
                <select name="student" class="dropdown">
                <!-- style="width: 10em; height: 2em; font-size: 15px;" -->
                  <option selected="selected">Supervisory</option>
                  <!-- <option value="" disabled selected hidden>Supervisory</option> -->
                  <?php
                  while($row = mysqli_fetch_assoc($result))
                  {
                    $category= $row['s_id'];
                  ?>
                  <option  value="<?php echo $category; ?>"><?php echo $category;?></option>
                  <?php
                  }
                  ?>
                </select> 
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <input class="submit" type="submit" name="asses" value="Feedback"/>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!----------------------- Table -------------------------------->
  <br>
  <form method="post" action="view.php">
    <div style="overflow-x:auto;">
      <table>
      <?php
      if (isset($_POST['asses'])) {   
        $stuid=$_POST['student']; 
        echo "<tr>";?>
        <th>Student ID</th>
        <th>Project Proposal</th>
        <th>Project Specification</th>
        <th>Assessment</th>
        <th>Quick Mail</th>
        <?php
        echo "</tr>";
        echo "<tr>";
        echo "<td>"?>
        <input type="text" name="stid" class="textbox" readonly value="<?php echo $stuid;?>"/> 
        <?php "</td>";
        $sql1="select * from project where s_id ='$stuid' ";
        $rec=mysqli_query($conn, $sql1);
        while ($std=mysqli_fetch_assoc($rec)) {
          echo "<td>"?> 
          <input name="file_name" value="<?php echo $std["ppf"]?>" class="textbox" type="text" readonly /><br/><br/>
          <input type="submit" value="Download" class="submit" name="ppf"/> 
          <input type="hidden" name="pid" value="<?php echo $std['p_id']?>"/> 
          <?php "</td>";
          echo "<td>"?>
          <input name="file_name1" class="textbox" value="<?php echo $std["psf"]?>" type="text" readonly /><br/><br/>
          <input type="submit" class="submit" value="Download" name="psf"/> 
          <?php "</td>";
          echo "<td>"?>
          <textarea  name="assessmen" cols="30" rows="5" ></textarea><br/><br/>
          <input type="submit" class="submit" value="Submit" name="assess"/> <?php "</td>";
          echo "<td>"?><textarea name="remainder"  cols="30" rows="5" ></textarea><br/><br/>
          <input type="submit" class="submit" value="Submit" name="rem"/> <?php "</td>";
          echo "</tr>";
        }
      }
    ?>
  </table>
</div>
</form>
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
