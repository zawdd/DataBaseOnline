<?php /* Smarty version Smarty-3.1.14, created on 2013-09-16 16:11:57
         compiled from "smarty/templates/templates/loginTeacher.tpl" */ ?>
<?php /*%%SmartyHeaderCode:202663184351da744ae8e084-30343547%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dde5be4a642a1d1c85aeda7b643c38d249ab8646' => 
    array (
      0 => 'smarty/templates/templates/loginTeacher.tpl',
      1 => 1379318801,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '202663184351da744ae8e084-30343547',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_51da744aec0376_93235933',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51da744aec0376_93235933')) {function content_51da744aec0376_93235933($_smarty_tpl) {?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<form action='loginTeacher.php' method=POST>
	<li>
          <tr>
          <td>帐号</td>
          <td><input type=text name='tno'></td>
          </tr>
	</li>
        <li>
          <tr>
          <td>密码</td>
          <td><input type=password name='tpassword'></td>
          </tr>
        </li>

 <input type=submit name='submit' value='登陆'><br/></form>
<a href="/docs/teacher/addTeacher.php">注册</a>   
<?php }} ?>