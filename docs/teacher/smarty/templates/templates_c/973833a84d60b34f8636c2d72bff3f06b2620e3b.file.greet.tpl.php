<?php /* Smarty version Smarty-3.1.14, created on 2013-07-07 01:32:53
         compiled from "smarty/templates/templates/greet.tpl" */ ?>
<?php /*%%SmartyHeaderCode:197733817651d532e92de549-38106068%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '973833a84d60b34f8636c2d72bff3f06b2620e3b' => 
    array (
      0 => 'smarty/templates/templates/greet.tpl',
      1 => 1373025415,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '197733817651d532e92de549-38106068',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_51d532e9341510_61721883',
  'variables' => 
  array (
    'exp' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51d532e9341510_61721883')) {function content_51d532e9341510_61721883($_smarty_tpl) {?><html>
<title>Greeting Page</title>
<body>
It's a Greeting Page!^^
Hello,<?php echo $_smarty_tpl->tpl_vars['exp']->value['name'];?>
!Good<?php echo $_smarty_tpl->tpl_vars['exp']->value['time'];?>

</body>
</html>
<?php }} ?>