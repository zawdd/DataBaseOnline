<?php
  session_start();
  require "connect_MySQL.php";
  $tempUID=20081001;
//  $tempUID = $_POST['UID'];
//  $_SESSION['teacherID']=$tempUID;
  $chapterNo=00120081001;
//  $chapterNo=$_POST["chapterNo"];

  $sql="call showTeacherStudentList('$tempUID')";
  $result=mysqli_query($link,$sql);
 //    while(1){
  $row = mysqli_fetch_array($result);
  echo "$row[0]";
//      	if($row != NULL){
 //     		echo"<option value=$row[0]>ตฺ$row[0]ีย</option>
//      		     <option name=chapterNo type=hidden value=$row[0]></option>
 //     		    ";
 //     	}
//      }
?>