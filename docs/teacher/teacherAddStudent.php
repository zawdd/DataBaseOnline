<?php
        include "connect_MySQL.php";
        require 'smarty/libs/Smarty.class.php';
        $smarty = new Smarty;
        $smarty->template_dir = "smarty/templates/templates";
        $smarty->compile_dir = "smarty/templates/templates_c";
        $smarty->config_dir = "smarty/templates/config";
        $smarty->cache_dir = "smarty/templates/cache";
        

        if ($_POST['tno'] AND $_POST['sno'] AND $_POST['uschool'])
        {
                $snum = $_POST['sno'];
		$tnum = $_POST['tno'];
		$school = $_POST['uschool'];
//		$selectquery = "SELECT Sno,Uname FROM Student,User WHERE Student.Sno=User.UID AND Student.Tno='$tnum'"
//		$selectsql = mysqli_query($link, $selectquery);
//		$Studentlist = array();
//		while($row = mysqli_fetch_array($selectsql, MYSQLI_NUM)){
  //             	$Studentlist[] = $row;
//
  //              }
//		$smarty->assign('Studentlist', $Studentlist); 
                $insertquery = "SELECT teacherAddStudent('$snum','$tnum','$school')";
                $insertsql = mysqli_query($link, $insertquery);
                $err = mysqli_error($link);
                if ($err)
                        echo "error$err";
                else
                        echo "<meta http-equiv=\"refresh\" content=\"1;url=teacherAddStudent.php\">";
        }
        $smarty->display('teacherAddStudent.tpl');
?>

