<?php

	include "indexTeacher.php" ;

	$Cno = $_POST['Cno'];	
	$Tno = $_POST['Tno'];	
	$Sno = $_POST['Sno'] ;
	
	$Eno = NULL ;

	echo"<table border='1' align='center'>
	<form action='mark_CA.php' method=POST>
	<COL width ='380' align='left' ><COL width = '380' align='left' ><COL width = '50' ></COL>
	<tr>
		<th align='center'>题目</th>
		<th align='center'>答案</th>
		<th>得分</th>
	</tr>";

/*not needed
	echo '<input name="Sno" type="hidden" value="'.$Sno.'">
		<input name="Tno" type="hidden" value="'.$Tno.'">
		<input name="Cno" type="hidden" value="'.$Cno.'">' ;
*/
    echo "<input name='Sno' type='hidden' value='$Sno'>
		<input name='Tno' type='hidden' value='$Tno'>
		<input name='Cno' type='hidden' value='$Cno'>" ;	
    
    
    
	include "connectMySql.php";
	//produce name?
	$sql1 = mysqli_query($link, "call showSubjectCA('$Sno','$Cno');");
	$row = mysqli_fetch_array($sql1, MYSQLI_NUM);
	$Eno1 = $row[0] ;
	echo "<tr>" ;
	echo "<th>$row[1]</th><th>$row[2]</th>" ;
	echo '
		<th><input type=text name="mark1"></th>
	' ;
	echo "</tr>" ;
	$row = mysqli_fetch_array($sql1, MYSQLI_NUM);
	$Eno2 = $row[0] ;
	echo "<tr>" ;
	echo "<th>$row[1]</th><th>$row[2]</th>" ;
	echo '
		<th><input type=text name="mark2"></th>
	' ;
	echo "</tr>" ;
	
	$row = mysqli_fetch_array($sql1, MYSQLI_NUM);
	$Eno3 = $row[0] ;
	echo "<tr>" ;
	echo "<th>$row[1]</th><th>$row[2]</th>" ;
	echo '
		<th><input type=text name="mark3"></th>
	' ;
	echo "</tr>" ;	

	mysqli_free_result($sql1);
	
    echo "<tr>
    	<td colspan='4' align='center'><input type=submit name='Sub' value='submit'><td>
    	</tr>
        </form></table>";
    
	if(isset($_POST["Sub"]))
	{
		$flag = 1 ;
		$mark1 = $_POST["mark1"] ;
		$mark2 = $_POST["mark2"] ;
		$mark3 = $_POST["mark3"] ;
    	include "connectMySql.php";
		$result = mysqli_query($link,"select markSubjectiveItem('$Sno','$Eno1',$mark1)");
		$flag &= mysqli_fetch_row($result);
		mysqli_free_result($result);
		$result = mysqli_query($link,"select markSubjectiveItem('$Sno','$Eno2',$mark2)");
		$flag &= mysqli_fetch_row($result);
		mysqli_free_result($result);
		$result = mysqli_query($link,"select markSubjectiveItem('$Sno','$Eno3',$mark3)");
		$flag &= mysqli_fetch_row($result);
		mysqli_free_result($result);
        if ($flag == 1) {
        	echo "操作成功，3秒后跳转";
        	include "connectMySql.php";
			$result = mysqli_query($link,"call computeExerciseSubjectiveScore('$Sno','$Cno')");
//			mysqli_free_result($result);
		    echo"<meta http-equiv=\"refresh\" content=\"3;url=chapter_score_teacher.php\">"; 
        }
	    else{
		    echo "操作失败，3秒后自动刷新";		
		    echo"<meta http-equiv=\"refresh\" content=\"3;url=mark_CA.php\">"; 
	    }
    }
?>



