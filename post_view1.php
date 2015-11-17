<?php
include('session.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Blogger</title>
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
				<li><a href="mypost.php">My Post</a></li>
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
<div class="modal-dialog" style="width:70%;">
<div class="row">
	<div class="col-sm-12">
		<?php
			include 'mysql.php';
			$result = mysql_safe_query('SELECT * FROM posts WHERE id=%s LIMIT 1', $_GET['id']);

			if(!mysql_num_rows($result)) {
				echo 'Post #'.$_GET['id'].' not found';
				exit;
			}

			$row = mysql_fetch_assoc($result);
			echo '<h2>'.$row['title'].'</h2>';
			echo '<em>Posted '.date('F j<\s\up>S</\s\up>, Y', $row['date']).'</em><br/>';
			echo nl2br($row['content']).'<br/>';
			echo '<a href="editpost.php?id='.$_GET['id'].'">Edit</a> | <a href="delete_post.php?id='.$_GET['id'].'">Delete</a> | <a href="Home1.php">View All</a>';
			echo '<hr/>';
			$result = mysql_safe_query('SELECT * FROM comments WHERE post_id=%s ORDER BY date ASC', $_GET['id']);
			echo '<ol id="comments">';
			while($row = mysql_fetch_assoc($result)) {
				echo '<li id="post-'.$row['id'].'">';
				echo (empty($row['website'])?'<strong>'.$row['name'].'</strong>':'<a href="'.$row['website'].'" target="_blank">'.$row['name'].'</a>');
				echo ' (<a href="comment_delete.php?id='.$row['id'].'&post='.$_GET['id'].'">Delete</a>)<br/>';
				echo '<small>'.date('j-M-Y g:ia', $row['date']).'</small><br/>';
				echo nl2br($row['content']);
				echo '</li>';
			}
		?>
	</div>
	<?php echo '</ol>';
	?>
	<?php
	echo <<<HTML
	<div class="">
		<div class="row">
			<div class="col-sm-12">
				<h2>Comments</h2>
				<form class="form col-md-12 center-block" method="post" action="comment_add.php?id={$_GET['id']}">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-1">Name:</div>
							<div class="col-sm-8"><input type="text" class="form-control input" name="name" style="width:30%;height:30px;" value="{$_COOKIE['name']}"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-1">Email:</div>
							<div class="col-sm-8"><input type="text" class="form-control input" name="email" style="width:30%;height:30px;" value="{$_COOKIE['email']}"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-1">Website:</div>
							<div class="col-sm-8"><input type="text" class="form-control input" name="website" style="width:30%;height:30px;" value="{$_COOKIE['website']}"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-1">Comments:</div>
							<div class="col-sm-8"><textarea class="form-control input" rows="5" name="content" id="content"></textarea></div>
						</div>
					</div>
					<div class="form-group">
						<input id="button" type="submit" name="submit" class="btn btn-success btn btn-default" value="Post Comment">			
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
HTML;
?>

</body>
</html>