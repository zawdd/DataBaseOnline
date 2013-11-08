<!--可以算OK吧，只是有个30s超时的警告很恶心，而且界面还需再调整一下-->

<?php
  session_start();
  include "connect_MySQL.php";
//  $tempUID = $_POST['UID'];
//  $_SESSION['teacherID']=$tempUID;
 	$_SESSION['tempUID'] = '20081001';
 	$tempUID=$_SESSION['tempUID'];
//  $tempUID = $_POST['UID'];
    
//  set_time_limit(90);//不限制超时时间 
//  $_SESSION['teacherID']=$tempUID;
//  $chapterNo=00120081001;

?>
<html>
<head>
</head>
<body>
  <?php
  //<form method='post' action='menu_left_chapter_choose_teacher.php'>
      echo "
      
      <table cellspacing=3 border='1' align='center'> 
      <COL WIDTH=200><COL WIDTH=200><COL WIDTH=200>
       	<tr>
			<th>章节</th>
			<th>进入</th>
			<th>删除</th>
			<th>发布</th>
		</tr>"; 
      
      $sql="call showTeaExerciseNo('$tempUID');";
      $result=mysqli_query($link,$sql);
      while(1){
      	$row = mysqli_fetch_array($result, MYSQLI_NUM);
      	if($row != NULL){
      		echo"<tr>
      		     <td>$row[0]</td>
      		     
      		     <td>
      		       <form method = 'post' action = 'chapter_view_teacher.php'>
      		       <input type=submit name='submit' value='点击进入章节'>
      		       <input type=hidden name='chapterNo' value='$row[1]' >
      		       </form>
      		     </td>
      		     <td>
      		       <form method = 'post' action = 'delete_chapter.php'>
      		       <input type=submit name='update' value='删除'></th>
		    	   <input type=hidden name='b' value='$row[1]' >
		    	   </form>
		    	</td>
		    	 <td>
      		       <form method = 'post' action = 'publish_chapter.php'>
      		       <input type=submit name='submit' value='发布章节'>
      		       <input type=hidden name='c' value='$row[1]' >
      		       </form>
      		     </td>
      		     ";
      	}else{
      		break;
      	}
      }
    
      echo "</table>";
        echo "<form method='post' action='add_chapter.php'><input type=submit name='submit' value='增加章节'></form>";
        //</form>
//      if(isset($_POST["submit"])){
//      	$chapterNo=$_POST['$row[1]'];
//      	$_SESSION['chapterNo']=$chapterNo;
//      	
//           
//      }
      
  ?>

<!--  <a href='add_chapter.php'>增加章节</a><br/>-->
</body>
</html>