<?php
	
	include('session.php');
	$error="";
if(!empty($_POST)){
	include 'mysql.php';
	if(mysql_safe_query('INSERT INTO posts(title,content,date,username) values(%s,%s,%s,%s)',$_POST['title'],$_POST['post'],time(),$login_session))
		echo 'Entry posted.';
	else
			$error="Please try again";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Blogger || Login</title>
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
				<li><a href="Home_admin.php">Home</a></li>
				<li><a href="mypost_admin.php">My Post</a></li>
				<li class="active"><a href="newupload_admin.php">New Post</a></li>
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
<div class="modal-dialog">
	<h1 class="text-center">New Post</h1>
          <form class="form col-md-12 center-block" action="" method="post">
            <div class="form-group">
				<h4><b>Title:</b></h4>
              <input type="text" class="form-control input-lg" name="title">
            </div>
            <div class="form-group">
				<h4><b>Content:</b></h4>
              <textarea class="form-control input-lg" rows="5 "name="post"></textarea>
            </div>
			<div class="form-group">
				<h4><b>Upload Image:</b></h4>
				<input type="file" name="upload Image" id="uploadImage">
			</div>
            <div class="form-group">
				<input id="button" type="submit" name="submit" class="btn btn-success btn-lg btn-block" value="Submit">
			  <span><?php echo $error; ?></span>
            </div>
						
          </form>
</div>

</body>
</html>