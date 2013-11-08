<!--ok!-->

<?php
    session_start();
    include "connect_MySQL.php";
    $tempUID = $_SESSION['tempUID'];
//    $_SESSION['teacherID']=$tempUID;
//    $tempUID="20081001";
    $chapterNo=$_SESSION["chapterNo"];
    //$_POST['chapterNo']=$chapterNo;
//    $chapterNo='10120081001';
  
  echo "<table border='1'>";
    echo "<form action='add_xuanzeti.php' method=POST>
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
          <input type=radio name = 'Choice' value = 'A' >A
          <input type=radio name = 'Choice' value = 'B' >B
          <input type=radio name = 'Choice' value = 'C' >C
          <input type=radio name = 'Choice' value = 'D' >D
          </td>
          </tr>";   
    echo "<tr><td colspan='2' align='center'><input type=submit name='submit' value='提交'><td></tr>
          </form></table>";
        if(isset($_POST["submit"])){
        	$blank=$_POST['blank'];
            $Choice=$_POST['Choice'];
//            $title=$_POST['title'];
            $num=$_POST['num'];
            
            include "connect_MySQL.php";
            $b=$chapterNo.$num;
            $a="select addExercise('$b','$chapterNo','选择题','$blank','$Choice','选择正错的选项')";
            $result = mysqli_query($link,$a);
            $flag = mysqli_fetch_row($result);
            if ($flag[0] == 1) {
		        echo "操作成功，2秒后跳转";		
		        echo"<meta http-equiv=\"refresh\" content=\"1;url=chapter_view_teacher.php\">"; 
		    }
	        else{
		        echo "操作失败，2秒后跳转";		
		        echo"<meta http-equiv=\"refresh\" content=\"1;url=add_xuanzeti.php\">"; 
	        }
        }
 //   }
 ?>