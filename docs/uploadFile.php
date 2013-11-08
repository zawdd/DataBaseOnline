<?php

	include "connect_MySQL.php";
	require_once('/usr/local/lib/Smarty-3.1.14/libs/Smarty.class.php');
        session_start();
	
	function phpalert($msg){
		$str = '<script type="text/javascript">'; 
		$str.="alert('".$msg."');";
		$str.="</script>";
		echo $str;
	}	
	
        $smarty = new Smarty();
	$smarty->setTemplateDir('/var/www/templates/');
	$smarty->setCompileDir('/var/www/templates_c/');
	$smarty->setConfigDir('/var/www/configs/');
	$smarty->setCacheDir('/var/www/cache/');


	$no=$_SESSION['examid'];
	$userid=$_SESSION['uid'];

	

	if ($_FILES["infile"]){//上传大于post_max_size值时，FILES[infile]为空，相当与没有传
	if (($_FILES["infile"]["size"] < 1024*1024*8) && $_FILES["infile"]["size"] != "")
	{
		if ($_FILES["infile"]["error"] > 0)
	    	{
			//echo "Return Code: " . $_FILES["infile"]["error"] . "<br />";
			$errormsg = "上传失败！";
			phpalert($errormsg);
	    	}else{
			//echo "Upload: " . $_FILES["infile"]["name"] . "<br />";
			//echo "Type: " . $_FILES["infile"]["type"] . "<br />";
			//echo "Size: " . ($_FILES["infile"]["size"] / 1024) . " Kb<br />";
			//echo "Temp file: " . $_FILES["infile"]["tmp_name"] . "<br />";
			$dir="/var/www/upload/".$userid."/";
			if(!file_exists ($dir)){			
				mkdir ($dir, 0777);
			}
			if (file_exists("/var/www/upload/".$userid."/" . $_FILES["infile"]["name"]))
			{
				//echo $_FILES["infile"]["name"] . " already exists. ";
				$errormsg = $_FILES["infile"]["name"] . " 已经存在！ ";
				phpalert($errormsg);
			}else{
				move_uploaded_file($_FILES["infile"]["tmp_name"],
				"/var/www/upload/".$userid."/" . $_FILES["infile"]["name"]);
				//$msg ="Stored in: " . "/var/www/upload/".$userid."/" . $_FILES["infile"]["name"];
				$msg = $_FILES["infile"]["name"]."上传成功！";
				phpalert($msg);
			}
	    	}
	}else{
	  //echo "无效文件";
		$msg = "上传文件超过大小！";
		phpalert($msg);
	}
	}
	$smarty->display('uploadFile.tpl');
?> 
