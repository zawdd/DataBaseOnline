<?php /* Smarty version Smarty-3.1.14, created on 2013-07-11 15:36:15
         compiled from "smarty/templates/templates/addChapter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:138186572651da2205b2a200-16600659%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8844d878aa6e2d5202662ae49c14717cf1cdc9c6' => 
    array (
      0 => 'smarty/templates/templates/addChapter.tpl',
      1 => 1373527903,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '138186572651da2205b2a200-16600659',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_51da2205bd1e60_79625766',
  'variables' => 
  array (
    'chapterlist' => 0,
    'item' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51da2205bd1e60_79625766')) {function content_51da2205bd1e60_79625766($_smarty_tpl) {?>
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
      	 
    
 <input type=submit name='submit' value='提交'><br/></form>
<?php }} ?>