<?php

	include "indexTeacher.php" ;

	$Cno = $_POST['Cno'];	
	$Tno = $_POST['Tno'];	
	$Sno = $_POST['Sno'] ;

	echo"<table border='1'>
	<form action='changeComment.php' method=POST>
	<COL width = '500'><COL width = '500' ></COL>
	<tr>
		<th>旧评论</th>
		<th>新评论</th>
	</tr>"; 
	  
	echo "<input name='Sno' type='hidden' value='$Sno'>
		<input name='Tno' type='hidden' value='$Tno'>
		<input name='Cno' type='hidden' value='$Cno'>" ;
	
	echo "<tr>" ;
	
	include "connectMySql.php";
	$sql1 = mysqli_query($link, "call showChapterComment('$Cno','$Sno');");
	$row = mysqli_fetch_array($sql1, MYSQLI_NUM);
	if ( $row != NULL ){
		echo "<th>$row[0]</th>" ;
	}
	else {
		echo "<th> </th>" ;
	}
//	mysqli_free_result($sql1);
	
	echo "<th><textarea cols=40 rows=5 name='comment'></textarea></th>" ;
	echo "</tr>" ;
    echo "<tr>
    	<td colspan='2' align='center'><input type=submit name='Sub1' value='submit'><td>
    	</tr>
        </form></table>";
   	if(isset($_POST["Sub1"]))
	{
		$flag = 1 ;
		$comment = $_POST["comment"] ;
		include "connectMySql.php";
		
		$result = mysqli_query($link,"select addChapterComment('$Cno','$Sno','$comment');");
		$flag &= mysqli_fetch_row($result);
		mysqli_free_result($result);
				
        if ($flag == 1) {
        	echo "操作成功，3秒后跳转";
		    echo"<meta http-equiv=\"refresh\" content=\"3;url=chapter_score_teacher.php\">"; 
        }
	    else{
		    echo "操作失败，3秒后自动刷新";		
		    echo"<meta http-equiv=\"refresh\" content=\"3;url=changeComment.php\">"; 
	    }
    }   	
?>



