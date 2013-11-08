<?php /* Smarty version Smarty-3.1.14, created on 2013-09-16 16:35:00
         compiled from "/var/www/templates/shortAnswerQuestions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1879316046520f35f8c55c96-30760539%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '26816347768bfe1640b702a397730223850465fe' => 
    array (
      0 => '/var/www/templates/shortAnswerQuestions.tpl',
      1 => 1379318800,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1879316046520f35f8c55c96-30760539',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_520f35f8c8b1d7_31647604',
  'variables' => 
  array (
    'simplelist' => 0,
    'i' => 0,
    'exercisenumber' => 0,
    'item' => 0,
    'userid' => 0,
    'hno' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520f35f8c8b1d7_31647604')) {function content_520f35f8c8b1d7_31647604($_smarty_tpl) {?>
<html>
<?php echo $_smarty_tpl->getSubTemplate ("examhead.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
     
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
简答题
<form action='shortAnswerQuestions.php' method=POST>
	<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?>
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['simplelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
	<li><tr><td>题号：</td><td><?php echo $_smarty_tpl->tpl_vars['exercisenumber']->value[$_smarty_tpl->tpl_vars['i']->value++];?>
</td><br>
        <td>难度系数：</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value[1];?>
</td><br>
        <td>分值：</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value[2];?>
</td><br>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value[3];?>
</td></tr><br>
        <td>答案</td>
        <td><textarea type=text name="<?php echo $_smarty_tpl->tpl_vars['item']->value[0];?>
_<?php echo $_smarty_tpl->tpl_vars['userid']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['hno']->value;?>
" rows="10" cols="40"></textarea></td>

	</tr></li>
<?php } ?>
        <input type=submit name='submit' value='保存'><br/></form>
</html>
<?php }} ?>