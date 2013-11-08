<?php /* Smarty version Smarty-3.1.14, created on 2013-09-26 21:40:25
         compiled from "smarty/templates/templates/teacherHead.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13032960725211b7e66b1753-39147454%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6645428a5811994eb740fd44e4589a4d5d299f81' => 
    array (
      0 => 'smarty/templates/templates/teacherHead.tpl',
      1 => 1380202474,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13032960725211b7e66b1753-39147454',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5211b7e66b4539_83155021',
  'variables' => 
  array (
    'user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5211b7e66b4539_83155021')) {function content_5211b7e66b4539_83155021($_smarty_tpl) {?>

<center><h3>Welecome <?php echo $_smarty_tpl->tpl_vars['user']->value;?>
 !</h3></center><br>
<center>
<!--a href="/ExamOnline/teacherViewAllStudent.php">查看学生</a-->
<a href="/docs/teacher/teacherViewAllStudent.php">查看学生</a>
<!--a href="/ExamOnline/viewAllChapter.php">查看章节</a-->
<a href="/docs/teacher/viewAllChapter.php">查看章节</a>          
<!--a href="/ExamOnline/viewAllKnowledge.php">查看知识点</a-->
<a href="/docs/teacher/viewAllKnowledge.php">查看知识点</a>     
<!--a href="/ExamOnline/viewAllExam.php">查看考试</a-->
<a href="/docs/teacher/viewAllExam.php">查看考试</a>
<!--a href="/ExamOnline/viewAllStudentScoreByChapter.php">按照章节查看学生分数</a-->  
<a href="/docs/teacher/viewAllStudentScoreByChapter.php">按照章节查看学生分数</a>  
<a href="/docs/teacher/viewAllStudentScoreByKnowledge.php">按照知识点查看学生分数</a> 
<!--a href="/ExamOnline/viewAllStudentScoreByKnowledge.php">按照知识点查看学生分数</a-->         
<!--a href="/ExamOnline/initExam.php">直接发布考试</a-->
<a href="/docs/teacher/initExam.php">直接发布考试</a>
<a href="/docs/teacher/initExamByTemplate.php">按照模板发布考试</a>
<!--a href="/ExamOnline/logout.php">注销</a-->      
<a href="/docs/teacher/logout.php">注销</a>     
</center><br>           
<hr>
<?php }} ?>