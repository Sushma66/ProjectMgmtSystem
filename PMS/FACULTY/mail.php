<?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];

include '../connection.php';


if (isset($_POST['submit']))
{
    $to=$_POST['student']; 
    $msg=$_POST['msg'];
    if (!empty($to))
    {
        $sql= "INSERT INTO `pmas`.`mail` (`mail_id`, `s_id`, `f_id`, `msg`) VALUES ('', '$to', '$user', '$msg');";
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
        header("location:../Admin.php?image=image.php");
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
        <link href="../css/mail.css" rel="stylesheet">
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
        <form method="post" action="mail.php">
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="display-box">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <label>To :&nbsp; &nbsp;</label>
                                </div>
                                <?php
                                include '../connection.php';
                                $sql="select s_id from project where f_id='$user';";
                                $result=  mysqli_query($conn, $sql)
                                ?>
                                <div class="dropdown-container">
                                <select class="dropdown" name="student">
                                    <option >Choose From Supervisory</option>
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
                            </div>
                            </div>
                            <br>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <label>From :</label>
                                </div>
                                <input id="in" type="text" class="textbox" name="from" style="color: #fff;" value="<?php echo $user;?>" readonly/>
                            </div>
                            <br>
                            <div class="input-group">
                                <textarea  name="msg" cols="30" rows="5" placeholder="Message" ></textarea>
                                <!-- <input id="in" type="text" class="textbox" name="others" style="color: #fff;"> -->
                            </div>
                            <br>
                            <div class="text-center">
                                <input id="bt" type="submit" class="submit" name="submit" value="Send" />
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
                $sql1="select * from st_mail where f_id ='$user'";
                $rec=mysqli_query($conn, $sql1);
                echo "<tr>";
                while ($std= mysqli_fetch_assoc($rec))
                {
                    if ($std['from']="supervisor")
                    {
                        ?> 
                        <tr align="center"><?php
                        //echo "<tr>";
                        echo "<td>".$std['s_id']."<td/>";
                        echo "<td>".$std['mag']."<td/>"; 
                        ?>  </tr> <?php 
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
                $sql1="select * from mail where f_id ='$user' ";
                $rec=mysqli_query($conn, $sql1);                
                echo "<tr>";
                while ($std=mysqli_fetch_assoc($rec))
                {
                    ?>
                    <tr align="center">
                    <?php
                    echo "<td>".$std['s_id']."<td/>";
                    echo "<td>".$std['msg']."<td/>"; 
                    ?>  
                    </tr> 
                    <?php 
                }
                //echo "<tr/>";
                ?> </table> <?php
            }
            ?>
        </table>
    </form>
    <?php
}
else   
{
    header("location:../Admin.php?image=image.php");
    ?>
    <?php
}
?>
</table>
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

  <?php
}
?>
   

    