<?php 
	include "connect_MySQL.php";
	require_once('/usr/local/lib/Smarty-3.1.14/libs/Smarty.class.php');
	
	$smarty = new Smarty();
	$smarty->setTemplateDir('/var/www/templates/');
	$smarty->setCompileDir('/var/www/templates_c/');
	$smarty->setConfigDir('/var/www/configs/');
	$smarty->setCacheDir('/var/www/cache/');
	
	$upc = "Pexercise";//problem 
	$upid = "18";//problem id
	$userid = "1";//user id
	$hno = "1";//test number
	$psquery = "call showOneProblem('$upc', $upid)"; //cs mean common problem select
	$pssql = mysqli_multi_query($link, $psquery);
	//$psrow = mysqli_fetch_array($pssql, MYSQLI_NUM);		
	do // a producer will return at least two rows ,we need free or handle them all
	{
		if( $result = mysqli_store_result($link)){
			$psrow = mysqli_fetch_array($result, MYSQLI_NUM);	
			mysqli_free_result($result);
		}		
		
	}while( mysqli_next_result($link) );
	
	$smarty->assign("psrow", $psrow);
	
	if($_POST["answer"]){
		$filepath = "/var/www/upload/".$userid.$upid.".c";
		$content = $_POST['answer'];
		$fp = fopen($filepath,"w+"); 
		fwrite($fp,$content); 
		fclose($fp); 
		
		$psavequery = "select answerOneProgramProblem('$upid','$userid','$hno','$filepath')"; //uncompeleted
		$psavesql = mysqli_query($link, $psavequery);
	;	/*do // a producer will return at least two rows ,we need free or handle them all
		{
			if( $result2 = mysqli_store_result($psavesql)){
				$psrow2 = mysqli_fetch_array($result2, MYSQLI_NUM);			
			}		
			mysqli_free_result($result2);
		}while( !mysqli_next_result($psavesql ) );
		*/
		$err = mysqli_error($link); 
		if ($err){
			echo "error$err";
		}else{
			echo "<meta http-equiv=\"refresh\" content=\"1;url=answerProgramProblem.php\">";
		}
	}
	
	$smarty->display('answerProgramProblem.tpl');
	

?>
