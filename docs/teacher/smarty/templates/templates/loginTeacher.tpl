{* Smarty *}
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
