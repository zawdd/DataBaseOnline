<?php
        include "connect_MySQL.php";
        require 'smarty/libs/Smarty.class.php';
	session_start();
        $smarty = new Smarty;

        $smarty->template_dir = "smarty/templates/templates";
        $smarty->compile_dir = "smarty/templates/templates_c";
        $smarty->config_dir = "smarty/templates/config";
        $smarty->cache_dir = "smarty/templates/cache";

       // if ($_POST['cscore'] AND $_POST['cno'])
	if($_POST['cno'])
        {
                $snum = $_SESSION['sid'];
                $eno = $_SESSION['eno'];    //考试号
		$cscore =$_POST['cscore'];  //要改成的分值
		$cscore = $cscore;
//		echo "cscore = "."$cscore";
		$cno = $_POST['cno'];  //试卷中的题号
		$selectquery1 = "SELECT Cexercise.Cscore FROM Cexercise,CexerciseAnswerForstudent WHERE Cexercise.Ceno=CexerciseAnswerForstudent.Ceno AND CexerciseAnswerForstudent.Sno='$snum' AND CexerciseAnswerForstudent.Cnum='$cno' AND Chno='$eno'";
                $selectsql1 = mysqli_query($link, $selectquery1);
       		$row = mysqli_fetch_array($selectsql1);
//		echo "$row[0]";
		if ($row[0] >= $cscore) {
//		$selectquery2 = "SELECT updatenormalscore('$snum','$cno','$eno','$cscore')";
		$selectquery2 = "SELECT updatenormalscore('$snum','$eno','$cno','$cscore')";

		$selectsql2 = mysqli_query($link, $selectquery2);
//		$selectquery2 = "SELECT Cscore into FROM CexerciseAnswerForstudent WHERE Sno=$snum AND Chno=$eno AND Cnum=$cno;"
//		$selectsql2 = mysqli_query($link, $selectquery2);
//		$row=mysqli_fetch_array($selectsql2);
		
		} else echo '超过题目分值'."<br />";
                $err = mysqli_error($link);
                if ($err)
                        echo "error$err";
                else{
			echo '<script type="text/javascript">
			alert("修改成功");
			</script>';	
                        echo "<meta http-equiv=\"refresh\" content=\"1;url=teacherViewAllStudent.php\">";
		}
        }
        //$smarty->display('changeNormalScore.tpl');

?>
