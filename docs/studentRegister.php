<?php 
	include "connect_MySQL.php";
	require_once('/usr/local/lib/Smarty-3.1.14/libs/Smarty.class.php');
        session_start();
        $smarty = new Smarty();
	$smarty->setTemplateDir('/var/www/templates/');
	$smarty->setCompileDir('/var/www/templates_c/');
	$smarty->setConfigDir('/var/www/configs/');
	$smarty->setCacheDir('/var/www/cache/');
  
        $selectquery = "SELECT * FROM User";	
	$selectsql = mysqli_query($link, $selectquery);
	$userlist = array();
        while($row = mysqli_fetch_array($selectsql, MYSQLI_NUM)){
		$userlist[] = $row;

	}
        
        $smarty->assign('userlist', $userlist);
        
        if ($_POST['UID'] AND $_POST['Uname'] AND $_POST['Usex'] AND $_POST['Uage'] AND $_POST['Unation'] AND
$_POST['UBP'] AND $_POST['Upassword1'] AND $_POST['Upassword2'] AND $_POST['Uschool'] AND $_POST['Uemail'] AND $_POST['Uphone'] )
	  {
		$UID = $_POST['UID'];
		$Uname = $_POST['Uname'];
                $Usex = $_POST['Usex'];
                $Uage = $_POST['Uage'];
                $Unation = $_POST['Unation'];
                $UBP= $_POST['UBP'];
                $Upassword1 = $_POST['Upassword1'];
                $Upassword2 = $_POST['Upassword2'];
                $Uschool = $_POST['Uschool'];
                $Uemail=$_POST['Uemail'];
                $Uphone=$_POST['Uphone'];
                if(strcmp($Upassword1,$Upassword2))
                   echo "密码不一致";
		else 
                  {   $insertquery = "INSERT INTO User (UID,Uname,Usex,Uage,Unation,UBP,Upassword,Uschool,Uemail,Uphone) VALUES ('$UID', '$Uname', '$Usex', '$Uage', '$Unation', '$UBP', '$Upassword1', '$Uschool','$Uemail','$Uphone')";
		$insertsql = mysqli_query($link, $insertquery);
                  }
                $err = mysqli_error($link); 
		if ($err)
			echo "error$err";
		else{
			echo "<meta http-equiv=\"refresh\" content=\"1;url=showSelfInformation.php\">";
			$_SESSION['uid']=$UID;
		} 
	}
     $smarty->display('studentRegister.tpl');
?>


