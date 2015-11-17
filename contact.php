<?php
	
	
	$error="";
if(!empty($_POST)){
	include 'mysql.php';
	if(mysql_safe_query('INSERT INTO messaging1(name1,email1,subject1,message1,date) values(%s,%s,%s,%s,%s)',$_POST['name1'],$_POST['email1'],$_POST['subject1'],$_POST['message1'],time()))
		echo 'Entry posted.';
	else
			$error="Please try again";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Blogger || Contact Us</title>
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
				<li class="active"><a href="contact.php">Contact Us</a></li>
				</ul>
		</div>
		<div>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="admin.php"><span class="glyphicon glyphicon-wrench"></span> Admin</a></li>
				<li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
				<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			</ul>
		</div>
	</div>
	
</nav>
<div class="modal-dialog">
			
				<h1 class="text-center">Contact Us</h1>
				<form class="form col-md-12 center-block" action="" method="post">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-2"><b>Name:</b></div>
							<div class="col-sm-10"><input type="text" class="form-control input" name="name1"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-2"><b>Email:</b></div>
							<div class="col-sm-10"><input type="text" class="form-control input" name="email1"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-2"><b>Subject:</b></div>
							<div class="col-sm-10"><input type="text" class="form-control input" name="subject1"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-2"><b>Message:</b></div>
							<div class="col-sm-10"><textarea class="form-control input" rows="5" name="message1" id="message1"></textarea></div>
						</div>
					</div>
					<div class="form-group">
						<input id="button" type="submit" name="submit" class="btn btn-success btn-lg btn-block" value="Submit">			
						<span><?php echo $error; ?></span>
					</div>
				</form>
</div>

</body>
</html>