<?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];
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
      <div class="row">
          <div class="display-box">
            <form role="form" action="st.php" method="post">
                        <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label>StudentID:<font color="red">*</font></label>
                                    </div>
                                    <input id="in" type="text" class="textbox" name="id" style="color: #fff;">
                                </div>
                                <br>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label>Name:<font color="red">*</font></label>
                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input id="in" type="text" class="textbox" name="stname" style="color: #fff;"> 
                                </div>
                                <br>
                            <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label>Email:<font color="red">*</font></label>
                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input id="in" type="text" class="textbox" name="stemail" style="color: #fff;">
                                </div>
                                <br>
                           <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label>Phone:<font color="red">*</font></label>
                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input id="in" type="text" class="textbox" name="stphone" style="color: #fff;">
                                </div>
                                <br>
                           <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label>Password:<font color="red">*</font></label>
                                    </div>
                                    <input id="in" type="text" class="textbox" name="stpass" style="color: #fff;">
                                </div>
                                <br>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label>Year:<font color="red">*</font></label>
                                    </div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input id="in" type="text" class="textbox" name="styear" style="color: #fff;">
                                </div>
                                <br>
                               <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label>Stream :<font color="red">*</font></label>
                                    </div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <select name="stream" style="width: 193px; height: 2em; font-size: 15px;">
                                       <option value="Selcet">Select</option>
                                       <option value="CSE">CSE</option>
                                       <option value="COM">COM</option>
                                       <option value="EE">EE</option>          
                                       </select>
                                </div>
                            <br>
                            <br>
                            <div class="text-center">
                                <input id="bt" type="submit" class="submit" name="add" value="Add"  />
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


  
  
















































































<!--<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Project Management System</title>
    <link rel="icon" type="image/png" href="../images/logo.png" type="image/x-icon">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style4.css" rel="stylesheet">

    

  </head>
  <body >

  <div class="container-fluid">
  <div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12 topnavbar">
      <div class="message-box">
        <label style="float: right;" class="message">
          <?php
           // print $role;
            
          ?>
        </label>
      </div>
      <div style="float: left; padding-right: 1%;">
        <img src="../images/logo.png" height="80"/>
      </div>
      <br>
      <div >
        <a class="bms" style="color: #fff;">BMS</a><br />
        <a class="institute" style="color: #fff;">INSTITUTE OF TECHNOLOGY</a>
        <a class="bmsit" style="color: #fff;">BMSIT</a>

      </div>
    </div>
  </div>

       <div class="row">
        <div class="topnav" id="myTopnav">
          

          <a class="nav-link" href="fa_search.php">
            <span class="material-icons hidden-md-down">book_online</span><br class="hidden-md-down">Faculty Search
          </a><a class="nav-link active" href="student.php">
            <span class="material-icons hidden-md-down">face</span><br class="hidden-md-down"> Student
          </a>
        
          <a class="nav-link" href="faculty.php">
            <span class="material-icons hidden-md-down">assignment_ind</span><br class="hidden-md-down"> Faculty
          </a>
        
        
          <a class="nav-link" href="stsearch.php">
            <span class="material-icons hidden-md-down">search</span><br class="hidden-md-down"> Student Search
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
        
      </div>
    </div>
    </div>
  </div>
  <br/><br/>
  
    </p><form method="post" action="st.php">
        <div class="display-box">

            <table align="center" width="50%" cellspacing="01" cellpadding="05">
  <tr>
    <th width="7%" scope="col">&nbsp;</th>
    <th width="43%" scope="col">&nbsp;</th>
    <th width="44%" scope="col">&nbsp;</th>
    <th width="6%" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5" color="#fff">Student ID&nbsp;:&nbsp;</font></td>
    <td><input type="text" size="20" id="in" name="id"/><font color="yellow" size="3">*</font></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5" color="#fff">Name&nbsp;:&nbsp;</font></td>
    <td><input type="text" id="in" name="stname"/><font color="yellow">*</font></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5" color="#fff">Email&nbsp;:&nbsp;</font></td>
    <td><input type="email" id="in" name="stemail"/><font color="yellow">*</font></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5" color="#fff">Phone&nbsp;:&nbsp;</font></td>
    <td><input type="text" id="in" name="stphone"/><font color="yellow">*</font></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"> <font size="5" color="#fff">Password &nbsp;:&nbsp;</font></td>
    <td><input type="password" id="in" name="stpass"/><font color="yellow">*</font></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5" color="#fff">Year&nbsp;:&nbsp;</font></td>
    <td style="white-space:nowrap; "><input type="text" id="in" name="styear"/><font color="yellow" >*</font></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5" color="#fff">Stream&nbsp;: &nbsp;</font></td>
    <td><select name="stream" style="width: 193px; height: 2em; font-size: 15px;">
         <option value="Selcet">Select</option>
        <option value="CSE">CSE</option>
        <option value="COM">COM</option>
        <option value="EE">EE</option>          
        </select><font color="yellow">*</font></td>
    <td>&nbsp;</td>
  </tr>
  
  <tr align="center" >
    <td>&nbsp;</td>
    <br/>
    <td colspan="2"><input type="submit" class="submit" name="add" value="Add" id="bt" />
            
    <td>&nbsp;</td>
  </tr>
            </table> <br/><br/>  </div></form>
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
//elseif($role=="Faculty")    
{
?>
    <?php 
    //header('Location:../Admin.php');
    ?>
 <?php
}
//else   
{
?>
    <?php 
   // header('Location:../Admin.php');
    ?>
<?php
}
?>
</table>
<p>
  <?php
//}
?>

    
    

<p>&nbsp;</p>
