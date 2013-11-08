<?php
    session_start();
    include "connect_MySQL.php";
    
    $tempUID = $_SESSION['tempUID'];
//    $_SESSION['teacherID']=$tempUID;
//    $chapterNo=10120081001;
    $chapterNo=$_SESSION["chapterNo"];
  
  /*添加判断题*/
    echo "<table border='1'>";
    echo "<form action='add_panduanti.php' method=POST>
          <tr>
          <td>习题编号</td>
          <td><input type=text name='num'></td>
          </tr>
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
    	$num=$_POST['num'];
      	$blank=$_POST['blank'];
        $Choice=$_POST['Choice'];
        
        include "connect_MySQL.php";
        $b=$chapterNo.$num;
        $a1="select addExercise('$b','$chapterNo','判断题','$blank','$Choice','判断正误')";
        $result = mysqli_query($link,$a1);
        $flag = mysqli_fetch_row($result);
        if ($flag[0] == 1) {
	        echo "操作成功，2秒后跳转";		
	        echo"<meta http-equiv=\"refresh\" content=\"1;url=chapter_view_teacher.php\">"; 
	    }
	    else{
		    echo "操作失败，2秒后跳转";		
		    echo"<meta http-equiv=\"refresh\" content=\"1;url=add_panduanti.php\">"; 
	    }
    }
 ?>