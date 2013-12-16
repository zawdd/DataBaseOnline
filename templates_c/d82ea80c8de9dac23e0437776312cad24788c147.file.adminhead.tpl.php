<?php /* Smarty version Smarty-3.1.14, created on 2013-09-26 17:09:40
         compiled from "/var/www/templates/adminhead.tpl" */ ?>
<?php /*%%SmartyHeaderCode:150330436851da48c5821f80-11192859%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd82ea80c8de9dac23e0437776312cad24788c147' => 
    array (
      0 => '/var/www/templates/adminhead.tpl',
      1 => 1379318800,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '150330436851da48c5821f80-11192859',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_51da48c582a344_80311932',
  'variables' => 
  array (
    'user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51da48c582a344_80311932')) {function content_51da48c582a344_80311932($_smarty_tpl) {?>
<center><h3>Welecome <?php echo $_smarty_tpl->tpl_vars['user']->value;?>
 !</h3></center><br>
<center><a href="/docs/showAllProblem.php">ShowAllProblem</a>          
<a href="/docs/addNormalProblem.php">addNormalProblem</a>         
<a href="/docs/addProgramProblem.php">addProgramProblem</a>         
<a href="/docs/addChapter.php">addChapter</a>        
<a href="/docs/addKnowledge.php">addKnowledge</a></center><br>           
<hr><?php }} ?>