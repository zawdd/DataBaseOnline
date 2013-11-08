<?php 
	include "connect_MySQL.php";
	require_once('/usr/local/lib/Smarty-3.1.14/libs/Smarty.class.php');
	session_start();
	$smarty = new Smarty();
	$smarty->setTemplateDir('/var/www/templates/');
	$smarty->setCompileDir('/var/www/templates_c/');
	$smarty->setConfigDir('/var/www/configs/');
	$smarty->setCacheDir('/var/www/cache/');
	
        $uid=$_SESSION['uid'];
	$selectquery = "SELECT Tno from Teacher";
	$selectsql = mysqli_query($link, $selectquery);
	while($row = mysqli_fetch_array($selectsql, MYSQLI_NUM))
              {
		$problemlist[] = $row;
	      }
           $smarty->assign('problemlist', $problemlist);
      
       if ($_POST[selectTno])
         
	{
		//echo $_POST[selectTno]; 
	  $updatequery = "UPDATE Student SET Stno=$_POST[selectTno] WHERE Sno=$uid";
	  $updatesql = mysqli_query($link, $updatequery);

         }
       $smarty->display('selectTeacher.tpl');

?>
