<?php
	include "connect_MySQL.php";
	require 'smarty/libs/Smarty.class.php';
	$smarty = new Smarty;
	$smarty->template_dir = "smarty/templates/templates";
	$smarty->compile_dir = "smarty/templates/templates_c";
	$smarty->cache_dir = "smarty/templates/cache";
	
	if($_GET['$examid'])	
	{
		$examid = $_GET['$examid'];
		$selectquery = "select Asno,Uname,Ahsubtime,Ahscore FROM ExamAnswerForStudent,User WHERE ExamAnswerForStudent.Asno=User.UID AND Ahno='$examid' ORDER BY Ahscore DESC";
		$selectsql = mysqli_query($link,$selectquery);
		$scorelist = array();
		while($row = mysqli_fetch_array($selectsql,MYSQLI_NUM)) {
			$scorelist[] = $row;
		}
		$smarty->assign('scorelist',$scorelist);
	}
	$smarty->display('viewStudentScore.tpl');
?>
