<?php
        include "connect_MySQL.php";
        require 'smarty/libs/Smarty.class.php';
        $smarty = new Smarty;
	session_start();
        $smarty->template_dir = "smarty/templates/templates";
        $smarty->compile_dir = "smarty/templates/templates_c";
        $smarty->config_dir = "smarty/templates/config";
        $smarty->cache_dir = "smarty/templates/cache";


        if ($_POST['tno'] AND $_POST['tpassword'])
        {
                $tno = $_POST['tno'];
                $tpassword = $_POST['tpassword'];
                $loginquery = "SELECT loginTeacher('$tno','$tpassword')";
                $loginsql = mysqli_query($link, $loginquery);
                $err = mysqli_error($link);
                if ($err)
                        echo "error$err";
                else{
			$_SESSION['uid']=$tno;
                        echo "<meta http-equiv=\"refresh\" content=\"1;url=teacherViewAllStudent.php\">";
		}
        }

        $smarty->display('loginTeacher.tpl');
?>
