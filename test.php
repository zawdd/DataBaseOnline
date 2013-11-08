<?php
    $link = mysql_connect("localhost","root","0818");
     
    require_once('/usr/local/lib/Smarty-3.1.14/libs/Smarty.class.php');
	$smarty = new Smarty();
    if (!$link)
     
    {
     
    die('Could not connect: ' . mysql_error());
     
    }
     
    else echo "Mysql已经正确配置";
     
    mysql_close($link);
     
    ?>
