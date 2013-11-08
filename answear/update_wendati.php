<!--ok!-->

<?php
    session_start();
    include "connect_MySQL.php";
    $tempUID = $_SESSION['tempUID'];
//    $_SESSION['teacherID']=$tempUID;
//    $tempUID="20081001";
    $chapterNo=$_SESSION["chapterNo"];
//    $chapterNo='10120081001';
    $b=$_POST['b'];
  
    echo "<table border='1'>";
    echo "<form action='update_wendati.php' method=POST>  
          <input type='hidden' name='b' value='$b'>   
          ";
    
    echo "<tr>
          <td>题目</td>
          <td><textarea cols=40 rows=5 name='blank'>问题请在此填写</textarea></td>
          </tr>";
    echo "<tr>
          <td>答案</td>
          <td>
          <textarea cols=40 rows=5 name='answer'>答案请在此填写</textarea>
          </td>
          </tr>";   
    echo "<tr><td colspan='2' align='center'><input type=submit name='submit' value='提交'><td></tr>
          </form></table>";
        
    if(isset($_POST["submit"])){
       	$blank=$_POST['blank'];
        $answer=$_POST['answer'];        
 //       $num=$_POST['num'];
 //       $title=$_POST['title'];
        
        include "connect_MySQL.php";
 //       $b = $chapterNo.$num;
        $a="select updateExercise('$b','$blank','$answer','简答题','回答如下问题')";
        $result = mysqli_query($link,$a);
        $flag = mysqli_fetch_row($result);
        if ($flag[0] == 1) {
	        echo "操作成功，2秒后跳转";		
	        echo"<meta http-equiv=\"refresh\" content=\"1;url=chapter_view_teacher.php\">"; 
	    }
	    else{
	        echo "操作失败，2秒后跳转";		
	        echo"<meta http-equiv=\"refresh\" content=\"1;url=chapter_view_teacher.php\">"; 
	    }
    }
 //   }
 ?>