<?php /* Smarty version Smarty-3.1.14, created on 2013-09-22 11:57:23
         compiled from "/var/www/templates/lookOverAnswer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:653392833520f0b07976835-79451042%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c62763724266e43076ebe394398f419b4f80c1e0' => 
    array (
      0 => '/var/www/templates/lookOverAnswer.tpl',
      1 => 1379740866,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '653392833520f0b07976835-79451042',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_520f0b079b31b9_99840091',
  'variables' => 
  array (
    'examlist' => 0,
    'i' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520f0b079b31b9_99840091')) {function content_520f0b079b31b9_99840091($_smarty_tpl) {?>
<html>
<?php echo $_smarty_tpl->getSubTemplate ("studenthead.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<div class="container">
<center>
<table class="table table-bordered table-striped" border="1">
<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
<tr><td><center>序号</center></td>
<td><center>名称</center></td>
<td><center>成绩</center></td>
<td><center>查看答案</center></td>
<td><center>操作</center></td></tr>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['examlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
	<tr>
		<td><center><?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
</center></td>
		<td><center><?php echo $_smarty_tpl->tpl_vars['item']->value[1];?>
</center></td>
        <td><center><?php echo $_smarty_tpl->tpl_vars['item']->value[2];?>
</center></td>
      	<td><center><a href="/docs/lookOneExamAnswer.php?$examid=<?php echo $_smarty_tpl->tpl_vars['item']->value[0];?>
">查看</a></center></td>
		<?php if ($_smarty_tpl->tpl_vars['item']->value[3]==0){?>		
		<td><center><a href="/docs/chooseProblem.php?$examid=<?php echo $_smarty_tpl->tpl_vars['item']->value[0];?>
">重做</a></center></td>
		<?php }else{ ?>
		<td></td>
		<?php }?>
    </tr>
<?php } ?>
</table>
</center>
<hr>
<p style="color:red">平时作业可以重做，考试不能重做。</p>
</div>
</html>
<?php }} ?>