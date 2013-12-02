<?php /* Smarty version Smarty-3.1.14, created on 2013-11-18 08:54:00
         compiled from "/var/www/templates/studentRegister.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1435281566520f0a3a7af8b4-97989374%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4915aa00753fef9863d7e47c67b8f7bce6dd8f40' => 
    array (
      0 => '/var/www/templates/studentRegister.tpl',
      1 => 1382429223,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1435281566520f0a3a7af8b4-97989374',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_520f0a3a846a63_77258878',
  'variables' => 
  array (
    'Userlist' => 0,
    'item' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520f0a3a846a63_77258878')) {function content_520f0a3a846a63_77258878($_smarty_tpl) {?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<ul>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Userlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
<form action='studentRegister.php' method=POST>
          <tr>
      	  <li><td>帐号  </td>
      	  <td><input type=text name='UID'></td>
      	  </li> </tr>
          <li></li>
          <tr>
      	  <li><td>姓名  </td>
      	  <td><input type=text name='Uname'></td>
      	  </li></tr>
          <li></li>
      	  <tr>
      	  <li><td>性别  </td>
      	  <td><input type=text name='Usex'></td>
      	  </li></tr>
          <li></li>
          <tr>
      	  <li><td>年龄  </td>
      	  <td><input type=text name='Uage'></td>
      	  </li></tr>
          <li></li>
          <tr>
      	  <li><td>民族  </td>
      	  <td><input type=text name='Unation'></td>
      	  </li></tr>
          <li></li>
          <tr>
      	  <li><td>籍贯  </td>
      	  <td><input type=text name='UBP'></td>
      	  </li></tr>
          <li></li>
      	  <tr>
      	  <li><td>密码  </td>
      	  <td><input type=password name='Upassword1'></td>
      	  </li></tr>
          <li></li>
          <tr>
      	  <li><td>重复密码</td>
      	  <td><input type=password name='Upassword2'></td>
      	  </li></tr>
          <li></li>
          <tr>
      	  <li><td>所在学校</td>
      	  <td><input type=text name='Uschool'></td>
      	  </li></tr>
          <li></li>
      
          
    <input type=submit name='submit' value='提交注册'><br/></form>
</html>      	 
   	 
      	 
      	 
      	 
      	 
      	 
<?php }} ?>