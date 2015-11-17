<?php
	
	include('session.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Blogger || Home</title>
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
			<a class="navbar-brand" href="Home_admin.php">Blogger</a>
		</div>
		<div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="Home_admin.php">Home</a></li>
				<li><a href="mypost_admin.php">My Post</a></li>
				<li><a href="newupload_admin.php">New Post</a></li>
				<li><a href="message_admin.php">Message</a></li>
			</ul>
		</div>
		<div>
			
			<ul class="nav navbar-nav navbar-right">
				<li class=""dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $login_session; ?><span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="logout.php">Log Out</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	
</nav>
<div class="modal-dialog" style="width:55%;">
<div class="row">
	<div class="col-sm-12">
		
	</div>
</div>


</body>
</html>

