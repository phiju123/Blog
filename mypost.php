<?php
	
	include('session.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Blogger || My Post</title>
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
			<a class="navbar-brand" href="Home1.php">Blogger</a>
		</div>
		<div>
			<ul class="nav navbar-nav">
				<li><a href="Home1.php">Home</a></li>
				<li class="active"><a href="mypost.php">My Post</a></li>
				<li><a href="newupload.php">New Post</a></li>
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
		<?php
			include 'mysql.php';
			$result = mysql_safe_query("SELECT * FROM posts WHERE username='$login_session' ORDER BY date DESC");
			if(!mysql_num_rows($result)) {
				echo 'No posts yet.';
			} else {
				while($row = mysql_fetch_assoc($result)) {
				echo '<h2>'.$row['title'].'</h2>';
				$content = substr($row['content'], 0, 300);
				echo nl2br($content).'...<br/>';
			?>
				<br><p class="lead"><button class="btn btn-default"><?php	echo '<a href="post_view1.php?id='.$row['id'].'">Read More</a>'?></button></p>
				<ul class="list-inline"><li><?php?></li><li><a href="#"><i class="glyphicon glyphicon-comment"></i> <?php echo '<a href="post_view1.php?id='.$row['id'].'#comments">'.$row['comments'].' comments</a>';?></a></li>
				<li><a href="#"><i class="glyphicon glyphicon-share"></i> 34 Shares</a></li></ul>
				<?php
				}
			}
			?>
				
	</div>
</div>


</body>
</html>