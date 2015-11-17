<?php
$connection = mysql_connect("localhost", "root", "");
$db = mysql_select_db("myblog", $connection);
session_start();
$check=$_SESSION['login_user'];
$ses_sql=mysql_query("select username from member where username='$check'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['username'];
if(!isset($login_session)){
mysql_close($connection); // Closing Connection
 // Redirecting To Home Page
}
?>