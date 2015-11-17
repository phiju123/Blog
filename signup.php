<?php
	include('signuconfig.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Blogger || Signup</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php">Blogger</a>
		</div>
		<div>
			<ul class="nav navbar-nav">
				<li><a href="index.php">Home</a></li>
				<li><a href="contact.php">Contact Us</a></li>
			</ul>
		</div>
	<div>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="admin.php"><span class="glyphicon glyphicon-wrench"></span> Admin</a></li>
			<li class="active"><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
			<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		</ul>
	</div>
</nav>


  <div class="modal-dialog">
  
     
          <h1 class="text-center">Sign Up</h1>
          <form class="form col-md-12 center-block" method="post" action="">
		  <div class="form-group">
              <input type="text" class="form-control input-lg" name="name" placeholder="First name">
            </div>
			<div class="form-group">
              <input type="text" class="form-control input-lg" name="last" placeholder="Last name">
            </div>
            <div class="form-group">
              <input type="text" class="form-control input-lg" name="username" placeholder="Username">
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-lg" name="password" placeholder="Password">
            </div>
			<div class="form-group">
				<input type="password" class="form-control input-lg" name="confirmpassword" placeholder="Confirm Password">
			</div>
			<div class="form-group">
				<input type="email" class="form-control input-lg" name="email" placeholder="Email Id">
			</div>
            <div class="form-group">
				<input id="button" type="submit" name="submit" class="btn btn-success btn-lg btn-block" value="Sign-Up">
              
              <span class="pull-right"><a href="login.php">Already Registered! Login Here</a></span>
			  <span><?php echo $error; ?></span>
            </div>
          </form>
      </div>
      
  </div>
  </div>
</div>



</body>
</html>