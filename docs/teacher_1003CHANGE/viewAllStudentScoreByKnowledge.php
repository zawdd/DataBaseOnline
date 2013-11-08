<?php
        include "connect_MySQL.php";
        require 'smarty/libs/Smarty.class.php';
        $smarty = new Smarty;
        $smarty->template_dir = "smarty/templates/templates";
        $smarty->compile_dir = "smarty/templates/templates_c";
        $smarty->config_dir = "smarty/templates/config";
        $smarty->cache_dir = "smarty/templates/cache";

        $selectknowledgequery = "SELECT * FROM Knowledge";
        $selectknowledgesql = mysqli_query($link, $selectknowledgequery);
        $knowledgelist = array();

        while($row = mysqli_fetch_array($selectknowledgesql, MYSQLI_NUM)){
                $knowledgelist[] = $row;
        }
//        $smarty->assign('chapterlist', $chapterlist);
        $smarty->assign('knowledgelist', $knowledgelist);

	if ($_POST['kno']){
	$kno = $_POST['kno'];
	$kno = implode("%",$kno);
//	echo "kno = "."$kno";
        $selectquery = "SELECT UID,Uname,Ahsubtime,Ahscore FROM User,Exam,ExamAnswerForStudent WHERE User.UID=ExamAnswerForStudent.Asno AND Exam.Hno=ExamAnswerForStudent.Ahno AND Hkno='$kno' ORDER BY Ahno,Ahscore DESC";
        $selectsql = mysqli_query($link, $selectquery);
        $scorelist = array();
        while($row = mysqli_fetch_array($selectsql, MYSQLI_NUM)){
        	$scorelist[] = $row;
//		echo "$row[0]";
        	}
        $smarty->assign('scorelist', $scorelist);
        $err = mysqli_error($link);
        if ($err)
        	echo "error$err";
	}
        $smarty->display('viewAllStudentScoreByKnowledge.tpl');
?>
