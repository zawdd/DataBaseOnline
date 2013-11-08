<!--ok!-->

<?php
    session_start();
    include "connect_MySQL.php";
    $tempUID = $_SESSION['tempUID'];
    error_reporting(0);
    //$_SESSION['teacherID']=$tempUID;
 //   $tempUID='20081001';
        echo "<a href='menu_left_chapter_choose_teacher.php'>返回</a><br/>";
    echo "
          <form action='add_chapter.php' method=POST>
          <tr>
      	  <td>请输入需要增加的章节编号</td>
      	  <td><input type=text name='p'></td>
      	  </tr>
      	  <tr>
      	  <td>请输入需要增加的章节名</td>
      	  <td><input type=text name='q'></td>
      	  </tr>
      	 ";
    
    echo "<input type=submit name='submita' value='提交'><br/></form>";
    if(isset($_POST["submita"])){
    	$pchapterNo=$_POST['p'];
    	$chapterName=$_POST['q'];
    	$n='1';
    	$chapterNo=$n.$pchapterNo.$tempUID;
 //   	echo"$chapterNo";
 //   	echo"$chapterName";
    	include "connect_MySQL.php";
    	$a="select addChapter($chapterNo,$tempUID,'习题','$chapterName')";
        $result = mysqli_query($link,$a);
        $flag = mysqli_fetch_row($result);
            if ($flag[0] == 1) {
		        echo "操作成功，2秒后跳转";		
		        echo"<meta http-equiv=\"refresh\" content=\"1;url=menu_left_chapter_choose_teacher.php\">"; 
		    }
	        else{
		        echo "操作失败，2秒后跳转";		
	            echo"<meta http-equiv=\"refresh\" content=\"1;url=add_chapter.php\">"; 
	        }
    }