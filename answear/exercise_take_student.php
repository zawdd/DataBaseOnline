<?php
  session_start();
  error_reporting(0);
  include "connect_MySQL.php";
  include "getSubStr.php";
 // $tempUID = $_SESSION['UID'];
  //$_SESSION['studentID']=$tempUID;
//  $tempUID='20082003';
  $tempUID=$_POST['tempUID'];
  $Tno="SELECT Tno from user,student where user.UID=student.Sno";
  $chapterNo=$_SESSION["chapterNo"];
 // $chapterNo='10120081001';
  $Cno = $chapterNo[1].$chapterNo[2];
  $style = "1";//get_substr($chapterNo,'0','0')
?>

<html>
<head>
  <title><?php $chapterNo?>测试</title>
</head>
<body>
  <div align="center">
    <font size='6' face='华文正楷'>第<?php echo "$Cno"?>章测试</font>
  </div>
  <form action = 'exercise_take_student.php'  method = post>
      <?php
      		$i = 1;
        	include "connect_MySQL.php";
        	$e1="select randomExercise('$chapterNo', '选择题')";
        	$re1 = mysqli_query($link,$e1);
        	$sn1 = mysqli_fetch_row($re1);
        	$exeNo1[$i] =$sn1[0];
        	$eno1[$i] = $exeNo1[$i][11].$exeNo1[$i][12];
        	$e2 = "call showExerciseAll('$exeNo1[$i]')";
        	$re2 = mysqli_query($link,$e2);
        	$sn2 = mysqli_fetch_row($re2);
 			
        	echo "<br><br>";
        	echo "$i  <br>";
        	echo "$sn2[1]";
            echo "<br><br>";
        	
        	//echo "<form action = 'exercise_take_student.php'  method = 'post'>";
        	echo "<input type=radio name = 'Choice11' value = 'a' >A
                  <input type=radio name = 'Choice11' value = 'b' >B
                  <input type=radio name = 'Choice11' value = 'c' >C
                  <input type=radio name = 'Choice11' value = 'd' >D
                  <br/>";
        	$i = 2;
        	include "connect_MySQL.php";
        	$e1="select randomExercise('$chapterNo', '选择题')";
        	$re1 = mysqli_query($link,$e1);
        	$sn1 = mysqli_fetch_row($re1);
        	$exeNo1[$i] =$sn1[0];
        	$eno1[$i] = $exeNo1[$i][11].$exeNo1[$i][12];
        	$e2 = "call showExerciseAll('$exeNo1[$i]')";
        	$re2 = mysqli_query($link,$e2);
        	$sn2 = mysqli_fetch_row($re2);
 			
        	echo "<br><br>";
        	echo "$i  <br>";
        	echo "$sn2[1]";
            echo "<br><br>";
        	
        	//echo "<form action = 'exercise_take_student.php'  method = 'post'>";
        	echo "<input type=radio name = 'Choice12' value = 'a' >A
                  <input type=radio name = 'Choice12' value = 'b' >B
                  <input type=radio name = 'Choice12' value = 'c' >C
                  <input type=radio name = 'Choice12' value = 'd' >D
                  <br/>";
        	$i = 3;
        	include "connect_MySQL.php";
        	$e1="select randomExercise('$chapterNo', '选择题')";
        	$re1 = mysqli_query($link,$e1);
        	$sn1 = mysqli_fetch_row($re1);
        	$exeNo1[$i] =$sn1[0];
        	$eno1[$i] = $exeNo1[$i][11].$exeNo1[$i][12];
        	$e2 = "call showExerciseAll('$exeNo1[$i]')";
        	$re2 = mysqli_query($link,$e2);
        	$sn2 = mysqli_fetch_row($re2);
 			
        	echo "<br><br>";
        	echo "$i  <br>";
        	echo "$sn2[1]";
            echo "<br><br>";
        	
        	//echo "<form action = 'exercise_take_student.php'  method = 'post'>";
        	echo "<input type=radio name = 'Choice13' value = 'a' >A
                  <input type=radio name = 'Choice13' value = 'b' >B
                  <input type=radio name = 'Choice13' value = 'c' >C
                  <input type=radio name = 'Choice13' value = 'd' >D
                  <br/>";
        	
			$i = 1;
        	include "connect_MySQL.php";
        	$e1="select randomExercise($chapterNo, '判断题')";
        	$re1 = mysqli_query($link,$e1);
        	$sn1 = mysqli_fetch_row($re1);
        	$exeNo2[$i] =$sn1[0];
        	$eno2[$i] = $exeNo2[$i][11].$exeNo2[$i][12];
        	$e2 = "call showExerciseAll('$exeNo2[$i]')";
        	$re2 = mysqli_query($link,$e2);
        	$sn2 = mysqli_fetch_row($re2);
 			
        	echo "<br><br>";
        	echo "$i  <br>";
        	echo "$sn2[1]";
            echo "<br><br>";
        	
        	echo "<input type=radio name = 'Choice21' value = '1' >√
                  <input type=radio name = 'Choice21' value = '0' >×
                  <br/>"; 

        	$i = 2;
        	include "connect_MySQL.php";
        	$e1="select randomExercise($chapterNo, '判断题')";
        	$re1 = mysqli_query($link,$e1);
        	$sn1 = mysqli_fetch_row($re1);
        	$exeNo2[$i] =$sn1[0];
        	$eno2[$i] = $exeNo2[$i][11].$exeNo2[$i][12];
        	$e2 = "call showExerciseAll('$exeNo2[$i]')";
        	$re2 = mysqli_query($link,$e2);
        	$sn2 = mysqli_fetch_row($re2);
 			
        	echo "<br><br>";
        	echo "$i  <br>";
        	echo "$sn2[1]";
            echo "<br><br>";
        	
        	echo "<input type=radio name = 'Choice22' value = '1' >√
                  <input type=radio name = 'Choice22' value = '0' >×
                  <br/>";
        	
        	$i = 3;
        	include "connect_MySQL.php";
        	$e1="select randomExercise($chapterNo, '判断题')";
        	$re1 = mysqli_query($link,$e1);
        	$sn1 = mysqli_fetch_row($re1);
        	$exeNo2[$i] =$sn1[0];
        	$eno2[$i] = $exeNo2[$i][11].$exeNo2[$i][12];
        	$e2 = "call showExerciseAll('$exeNo2[$i]')";
        	$re2 = mysqli_query($link,$e2);
        	$sn2 = mysqli_fetch_row($re2);
 			
        	echo "<br><br>";
        	echo "$i  <br>";
        	echo "$sn2[1]";
            echo "<br><br>";
        	
        	echo "<input type=radio name = 'Choice23' value = '1' >√
                  <input type=radio name = 'Choice23' value = '0' >×
                  <br/>";

        
        	$i=1;
        	include "connect_MySQL.php";
        	$e1= "select randomExercise('$chapterNo', '填空题')";
        	$re1 = mysqli_query($link,$e1);
        	$sn1 = mysqli_fetch_row($re1);
        	$exeNo3[$i] =$sn1[0];
        	$eno3[$i] = $exeNo3[$i][11].$exeNo3[$i][12];
        	$e2 = "call showExerciseAll('$exeNo3[$i]')";
        	$re2 = mysqli_query($link,$e2);
        	$sn2 = mysqli_fetch_row($re2);
        	echo "<br><br>";
        	echo "$i  <br>";
        	echo "$sn2[1]";
            echo "<br><br>";
        	echo "<textarea cols=40 rows=5 name='Answer11'></textarea>
                  <br/>";        	
        	
        	$i=2;
        	include "connect_MySQL.php";
        	$e1= "select randomExercise('$chapterNo', '填空题')";
        	$re1 = mysqli_query($link,$e1);
        	$sn1 = mysqli_fetch_row($re1);
        	$exeNo3[$i] =$sn1[0];
        	$eno3[$i] = $exeNo3[$i][11].$exeNo3[$i][12];
        	$e2 = "call showExerciseAll('$exeNo3[$i]')";
        	$re2 = mysqli_query($link,$e2);
        	$sn2 = mysqli_fetch_row($re2);
        	echo "<br><br>";
        	echo "$i  <br>";
        	echo "$sn2[1]";
            echo "<br><br>";
        	echo "<textarea cols=40 rows=5 name='Answer12'></textarea>
                  <br/>";
        	
        
