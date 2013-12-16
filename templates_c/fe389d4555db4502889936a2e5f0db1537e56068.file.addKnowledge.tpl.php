<?php /* Smarty version Smarty-3.1.14, created on 2013-09-26 17:09:45
         compiled from "/var/www/templates/addKnowledge.tpl" */ ?>
<?php /*%%SmartyHeaderCode:214646766151d2bf34ce1c80-71421878%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe389d4555db4502889936a2e5f0db1537e56068' => 
    array (
      0 => '/var/www/templates/addKnowledge.tpl',
      1 => 1379318800,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '214646766151d2bf34ce1c80-71421878',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_51d2bf351bafb8_69958437',
  'variables' => 
  array (
    'knowledgelist' => 0,
    'item' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51d2bf351bafb8_69958437')) {function content_51d2bf351bafb8_69958437($_smarty_tpl) {?>
<html>
<?php echo $_smarty_tpl->getSubTemplate ("adminhead.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

Knowledge List

<ul>
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
 </html><?php }} ?>