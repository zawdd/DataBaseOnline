<?php /* Smarty version Smarty-3.1.14, created on 2013-10-03 16:30:40
         compiled from "smarty/templates/templates/teacherHead.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13032960725211b7e66b1753-39147454%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6645428a5811994eb740fd44e4589a4d5d299f81' => 
    array (
      0 => 'smarty/templates/templates/teacherHead.tpl',
      1 => 1380789035,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13032960725211b7e66b1753-39147454',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5211b7e66b4539_83155021',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5211b7e66b4539_83155021')) {function content_5211b7e66b4539_83155021($_smarty_tpl) {?>

<html>
<link href="/dist/css/bootstrap.css" rel="stylesheet">
<link href="/dist/css/justified-nav.css" rel="stylesheet">
<script src="/code.jquery.com/jquery.js"></script>
<script src="/dist/js/bootstrap.mim.js"></script>

<div class="container">

	<div class="masthead">
	  <h3 class="text-muted">数据库在线答题系统</h3>
	  <ul class="nav nav-justified">
		<li><a href="/docs/teacher/teacherViewAllStudent.php">查看学生</a></li>
		<!--li><a href="/docs/teacher/viewAllChapter.php">按章节统计成绩</a></li>	
		<li><a href="/docs/teacher/viewAllKnowledge.php">按知识点统计成绩</a></li-->
		<li><a href="/docs/teacher/viewAllExam.php">查看考试</a></li>
                <li><a href="/docs/teacher/viewAllChapter.php">按章节统计成绩</a></li>       
                <li><a href="/docs/teacher/viewAllKnowledge.php">按知识点统计成绩</a></li>
		<!--li><a href="/docs/teacher/viewAllStudentScoreByChapter.php">章节统计</a></li-->
		<!--li><a href="/docs/teacher/viewAllStudentScoreByKnowledge.php">知识点统计</a></li-->
		<li><a href="/docs/teacher/initExam.php">直接发布考试</a></li>
		<li><a href="/docs/teacher/initExamByTemplate.php">模版发布考试</a></li>
		<li><a href="/docs/teacher/logout.php">注销</a></li>
	     </ul>
	     </div>
</div>

<hr>
</html>
<?php }} ?>