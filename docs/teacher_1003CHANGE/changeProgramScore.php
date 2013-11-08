<?php
        include "connect_MySQL.php";
        require 'smarty/libs/Smarty.class.php';
        $smarty = new Smarty;

        $smarty->template_dir = "smarty/templates/templates";
        $smarty->compile_dir = "smarty/templates/templates_c";
        $smarty->config_dir = "smarty/templates/config";
        $smarty->cache_dir = "smarty/templates/cache";

        if ($_POST['snum'] AND $_POST['eno'] AND $_POST['pscore'] AND $_POST['pno'])
        {
                $snum = $_POST['snum'];
                $eno = $_POST['eno'];
		$pscore = $_POST['pscore'];
		$pno = $_POST['pno'];
		$selectquery1 = "SELECT Pexercise.Pscore FROM Pexercise,PexerciseAnswerForstudent WHERE Pexercise.Peno=PexerciseAnswerForstudent.Peno AND PexerciseAnswerForstudent.Psno='$snum' AND PexerciseAnswerForstudent.pnumber='$pno' AND Phno='$eno'";
                $selectsql1 = mysqli_query($link, $selectquery1);
       		$row = mysqli_fetch_array($selectsql1);
//		echo "$row[0]";
		if ($row[0] >= $pscore) {
		$selectquery2 = "SELECT updateprogramscore('$snum','$eno','$pscore','$pno')";
		$selectsql2 = mysqli_query($link, $selectquery2);
		} else echo '超过题目分值'."<br />";
                $err = mysqli_error($link);
                if ($err)
                        echo "error$err";
                else
                        echo "<meta http-equiv=\"refresh\" content=\"1;url=changeProgramScore.php\">";
        }
        $smarty->display('changeProgramScore.tpl');

?>
