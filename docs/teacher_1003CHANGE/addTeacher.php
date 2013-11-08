<?php
	include "connect_MySQL.php";
	require 'smarty/libs/Smarty.class.php';
	session_start();
	$smarty = new Smarty;

        $smarty->template_dir = "smarty/templates/templates";
        $smarty->compile_dir = "smarty/templates/templates_c";
        $smarty->config_dir = "smarty/templates/config";
        $smarty->cache_dir = "smarty/templates/cache";
	
	$selectquery = "SELECT * FROM Teacher";
	$selectsql = mysqli_query($link, $selectquery);
	$teacherlist = array();

	while($row = mysqli_fetch_array($selectsql, MYSQLI_NUM)){
		$teacherlist[] = $row;
	}

	$smarty->assign('teacherlist', $teacherlist);


	if ($_POST['id'] AND $_POST['name'] AND $_POST['sex'] AND $_POST['age'] AND $_POST['nation'] AND $_POST['bp'] AND $_POST['password'] AND $_POST['school'] AND $_POST['status'] AND $_POST['count'] AND $_POST['pt'] AND $_POST['search'] AND $_POST['phone'] AND $_POST['email'])
	{
		$UID = $_POST['id'];
		$Uname = $_POST['name'];
		$Usex = $_POST['sex'];
		$Uage = $_POST['age'];
		$Unation = $_POST['nation'];
		$UBP = $_POST['bp'];
		$Upassword = $_POST['password'];
		$Uschool = $_POST['school'];
//		$regdate = $_POST['regist'];
		$regdate = date("Y-m-d",time());
		//date("Y-m-d", $row['regdate'])
//		echo time();
		$Ustatus = $_POST['status'];
		$Tpt = $_POST['pt'];
		$Tsearch = $_POST['search'];
		$Tstucount = $_POST['count'];
		$Uemail = $_POST['email'];
		$Uphone = $_POST['phone'];
		$insertquery = "select addTeacher('$UID','$Uname','$Usex','$Uage','$Unation','$UBP','$Upassword','$Uschool','$regdate','$Ustatus','$Tpt','$Tsearch','$Tstucount','$Uemail','$Uphone')";
		$insertsql = mysqli_query($link,$insertquery);

		$err = mysqli_error($link);
		if ($err)
			echo "error$err";
		else{
			$_SESSION['uid']=$UID;
			echo "<meta http-equiv=\"refresh\" content=\"1;url=teacherViewAllStudent.php\">";
		}
	}
	
	$smarty->display('addTeacher.tpl');

?>
