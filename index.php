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
			<a class="navbar-brand" href="index.php">Blogger</a>
		</div>
		<div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="index.php">Home</a></li>
				<li><a href="contact.php">Contact Us</a></li>
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
<div class="modal-dialog" style="width:55%;">
<div class="row">
	<div class="col-sm-12">
		<?php
			include 'mysql.php';
			$result = mysql_safe_query('SELECT * FROM posts ORDER BY date DESC');
			if(!mysql_num_rows($result)) {
				echo 'No posts yet.';
			} else {
				while($row = mysql_fetch_assoc($result)) {
				echo '<h2>'.$row['title'].'</h2>';
				$content = substr($row['content'], 0, 300);
				echo nl2br($content).'...<br/>';
			?>
				<br><p class="lead"><button class="btn btn-default"><?php	echo '<a href="post_view2.php?id='.$row['id'].'">Read More</a>'?></button></p>
				<ul class="list-inline"><li><?php?></li><li><a href="#"><i class="glyphicon glyphicon-comment"></i> <?php echo '<a href="post_view2.php?id='.$row['id'].'#comments">'.$row['comments'].' comments</a>';?></a></li>
				<li><a href="#"><i class="glyphicon glyphicon-share"></i> 34 Shares</a></li></ul>
				<?php
				}
			}
			?>
				
	</div>
</div>


</body>
</html>

