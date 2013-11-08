<?php /* Smarty version Smarty-3.1.14, created on 2013-09-16 16:32:44
         compiled from "/var/www/templates/selectTeacher.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1229138939520f2586400d76-10090284%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b9e8ca73910444066f62a65624ac9075f6d03b7' => 
    array (
      0 => '/var/www/templates/selectTeacher.tpl',
      1 => 1379318800,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1229138939520f2586400d76-10090284',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_520f258642cb20_35968455',
  'variables' => 
  array (
    'problemlist' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520f258642cb20_35968455')) {function content_520f258642cb20_35968455($_smarty_tpl) {?>
<html>
<?php echo $_smarty_tpl->getSubTemplate ("studenthead.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<form action='selectTeacher.php' method=POST>
  <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['problemlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
	<li><tr><td>教师号：</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value[0];?>
</td><br>
        </tr></li>
  <?php } ?>
   
        <td>请选择教师号：</td>
	<td><input type=text name="selectTno"></td>
	</tr></li>

        <input type=submit name='submit' value='提交'><br/></form>
</html>

<?php }} ?>