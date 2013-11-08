<?php /* Smarty version Smarty-3.1.14, created on 2013-08-17 17:36:57
         compiled from "smarty/templates/templates/addKnowledge.tpl" */ ?>
<?php /*%%SmartyHeaderCode:68424192351da25c8ef41c6-60515667%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '218c8d743ba8030c023ab0455936f4f20b39bb10' => 
    array (
      0 => 'smarty/templates/templates/addKnowledge.tpl',
      1 => 1373281474,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '68424192351da25c8ef41c6-60515667',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_51da25c907fa43_99012970',
  'variables' => 
  array (
    'knowledgelist' => 0,
    'item' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51da25c907fa43_99012970')) {function content_51da25c907fa43_99012970($_smarty_tpl) {?>
Knowledge List

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 
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
<form action='addKnowledge.php' method=POST>
      	  <tr>
      	  <td>请输入需要增加的知识点</td>
      	  <td><input type=text name='kname'></td>
      	  </tr>
      	 
    
 <input type=submit name='submit' value='提交'><br/></form>
<?php }} ?>