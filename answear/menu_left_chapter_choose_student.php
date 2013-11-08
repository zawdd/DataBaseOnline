<?php
  session_start();
  include "connect_MySQL.php";
//  $tempUID = $_POST['UID'];
//  $_SESSION['studentID']=$tempUID;
//  $Tno="SELECT Tno from user,student where user.UID=student.Sno";
//  $chapterNo=$_POST["chapterNo"];
    $_SESSION['tempUID'] = '20082001';
    $tempUID=$_SESSION['tempUID'];
    
?>
<html>
<head>
</head>
<body>
  <?php
       echo "
      
      <table cellspacing=3 border='1' align='center'> 
      <COL WIDTH=200><COL WIDTH=200><COL WIDTH=200>
       	<tr>
			<th>章节</th>
			<th>进入</th>
			<th>Top10</th>
		</tr>"; 
       
       include "connect_MySQL.php";
      $sql0="call showTeaOfStu('$tempUID')";
      $result0 = mysqli_query($link,$sql0);
      $flag0 = mysqli_fetch_row($result0);
      $Tno=$flag0[0];
      
      include "connect_MySQL.php";
      $sql="call showTeaExerciseNo('$Tno');";
      $result=mysqli_query($link,$sql);
      while(1){
      	$row = mysqli_fetch_array($result, MYSQLI_NUM);
      	if($row != NULL){
      		echo"<tr>
      		     <td>$row[0]</td>
      		     
      		     <td>
      		       <form method = 'post' action = 'chapter_view_student.php'>
      		       <input type=submit name='submit' value='点击进入章节'>
      		       <input type=hidden name='chapterNo' value='$row[1]' >
      		       </form>
      		     </td>
      		     <td>
    	           <form method='post' action='showTopTen.php'>
    	           <input type=submit name='TopTen' value='Top10'>
    	           <input type=hidden name='top' value='$row[1]'>
    	           </form>
    	         </td>
      		     ";
      		
      	}else{
      		break;
      	}
      }
      
      echo"    <table align='center'>
    	      <tr>
    	      </tr></table>";
    
      echo "</table>";
  ?>
</body>
</html>