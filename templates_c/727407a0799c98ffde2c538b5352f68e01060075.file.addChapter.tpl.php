<?php /* Smarty version Smarty-3.1.14, created on 2013-09-26 17:09:40
         compiled from "/var/www/templates/addChapter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:110672252551d298a48bb3d4-45284949%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '727407a0799c98ffde2c538b5352f68e01060075' => 
    array (
      0 => '/var/www/templates/addChapter.tpl',
      1 => 1379318800,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '110672252551d298a48bb3d4-45284949',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_51d298a4a1a1b1_45398234',
  'variables' => 
  array (
    'chapterlist' => 0,
    'item' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51d298a4a1a1b1_45398234')) {function content_51d298a4a1a1b1_45398234($_smarty_tpl) {?>
<html>
<?php echo $_smarty_tpl->getSubTemplate ("adminhead.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

Chapter List

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<ul>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['chapterlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
<form action='addChapter.php' method=POST>
          <tr>
      	  <td>请输入需要增加的章节编号</td>
      	  <td><input type=text name='cno'></td>
      	  </tr>
      	  <tr>
      	  <td>请输入需要增加的章节名</td>
      	  <td><input type=text name='cname'></td>
      	  </tr>
      	 
    
 <input type=submit name='submit value='提交'><br/></form>
 </html><?php }} ?>