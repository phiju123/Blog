<?php
include 'mysql.php';
include('session.php');

if(!empty($_POST)) {
	if(mysql_safe_query('UPDATE posts SET title=%s, content=%s, date=%s WHERE id=%s', $_POST['title'], $_POST['content'], time(), $_GET['id']))
		redirect('post_view.php?id='.$_GET['id']);
	else
		echo mysql_error();
}

$result = mysql_safe_query('SELECT * FROM posts WHERE id=%s', $_GET['id']);

if(!mysql_num_rows($result)) {
	echo 'Post #'.$_GET['id'].' not found';
	exit;
}

$row = mysql_fetch_assoc($result);

echo <<<HTML
<head>
	<title>Blogger || Edit</title>
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
				<li><a href="mypost.php">My Blog</a></li>
				<li><a href="newupload.php">New Post</a></li>
			</ul>
		</div>
		<div>
			
			<ul class="nav navbar-nav navbar-right">
				<li class=""dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">$login_session<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="logout.php">Log Out</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	
</nav>
<div class="modal-dialog">
	<h1 class="text-center">Edit Post</h1>
          <form class="form col-md-12 center-block" method="post">
            <div class="form-group">
				<h4><b>Title:</b></h4>
              <input type="text" class="form-control input-lg" name="title" id="title" value="{$row['title']}" />
            </div>
            <div class="form-group">
				<h4><b>Content:</b></h4>
              <textarea class="form-control input-lg" rows="12" name="content" id="content">{$row['content']}</textarea>
            </div>
            <div class="form-group">
				<input id="button" type="submit" class="btn btn-success btn-lg btn-block" value="Save">
            </div>
						
          </form>
</div>
</body>
HTML;
