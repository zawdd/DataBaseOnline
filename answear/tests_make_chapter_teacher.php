<?php
  session_start();
  
  $tempUID = $_SESSION['UID'];
  $_SESSION['teacherID']=$tempUID;
  $chapterNo=$_SESSION["chapterNo"];
  include "connect_MySQL.php";
  
  $sql="select distinct Cname from chapter where Cno='$chapterNo'";
  $result = mysqli_query($link,$sql);
  $row = mysqli_fetch_row($result);

?>
<html>
<head>
  <title><?php echo"$row[0]"?>   No.<?php echo"$tempUID"?>教师出题</title>
</head>
<body>
  <table border='1'>
    <caption><?php echo"$row[0]"?>   No.<?php echo"$tempUID"?>教师出题</caption>
    <tr align='center'>
      <td>题型</td>
      <td>操作</td>
    </tr>
    <tr align='center'>
      <td>选择题</td>
      <td><a href="add_xuanzeti.php">添加</a>/<a href="update_xuanzeti.php">修改</a></td>
    </tr>
    <tr align='center'>
      <td>判断题</td>
      <td><a href="add_panduanti.php">添加</a>/<a href="update_panduanti.php">修改</a></td>
    </tr>
    <tr align='center'>
      <td>填空题</td>
      <td><a href="add_tiankongti.php">添加</a>/<a href="update_tiankongti.php">修改</a></td>
    </tr>
    <tr align='center'>
      <td>问答题</td>
      <td><a href="add_wendati.php">添加</a>/<a href="update_wendati.php">修改</a></td>
    </tr>
  </table>
  <a href="delete_exercise.php">删除题目</a><br/>
  <?php
    echo "<form action='tests_make_chapter_teacher.php' method='post'>
          <tr>
          <td>发布日期</td>
          <td><input type=text name='deadline'></td>
          <td>截止日期</td>
          <td><input type=text name='releasetime'></td>
          <tr><td colspan='2' align='center'><input type=submit name='submit' value='发布章节'><td></tr>
          </form>";
    if(isset($_POST["submit"])){
    	$deadline=$_POST['deadline'];
    	$releasetime=$_POST['releasetime'];
    	$sql="select publishChapter('$chapterNo','$deadline','$releasetime')";
    	$result = mysqli_query($link,$sql);
        $flag = mysqli_fetch_row($result);
        if ($flag[0] == 1) {
        echo "操作成功，2秒后跳转";		
        echo"<meta http-equiv=\"refresh\" content=\"1;url=chapter_view_teacher.php\">"; 
        }
	    else{
	        echo "操作失败，2秒后跳转";		
	        echo"<meta http-equiv=\"refresh\" content=\"1;url=tests_make_chapter_teacher.php\">"; 
        }
    }
  ?>
</body>
</html>