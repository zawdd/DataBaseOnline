<?php /* Smarty version Smarty-3.1.14, created on 2013-07-10 21:29:02
         compiled from "smarty/templates/templates/readFile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:110544578451dd441f3db756-71116506%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c146a6fb43d79832b6d89214ef16660cad626319' => 
    array (
      0 => 'smarty/templates/templates/readFile.tpl',
      1 => 1373462933,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '110544578451dd441f3db756-71116506',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_51dd441f40e629_77192023',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51dd441f40e629_77192023')) {function content_51dd441f40e629_77192023($_smarty_tpl) {?>
Read Program File
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<form action='readFile.php' method=POST>
          <tr>
      	  <td>读取程序文件名</td>
      	  <td><input type=text name='fname'></td>
      	  </tr>
    
 <input type=submit name='submit' value='提交'><br/></form>
<?php }} ?>