<?php
        include "connect_MySQL.php";
        require 'smarty/libs/Smarty.class.php';
	session_start();
        $smarty = new Smarty;

        $smarty->template_dir = "smarty/templates/templates";
        $smarty->compile_dir = "smarty/templates/templates_c";
        $smarty->config_dir = "smarty/templates/config";
        $smarty->cache_dir = "smarty/templates/cache";

        $snum = $_SESSION['sid'];
        $eno = $_SESSION['eno'];    //考试号
	
	$j=0;
	$exercisenumber = array();

	$selectarray = "SELECT Cnum FROM CexerciseAnswerForstudent WHERE Chno=$eno AND Sno=$snum ORDER BY Cnum";
	$selectexamsql = mysqli_query($link,$selectarray);
	while($row = mysqli_fetch_array($selectexamsql,MYSQLI_NUM))
	{
		$exercisenumber[$j++] = $row[0];
	}
/*
	$i=0;
	while($exercisenumber[$i])
	{
		echo "exercisenumber[$i] = ".$exercisenumber[$i];
		$i++;
	}
*/
/*
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
                $i++;
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
		$i++;
        }
*/
	$k=0;
	while($exercisenumber[$k])
	{

		$temp = "$exercisenumber[$k]"."_"."$snum"."_"."$eno";

		$cscore = $_POST[$temp];
		$selectquery1 = "SELECT Cexercise.Cscore FROM Cexercise,CexerciseAnswerForstudent WHERE Cexercise.Ceno=CexerciseAnswerForstudent.Ceno AND CexerciseAnswerForstudent.Sno='$snum' AND CexerciseAnswerForstudent.Cnum='$exercisenumber[$k]' AND Chno='$eno'";
		$selectsql1 = mysqli_query($link, $selectquery1);
		$row = mysqli_fetch_array($selectsql1);
		if ($row[0] >= $cscore) {
        		$selectquery2 = "SELECT updatenormalscore('$snum','$eno','$exercisenumber[$k]','$cscore')";
        		$selectsql2 = mysqli_query($link, $selectquery2);
        	} else echo '超过题目分值'."<br />";
		$k++;
	}	
        $err = mysqli_error($link);
        if ($err)
                echo "error$err";
        else{
		echo '<script type="text/javascript">
		alert("修改成功");
		</script>';	
                echo "<meta http-equiv=\"refresh\" content=\"1;url=teacherViewAllStudent.php\">";
	   }

?>
