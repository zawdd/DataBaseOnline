<?php /* Smarty version Smarty-3.1.14, created on 2013-10-03 18:15:47
         compiled from "smarty/templates/templates/viewStudentScore.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1671441554524d43d38eb094-34425400%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '654abda2b123c183015efeb0a21c9e0f2817c7e3' => 
    array (
      0 => 'smarty/templates/templates/viewStudentScore.tpl',
      1 => 1380795290,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1671441554524d43d38eb094-34425400',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'scorelist' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_524d43d3942352_33244345',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_524d43d3942352_33244345')) {function content_524d43d3942352_33244345($_smarty_tpl) {?>
<html>
<?php echo $_smarty_tpl->getSubTemplate ("teacherHead.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<div class="container">
<center>
<table class="table table-bordered table-striped" border="1">
	<tr><td><center>学生号</center></td>
	<td><center>学生姓名</center></td>
	<td><center>提交时间</center></td>
	<td><center>考试成绩</center></td>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['scorelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
	<tr>
	<td><center><?php echo $_smarty_tpl->tpl_vars['item']->value[0];?>
</center></td>
	<td><center><?php echo $_smarty_tpl->tpl_vars['item']->value[1];?>
</center></td>
	<td><center><?php echo $_smarty_tpl->tpl_vars['item']->value[2];?>
</center></td>
	<td><center><?php echo $_smarty_tpl->tpl_vars['item']->value[3];?>
</center></td>
	</tr>
	<?php } ?>
</table>
<input onClick="location='viewAllExam.php'" class="btn btn-primary" type=button name='btn' value="返回">
</center>
</div>
</html>
<?php }} ?>