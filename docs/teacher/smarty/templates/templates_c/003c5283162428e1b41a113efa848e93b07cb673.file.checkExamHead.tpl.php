<?php /* Smarty version Smarty-3.1.14, created on 2013-10-01 23:11:27
         compiled from "smarty/templates/templates/checkExamHead.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1341908200524ae04ae767a1-74690609%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '003c5283162428e1b41a113efa848e93b07cb673' => 
    array (
      0 => 'smarty/templates/templates/checkExamHead.tpl',
      1 => 1380640281,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1341908200524ae04ae767a1-74690609',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_524ae04ae78b48_82277263',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_524ae04ae78b48_82277263')) {function content_524ae04ae78b48_82277263($_smarty_tpl) {?>
<html>
<link href="/dist/css/bootstrap.css" rel="stylesheet">
<link href="/dist/css/justified-nav.css" rel="stylesheet">
<script src="/code.jquery.com/jquery.js"></script>
<script src="/dist/js/bootstrap.min.js"></script>
<head>
<script language=javascript>
document.oncontexmenu=new function("envent.returnvalue=false;"); //禁止右键菜单,单击右键将无反应
document.onselectstart=new function("envent.returnvalue=false;"); //禁止拖选,全选,造成网页内容无法用ctrl+c快捷键复制
</script>
</head>
<div class="container">

	<div class="masthead">
	  <h3 class="text-muted">数据库在线答题系统</h3>
	  <ul class="nav nav-justified">
		<li><a href="/docs/teacher/checkChooseProblem.php">查看单选题</a></li>
		<li><a href="/docs/teacher/checkMultiChooseProblem.php">查看多选题</a></li>
		<li><a href="/docs/teacher/checkFillProblem.php">查看填空题</a></li>
		<li><a href="/docs/teacher/teacherViewAllStudent.php">提交修改</a></li>
	  </ul>
	  </div>
</div>

<hr>

</html>
<?php }} ?>