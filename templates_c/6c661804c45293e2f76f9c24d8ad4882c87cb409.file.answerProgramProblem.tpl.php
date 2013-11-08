<?php /* Smarty version Smarty-3.1.14, created on 2013-09-29 10:24:08
         compiled from "/var/www/templates/answerProgramProblem.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18645772651dbb5137ad0f0-90052665%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c661804c45293e2f76f9c24d8ad4882c87cb409' => 
    array (
      0 => '/var/www/templates/answerProgramProblem.tpl',
      1 => 1379318800,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18645772651dbb5137ad0f0-90052665',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_51dbb5138f88c3_12549921',
  'variables' => 
  array (
    'psrow' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51dbb5138f88c3_12549921')) {function content_51dbb5138f88c3_12549921($_smarty_tpl) {?> 
<html>
<?php echo $_smarty_tpl->getSubTemplate ("adminhead.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<li><?php echo $_smarty_tpl->tpl_vars['psrow']->value[2];?>
</li>
<li>score <?php echo $_smarty_tpl->tpl_vars['psrow']->value[6];?>
</li>
<li>nandu <?php echo $_smarty_tpl->tpl_vars['psrow']->value[7];?>
</li>

<form action='answerProgramProblem.php' method=POST>
<textarea type=text name='answer' rows="10" cols="50"></textarea>

<input type=submit name='submit' value='提交'><br/></form>
 
<?php }} ?>