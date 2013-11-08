<?php
        include "connect_MySQL.php";
        require 'smarty/libs/Smarty.class.php';
        $smarty = new Smarty;
        $smarty->template_dir = "smarty/templates/templates";
        $smarty->compile_dir = "smarty/templates/templates_c";
        $smarty->config_dir = "smarty/templates/config";
        $smarty->cache_dir = "smarty/templates/cache";

        if ($_POST['tno'])
        {
                $tnum = $_POST['tno'];
//                $insertquery = "INSERT INTO Knowledge (Kno, Kname) VALUES (NULL, '$name')";
//                $insertsql = mysqli_query($link, $insertquery);
                $selectquery = "SELECT teacherDeleteAllStudent('$tnum')";
                $selectsql = mysqli_query($link, $selectquery);
                $err = mysqli_error($link);
                if ($err)
                        echo "error$err";
                else
                        echo "<meta http-equiv=\"refresh\" content=\"1;url=teacherDeleteAllStudent.php\">";
        }
        $smarty->display('teacherDeleteAllStudent.tpl');
?>

