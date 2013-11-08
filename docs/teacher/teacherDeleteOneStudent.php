<?php
        include "connect_MySQL.php";
        require 'smarty/libs/Smarty.class.php';
        $smarty = new Smarty;
        $smarty->template_dir = "smarty/templates/templates";
        $smarty->compile_dir = "smarty/templates/templates_c";
        $smarty->config_dir = "smarty/templates/config";
        $smarty->cache_dir = "smarty/templates/cache";

        if ($_POST['tno'] AND $_POST['sno'])
        {
                $tnum = $_POST['tno'];
		$snum = $_POST['sno'];
//                $insertquery = "INSERT INTO Knowledge (Kno, Kname) VALUES (NULL, '$name')";
//                $insertsql = mysqli_query($link, $insertquery);
                $selectquery = "SELECT teacherDeleteStudent('$snum','$tnum')";
                $selectsql = mysqli_query($link, $selectquery);
                $err = mysqli_error($link);
                if ($err)
                        echo "error$err";
                else
                        echo "<meta http-equiv=\"refresh\" content=\"1;url=teacherDeleteOneStudent.php\">";
        }
        $smarty->display('teacherDeleteStudent.tpl');
?>





























