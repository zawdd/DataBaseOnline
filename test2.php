<?php
	$a="%a%b%c";
	$b="%b%a%c";
	$str1array = explode("%",$a);
	$str2array = explode("%",$b);
	$tmpscore = 0;
	$str1FlagArray = array();
	  for($i = 0;$i < count($str1array); $i++){
		$str1FlagArray[]=0;
	  }
		print_r($str1FlagArray);
	  for($i = 1;$i < count($str1array); $i++){
		if($str1FlagArray[$i]==0){
				for($j = 1;$j < count($str2array); $j++){
				if($str2array[$j]==$str1array[$i]){
					$tmpscore++;
					$str1FlagArray[$i]=1;
				}
			}
		}
	  }
	echo $tmpscore;
	echo "<br>";
	print_r($str1array);
	echo "<br>";
	print_r($str2array);
	echo "<br>";
	if($str1array == $str2array)
		echo 1;
	else 
		echo 0;
?>
