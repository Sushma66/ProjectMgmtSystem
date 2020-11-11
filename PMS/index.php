<?php
session_start();
if(empty($_SESSION['email']))
{
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Project Management System</title>
    <link rel="icon" type="image/png" href="logo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>
  	<div class="container-fluid">
  	<div class="row" style="box-shadow: none;">
		<div class="col-md-12">
			<div class="page-header">
				<h1>
					PROJECT MANAGEMENT SYSTEM
				</h1>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-6 col-sm-12 block1">
			
					<div>
                        <img src="images/logo.png" height="100" class="centre"/>
                    </div>
                    <br>
                    <div>
                        <h3 style="font-family: Arial; color: #d30000; font-weight: 600 ; text-align: center;">BMS</h3>
                        <h3 style="font-family: Calibri; color: #363491; font-weight: 600; text-align: center;">INSTITUTE OF TECHNOLOGY</h3>
                    </div>
              
		</div>
		<div class="col-md-6 col-sm-12 block2">
			<form role="form" name="login" action="chk.php" method="post">
				<div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">account_box</i>
                                        </span>
                                    </div>
                                    <input type="text" class="textbox" name="id" style="color: #fff;" placeholder="ID...">
                                </div>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">lock</i>
                                        </span>
                                    </div>
                                    <input type="password" class="textbox" name="pass" placeholder="Password..." style="color: #fff;">
                                </div>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                            <h4>LOGIN AS</h4>
                                    </div>
                                    <span class="dropdown-control">
                                    <select name="role" class="dropdown">
                                        <option value="" disabled selected hidden>Select option</option>
                                        <option value="Student">Student</option>
                                        <option value="Faculty">Faculty</option>
                                        <option value="Admin">Admin</option>          
                                    </select>
                                </span>
                                </div>
                            
                            <br />
                            
                            <div class="text-center">
                                <input type="submit" class="submit" name="register" value="Submit" />
                            </div>
			</form>
		</div>
	</div>
</div>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>

<?php
}
else
{
header("location:Admin.php");
}

?>