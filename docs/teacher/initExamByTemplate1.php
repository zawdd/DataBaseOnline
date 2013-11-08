<?php
	include "connect_MySQL.php";
	require 'smarty/libs/Smarty.class.php';
	$smarty = new Smarty;

        $smarty->template_dir = "smarty/templates/templates";
        $smarty->compile_dir = "smarty/templates/templates_c";
        $smarty->config_dir = "smarty/templates/config";
        $smarty->cache_dir = "smarty/templates/cache";

        $selectquery = "SELECT * FROM Exam";
        $selectsql = mysqli_query($link, $selectquery);
        $examlist = array();

        while($row = mysqli_fetch_array($selectsql, MYSQLI_NUM)){
                $examlist[] = $row;

        }
        $smarty->assign('examlist', $examlist);

        $selecttemplatequery = "SELECT * FROM ExamTemplet";
        $selecttemplatesql = mysqli_query($link, $selecttemplatequery);
        $template = array();
        while($row = mysqli_fetch_array($selecttemplatesql, MYSQLI_NUM)){
                $template[] = $row;
        }
	$smarty->assign('template',$template);


if($_POST['templatename'] AND $_POST['deadline'] AND $_POST['time'] AND $_POST['ename'])
{
	$templatename = $_POST['templatename'];
	$deadline = $_POST['deadline'];
	$time = $_POST['time'];
	$ename = $_POST['ename'];
	$selectquery = "SELECT * FROM ExamTemplet WHERE ETid='$templatename'";
	$selectsql = mysqli_query($link, $selectquery);
	$choosetemplate = array();
	while($row = mysqli_fetch_array($selectsql,MYSQLI_NUM)){
		$choosetemplate = $row;
	}
	$id = $choosetemplate[0];
	$name = $choosetemplate[1];
	$chapters = explode("%",$choosetemplate[2]);
	$knowledges = explode("%",$choosetemplate[3]);
	$stage = $choosetemplate[4];
	$singletemplatenum = $choosetemplate[5];
	$multitemplatenum = $choosetemplate[6];
	$filltemplatenum = $choosetemplate[7];
	$operate = $choosetemplate[8];
	$short = $choosetemplate[9];
                // 以下计算各种题型在题库中的数量.
                foreach ($chapters as $key1=>$value1)
                {
                        foreach ($knowledges as $key2=>$value2)
                        {
                //计算题库中单选题的数量
                        $selectquery = "SELECT Count(Ceno) FROM Cexercise,ChooseProblem WHERE Ccno='$value1' AND Cstyle='$value2' AND Ceno=CPid AND CPclass='xz' AND Cstage='$stage'";
                        $selectsql = mysqli_query($link,$selectquery);
                        $row = mysqli_fetch_array($selectsql);
                        $singlechoosenum = $singlechoosenum + (integer)$row[0];
                //计算题库中多选题的数量
                        $selectquery = "SELECT Count(Ceno) FROM Cexercise,ChooseProblem WHERE Ccno='$value1' AND Cstyle='$value2' AND Ceno=CPid AND CPclass='dx' AND Cstage='$stage'";
                        $selectsql = mysqli_query($link,$selectquery);
                        $row = mysqli_fetch_array($selectsql);
                        $multichoosenum = $multichoosenum + (integer)$row[0];
                //计算题库中填空题的数量
                        $selectquery = "SELECT Count(Ceno) FROM Cexercise,FillProblem WHERE Ccno='$value1' AND Cstyle='$value2' AND Ceno=FPid AND Cstage='$stage'";
                        $selectsql = mysqli_query($link,$selectquery);
                        $row = mysqli_fetch_array($selectsql);
                        $fillnum = $fillnum + (integer)$row[0];
                //计算题库中简答题的数量
                //计算题库中操作题的数量
                //计算题库中编程题的数量
                        }
                }

                // 以下将各个类型的题目在题库中的题号保存在相应的数组里面
        $singlechooselist = array();
        $multichooselist = array();
        $filllist = array();
        foreach ($chapters as $key1=>$value1)
                {
                        foreach ($knowledges as $key2=>$value2)
                        {
                                //将单选题的题目在题库中的题号保存在数组里面
                                $selectquery = "SELECT Ceno FROM Cexercise,ChooseProblem WHERE Ccno='$value1' AND Cstyle='$value2' AND Ceno=CPid AND CPclass='xz' AND Cstage='$stage'";
                                $selectsql = mysqli_query($link,$selectquery);
//                                $singlechooselist = array();
                                while($row = mysqli_fetch_array($selectsql,MYSQLI_NUM)){
                                        $singlechooselist[] = $row[0];
//                                      echo "cnum = "."$value1"."knum = "."$value2"."row[0] = "."$row[0]";
                                }

                                //将填空题的题目在题库中的题号保存在数组里面
                                $selectquery = "SELECT Ceno FROM Cexercise,FillProblem WHERE Ccno='$value1' AND Cstyle='$value2' AND Ceno=FPid AND Cstage='$stage'";
                                $selectsql = mysqli_query($link,$selectquery);
                            //    $filllist = array();
                                while($row = mysqli_fetch_array($selectsql,MYSQLI_NUM)){
                                        $filllist[] = $row[0];
                                }

                                //将多选题的题目在题库中的题号保存在数组里面
                                $selectquery = "SELECT Ceno FROM Cexercise,ChooseProblem WHERE Ccno='$value1' AND Cstyle='$value2' AND Ceno=CPid AND CPclass='dx' AND Cstage='$stage'";
                                $selectsql = mysqli_query($link,$selectquery);
                              //  $multichooselist = array();
                                while($row = mysqli_fetch_array($selectsql,MYSQLI_NUM)){
                                        $multichooselist[] = $row[0];
                                }

                                //将简答题的题目在题库中的题号保存在数组里面
                                //将操作题的题目在题库中的题号保存在数组里面
                                //将编程题的题目在题库中的题号保存在数组里面
                        }
                }

                if($singlechoosenum < $singletemplatenum OR $multichoosenum < $multitemplatenum OR $fillnum < $filltemplatenum){
                        die ('There is no enuogh questions!!');}
                else {

                // 以下在各种题型的题库数量范围内随机生成指定数目的题目.

                // 在单选题的题库数量范围内随机生成指定数目的题目               
                $singlechoose = array();        //试卷题目数组
                $singlechoosekeys = array();
//              echo "$singlechooselist[0]"."HAHA";
//              echo "$singlechooselist[1]"."HAHA"
                $singlechoosekeys = array_rand($singlechooselist,$singletemplatenum);
                if ($singletemplatenum == '1') $singlechoose[] = $singlechooselist[$singlechoosekeys]; else {
                foreach ($singlechoosekeys as $key=>$value)
                        {//echo "value = "."$value"; 
                        $singlechoose[] = $singlechooselist[$value];}
                }

                //在多选题的题库数量范围内随机生成指定数目的题目.
                $multichoosekeys = array();
                $multichoosekeys = array_rand($multichooselist,$multitemplatenum);
                if ($multitemplatenum == '1') $multichoose[] = $multichooselist[$multichoosekeys]; else {
                foreach ($multichoosekeys as $key=>$value)
                        {$multichoose[] = $multichooselist[$value];}
                }

                // 在填空题的题库数量范围内随机生成制定数目的题目
                $fill = array();        //试卷题目数组
                $fillkeys = array();
                $fillkeys = array_rand($filllist,$filltemplatenum);
                if ($filltemplatenum == '1') $fill[] = $filllist[$fillkeys]; else {
                foreach ($fillkeys as $key=>$value)
                        {$fill[] = $filllist[$value];}
                }

                // 在简答题的题库数量范围内随机生成指定数目的题目
                //在编程题的题库数量范围内随机生成指定数目的题目
                //在操作题的题库数量范围内随机生成指定数目的题目
                // 以下将各题目数组转换为'%'间隔的字符串
                $singlechoosestring = implode("%",$singlechoose);
                $multichoosestring = implode("%",$multichoose);
                //将章节号数组转换为'%'间隔的字符串
//                $cnum = implode("%",$cnum);
//                $knum = implode("%",$knum);

                $fillstring = implode("%",$fill);

                $today = mktime(0,0,0,date("m"),date("d"),date("Y"));
                $releasedate = date("Y-m-d", $today);
		$insertquery = "INSERT INTO Exam VALUES ('','$choosetemplate[2]','$ename','$releasedate','$deadline','$time','$choosetemplate[3]','$stage','$singletemplatenum','$singlechoosestring','$multitemplatenum','$multichoosestring','$filltemplatenum','$fillstring')";
                $insertsql = mysqli_query($link, $insertquery);
        }

                $err = mysqli_error($link);
                if ($err)
                        echo "error$err";
                else
                        echo "<meta http-equiv=\"refresh\" content=\"1;url=initExamByTemplate.php\">";
        }

          $smarty->display('initExamByTemplate.tpl');
?>

