Successful!!!
<?php
	include "connect_MySQL.php";
	require 'smarty/libs/Smarty.class.php';
	session_start();
	
	$smarty = new Smarty;
	
	$smarty->template_dir = "smarty/templates/templates";
	$smarty->compile_dir = "smarty/templates/templates_c";
	$smarty->config_dir = "smarty/templates/config";
	$smarty->cache_dir = "smarty/templates/cache";

	if($_GET['$eno'])
	{
		$snum = $_SESSION['sid'];	//学号
		$eno = $_GET['$eno'];	//考试号
		$_SESSION['eno'] = $eno;
		//单选题的作答情况
		$selectquery = "SELECT Cnum,CPcontent,ChooseProblem.CPanswer,Cexercise.Cscore,CexerciseAnswerForstudent.Canswer,CexerciseAnswerForstudent.Cscore FROM ChooseProblem,CexerciseAnswerForstudent,Cexercise WHERE Cexercise.Ceno=CexerciseAnswerForstudent.Ceno AND Cexercise.Ceno=ChooseProblem.CPid AND Chno='$eno' AND Sno='$snum' AND Cename='xz' ORDER BY Cnum";
		echo $snum."_"."$eno";
		$selectsql = mysqli_query($link, $selectquery);
		$examlist = array();
		$singlechoosenum = array();
		while($row = mysqli_fetch_array($selectsql,MYSQLI_NUM)) {
			$examlist[] = str_replace("%","<br />",$row);
			$singlechoosenum[] = $row[0];	//保存已经题目在试卷中的题号

		}
		$smarty->assign('examlist',$examlist);
		$samrty->assign('eno',$eno);	//考试号
		$smarty->assign('snum',$snum);	//学号
		
		$k=0;
		//保存修改后的分数
		while($singlechoosenum[$k])
		{
			$temp = $singlechoosenum[$k]."_".$snum."_".$eno;	//保存题号相对应修改的分数
			if($_POST[$temp])
			{
				$selectquery1 = "SELECT Cexercise.Cscore FROM Cexercise,CexerciseAnswerForstudent WHERE Cexercise.Ceno=CexerciseAnswerForstudent.Ceno AND CexerciseAnswerForstudent.Sno='$snum' AND CexerciseAnswerForstudent.Cnum='$singlechoosenum[$k]' AND Chno='$eno'";
				$selectsql1 = mysqli_query($link,$selectquery1);
				$row = mysqli_fetch_array($selectsql1);
				if($row[0] >= $temp) {
					$selectquery2 = "SELECT updatenormalscore('$snum','$eno','$singlechoosenum[$k]','$temp')";
					$selectsql2 = mysqli_query($link,$selectquery2);
				} else {  echo '<script type="text/javascript">
						alert("超过题目分值");
						</script>';
					  echo "<meta http-equiv=\"refresh\" content=\"1;url=checkChooseProblem.php\">";
					}
				}
			$k++;
			}
                        $err = mysqli_error($link);
                        if($err)
                        	echo "error$err";
                        else{
                                echo '<script type="text/javascript">
                                      alert("修改成功");
                                      </script>';
                                echo "<meta http-equiv=\"refresh\" content=\"1;url=checkChooseProblem.php\">";

			    }
	$smarty->display('checkChooseProblem.tpl');
?>
