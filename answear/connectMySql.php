<?php 
	//session_start();	
	$ip = "127.0.0.1";
	$tempUserId = "root" ;
	$tempUserPassword = "0818" ;
//	$tempUserId = $_SESSION['userID'];
//	$tempUserPassword = $_SESSION['password'];
	//$link = mysqli_connect("liuyanscut.gicp.net",$tempUserId,$tempUserPassword,"dbexercise");
	$link = mysqli_connect($ip,$tempUserId,$tempUserPassword,"dbexercise");
	mysqli_query($link, "set charset gbk");//ÉèÖÃÁ¬½Ó±àÂë
	?>