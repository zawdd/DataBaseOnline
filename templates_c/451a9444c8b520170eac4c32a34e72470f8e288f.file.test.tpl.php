<?php /* Smarty version Smarty-3.1.14, created on 2013-09-29 10:38:09
         compiled from "/var/www/templates/test.tpl" */ ?>
<?php /*%%SmartyHeaderCode:150586513351d1283e1246d2-32036281%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '451a9444c8b520170eac4c32a34e72470f8e288f' => 
    array (
      0 => '/var/www/templates/test.tpl',
      1 => 1379318800,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '150586513351d1283e1246d2-32036281',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_51d1283e237454_40075942',
  'variables' => 
  array (
    'name' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51d1283e237454_40075942')) {function content_51d1283e237454_40075942($_smarty_tpl) {?>


Hello <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
, welcome to Smarty!
 
<?php }} ?>