<?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];
include '../connection.php';
if (isset($_POST['submit']))
{
            $to=$_POST['to']; 
           $msg=$_POST['msg'];   
          if (!empty($to))
           {             
            $sql= "INSERT INTO `pmas`.`st_mail` (`s_mail_id`, `s_id`, `f_id`, `mag`) VALUES ('', '$user', '$to', '$msg');";
                mysqli_query($conn, $sql);
                $conn->close();
                header('Location:mail.php');  
           }
        else           
        {
              echo 'Please fill up all fields';
              header('Location:mail.php');
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
<?php
 header('Location:../Admin.php');
}
elseif($role=="Faculty")    
{
?>   
 <?php
 header('Location:../Admin.php');
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
    <link href="../css/mail.css" rel="stylesheet">
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
<?php
}
?>
<?php
}
?>

<form method="post" action="mail.php">
<div class="container-fluid">
  <!-- <div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
      <div class="display-box-mail">
        <span class="text-left" id="midtab">
           <input id="bt" type="submit" class="select" name="compose" value="Compose"/> 
        </span> 
        <span class="text-center" id="midtab">
           <input id="bt" type="submit" class="select" name="inbox" value="Inbox"/> 
        </span> 
        <span class="text-right" id="midtab">
           <input id="bt" type="submit" class="select" name="sent" value="Sent Mail"/> 
        </span> 
      </div> -->

      <div class="row btn-container">
                <div class="col-md-4 col-sm-12 buttons">
                    <input class="submit" style="margin-left: 35%;" type="submit" value="Compose" name="compose"/>
                </div>
                <div class="col-md-4 col-sm-12 buttons">
                    <input class="submit" style="margin-left: 35%;" type="submit" value="Inbox" name="inbox"/>
                </div>
                <div class="col-md-4 col-sm-12 buttons">
                    <input class="submit" style="margin-left: 35%;" type="submit" value="Sent Mail" name="sent"/>
                </div>
      </div>
  <?php
                
                if (isset($_POST['compose']))
                {
                    $sql1="select * from project where s_id ='$user' ";
                    $rec=mysqli_query($conn, $sql1);
                    $std=mysqli_fetch_assoc($rec);
  ?>
  </br></br>
  <div class="row">
    <div class="col-md-12">
       <div class="display-box">
        <div class="input-group">
            <div class="input-group-prepend">   
              <label>  To :&nbsp; &nbsp;</label>
            </div>   
              <input  id="in" type="text" class="textbox" style="width:50%, color: #fff;" name="to" readonly value="<?php echo $std["f_id"];?>"/> 
         </div>
         <div class="input-group">
            <div class="input-group-prepend">   
              <label>  From : </label>
            </div>   
              <input  id="in" type="text" class="textbox" style="width:50%, color: #fff;" name="from" value="<?php echo $user;?>" readonly/>
          </div>
          </br>
          <div class="input-group">
              <textarea name="msg" cols="30" rows="5" placeholder="Message" ></textarea>
          </div>
          <br>
          <div class="text-center">
              <input id="bt" type="submit" value="Send" class="submit" name="submit"/>
          </div>
        </div>
      </div>
    </div>
   </div>

    <?php
     }
          elseif (isset($_POST['inbox'])) 
         {
     ?>
    
     <table width="40%" cellpadding="05" cellspacing="01" border="0" align="center">  
     <?php
                    echo "<br/>";
                    echo "<br/>";
                    echo "<br/>";
                    echo "<tr>";
                    echo "<th>"."FROM"."</th>";
                    echo "<th>" ?> &nbsp; <?php "</th>";
                    echo "<th>"."MESSAGE"."</th>";
                    echo "</tr>";
                        $sql1="select * from mail where s_id ='$user'";
                        $rec=mysqli_query($conn, $sql1);
                        echo "<tr>";
                        while ($std= mysqli_fetch_assoc($rec))
                        {
                           if ($std['from']="supervisor")
                            {
      ?> 
                                <tr align="center">
      <?php
                                //echo "<tr>";
                                echo "<td>".$std['f_id']."<td/>";
                                echo "<td>".$std['msg']."<td/>"; 
      ?>                        </tr> 
      <?php 
                                 //echo "<tr/>";
                            }
                        }
                        
      ?> 
      </table>
      

      <?php       
                    } 
                    elseif (isset($_POST['sent'])) 
                    {
      ?>  
      <table width="40%" cellpadding="0" cellspacing="2" border="0" align="center">  
      <?php
                    
                    echo "<br/>";
                    echo "<br/>";
                    echo "<br/>";
                    echo "<tr>";
                    echo "<th>"."TO"."</th>";
                    echo "<th>" ?> &nbsp; <?php "</th>";
                    echo "<th>"."MESSAGE"."</th>";
                    echo "</>";
                        $sql1="select * from st_mail where s_id ='$user' ";
                        $rec=mysqli_query($conn, $sql1); 
                        echo "<tr>";
                        while ($std=mysqli_fetch_assoc($rec))
                        {
      ?> 
                            <tr align="center">
      <?php
                            echo "<td>".$std['f_id']."<td/>";
                            echo "<td>".$std['mag']."<td/>"; 
      ?>  
                            </tr> 
      <?php 
                        }
                        //echo "<tr/>";
      ?> 
      </table> 
      <?php
                         
                        }
                
      ?>   
</form>

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