<?php
include 'mysql.php';
mysql_safe_query('DELETE FROM messaging1 WHERE id=%s LIMIT 1', $_GET['id']);
redirect('message_admin.php');
?>