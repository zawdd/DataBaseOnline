<?php
	include "connect_MySQL.php";
	//整理考试
	$query = "SELECT `试卷号`, `试卷名称`, `单选题数`, `多选题数`, `填空题数`, `问答题数`, `分数`, `难度系数`, `总时间` FROM `ExamModule` WHERE 1";
	$sql = mysqli_query($link, $query);
	//$result = mysqli_fetch_array($sql, MYSQLI_NUM);	
	while($row = mysqli_fetch_array($sql, MYSQLI_NUM)){
		$query1 = "SELECT `序号`, `试卷号`, `题号` FROM `ExamDetail` WHERE `试卷号` = '$row[0]'";
		$sql1 = mysqli_query($link, $query1);
		$CPcontent = $row[1];
		$number = 0;
		$CPanswer = '';
		while($row1 =  mysqli_fetch_array($sql1, MYSQLI_NUM)){
			$number++;
			$CPanswer = $CPanswer."%".$row1[2];
		}
		//echo $CPcontent;
		//echo $row[0];
		$query2 = "INSERT INTO `FillProblem`(`FPid`, `FPcontent`, `FPanswer`, `FPnumber`, `FPratio`) VALUES ('$row[0]','$CPcontent','$CPanswer','$number','$row[3]')";
		$sql2 = mysqli_query($link, $query2);
		$err = mysqli_error($link); 
		if($err)
		{
			echo "error$err";
		}
	}


?>
