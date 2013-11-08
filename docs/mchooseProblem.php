<?php 
	include "connect_MySQL.php";
	require_once('/usr/local/lib/Smarty-3.1.14/libs/Smarty.class.php');
        session_start();
	
	
        $smarty = new Smarty();
	$smarty->setTemplateDir('/var/www/templates/');
	$smarty->setCompileDir('/var/www/templates_c/');
	$smarty->setConfigDir('/var/www/configs/');
	$smarty->setCacheDir('/var/www/cache/');
  

	$no=$_SESSION['examid'];
	//echo $_SESSION['examid'];
        $selectarray= "SELECT Hnumbs FROM Exam WHERE Hno=$no";
        $selectexamsql = mysqli_query($link, $selectarray);
	//$str1 = array();
        $row = mysqli_fetch_array($selectexamsql, MYSQLI_NUM);
         //echo $row[0]."<br />";
        echo "<br />";
        //print_r (explode("%",$row[0]));
        $str1=explode("%",$row[0]);
        $selectarray1 = "SELECT Hnuma FROM Exam WHERE Hno=$no";
        $selectexamsql1 = mysqli_query($link, $selectarray1); 
        $row1 = mysqli_fetch_array($selectexamsql1, MYSQLI_NUM);
        $j=0;
        $i=0;
        $k=$row1[0]+1;
	$blanklist = array();
        $exercisenumber=array();
       while($str1[$i]) 
        {   
            $exercisenumber[$j++]=$k++;
            $selectquery = "SELECT Cexercise.Ceno, Cexercise.Cstage,Cexercise.Cscore,ChooseProblem.CPcontent
FROM Cexercise,ChooseProblem WHERE Cexercise.Ceno='$str1[$i]' AND Cexercise.Ceno=ChooseProblem.CPid ";
      
        $selectsql = mysqli_query($link, $selectquery);
	
        while($row2 = mysqli_fetch_array($selectsql, MYSQLI_NUM))
             {   
                  $blanklist[]=str_replace("%","<br/>",$row2);
             }
     
        $i++;
        } 
	
	$hno=$_SESSION['examid'];
	$userid=$_SESSION['uid'];
  	$smarty->assign('userid',$userid);
	$smarty->assign('hno',$hno);
        $smarty->assign('blanklist', $blanklist);
        $smarty->assign('exercisenumber', $exercisenumber);
	$k=0;
	//保存答案
        if($_POST['submit']=='保存')
         {
	     while($str1[$k])
             {   
                  $temp = $str1[$k]."_".$userid."_".$hno;
                  $cvalue=$_POST[$temp];
                  $i=1;
                  $lvalue="%".$cvalue[0];
                  while($cvalue[$i])
               {
                  $lvalue=$lvalue."%".$cvalue[$i];
                  $i++;
               }
           if($lvalue)
	      { 
                
                //echo $_POST[$temp];
	        $selectarray2 = "SELECT Ceano FROM CexerciseAnswerForstudent WHERE Ceno='$str1[$k]' AND Chno=$hno AND Sno=$userid";
                $selectexamsql2 = mysqli_query($link, $selectarray2);
                $row = mysqli_fetch_array($selectexamsql2, MYSQLI_NUM);
                     
                if($row[0])
                  { 
                   //echo $row[0];
                   $updatequery="UPDATE CexerciseAnswerForstudent SET Canswer='$lvalue' WHERE Ceano=$row[0] ";	
	           $updatesql = mysqli_query($link, $updatequery);
                   }  
                
                else
                     {
             $query = "INSERT INTO CexerciseAnswerForstudent    ( Ceano,Ceno,Sno,Chno,Canswer,Cnum) VALUES(NULL,'$str1[$k]','$userid','$hno','$lvalue', '$exercisenumber[$k]') ";
	       $sql = mysqli_query($link, $query);
                      }
	      }  
           
	   $k++;
        }
        //批改  
          $selectarray3= "SELECT ChooseProblem.CPanswer, Cexercise.Cscore, CexerciseAnswerForstudent.Canswer, CexerciseAnswerForstudent.Ceano FROM ChooseProblem,Cexercise,
 CexerciseAnswerForstudent WHERE Cexercise.Ceno = CexerciseAnswerForstudent.Ceno AND Cexercise.Ceno =ChooseProblem.CPid AND CexerciseAnswerForstudent.Chno=$no AND CexerciseAnswerForstudent.Sno=$userid AND Cexercise.Cename='dx' ";
          $selectsql3 = mysqli_query($link, $selectarray3);

          $newscore=array();
          $updateid=array();
          $temp=0; 
	  while ($row = mysqli_fetch_array($selectsql3, MYSQLI_NUM))
           {  

           $str1=$row[0];
           $score=$row[1];
           $str2=$row[2];
           $str3=$row[3];
           //echo $str3;
           $updateid[$temp]=$str3;
           if(strcmp($str1,$str2))
            { 
          	//$updatearray1="UPDATE CexerciseAnswerForstudent  SET Cscore=0 WHERE Ceano=$str3";
                //$updatesql = mysqli_query($link, $updatearray1);
                $newscore[$temp]=0;
             }
            else
               {
                   //$updatearray1="UPDATE CexerciseAnswerForstudent  SET Cscore=$score WHERE Ceano=$str3";
                   //$updatesql = mysqli_query($link, $updatearray1);
                   $newscore[$temp]=$score;
               }
            $temp++;
	  }//while
        //批量更新
              $updatearr="INSERT INTO CexerciseAnswerForstudent(Ceano,Cscore) VALUES";
              $i=0;
              for($i=0;$i<$temp-1;$i++)
                  {
                       $updatearr .= sprintf("($updateid[$i],$newscore[$i]),");
                  }
               $updatearr .= sprintf("($updateid[$i],$newscore[$i])");
               $updatearr .= sprintf("ON DUPLICATE KEY UPDATE Cscore=VALUES (Cscore);");
               $updatesql = mysqli_query($link, $updatearr);
       
      }
        
          
      $smarty->display('mchooseProblem.tpl');
?> 





