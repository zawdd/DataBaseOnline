<?php /* Smarty version Smarty-3.1.14, created on 2013-09-26 17:09:49
         compiled from "/var/www/templates/addNormalProblem.tpl" */ ?>
<?php /*%%SmartyHeaderCode:159762695751d2c5c9032c29-78709852%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e7f95cdbc8699606b71348fe9c2ca0381ddeb9b6' => 
    array (
      0 => '/var/www/templates/addNormalProblem.tpl',
      1 => 1379318800,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '159762695751d2c5c9032c29-78709852',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_51d2c5c91d94b8_02070570',
  'variables' => 
  array (
    'chapterlist' => 0,
    'item' => 0,
    'knowledgelist' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51d2c5c91d94b8_02070570')) {function content_51d2c5c91d94b8_02070570($_smarty_tpl) {?> 
<html>
<?php echo $_smarty_tpl->getSubTemplate ("adminhead.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<form action='addNormalProblem.php' method=POST>
	
	<li><td>cno</td>
	<select name="cno">
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['chapterlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
			<option value=<?php echo $_smarty_tpl->tpl_vars['item']->value[0];?>
><?php echo $_smarty_tpl->tpl_vars['item']->value[1];?>
</option>
		<?php } ?>
	</select>
	</tr></li>
	<li><td>ename</td>
	<select name="ename">
		<option value='选择题'>选择题</option>
		<option value='填空题'>填空题</option>
		<option value='问答题'>问答题</option>
	</select>
	</tr></li>
	<li><td>econtent</td>
	<td><textarea type=text name='econtent' rows="10" cols="30"></textarea></td>
	</tr></li>
	<li><td>answer</td>
	<td><textarea type=text name='answer' rows="10" cols="30"></textarea></td>
	</tr></li>
	<li><td>score</td>
	<td><input type=number name='score' min=1></td>
	</tr></li>
	<li><td>style</td>
	<select name="style">
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['knowledgelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
			<option value=<?php echo $_smarty_tpl->tpl_vars['item']->value[0];?>
><?php echo $_smarty_tpl->tpl_vars['item']->value[1];?>
</option>
		<?php } ?>
	</select>
	</tr></li>
	<li><td>stage</td>
	<select name="stage">
		<option value='A'>A</option>
		<option value='B'>B</option>
		<option value='C'>C</option>
		<option value='D'>D</option>
	</select>
	</tr></li>

 <input type=submit name='submit' value='提交'><br/></form>
 </html><?php }} ?>