<?php 
	include "connect_MySQL.php";
	require_once('/usr/local/lib/Smarty-3.1.14/libs/Smarty.class.php');
	
	$smarty = new Smarty();
	$smarty->setTemplateDir('/var/www/templates/');
	$smarty->setCompileDir('/var/www/templates_c/');
	$smarty->setConfigDir('/var/www/configs/');
	$smarty->setCacheDir('/var/www/cache/');
	
	$selectchapterquery = "SELECT * FROM Chapter";	
	$selectchaptersql = mysqli_query($link, $selectchapterquery);
	$chapterlist = array();

	while($row = mysqli_fetch_array($selectchaptersql, MYSQLI_NUM)){
		$chapterlist[] = $row;
	}
	
	$selectknowledgequery = "SELECT * FROM Knowledge";	
	$selectknowledgesql = mysqli_query($link, $selectknowledgequery);
	$knowledgelist = array();

	while($row = mysqli_fetch_array($selectknowledgesql, MYSQLI_NUM)){
		$knowledgelist[] = $row;
	}
	$smarty->assign('chapterlist', $chapterlist);
	$smarty->assign('knowledgelist', $knowledgelist);
	
	if($_POST['cno'] AND $_POST['ename'] AND $_POST['econtent'] AND $_POST['answer'] AND $_POST['score'] AND $_POST['style'] AND $_POST['stage'])
	{
		$cno = $_POST['cno'];
		$ename = $_POST['ename'];
		$econtent = nl2br(htmlentities($_POST['econtent']));//把特殊符号都变成html符号，处理换行符号
		$answer = $_POST['answer'];
		$score = $_POST['score'];
		$style = $_POST['style'];
		$stage = $_POST['stage'];
		$query = "INSERT INTO Cexercise(Ccno, Cename, Cecontent, Canswer, Cscore, Cstyle, Cstage) VALUES('$cno', '$ename', '$econtent', '$answer', '$score', '$style', '$stage')";
		$sql = mysqli_query($link, $query);
		$err = mysqli_error($link); 
		if ($err)
			echo "error$err";
		else
			echo "<meta http-equiv=\"refresh\" content=\"1;url=addNormalProblem.php\">"; 
	}
	
	$smarty->display('addNormalProblem.tpl');
?>
