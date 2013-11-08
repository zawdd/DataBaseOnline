<?php /* Smarty version Smarty-3.1.14, created on 2013-07-04 18:23:03
         compiled from "smarty/templates/templates/introduce.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26264603851d54d0781e523-69175257%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe8b11ecf10b7c80b88b42c322735407b1d04091' => 
    array (
      0 => 'smarty/templates/templates/introduce.tpl',
      1 => 1372932916,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26264603851d54d0781e523-69175257',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Contacts' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_51d54d07894542_28690005',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51d54d07894542_28690005')) {function content_51d54d07894542_28690005($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['Contacts']->value['fax'];?>
<br />
<?php echo $_smarty_tpl->tpl_vars['Contacts']->value['email'];?>
<br />

<?php echo $_smarty_tpl->tpl_vars['Contacts']->value['phone']['home'];?>
<br />
<?php echo $_smarty_tpl->tpl_vars['Contacts']->value['phone']['cell'];?>
<br />
<?php }} ?>