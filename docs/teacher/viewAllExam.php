<?php
        include "connect_MySQL.php";
        require 'smarty/libs/Smarty.class.php';
        $smarty = new Smarty;
        $smarty->template_dir = "smarty/templates/templates";
        $smarty->compile_dir = "smarty/templates/templates_c";
        $smarty->config_dir = "smarty/templates/config";
        $smarty->cache_dir = "smarty/templates/cache";

        $selectquery = "SELECT Hno,Hname,Hcno,Hkno,Hstage,Hreleasedate,Hdeadline,Htime FROM Exam Order BY Hno";
        $selectsql = mysqli_query($link, $selectquery);
        $examlist = array();
        while($row = mysqli_fetch_array($selectsql, MYSQLI_NUM)){
        	$examlist[] = $row;
        	}
        $smarty->assign('examlist', $examlist);
        $err = mysqli_error($link);
        if ($err)
        	echo "error$err";
        $smarty->display('viewAllExam.tpl');
?>
