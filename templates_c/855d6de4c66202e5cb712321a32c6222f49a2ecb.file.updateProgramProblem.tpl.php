<?php /* Smarty version Smarty-3.1.14, created on 2013-07-08 13:48:19
         compiled from "/var/www/templates/updateProgramProblem.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9523476451d3d3061666d7-72167642%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '855d6de4c66202e5cb712321a32c6222f49a2ecb' => 
    array (
      0 => '/var/www/templates/updateProgramProblem.tpl',
      1 => 1373262481,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9523476451d3d3061666d7-72167642',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_51d3d306284d97_14151770',
  'variables' => 
  array (
    'psrow' => 0,
    'chapterlist' => 0,
    'item' => 0,
    'knowledgelist' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51d3d306284d97_14151770')) {function content_51d3d306284d97_14151770($_smarty_tpl) {?> 
 
<html>
<?php echo $_smarty_tpl->getSubTemplate ("adminhead.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



<form action='updateProblem.php' method=POST>

	<li><td>problemid: <?php echo $_smarty_tpl->tpl_vars['psrow']->value[0];?>
</td>
	<td><input type=text name='pid' value=<?php echo $_smarty_tpl->tpl_vars['psrow']->value[0];?>
 style=display:none ></td>
	</tr></li>
	<li><td>chaptername</td>
	<select name="chaptername">
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['chapterlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
		<?php if ($_smarty_tpl->tpl_vars['item']->value[0]==$_smarty_tpl->tpl_vars['psrow']->value[1]){?>
			<option value=<?php echo $_smarty_tpl->tpl_vars['item']->value[0];?>
 selected="selected"><?php echo $_smarty_tpl->tpl_vars['item']->value[1];?>
</option>
		<?php }else{ ?>
			<option value=<?php echo $_smarty_tpl->tpl_vars['item']->value[0];?>
><?php echo $_smarty_tpl->tpl_vars['item']->value[1];?>
</option>
		<?php }?>
		<?php } ?>
	</select>
	</tr></li>
	<li><td>knowledgename</td>
	<select name="knowledgename">
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['knowledgelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
		<?php if ($_smarty_tpl->tpl_vars['item']->value[0]==$_smarty_tpl->tpl_vars['psrow']->value[8]){?>
			<option value=<?php echo $_smarty_tpl->tpl_vars['item']->value[0];?>
 selected="selected"><?php echo $_smarty_tpl->tpl_vars['item']->value[1];?>
</option>
		<?php }else{ ?>
			<option value=<?php echo $_smarty_tpl->tpl_vars['item']->value[0];?>
><?php echo $_smarty_tpl->tpl_vars['item']->value[1];?>
</option>
		<?php }?>
		<?php } ?>
	</select>
	</tr></li>
	<li><td>econtent</td>
	<td><textarea type=text name='econtent' rows="10" cols="30"><?php echo $_smarty_tpl->tpl_vars['psrow']->value[2];?>
</textarea></td>
	</tr></li>
	<li><td>answer</td>
	<td><textarea type=text name='answer' rows="10" cols="30"><?php echo $_smarty_tpl->tpl_vars['psrow']->value[3];?>
</textarea></td>
	</tr></li>
	<li><td>score</td>
	<td><input type=number name='score' value=<?php echo $_smarty_tpl->tpl_vars['psrow']->value[6];?>
 min=1></td>
	</tr></li>
	<li><td>stage</td>
	<select name="stage">
		<option value='A' <?php if ($_smarty_tpl->tpl_vars['psrow']->value[7]=="A"){?> selected="selected" <?php }?> >A</option>
		<option value='B' <?php if ($_smarty_tpl->tpl_vars['psrow']->value[7]=="B"){?> selected="selected" <?php }?> >B</option>
		<option value='C' <?php if ($_smarty_tpl->tpl_vars['psrow']->value[7]=="C"){?> selected="selected" <?php }?> >C</option>
		<option value='D' <?php if ($_smarty_tpl->tpl_vars['psrow']->value[7]=="D"){?> selected="selected" <?php }?> >D</option>
	</select>
	</tr></li>

 <input type=submit name='submit' value='提交'><br/></form>
 </html><?php }} ?>