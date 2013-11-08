<?php /* Smarty version Smarty-3.1.14, created on 2013-08-17 14:26:10
         compiled from "smarty/templates/templates/changeNormalScore.tpl" */ ?>
<?php /*%%SmartyHeaderCode:180968027151dd5ea7f0d777-63008721%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe33783264c32b0856d2068c0adab2b4faa122b3' => 
    array (
      0 => 'smarty/templates/templates/changeNormalScore.tpl',
      1 => 1373462920,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '180968027151dd5ea7f0d777-63008721',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_51dd5ea80064d6_65098898',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51dd5ea80064d6_65098898')) {function content_51dd5ea80064d6_65098898($_smarty_tpl) {?>
ChangeNormalScoreForStudent
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<form action='changeNormalScore.php' method=POST>
	<li>
          <tr>
          <td>请输入需要查看考生编号</td>
          <td><input type=text name='snum'></td>
          </tr>
	</li>
	<li>
          <tr>
          <td>请输入需要查询的考试编号</td>
          <td><input type=text name='eno'></td>
          </tr>
	</li>
	<li>
          <tr>
          <td>请输入需要修改的题号</td>
          <td><input type=text name='cno'></td>
          </tr>
	</li>
	<li>
          <tr>
          <td>请输入需要修改的分数(不得大于题目分值)</td>
          <td><input type=text name='cscore'></td>
          </tr>
	</li>
<input type=submit name='submit' value='确定'><br/></form>
<?php }} ?>