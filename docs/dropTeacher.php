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
       if($_POST['dropTno']=='是')
	{
          $updatequery = "UPDATE Student SET Stno=NULL WHERE Sno=$uid";
	  $insertsql = mysqli_query($link, $updatequery);
        }
        
       $smarty->display('dropTeacher.tpl');

?>
