<?php
        include "connect_MySQL.php";
        require 'smarty/libs/Smarty.class.php';
        $smarty = new Smarty;

        $smarty->template_dir = "smarty/templates/templates";
        $smarty->compile_dir = "smarty/templates/templates_c";
        $smarty->config_dir = "smarty/templates/config";
        $smarty->cache_dir = "smarty/templates/cache";

        if ($_POST['fname'])
        {
                $fname = $_POST['fname'];
		$file = fopen("$fname","r") or exit("Unable to open file!");
		while(!feof($file))
		{
			echo fgets($file). "<br />";
		}
		fclose($file);
        }
        $smarty->display('readFile.tpl');

?>
