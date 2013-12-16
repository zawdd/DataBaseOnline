<?php /* Smarty version Smarty-3.1.14, created on 2013-09-29 10:25:14
         compiled from "/var/www/templates/dropTeacher.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1726252330520f258a706877-61752490%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c1fa6d36603165e3bd569e98c47ca9a0e11fdce1' => 
    array (
      0 => '/var/www/templates/dropTeacher.tpl',
      1 => 1379318800,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1726252330520f258a706877-61752490',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_520f258a7254a6_58713089',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520f258a7254a6_58713089')) {function content_520f258a7254a6_58713089($_smarty_tpl) {?>
<html>
<?php echo $_smarty_tpl->getSubTemplate ("studenthead.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<form action='dropTeacher.php' method=POST>
  
   
        <td>是否退选(是/否)：</td>
	<td><input type=text name="dropTno"></td>
	</tr></li>

        <input type=submit name='submit' value='确定'>
<br/></form>
</html>
<?php }} ?>