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
        if ($_POST['Uname'])
             {
                $updatequery1="UPDATE User SET Uname='$_POST[Uname]' WHERE UID=$uid ";	
	        $updatesql1 = mysqli_query($link, $updatequery1);
              }
        if ($_POST['Usex'])
            
           {
                $updatequery2="UPDATE User SET Usex='$_POST[Usex]'  WHERE UID=$uid ";
	        $updatesql2 = mysqli_query($link, $updatequery2);
           }

        if ($_POST['Uage'])
             {
                $updatequery3="UPDATE User SET Uage=$_POST[Uage] WHERE UID=$uid ";	
	        $updatesql3 = mysqli_query($link, $updatequery3);
              }
   
         if ($_POST['Unation'])
             {
                $updatequery4="UPDATE User SET Unation='$_POST[Unation]' WHERE UID=$uid ";	
	        $updatesql4 = mysqli_query($link, $updatequery4);
              }
         
         if ($_POST['UBP'])
             {
                $updatequery5="UPDATE User SET UBP='$_POST[UBP]' WHERE UID=$uid ";	
	        $updatesql5 = mysqli_query($link, $updatequery5);
              }
        
         

	if($_POST['Upassword1'] AND $_POST['Upassword2'] ){
       		if (strcmp($_POST['Upassword1'],$_POST['Upassword2']) ){             
            		 echo "密码不一致！";     
		}
              	else{             
                	$updatequery6="UPDATE User SET Upassword='$_POST[Upassword1]' WHERE UID=$uid ";	
	        	$updatesql6 = mysqli_query($link, $updatequery6);
              	}
	}
		
	 if ($_POST['Uschool'])
             {
                $updatequery7="UPDATE User SET Uschool='$_POST[Uschool]' WHERE UID=$uid ";	
	        $updatesql7 = mysqli_query($link, $updatequery7);
              }	
         
         if ($_POST['Uemail'])
             {
                $updatequery8="UPDATE User SET Uemail='$_POST[Uemail]' WHERE UID=$uid ";	
	        $updatesql8 = mysqli_query($link, $updatequery8);
              }	
         
         if ($_POST['Uphone'])
             {
                $updatequery9="UPDATE User SET Uphone='$_POST[Uphone]' WHERE UID=$uid ";	
	        $updatesql9= mysqli_query($link, $updatequery9);
              }	
	
       $smarty->display('updateSelfInformation.tpl');
			
		
?>
