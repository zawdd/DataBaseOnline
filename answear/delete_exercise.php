<?php
    session_start();
    include "connect_MySQL.php";
//    $tempUID = $_POST['UID'];
//    $_SESSION['teacherID']=$tempUID;
//    $chapterNo=$_POST["chapterNo"];
    $tempUID=$_SESSION['tempUID'];
//    $chapterNo=$_SESSION["chapterNo"];
    $chapterNo=$_SESSION["chapterNo"];
    $b=$_POST['b'];
    
//    echo "<form action='delete_exercise.php' method=POST>
//      	      <td>请输入要删除的题目编号（两位数字）</td>
//      	      <td><input type=text name='exerciseNo'></td>
//      	 ";
//    
//    echo "<input type=submit name='submit' value='提交'><br/>";
    
//    if(isset($_POST["submit"])){
//    	$exerciseNo=$_POST['exerciseNo'];
    	
    	include "connect_MySQL.php";
 //   	$b=$chapterNo.$exerciseNo;
    	$a="select deleteExercise('$b')";
    	$result = mysqli_query($link,$a);
        $flag = mysqli_fetch_row($result);
 
        if ($flag[0] == 1) {
	    	echo "操作成功，2秒后跳转";
			echo"<meta http-equiv=\"refresh\" content=\"2;url=chapter_view_teacher.php\">"; 		
	    }
	    else{
		    echo "操作失败，2秒后跳转";
			echo"<meta http-equiv=\"refresh\" content=\"2;url=chapter_view_teacher.php\">"; 
	    }
  //  }