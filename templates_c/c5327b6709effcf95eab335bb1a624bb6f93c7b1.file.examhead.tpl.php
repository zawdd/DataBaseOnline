<?php /* Smarty version Smarty-3.1.14, created on 2013-11-08 19:07:36
         compiled from "/var/www/templates/examhead.tpl" */ ?>
<?php /*%%SmartyHeaderCode:418045820520f358d870234-88406352%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5327b6709effcf95eab335bb1a624bb6f93c7b1' => 
    array (
      0 => '/var/www/templates/examhead.tpl',
      1 => 1383908311,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '418045820520f358d870234-88406352',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_520f358d871689_85429740',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520f358d871689_85429740')) {function content_520f358d871689_85429740($_smarty_tpl) {?>
<html>
<link href="/dist/css/bootstrap.css" rel="stylesheet">
 <link href="/dist/css/justified-nav.css" rel="stylesheet">
<script src="/dist/js/jquery.js"></script>
<script src="/dist/js/bootstrap.min.js"></script>
<head>
<script language=javascript>
document.oncontextmenu=new function("event.returnvalue=false;"); //禁止右键菜单,单击右键将无任何反应
document.onselectstart=new function("event.returnvalue=false;"); //禁止拖选、全选,造成网页内容无法用 ctrl+c 快捷键复制
</script>
</head>
<div class="container">

      <div class="masthead">
        <h3 class="text-muted">数据库在线答题系统</h3>
        <ul class="nav nav-justified">
          <li><a href="/docs/chooseProblem.php">单选题</a></li>
          <li><a href="/docs/mchooseProblem.php">多选题</a></li>
          <li><a href="/docs/fillInTheBlank.php">填空题</a></li>
	  <li><a href="/docs/uploadFile.php">文件上传</a></li>	
          <li><a href="/docs/calculateScore.php">提交</a></li>
          <li><a href="/docs/showSelfInformation.php">放弃</a></li>
        </ul>
	</div>
</div>
      
<hr>

</html>
<?php }} ?>