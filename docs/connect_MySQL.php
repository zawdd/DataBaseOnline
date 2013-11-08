<?php 
//	session_start();	
//	$tempUserId = $_SESSION['userID'];
//	$_SESSION['userID']=client;
//	$tempUserPassword = $_SESSION['password'];
//	$_SESSION['password']=123;
	$link = mysqli_connect("localhost","root","0818","ExamOnline");
//	$link = mysqli_connect("liuyanscut.gicp.net","client","123","dbexercise");
	mysqli_query($link, "set charset 'utf8'");//设置连接编码
	mysqli_query($link, "set names 'utf8'");//设置连接编码
	if (!$link) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
    }
	//if($_SESSION['uid'])
	//	<meta http-equiv=\"refresh\" content=\"1;url=http://localhost/index.htm\">
?>
