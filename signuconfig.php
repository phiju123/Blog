<?php
$error="";
define('DB_HOST', 'localhost');
define('DB_NAME', 'myblog');
define('DB_USER','root');
define('DB_PASSWORD','');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) OR die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error()); 
function new_member()
{
	$name = $_POST['name']; 
	$last = $_POST['last'];
	$username = $_POST['username']; 
	$password = $_POST['password'];
	$email = $_POST['email']; 
	 
	$query = "INSERT INTO member (name,last,username,password,email) VALUES ('$name','$last','$username','$password','$email')"; 
	$data = mysql_query ($query)or die(mysql_error()); 
	
	if($data) 
	{ 
		echo "YOUR REGISTRATION IS COMPLETED..."; 
	}
	else
	{
		$error="Please try again";
	}
}
function SignUp() 
{ 
	if(!empty($_POST['username'])) 
	{ 
		$query = mysql_query("SELECT * FROM member WHERE username = '$_POST[username]' AND password = '$_POST[password]'") or die(mysql_error()); 
		if(!$row = mysql_fetch_array($query) or die(mysql_error())) 
		{ 
			new_member(); 
		} 
		else 
		{ 
			$error="Please take another username"; 
		} 
	} 
} 
if(isset($_POST['submit'])) 
{ 
	SignUp(); 
} 
?>