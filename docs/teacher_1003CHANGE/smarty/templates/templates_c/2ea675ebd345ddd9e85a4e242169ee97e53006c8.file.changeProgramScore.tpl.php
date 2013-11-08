<?php /* Smarty version Smarty-3.1.14, created on 2013-09-16 16:11:39
         compiled from "smarty/templates/templates/changeProgramScore.tpl" */ ?>
<?php /*%%SmartyHeaderCode:55725259951dd69d2ca7827-30729922%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ea675ebd345ddd9e85a4e242169ee97e53006c8' => 
    array (
      0 => 'smarty/templates/templates/changeProgramScore.tpl',
      1 => 1379318801,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '55725259951dd69d2ca7827-30729922',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_51dd69d2cd9522_38828014',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51dd69d2cd9522_38828014')) {function content_51dd69d2cd9522_38828014($_smarty_tpl) {?>
ChangeProgramScoreForStudent
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<form action='changeProgramScore.php' method=POST>
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
          <td><input type=text name='pno'></td>
          </tr>
	</li>
	<li>
          <tr>
          <td>请输入需要修改的分数(不得大于题目分值)</td>
          <td><input type=text name='pscore'></td>
          </tr>
	</li>
<input type=submit name='submit' value='确定'><br/></form>
<?php }} ?>