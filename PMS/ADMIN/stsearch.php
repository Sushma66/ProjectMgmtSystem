<?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];



include './connection.php';

if(isset($_POST['update']))
{
            $id=$_POST['sid']; 
           $name=$_POST['stname'];
           $email=$_POST['stemail'];
           $phone=$_POST['stphone'];
           $pass=$_POST['stpass']; 
           $year=$_POST['styear'];
           $stream=$_POST['stream'];
           
           if (!empty($id)|| !empty($name)||!empty($email)||!empty($phone)||!empty($pass)||!empty($year)||$stream!="Select")
           {
              
            $sql= "UPDATE `pmas`.`student` SET `name` = '$name', `email` = '$email', `phone` = '$phone', `password` = '$pass', `year` = '$year', `stream` = '$stream' WHERE `student`.`s_id` = '$id';";
                mysqli_query($conn, $sql);
                $conn->close();
                header('Location:stsearch.php');  
           }
        else
            
        {
              echo 'Please fill up all fields';
              header('Location:stsearch.php');
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
      <form role="form" action="stsearch.php" method="post">
      <div class="row">
          <div class="display-box">
            
                        <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label>StudentID:&nbsp;<font color="red">*</font></label>
                                    </div>
                                    <?php
                                    include '../connection.php';
                                    $sql="select s_id from student";
                                   $result=  mysqli_query($conn, $sql)
                                   ?> <select name="id" style="width: 10em; height: 2em; font-size: 15px; ">
                                   <option selected="selected" >Student</option>
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
                        
                        <div class="text-center">
                                <input id="bt" type="submit" class="submit" name="search" value="Search" />
                            </div>

                  </div>
                </div>


                 <div class="display-box">
                  
                    <?php
                  if (isset($_POST['search']))
       {
                    $username=$_POST['id'];
                   $sql1="select * from student where s_id ='$username'; ";
                   $rec=mysqli_query($conn, $sql1);
                   $row=mysqli_fetch_assoc($rec);
       }
       ?>

                                             <div class="input-group">

                                             <div class="input-group-prepend">
                                        <label>StudentID:</label>
                                    </div>
                                    <input id="in" type="text" class="textbox" name="sid" value="<?php echo $row['s_id'];?>" style="color: #fff;"/>
                                </div>
                                <br>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label>Name:</label>
                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input id="in" type="text" class="textbox" name="stname" value="<?php echo $row['name'];?>" style="color: #fff;" /> 
                                </div>
                                <br>
                            <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label>Email:</label>
                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input id="in" type="text" class="textbox" name="stemail" value="<?php echo $row['email'];?>"style="color: #fff;" />
                                </div>
                                <br>
                           <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label>Phone:</label>
                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input id="in" type="text" class="textbox" name="stphone" value="<?php echo $row['phone'];?>"style="color: #fff;"/>
                                </div>
                                <br>
                           <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label>Password:</label>
                                    </div>
                                    <input id="in" type="text" class="textbox" name="stpass" value="<?php echo $row['password'];?>" style="color: #fff;"/>
                                </div>
                                <br>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label>Year:</label>
                                    </div> &nbsp;&nbsp;&nbsp;&nbsp;
                                    <input id="in" type="text" class="textbox" name="styear" value="<?php echo $row['year'];?>"style="color: #fff;"/>
                                </div>
                                <br>
                               <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label>Stream:</label>
                                    </div> &nbsp;&nbsp;&nbsp;&nbsp;
                                    <select name="stream" style="width: 193px; height: 2em; font-size: 15px;">
                                       <option value="Selcet">Select</option>
                                       <option value="CSE" <?php if($row['stream']=='CSE') echo 'selected="selected"'; ?>>CSE</option>
                                       <option value="COM" <?php if($row['stream']=='COM') echo 'selected="selected"'; ?>>COM</option>
                                       <option value="EE" <?php if($row['stream']=='EE') echo 'selected="selected"'; ?> >EE</option>          
                                       </select>
                                </div>
                            <br>
                            <br>
                            <div class="text-center">
                                <input id="bt" type="submit" class="submit" name="update" value="Update"  />
                            </div>
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