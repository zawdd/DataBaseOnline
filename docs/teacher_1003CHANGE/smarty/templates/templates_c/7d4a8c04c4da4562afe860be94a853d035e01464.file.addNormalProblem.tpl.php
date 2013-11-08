<?php /* Smarty version Smarty-3.1.14, created on 2013-07-08 14:14:32
         compiled from "smarty/templates/templates/addNormalProblem.tpl" */ ?>
<?php /*%%SmartyHeaderCode:197014853151da296dcfa480-25061447%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7d4a8c04c4da4562afe860be94a853d035e01464' => 
    array (
      0 => 'smarty/templates/templates/addNormalProblem.tpl',
      1 => 1373263881,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '197014853151da296dcfa480-25061447',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_51da296dd5c535_17411251',
  'variables' => 
  array (
    'chapterlist' => 0,
    'item' => 0,
    'knowledgelist' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51da296dd5c535_17411251')) {function content_51da296dd5c535_17411251($_smarty_tpl) {?> 
<html>
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
	<td><input type=text name='ename'></td>
	</tr></li>
	<li><td>econtent</td>
	<td><input type=text name='econtent'></td>
	</tr></li>
	<li><td>answer</td>
	<td><input type=text name='answer'></td>
	</tr></li>
	<li><td>score</td>
	<td><input type=text name='score'></td>
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
 </html>
<?php }} ?>