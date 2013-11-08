<?php /* Smarty version Smarty-3.1.14, created on 2013-09-22 11:57:19
         compiled from "/var/www/templates/selectExam.tpl" */ ?>
<?php /*%%SmartyHeaderCode:757476264520f0ae3113b35-36378129%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '64a8567f375f430f6ec4c6b633c7cc2d8c0c617c' => 
    array (
      0 => '/var/www/templates/selectExam.tpl',
      1 => 1379768415,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '757476264520f0ae3113b35-36378129',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_520f0ae3158987_82889988',
  'variables' => 
  array (
    'examlist' => 0,
    'b' => 0,
    'item' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520f0ae3158987_82889988')) {function content_520f0ae3158987_82889988($_smarty_tpl) {?>
<html>
<?php echo $_smarty_tpl->getSubTemplate ("studenthead.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
   
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<div class="container">
<center>
<form action='selectExam.php' method=POST>
<table class="table table-bordered table-striped" border="1">
	<?php $_smarty_tpl->tpl_vars['b'] = new Smarty_variable(1, null, 0);?>
	<tr><td><center>序号</center></td>
	<td><center>作业名称</center></td>
	<td><center>截止日期</center></td>
	<td><center>操作</center></td></tr>
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['examlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
	<tr>
	<td><center><?php echo $_smarty_tpl->tpl_vars['b']->value++;?>
</center></td>
	<td><center><?php echo $_smarty_tpl->tpl_vars['item']->value[1];?>
</center></td>
	<td><center><?php echo $_smarty_tpl->tpl_vars['item']->value[2];?>
</center></td>
        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['item']->value[0], null, 0);?>
        <?php $_smarty_tpl->tpl_vars['examid'] = new Smarty_variable(0, null, 0);?>
    <td><center><a href="/docs/chooseProblem.php?$examid=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
">开始</a></center></td>
	</tr>
        <?php } ?>
</table>
</form>
</center>
<hr>
<p style="color:red">请在截止日期之前进行答题。</p>
</div>

</html>
<?php }} ?>