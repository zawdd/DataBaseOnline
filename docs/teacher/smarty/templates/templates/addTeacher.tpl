{* Smarty *}
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<link href="/dist/css/bootstrap.css" rel="stylesheet">
<link href="/dist/css/justified-nav.css" rel="stylesheet">
<script src="/code.jquery.com/jquery.js"></script>
<script src="/dist/js/bootstrap.min.js"></script>
</html>

<div class="container">
	<div class="masthead">
	<h3 class="text-muted">数据库在线答题系统  教师注册 </h3>
	</div>
</div>

<hr>

<!--meta http-equiv="Content-Type" content="text/html; charset=utf-8"-->
<div class="container">
<body><center>
<form name="RegForm" class="well" action='addTeacher.php' method=POST>
<table class="table table-bordered" border="1">
	<tr>
	<td>帐号*  </td>
	<td><input class="form-control" type=text name='id'></td>
	</tr>

	<tr>
	<td>姓名*  </td>
	<td><input class="form-control" type=text name='name'></td>
	</tr>

	<tr>
	<td>年龄  </td>
	<td><input class="form-control" type=text name='age'></td>	
	</tr>

	<tr>
	<td>民族  </td>
	<td><input class="form-control" type=text name='nation'></td>
	</tr>

	<tr>
	<td>籍贯  </td>
	<td><input class="form-control" type=text name='bp'></td>
	</tr>

	<tr>
	<td>密码*  </td>
	<td><input class="form-control" type=password name='password1'></td>
	</tr>

	<tr>
	<td>重复密码*</td>
	<td><input class="form-control" type=password name='password2'></td>
	</tr>

	<tr>
	<td>所在学校</td>
	<td><input class="form-control" type=text name='school' value="中山大学"></td>
	</tr>

	<tr>
	<td>电子邮件*</td>
	<td><input class="form-control" type=text name='email'></td>
	</tr>

	<tr>
	<td>电话*</td>
	<td><input class="form-control" type=text name='phone'></td>
	</tr>

	<tr>
	<td>研究方向</td>
	<td><input class="form-control" type=text name='search'></td>
	</tr>

	<tr>
	<td>学生人数</td>
	<td><input class="form-control" type=text name='count'></td>
	</tr>

	<tr>
	<td>性别  </td>
	<td><input type="radio" name="sex" value="男" checked>Boy  
		<input type="radio" name="sex" value="女">Girl  </td>
	</tr>

	<!--tr>
	<td>身份  </td>
	        <select name="status">
                        <option value='教师'>教师</option>
                        <option value='学生'>学生</option>
                        <option value='管理员'>管理员</option>
                </select>
	</tr-->

	<tr>
	<td>身份  </td>
	<td><input type="radio" name="status" value="教师" checked>教师
		<input type="radio" name="status" value="学生">学生
		<input type="radio" name="status" value="管理员">管理员</td>
	</tr>

	<tr>
	<td>职称  </td>
	<td><input type="radio" name="pt" value="博士生导师" checked>博士生导师
		<input type="radio" name="pt" value="教授">教授
		<input type="radio" name="pt" value="副教授">副教授
		<input type="radio" name="pt" value="讲师">讲师</td>
	</tr>

	<!--tr>
        <td>职称  </td>
        <select name="pt">
                <option value='博士生导师'>博士生导师</option>
                <option value='教授'>教授</option>
                <option value='副教授'>副教授</option>
                <option value='讲师'>讲师</option>
        </select>
        </tr-->

</table>

<input class="btn btn-primary" type=submit name='submit' value="提  交"><br /></form>
</center>
<hr>
<p style="color:red">*星号选项必填。</p>
<hr>
</body>
</div>
</html>

