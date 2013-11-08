<?php 
	include "connect_MySQL.php";
	require 'smarty/libs/Smarty.class.php';
	$smarty = new Smarty;
	
	$smarty->template_dir = "smarty/templates/templates";
	$smarty->compile_dir = "smarty/templates/templates_c";
	$smarty->config_dir = "smarty/templates/config";
	$smarty->cache_dir = "smarty/templates/cache";

        $selectchapterquery = "SELECT * FROM Chapter";
        $selectchaptersql = mysqli_query($link, $selectchapterquery);
        $chapterlist = array();

        while($row = mysqli_fetch_array($selectchaptersql, MYSQLI_NUM)){
                $chapterlist[] = $row;
        }

        $selectknowledgequery = "SELECT * FROM Knowledge";
        $selectknowledgesql = mysqli_query($link, $selectknowledgequery);
        $knowledgelist = array();

        while($row = mysqli_fetch_array($selectknowledgesql, MYSQLI_NUM)){
                $knowledgelist[] = $row;
        }
        $smarty->assign('chapterlist', $chapterlist);
        $smarty->assign('knowledgelist', $knowledgelist);
	
	$selectquery = "SELECT * FROM Exam";	
	$selectsql = mysqli_query($link, $selectquery);
	$examlist = array();
	
	while($row = mysqli_fetch_array($selectsql, MYSQLI_NUM)){
		$examlist[] = $row;

	}
	$smarty->assign('examlist', $examlist);

	
	if($_POST['cnum'] AND $_POST['name'] AND $_POST['deadline'] AND $_POST['time'] AND $_POST['knum'] AND $_POST['stage'] AND $_POST['numa'] AND $_POST['numb'] AND $_POST['numc'])
	{
		$cnum = $_POST['cnum'];	//章节号
		$name = $_POST['name'];	//考试名称
		$deadline = $_POST['deadline'];	//截止时间
		$time = $_POST['time'];	//答题时间
		$knum = $_POST['knum'];	//所属知识点编号
		$stage = $_POST['stage'];	//难度系数
		$numa = $_POST['numa'];	//单选题数目
		$numb = $_POST['numb'];	//多选题数目
		$numc = $_POST['numc'];	//填空题数目
//		$short = $_POST['short']; //简答题数目
//		$operate = $_POST['operate']; //操作题数目	
		$final = $_POST['final'];	//标记是作业还是考试
		
		
		// 以下计算各种题型在题库中的数量.
                foreach ($cnum as $key1=>$value1)
                {
                        foreach ($knum as $key2=>$value2)
                        {
                //计算题库中单选题的数量
                //        $selectquery = "SELECT Count(Ceno) FROM Cexercise,ChooseProblem WHERE Ccno='$value1' AND Cstyle='$value2' AND Ceno=CPid AND CPclass='singlechoose' AND Cstage='$stage'";
			$selectquery = "SELECT Count(Ceno) FROM Cexercise,ChooseProblem WHERE Ccno='$value1' AND Cstyle='$value2' AND Ceno=CPid AND CPclass='xz' AND Cstage='$stage'";
                        $selectsql = mysqli_query($link,$selectquery);
                        $row = mysqli_fetch_array($selectsql);
                        $singlechoosenum = $singlechoosenum + (integer)$row[0];
		
                //计算题库中多选题的数量
//                        $selectquery = "SELECT Count(Ceno) FROM Cexercise,ChooseProblem WHERE Ccno='$value1' AND Cstyle='$value2' AND Ceno=CPid AND CPclass='multichoose' AND Cstage='$stage'";
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
        foreach ($cnum as $key1=>$value1)
                {
                        foreach ($knum as $key2=>$value2)
                        {
                                //将单选题的题目在题库中的题号保存在数组里面
//                                $selectquery = "SELECT Ceno FROM Cexercise,ChooseProblem WHERE Ccno='$value1' AND Cstyle='$value2' AND Ceno=CPid AND CPclass='singlechoose' AND Cstage='$stage'";
  				$selectquery = "SELECT Ceno FROM Cexercise,ChooseProblem WHERE Ccno='$value1' AND Cstyle='$value2' AND Ceno=CPid AND CPclass='xz' AND Cstage='$stage'";
                                $selectsql = mysqli_query($link,$selectquery);
//                                $singlechooselist = array();
                                while($row = mysqli_fetch_array($selectsql,MYSQLI_NUM)){
                                        $singlechooselist[] = $row[0];
//					echo "cnum = "."$value1"."knum = "."$value2"."row[0] = "."$row[0]";
                                }

                                //将填空题的题目在题库中的题号保存在数组里面
                                $selectquery = "SELECT Ceno FROM Cexercise,FillProblem WHERE Ccno='$value1' AND Cstyle='$value2' AND Ceno=FPid AND Cstage='$stage'";
                                $selectsql = mysqli_query($link,$selectquery);
                            //    $filllist = array();
                                while($row = mysqli_fetch_array($selectsql,MYSQLI_NUM)){
                                        $filllist[] = $row[0];
                                }

                                //将多选题的题目在题库中的题号保存在数组里面
//                                $selectquery = "SELECT Ceno FROM Cexercise,ChooseProblem WHERE Ccno='$value1' AND Cstyle='$value2' AND Ceno=CPid AND CPclass='multichoose' AND Cstage='$stage'";
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
//		echo "singlechoosenum = "."$singlechoosenum"." multichoosenum = "."$multichoosenum"." fillnum = "."$fillnum";
                if($singlechoosenum < $numa OR $multichoosenum < $numb OR $fillnum < $numc){
                        die ('There is no enuogh questions!!');}
                else {

                // 以下在各种题型的题库数量范围内随机生成指定数目的题目.

                // 在单选题的题库数量范围内随机生成指定数目的题目               
                $singlechoose = array();        //试卷题目数组
                $singlechoosekeys = array();
                $singlechoosekeys = array_rand($singlechooselist,$numa);
                if ($numa == '1') $singlechoose[] = $singlechooselist[$singlechoosekeys]; else {
                foreach ($singlechoosekeys as $key=>$value)
                        {//echo "value = "."$value"; 
			$singlechoose[] = $singlechooselist[$value];}
                }

                //在多选题的题库数量范围内随机生成指定数目的题目.
                $multichoosekeys = array();
                $multichoosekeys = array_rand($multichooselist,$numb);
                if ($numb == '1') $multichoose[] = $multichooselist[$multichoosekeys]; else {
                foreach ($multichoosekeys as $key=>$value)
                        {$multichoose[] = $multichooselist[$value];}
                }

                // 在填空题的题库数量范围内随机生成制定数目的题目
                $fill = array();        //试卷题目数组
                $fillkeys = array();
                $fillkeys = array_rand($filllist,$numc);
                if ($numc == '1') $fill[] = $filllist[$fillkeys]; else {
                foreach ($fillkeys as $key=>$value)
                        {$fill[] = $filllist[$value];}
                }

                // 在简答题的题库数量范围内随机生成指定数目的题目
                //在编程题的题库数量范围内随机生成指定数目的题目
                //在操作题的题库数量范围内随机生成指定数目的题目
	
                // 以下将各题目数组转换为'%'间隔的字符串
                $singlechoosestring = implode("%",$singlechoose);
                $multichoosestring = implode("%",$multichoose);
//		echo "singlechoosestring = "."$singlechoosestring";
                //将章节号数组转换为'%'间隔的字符串
                $cnum = implode("%",$cnum);
                $knum = implode("%",$knum);

                $fillstring = implode("%",$fill);

                $today = mktime(0,0,0,date("m"),date("d"),date("Y"));
                $releasedate = date("Y-m-d", $today);
                $insertquery = "INSERT INTO Exam VALUES ('','$cnum','$name','$releasedate','$deadline','$time','$knum','$stage','$final','$numa','$singlechoosestring','$numb','$multichoosestring','$numc','$fillstring')";

                $insertsql = mysqli_query($link, $insertquery);
        }

	//以下自动生成题型的模版
	$insertquery = "INSERT INTO ExamTemplet VALUES('','autotemplate','$cnum','$knum','$stage','$numa','$numb','$numc','$operate','$short')";
	$insertsql = mysqli_query($link, $insertquery);
                $err = mysqli_error($link);
                if ($err)
                        echo "error$err";
                else{
			echo '<script type="text/javascript">
			alert("成功生成试卷");
			</script>';
                        echo "<meta http-equiv=\"refresh\" content=\"1;url=viewAllExam.php\">";
		}        
}

          $smarty->display('initExam.tpl');
?>

