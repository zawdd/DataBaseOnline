<!--永根做提交了的那部分-->

<?php
  session_start();
  error_reporting(0);
  include "connect_MySQL.php";
//  $tempUID='20081001';
//  $_SESSION['UID'] = $tempUID;
 
  $tempUID = $_SESSION['tempUID'];
//  $_SESSION['teacherID']=$tempUID;
//  $chapterNo='10120081001';
//  
	if($_POST['chapterNo']){
		$_SESSION['chapterNo']=$_POST['chapterNo'];
	}
//  $chapterNo = $_POST['chapterNo'];
//  $_SESSION['chapterNo']=$chapterNo;
  $chapterNo=$_SESSION['chapterNo'];
?>
<html>
<head>
  <title>章节信息</title>
</head>
<body>
  <?php
    //echo"test";
    include "connect_MySQL.php";
    $sql="select isChapterPublished('$chapterNo')";
    $result = mysqli_query($link,$sql);
    $flag = mysqli_fetch_row($result);
    
    echo "<a href='menu_left_chapter_choose_teacher.php'>返回</a><br/>";
    
    if($flag[0]==1){
     echo"    <table>
    	      <tr><td>
    	      <form method='post' action='chapter_score_teacher.php'>
    	      <input type=submit name='score' value='批改主观题'>
    	      </form>
    	      </td>
    	      </tr>";
    	      
    	      
    	      
    echo"     </table>
    	      
    	      <table border='1'>
 
    	     ";
    	
    	echo "<table border='1'>
		<tr>
			<th>习题编号</th>
			<th>习题名</th>
			<th>题型</th>
			<th>题目内容</th>
			<th>参考答案</th>
		</tr>";
      	$sql="call showTeaPublishedExerciseInfo('$tempUID','$chapterNo');";
        $result=mysqli_query($link,$sql);
        while(1){
        	$row = mysqli_fetch_array($result, MYSQLI_NUM);
         	if($row != NULL)
		    {
			    echo "<tr>";
			    Foreach($row as $key=>$value){
			       //if($key!=1 && $key!=8)
	//		            echo "<tr>";
				    	echo "<th>$value</th>";
				    	
		    	}
		    	
//		    	switch($row[2]){
//		    		case '选择题' :echo "<th><form method = 'post' action = 'update_xuanzeti.php'><input type=submit name='update' value='修改'></th>
//		    						<input type=hidden name='b' value='$row[0]' >
//		    						</form>";break;
//		    		case '填空题' :echo "<th><form method = 'post' action = 'update_tiankongti.php'><input type=submit name='update' value='修改'></th>
//		    						<input type=hidden name='b' value='$row[0]' >
//		    						</form>";break;
//		    		case '简答题' :echo "<th><form method = 'post' action = 'update_wendati.php'><input type=submit name='update' value='修改'></th>
//		    						<input type=hidden name='b' value='$row[0]' >				
//		    						</form>";break;
//		    		case '判断题' :echo "<th><form method = 'post' action = 'update_panduanti.php'><input type=submit name='update' value='修改'></th>
//		    						<input type=hidden name='b' value='$row[0]' >
//		    						</form>";break;
//		    	}
		    	
		        echo "</tr>";
		        }
		        else  
		       	   break;
		    }

    }
    
    
    
    
    
    else{
    	echo "
    	      <table>
    	      <tr><td>
    	      <form method='post' action='add_xuanzeti.php'>
    	      <input type=submit name='add_xuanzeti' value='添加选择题'>
    	      </form>
    	      </td>
    	      <td>
    	      <form method='post' action='add_panduanti.php'>
    	      <input type=submit name='add_panduanti' value='添加判断题'>
    	      </form>
    	      </td><td>
    	      <form method='post' action='add_tiankongti.php'>
    	      <input type=submit name='add_tiankongti' value='添加填空题'>
    	      </form>
    	      </td><td>
    	      <form method='post' action='add_wendati.php'>
    	      <input type=submit name='add_jiandati' value='添加简答题'>
    	      </form>
    	      </td></tr>
    	      </table>
    	      
    	      <table border='1'>
 
    	     ";
    	
    	echo "<table border='1'>
		<tr>
			<th>习题编号</th>
			<th>习题名</th>
			<th>题型</th>
			<th>题目内容</th>
			<th>参考答案</th>
			<th>修改</th>
			<th>删除</th>
		</tr>";
      	$sql="call showTeaPublishedExerciseInfo('$tempUID','$chapterNo');";
        $result=mysqli_query($link,$sql);
        while(1){
        	$row = mysqli_fetch_array($result, MYSQLI_NUM);
         	if($row != NULL)
		    {
			    echo "<tr>";
			    Foreach($row as $key=>$value){
			       //if($key!=1 && $key!=8)
	//		            echo "<tr>";
				    	echo "<th>$value</th>";
				    	
		    	}
		    	
		    	switch($row[2]){
		    		case '选择题' :echo "<th><form method = 'post' action = 'update_xuanzeti.php'><input type=submit name='update' value='修改'></th>
		    						<input type=hidden name='b' value='$row[0]' >
		    						</form>";break;
		    		case '填空题' :echo "<th><form method = 'post' action = 'update_tiankongti.php'><input type=submit name='update' value='修改'></th>
		    						<input type=hidden name='b' value='$row[0]' >
		    						</form>";break;
		    		case '简答题' :echo "<th><form method = 'post' action = 'update_wendati.php'><input type=submit name='update' value='修改'></th>
		    						<input type=hidden name='b' value='$row[0]' >				
		    						</form>";break;
		    		case '判断题' :echo "<th><form method = 'post' action = 'update_panduanti.php'><input type=submit name='update' value='修改'></th>
		    						<input type=hidden name='b' value='$row[0]' >
		    						</form>";break;
		    	}
		    	echo "
				      <th><form method = 'post' action = 'delete_exercise.php'><input type=submit name='delete' value='删除'></th>
				      <input type=hidden name='b' value='$row[0]' >
				      </form>
				      </tr>";
		        echo "</tr>";
		        }
		        else  
		       	   break;
		    }
//		    if(isset($_POST["delete"])){
//		    	$exerciseNo=$b['exerciseNo'];
//		    	include "connect_MySQL.php";
//    	        $b=$chapterNo.$exerciseNo;
//    	        $a="select deleteExercise('$b')";
//    	        $result = mysqli_query($link,$a);
//		    }
      }

   ?>
  
  

  
</body>
</html>