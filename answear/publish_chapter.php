<!--ok!-->

<?php
    session_start();
    include "connect_MySQL.php";
    $tempUID = $_SESSION['tempUID'];
    error_reporting(0);
//    $_SESSION['teacherID']=$tempUID;
//    $tempUID="20081001";
//    $chapterNo=$_SESSION["chapterNo"];
//    $chapterNo='10120081001';
 //   $b=$_POST['c'];
    if($_POST['c']){
		$_SESSION['chapterNo']=$_POST['c'];
	}
    $chapterNo=$_SESSION['chapterNo'];
	
    echo "<a href='chapter_view_teacher.php'>返回</a><br/>";
    echo "截止日期：";
    echo "
          <form action='publish_chapter.php' method=POST>
          <tr>
      	  <td>年</td>
      	  <td><input type=text name='year'></td>
      	  </tr>
      	  <tr>
      	  <td>月</td>
      	  <td><input type=text name='month'></td>
      	  </tr>
      	  <tr>
      	  <td>日</td>
      	  <td><input type=text name='day'></td>
      	  </tr>
      	 ";
    echo "<input type=submit name='publish' value='提交'><br/></form>";
    if(isset($_POST["publish"])){
        include "connect_MySQL.php";
        
        $year=$_POST['year'];
        $month=$_POST['month'];
        $day=$_POST['day'];
        
        $n="-";
    	$d=$year.$n.$month.$n.$day;
    	$a="select publishChapter('$chapterNo','$d')";
    	$result = mysqli_query($link,$a);
        $flag = mysqli_fetch_row($result);
 
        if ($flag[0] == 1) {
	    	echo "操作成功，2秒后跳转";
	    	echo"<meta http-equiv=\"refresh\" content=\"2;url=menu_left_chapter_choose_teacher.php\">"; 		
	    }
	    else{
		    echo "操作失败，2秒后跳转";
			echo"<meta http-equiv=\"refresh\" content=\"2;url=menu_left_chapter_choose_teacher.php\">"; 
	    }
    }
 ?>