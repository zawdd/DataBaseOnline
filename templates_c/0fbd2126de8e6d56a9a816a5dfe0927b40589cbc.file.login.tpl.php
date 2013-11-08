<?php /* Smarty version Smarty-3.1.14, created on 2013-08-17 13:29:04
         compiled from "/var/www/templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1972334886520f0a206be5a0-43018278%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0fbd2126de8e6d56a9a816a5dfe0927b40589cbc' => 
    array (
      0 => '/var/www/templates/login.tpl',
      1 => 1373698530,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1972334886520f0a206be5a0-43018278',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_520f0a206f1706_40421644',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520f0a206f1706_40421644')) {function content_520f0a206f1706_40421644($_smarty_tpl) {?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<form action='login.php' method=POST>
          <tr>
      	  <li><td>帐号  </td>
      	  <td><input type=text name='UID'></td>
      	  </li> </tr>
          <li></li>
          <tr>
      	  <li><td>密码 </td>
      	  <td><input type=password name='Upassword'></td>
      	  </li></tr>
         
 <input type=submit name='login' value='登录'>
 <input type=submit name='register' value='注册'><br/>
  

</form>
<?php }} ?>