//        for($i=1;$i<=5;$i++){
			include "connect_MySQL.php";
            $i=1;
        	$e1= "select randomExercise('$chapterNo', '简答题')";
        	$re1 = mysqli_query($link,$e1);
        	$sn1 = mysqli_fetch_row($re1);
        	$exeNo4[$i] = $sn1[0];
        	$eno4[$i] = $exeNo4[$i][11].$exeNo4[$i][12];
        	$e2 = "call showExerciseAll('$exeNo4[$i]')";
        	$re2 = mysqli_query($link,$e2);
        	$sn2 = mysqli_fetch_row($re2);
        	echo "<br><br>";
        	echo "$i  <br>";
        	echo "$sn2[1]";
            echo "<br><br>";
//        	echo "<textarea cols=80 rows=20 name='Answer2.$i'></textarea>
//                  <br/>  ";        	
//        } 
      ?>
      <textarea cols=80 rows=20 name='Answer21'></textarea>
                  <br/> 
      <div align="center">
      <input type=submit name="submit" value='提交'>
      </div>
      </form>
      <br/>
      <?php
        if(isset($_POST["submit"])){
        	$CAno = $style.$Cno.$tempUID;
       		include "connect_MySQL.php";
        	$result = mysqli_query($link,"select submitChapterAnswer(
        			'$CAno','$chapterNo','$tempUID','20110114')");
        	$flag = mysqli_fetch_row($result);
        	if($flag[0] == 1){
        		echo "成功c<br>";
        	}
        	for($i = 1;$i<=3;$i++){
        		echo "$exeNo1[$i]<br>";
        		echo "$eno1[$i]<br>";
        		$t = Choice1.$i;
        		echo "$t<br>";
        		echo "$_POST[$t]<br>";
        		$exeAno = $style.$Cno.$tempUID.$eno1[$i];
        		include "connect_MySQL.php";
        		$result = mysqli_query($link,"select submitExerciseAnswer(
        				'$exeAno','$exeNo1[$i]','$_POST[$t]','$tempUID')");
        		$flag = mysqli_fetch_row($result);
        		if($flag[0] == 1){
        			echo "成功x<br>";
        		}
        	}     	
        	for($i = 1;$i<=3;$i++){
        		echo "$exeNo2[$i]<br>";
        		echo "$eno2[$i]<br>";
        		$t = Choice2.$i;
        		echo "$_POST[$t]<br>";
        		$exeAno = $style.$Cno.$tempUID.$eno2[$i];
        		include "connect_MySQL.php";
        		$result = mysqli_query($link,"select submitExerciseAnswer(
        				'$exeAno','$exeNo2[$i]','$_POST[$t]','$tempUID')");
        		$flag = mysqli_fetch_row($result);
        		if($flag[0] == 1){
        			echo "成功p<br>";
        		}
        	}
       		for($i = 1;$i<=2;$i++){
       			echo "$exeNo3[$i]<br>";
        		echo "$eno3[$i]<br>";
        		$t = Answer1.$i;
        		echo "$_POST[$t]<br>";
       			$exeAno = $style.$Cno.$tempUID.$eno3[$i];
        		include "connect_MySQL.php";
        		$result = mysqli_query($link,"select submitExerciseAnswer(
        				'$exeAno','$exeNo3[$i]','$_POST[$t]','$tempUID')");
        		$flag = mysqli_fetch_row($result);
        		if($flag[0] == 1){
        			echo "成功t<br>";
        		}
        	} 
        	$i=1;
        	echo "$exeNo4[$i]<br>";
        	echo "$eno4[$i]<br>";
        	$t = Answer2.$i;
        	echo "$_POST[$t]<br>";
       	 	$exeAno = $style.$Cno.$tempUID.$eno4[$i];
        		include "connect_MySQL.php";
        		$result = mysqli_query($link,"select submitExerciseAnswer(
        				'$exeAno','$exeNo4[$i]','$_POST[$t]','$tempUID')");
        		$flag = mysqli_fetch_row($result);
        		if($flag[0] == 1){
        			echo "成功w<br>";
        		}
        		echo "操作成功，2秒后跳转";
        		echo"<meta http-equiv=\"refresh\" content=\"0;url=chapter_view_student.php\">";    	        	
        }
      ?>

</body>
</html>