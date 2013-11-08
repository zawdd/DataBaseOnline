<?php /* Smarty version Smarty-3.1.14, created on 2013-10-03 23:12:47
         compiled from "smarty/templates/templates/loginTeacher.tpl" */ ?>
<?php /*%%SmartyHeaderCode:202663184351da744ae8e084-30343547%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dde5be4a642a1d1c85aeda7b643c38d249ab8646' => 
    array (
      0 => 'smarty/templates/templates/loginTeacher.tpl',
      1 => 1380813165,
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
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

<script>
function tips()
{
	alert("请与管理员联系!\nEmail:DB2013SYSU@163.com");
}
</script>

<title>数据库在线答题系统 教师登陆</title>

<link href="/dist/css/bootstrap.css" rel="stylesheet">
<link href="/dist/css/signin.css" rel="stylesheet">
</head>

<body>
<div class="container">
<form class="form-signin" method="post" action="loginTeacher.php">
<h2 class="form-signin-heading"><center>教师登陆</center></h2>
<br />
<input id="tno" name='tno' type="text" class="form-control" placeholder="帐号" autofocus>
<input id='tpassword' name='tpassword' type='password' class="form-control" placeholder="密码">
<p align=left>
<button onclick='tips()' class="btn btn-xs btn-link" type="button">忘记密码</button>
</p>

<p align=left>
<button onclick="location='/docs/teacher/addTeacher.php'" class="btn btn-xs btn-link" type="button">注册</button>
</p>
<button class="btn btn-lg btn-primary btn-block" type="submit">登录</button>
</form>
</div>
</body>
</html>


<!--meta http-equiv="Content-Type" content="text/html; charset=utf-8">

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
<a href="/docs/teacher/addTeacher.php">注册</a-->   
<?php }} ?>