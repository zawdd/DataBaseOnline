<?php
        include "connect_MySQL.php";
        require 'smarty/libs/Smarty.class.php';
	session_start();
        $smarty = new Smarty;

        $smarty->template_dir = "smarty/templates/templates";
        $smarty->compile_dir = "smarty/templates/templates_c";
        $smarty->config_dir = "smarty/templates/config";
        $smarty->cache_dir = "smarty/templates/cache";

//        if ($_POST['eno'])
	if($_GET['$eno'])
        {	
//		echo "eno = ".$eno;
                $snum = $_SESSION['sid'];
//                $eno = $_POST['eno'];
		$eno = $_GET['$eno'];
		$smarty->assign('snum',$snum);
		$smarty->assign('eno',$eno);
//		echo "$eno = ".$eno;
		$_SESSION['eno']=$eno;
		//选择题的作答情况
		$selectquery1 = "SELECT Cnum,CPcontent,ChooseProblem.CPanswer,Cexercise.Cscore,CexerciseAnswerForstudent.Canswer,CexerciseAnswerForstudent.Cscore FROM ChooseProblem,CexerciseAnswerForstudent,Cexercise WHERE Cexercise.Ceno=CexerciseAnswerForstudent.Ceno AND Cexercise.Ceno=ChooseProblem.CPid AND Chno='$eno' AND Sno='$snum' ORDER BY Cnum";
		//填空题的作答情况
		$selectquery2 = "SELECT Cnum,FPcontent,FPanswer,Cexercise.Cscore,CexerciseAnswerForstudent.Canswer,CexerciseAnswerForstudent.Cscore FROM FillProblem,CexerciseAnswerForstudent,Cexercise WHERE Cexercise.Ceno=CexerciseAnswerForstudent.Ceno AND Cexercise.Ceno=FillProblem.FPid AND Chno='$eno' AND Sno='$snum'ORDER BY Cnum";
		//操作题作答情况
		//简答题作答情况
		//编程题作答情况
		$selectquery3 = "SELECT pnumber,Pecontent,Pexercise.Panswer,Pexercise.Pscore,PexerciseAnswerForstudent.Paname,PexerciseAnswerForstudent.Pscore FROM Pexercise,PexerciseAnswerForstudent WHERE Pexercise.Peno=PexerciseAnswerForstudent.Peno AND Phno='$eno' AND Psno='$snum' ORDER BY pnumber";
//                $selectquery1 = "SELECT Cnum,Cecontent,Cexercise.Canswer,Cexercise.Cscore,CexerciseAnswerForstudent.Canswer,CexerciseAnswerForstudent.Cscore FROM Cexercise,CexerciseAnswerForstudent WHERE Cexercise.Ceno=CexerciseAnswerForstudent.Ceno AND Chno='$eno'";
//		$selectquery2 = "SELECT pnumber,Pecontent,Pexercise.Panswer,Pexercise.Pscore,PexerciseAnswerForstudent.Paname,PexerciseAnswerForstudent.Pscore FROM Pexercise,PexerciseAnswerForstudent WHERE Pexercise.Peno=PexerciseAnswerForstudent.Peno AND Phno='$eno'";
                $selectsql1 = mysqli_query($link, $selectquery1);
        	$examlist = array();
       		 while($row = mysqli_fetch_array($selectsql1, MYSQLI_NUM)){
                //	$examlist[] = $row;
			$examlist[] = str_replace("%","<br />",$row);
                }
		$selectsql2 = mysqli_query($link, $selectquery2);
		while($row = mysqli_fetch_array($selectsql2,MYSQLI_NUM)){
		//	$examlist[] = $row;
			$examlist[] = str_replace("%","<br />",$row);
		}
		$selectsql3 = mysqli_query($link, $selectquery3);
                while($row = mysqli_fetch_array($selectsql3,MYSQLI_NUM)){
                //        $examlist[] = $row;
			$examlist[] = str_replace("%","<br />",$row);
                }
        	$smarty->assign('examlist', $examlist);

                $selectarray = "SELECT Hnumas,Hnumbs,Hnumcs FROM Exam WHERE Hno=$eno";
                $selectexamsql = mysqli_query($link,$selectarray);
                $row = mysqli_fetch_array($selectexamsql,MYSQLI_NUM);
                $str1 = explode("%",$row[0]);   //单选题的题库题号数组
                $str2 = explode("%",$row[1]);   //多选题的题库题号数组
                $str3 = explode("%",$row[2]);   //填空题的题库题号数组

                $i=0;
                $j=0;
                $k=1;
                $exercisenumber=array();        //存放所有题目在试卷中的题号
                while($str1[$i])
                {
                        $exercisenumber[$j++]=$k++;
                        $i++
                }
                $i=0;
                while($str2[$i])
                {
                        $exercisenumber[$j++]=$k++;
                        $i++;
                }
                $i=0;
                while($str3[$i])
                {
                        $exercisenumber[$j++]=$k++;
                }
                $smarty->assign('exercisenumber',$exercisenumber);


                //printf("error %s\n", mysqli_error($link));

                $err = mysqli_error($link);
                if ($err)
                        echo "error$err";
//                else
//                        echo "<meta http-equiv=\"refresh\" content=\"1;url=checkStudentExam.php\">";
        }

        //$flag =       mysql_affected_rows();
        //echo "\n$flag";

        $smarty->display('checkStudentExam.tpl');

?>
