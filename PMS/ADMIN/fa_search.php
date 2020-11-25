<?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];



include './connection.php';

if(isset($_POST['update']))
{
           $id=$_POST['fid']; 
           $name=$_POST['faname'];
           $email=$_POST['faemail'];
           $phone=$_POST['faphone'];
           $pass=$_POST['fapass']; 
           $qualification=$_POST['faqualification'];
           
           if (!empty($id)|| !empty($name)||!empty($email)||!empty($phone)||!empty($pass)||!empty($qualification))
           {
              
            $sql= "UPDATE `pmas`.`faculty` SET `name` = '$name', `email` = '$email', `phone` = '$phone', `password` = '$pass', `qualification` = '$qualification' WHERE `faculty`.`f_id` = '$id';";
                mysqli_query($conn, $sql);
                $conn->close();
                header('Location:fa_search.php');  
           }
        else
            
        {
              echo 'Please fill up all fields';
              header('Location:fa_search.php');
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
    <link href="../css/style 6.css" rel="stylesheet">
  </head>
  <body>
    <div class="container-fluid">
  <div class="row">
    
    <div class="col-md-12 col-lg-12 col-sm-12 topnavbar">
      <div class="message-box">
        <label style="float: right;" class="message">
          <?php
            print $role;
            
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
          <a class="nav-link " href="student.php">
            <span class="material-icons hidden-md-down">face</span><br class="hidden-md-down"> Student
          </a>
        
          <a class="nav-link" href="faculty.php">
            <span class="material-icons hidden-md-down">assignment_ind</span><br class="hidden-md-down"> Faculty
          </a>
        
        
          <a class="nav-link" href="stsearch.php">
            <span class="material-icons hidden-md-down">search</span><br class="hidden-md-down"> Student Search
          </a>
          <a class="nav-link" href="fa_search.php">
            <span class="material-icons hidden-md-down">book_online</span><br class="hidden-md-down">Faculty Search
          </a>


          <a class="nav-link" href="allocate.php">
            <span class="material-icons hidden-md-down">mediation</span><br class="hidden-md-down"> Allocate
          </a>
       
          <a class="nav-link" href="skill.php">
            <span class="material-icons hidden-md-down">insights</span><br class="hidden-md-down"> Skill Matrix
          </a>

          <a class="nav-link" href="ADMIN/report.php">
            <span class="material-icons hidden-md-down">description</span><br class="hidden-md-down"> Reports
          </a>
       
          <a class="nav-link" href="../logout.php">
            <span class="material-icons hidden-md-down">power_settings_new</span><br class="hidden-md-down"> Logout
          </a>
        
          <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <span class="material-icons">reorder</span>
          </a>
    </div>

    <div class="col-md-12">
      <form role="form" action="fa_search.php" method="post">
      <div class="row">
          <div class="display-box">
            
                        <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label>Faculty ID :<font color="red">*</font></label>
                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <?php
                                     include '../connection.php';
                                     $sql="select f_id from faculty";
                                     $result=  mysqli_query($conn, $sql)
                         ?>
                          <select name="id" style="width: 10em; height: 2em; font-size: 15px;">
                        <option selected="selected">Faculty</option>
                       <?php
                 while($row = mysqli_fetch_assoc($result))
                 {
                     $category= $row['f_id'];
                     ?>
                 <option value="<?php echo $category; ?>"><?php echo $category;?></option>
                 <?php
                 }
                 ?>
                 </select> 
                        </div>
                        
                        <div class="text-center">
                                <input id="bt" type="submit" class="submit" name="search" value="Search" />
                            </div>

                  </div>
                </div>

                <div class="display-box" style="margin-top: 0;">
                  <?php
                    if (isset($_POST['search']))
                {
                    $username=$_POST['id'];
                    $sql1="select * from faculty where f_id ='$username'; ";
                    $rec=mysqli_query($conn, $sql1);
                    $row=mysqli_fetch_assoc($rec);
                }
                  ?>


                   <div class="input-group">

                                             <div class="input-group-prepend">
                                        <label>FacultyID:</label>
                                    </div>
                                    <input id="in" type="text" class="textbox" name="fid" value="<?php if(isset($row['f_id'])) { echo $row['f_id'];}?>" style="color: #fff;"/>
                                </div>
                                <br>
                                     <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label>Name:</label>
                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input id="in" type="text" class="textbox" name="faname" value="<?php if(isset($row['name'])) { echo $row['name'];}?>"style="color: #fff;"> 
                                </div>
                                <br>
                            <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label>Email:</label>
                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input id="in" type="text" class="textbox" name="faemail" value="<?php if(isset($row['email'])) {echo $row['email'];}?>"style="color: #fff;">
                                </div>
                                 <br>
                           <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label>Phone:</label>
                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input id="in" type="text" class="textbox" name="faphone" value="<?php if(isset($row['phone'])) {echo $row['phone'];}?>"style="color: #fff;">
                                </div>
                                 <br>
                     <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label>Password:</label>
                                    </div>
                                    <input id="in" type="text" class="textbox" name="fapass" value="<?php if(isset($row['password'])) {echo $row['password'];}?>" style="color: #fff;">
                                </div>
                                 <br>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label>Qualification:</label>
                                    </div> 
                                     <br>
                                    <input id="in" type="text" class="textbox" name="faqualification" value="<?php if(isset($row['qualification'])) {echo $row['qualification'];}?>" style="color: #fff;">
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

 <?php
}
elseif($role=="Faculty")    
{
?>
    <?php
   header('Location:../Admin.php');
   ?>
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