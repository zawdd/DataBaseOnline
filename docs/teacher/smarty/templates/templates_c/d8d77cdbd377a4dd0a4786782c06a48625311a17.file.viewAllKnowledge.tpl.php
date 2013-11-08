<?php /* Smarty version Smarty-3.1.14, created on 2013-10-03 16:55:39
         compiled from "smarty/templates/templates/viewAllKnowledge.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20353529151de623a044bf8-25326142%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd8d77cdbd377a4dd0a4786782c06a48625311a17' => 
    array (
      0 => 'smarty/templates/templates/viewAllKnowledge.tpl',
      1 => 1380790532,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20353529151de623a044bf8-25326142',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_51de623a0af126_97504509',
  'variables' => 
  array (
    'knowledgelist' => 0,
    'item' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51de623a0af126_97504509')) {function content_51de623a0af126_97504509($_smarty_tpl) {?>
<html>
<?php echo $_smarty_tpl->getSubTemplate ("teacherHead.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<div class="container">
<center>
<form action='viewAllStudentScoreByKnowledge.php' method=POST>
<table class="table table-bordered table-striped" border="1">
	<tr><td><center>知识点号</center></td>
	<td><center>知识点名称</center></td>	
	<td><center>统计</center></td></tr>
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['knowledgelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
	<tr>
	<td><center><?php echo $_smarty_tpl->tpl_vars['item']->value[0];?>
</center></td>
	<td><center><?php echo $_smarty_tpl->tpl_vars['item']->value[1];?>
</center></td>
	<td><center><input type="checkbox" name="kno[]" value=<?php echo $_smarty_tpl->tpl_vars['item']->value[0];?>
></center></td>
	</tr>
	<?php } ?>
</table>
<input class="btn btn-primary" type=submit name='submit' value="查看考试情况"><br /> 
<!--ul>
<li>
	<th>知识点号</th>
	<th>知识点名</th>
</li>

<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['knowledgelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
        <li>
        <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
                <th><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</th>
        <?php } ?>
        </li>
<?php } ?>
</ul>
<?php }} ?>