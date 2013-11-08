<?php
	include "connect_MySQL.php";
	session_start();
	unset($_SESSION['uid']);
	unset($_SESSION['sid']);
	echo "<meta http-equiv=\"refresh\" content=\"1;url= loginTeacher.php\">";
	session_destory();a
?>
