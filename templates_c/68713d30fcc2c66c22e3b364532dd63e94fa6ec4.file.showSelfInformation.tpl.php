<?php /* Smarty version Smarty-3.1.14, created on 2013-09-22 11:57:14
         compiled from "/var/www/templates/showSelfInformation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1941654371520f22bf9d1de4-77199572%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '68713d30fcc2c66c22e3b364532dd63e94fa6ec4' => 
    array (
      0 => '/var/www/templates/showSelfInformation.tpl',
      1 => 1379508715,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1941654371520f22bf9d1de4-77199572',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_520f22bfa1c0a5_01256832',
  'variables' => 
  array (
    'userlist' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520f22bfa1c0a5_01256832')) {function content_520f22bfa1c0a5_01256832($_smarty_tpl) {?>
<html>
<?php echo $_smarty_tpl->getSubTemplate ("studenthead.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<div class="container">
<form action='showSelfInformation.php' method=POST>
<center>

<table  class="table table-bordered table-striped" border="1">
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['userlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
		<tr>
        <td>用户号：</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value[0];?>
</td>
		</tr>
        <tr>
		<td>姓名：</td><td> <?php echo $_smarty_tpl->tpl_vars['item']->value[1];?>
</td>
		</tr> 
		<tr>
        <td>性别：</td><td> <?php echo $_smarty_tpl->tpl_vars['item']->value[2];?>
</td>
		</tr>
		<tr>
        <td>年龄：</td><td> <?php echo $_smarty_tpl->tpl_vars['item']->value[3];?>
</td> 
		</tr>
		<tr>		
        <td>民族：</td><td> <?php echo $_smarty_tpl->tpl_vars['item']->value[4];?>
</td>	
		</tr> 
		<tr>
        <td>籍贯：</td><td> <?php echo $_smarty_tpl->tpl_vars['item']->value[5];?>
</td>
		</tr> 
		<tr>
        <td>所在学校：</td><td> <?php echo $_smarty_tpl->tpl_vars['item']->value[7];?>
</td> 		
		</tr>
		<tr>
        <td>电子邮件：</td><td> <?php echo $_smarty_tpl->tpl_vars['item']->value[10];?>
</td> 
		</tr>
		<tr>
        <td>电话：</td><td> <?php echo $_smarty_tpl->tpl_vars['item']->value[11];?>
</td> 
        <br>
		</tr>
</table>
</center>
<?php } ?>
<hr>
<p style="color:red">为了您的账户安全请及时修改密码！</p>
</div>
</html>
<?php }} ?>