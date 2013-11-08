<!--ok！-->

<?php
    session_start();
    include "connect_MySQL.php";
    $tempUID = $_SESSION['tempUID'];
//    $_SESSION['teacherID']=$tempUID;
    $chapterNo=$_SESSION["chapterNo"];
 //    $tempUID='20081001';
  
    echo "<table border='1'>";
    echo "<form action='add_wendati.php' method=POST>
          <tr>
          <td>习题编号</td>
          <td><input type=text name='num'></td>
          </tr>
          ";
    
    echo "
          <tr>
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
          </table>";
    
    if(isset($_POST["submit"])){
      	$blank=$_POST['blank'];
        $answer=$_POST['answer'];
        $num=$_POST['num'];
 //       $title=$_POST['title'];
        
        include "connect_MySQL.php";
        $b = $chapterNo.$num;
        $a="select addExercise('$b', '$chapterNo','简答题','$blank','$answer','回答如下问题')";
        $result = mysqli_query($link,$a);
        $flag = mysqli_fetch_row($result);
        if ($flag[0] == 1) {
	        echo "操作成功，2秒后跳转";		
	        echo"<meta http-equiv=\"refresh\" content=\"1;url=chapter_view_teacher.php\">"; 
	    }
	    else{
	        echo "操作失败，2秒后跳转";		
	        echo"<meta http-equiv=\"refresh\" content=\"1;url=add_wendati.php\">"; 
        }
    }
 //   }
 ?>