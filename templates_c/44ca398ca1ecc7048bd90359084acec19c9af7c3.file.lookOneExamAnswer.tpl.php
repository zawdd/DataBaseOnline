<?php /* Smarty version Smarty-3.1.14, created on 2013-09-21 21:03:45
         compiled from "/var/www/templates/lookOneExamAnswer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:47298696352395b48804d35-56040420%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '44ca398ca1ecc7048bd90359084acec19c9af7c3' => 
    array (
      0 => '/var/www/templates/lookOneExamAnswer.tpl',
      1 => 1379768612,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '47298696352395b48804d35-56040420',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52395b488386b6_60270511',
  'variables' => 
  array (
    'problemlist' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52395b488386b6_60270511')) {function content_52395b488386b6_60270511($_smarty_tpl) {?>
<html>
<?php echo $_smarty_tpl->getSubTemplate ("studenthead.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body  oncopy="alert('对不起，本网页禁止复制！');return false;">
<div class="container">
<center>
<table  class="table table-bordered" border="1">
<tr><td><center>题号</center></td>
<td><center>题目内容</center></td>
<td><center>标准答案</center></td>
<td><center>您的答案</center></td>
<td><center>您的得分</center></td></tr>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['problemlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
	<tr><td><center><?php echo $_smarty_tpl->tpl_vars['item']->value[0];?>
</center></td>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value[1];?>
</td>
        <td><center><?php echo $_smarty_tpl->tpl_vars['item']->value[2];?>
</center></td>
<?php if ($_smarty_tpl->tpl_vars['item']->value[4]==0){?>
        <td  style="color:red"><center><?php echo $_smarty_tpl->tpl_vars['item']->value[3];?>
</center></td>
<?php }else{ ?>
		<td><center><?php echo $_smarty_tpl->tpl_vars['item']->value[3];?>
</center></td>
<?php }?>
	<td><center><?php echo $_smarty_tpl->tpl_vars['item']->value[4];?>
</center></td>
	</tr>
<?php } ?>
</table>
</center>
<hr>
<p style="color:red">出错答案以红色标注,其中%为分隔符。</p>
<p style="color:red">想要提高本次测试的分数可以在参考完答案后重新答题。</p>
</div>
</body>
</html>
<?php }} ?>