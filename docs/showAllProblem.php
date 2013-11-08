<?php 
	include "connect_MySQL.php";
	require_once('/usr/local/lib/Smarty-3.1.14/libs/Smarty.class.php');
	

	$smarty = new Smarty();
	$smarty->setTemplateDir('/var/www/templates/');
	$smarty->setCompileDir('/var/www/templates_c/');
	$smarty->setConfigDir('/var/www/configs/');
	$smarty->setCacheDir('/var/www/cache/');
	
	if($_POST['dpc'] AND $_POST['pid'])
	{
		$dpc = $_POST['dpc'];
		$pid = $_POST['pid'];
		$deletequery = "select deleteProblem('$dpc', '$pid')";
		$deletesql = mysqli_query($link, $deletequery);
		$dresult = mysqli_fetch_array($deletesql, MYSQLI_NUM);		
		$err = mysqli_error($link); 
		if($err)
		{
			echo "error$err";
		}
		if($dresult[0] == "1")
		{
			echo "delete success!";
		}
		if($dresult[0] == "0")
		{
			echo "delete fail";
		}
		echo "<meta http-equiv=\"refresh\" content=\"1;url=showAllProblem.php\">"; 
	}
	
	if($_POST['pc'] AND $_POST['beg'] AND $_POST['end'])
	{
		$pc = $_POST['pc'];
		$beg = $_POST['beg']-1;//0 means null in php ,which is documented
		$end = $_POST['end']-1;
		if($end - $beg < 0 )
			echo "<meta http-equiv=\"refresh\" content=\"1;url=showAllProblem.php\">"; 
	}else{
		$pc = "Cexercise";
		$beg = "0";
		$end = "20";
		
	}
	$smarty->assign('pc',$pc);
	$selectquery =  "call showAllProblems('$pc', $beg, $end)";
	$selectsql = mysqli_query($link, $selectquery);
	$problemlist = array();

	while($row = mysqli_fetch_array($selectsql, MYSQLI_NUM)){
		$problemlist[] = $row;
	}
	/*
	$err = mysqli_error($link); 
	if ($err)
		echo "error$err";
	else
		echo "<meta http-equiv=\"refresh\" content=\"1;url=showAllProblem.php\">"; 
	*/
	$smarty->assign('problemlist', $problemlist);
	$smarty->assign('user', "ADMIN");
	$smarty->display('showAllProblem.tpl');
	
?>
