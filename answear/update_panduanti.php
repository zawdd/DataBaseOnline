<?php
    session_start();
    include "connect_MySQL.php";
    $tempUID = $_SESSION['tempUID'];
    $_SESSION['teacherID']=$tempUID;
//    $tempUID="20081001";
    $chapterNo=$_SESSION["chapterNo"];
//    $chapterNo='10120081001';
    $b=$_POST['b'];
  
  /*添加判断题*/
    echo "<table border='1'>";
    echo "<form action='update_panduanti.php' method=POST>
          <input type='hidden' name='b' value='$b'>
          ";
    
    echo "
          <tr>
          <td>题目</td>
          <td><textarea cols=40 rows=5 name='blank'>问题及选项请在此填写</textarea></td>
          </tr>";
    echo "<tr>
          <td>答案</td>
          <td>
          <input type=radio name = 'Choice' value = '对' >√
          <input type=radio name = 'Choice' value = '错' >×
          </td>
          </tr>";   
    echo "<tr><td colspan='2' align='center'><input type=submit name='submit' value='提交'><td></tr>
          </form></table>";
    if(isset($_POST["submit"])){
      	$blank=$_POST['blank'];
        $Choice=$_POST['Choice'];
//        $title=$_POST['title'];
//        $num=$_POST['num'];
        
        include "connect_MySQL.php";
//        $b = $chapterNo.$num;
        $a="select updateExercise('$b','$blank','$Choice','判断题','判断正误')";
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