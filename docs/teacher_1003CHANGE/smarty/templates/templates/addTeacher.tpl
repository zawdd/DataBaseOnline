{* Smarty *}
Teacher List

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<ul>
{foreach $teacherlist as $item}
	<li>
	{foreach $item as $key=>$value}
		<th>{$value}</th>
	{/foreach}
	</li>
{/foreach}
</ul>
<form action='addTeacher.php' method=POST>
	<li>
	<tr>
	<td>帐号</td>
	<td><input type=text name='id'></td>
	</tr>
	</li>
	<li>
        <tr>
        <td>姓名</td>
        <td><input type=text name='name'></td>
        </tr>
	</li>
	<!--li>
        <tr>
        <td>性别</td>
        <td><input type=text name='sex'></td>
		<select name="sex">
                	<option value='男'>男</option>
                	<option value='女'>女</option>
        	</select>
        </tr>
	</li-->
	<li>
        <tr>
        <td>年龄</td>
        <td><input type=text name='age'></td>
        </tr>
	</li>
	<li>
        <tr>
        <td>民族</td>
        <td><input type=text name='nation'></td>
        </tr>
	</li>
	<li>
        <tr>
        <td>籍贯</td>
        <td><input type=text name='bp'></td>
        </tr>
	</li>
	<li>
        <tr>
        <td>密码</td>
        <td><input type=password name='password'></td>
        </tr>
	</li>
	<li>
        <tr>
        <td>学校</td>
        <td><input type=text name='school'></td>
        </tr>
	</li>
	<li>
        <tr>
        <td>Email</td>
        <td><input type=text name='email'></td>
        </tr>
        </li>
        <li>
        <tr>
        <td>电话</td>
        <td><input type=text name='phone'></td>
        </tr>
        </li>

	<!--li>
        <tr-->
        <!--td>身份</td>
        <td><input type=text name='status'></td>
	        <select name="status">
                	<option value='教师'>教师</option>
                	<option value='学生'>学生</option>
                	<option value='管理员'>管理员</option>
        	</select>
        </tr>
	</li-->
	<!--li>
        <tr>
        <td>职称</td>
        <td><input type=text name='pt'></td>
        <select name="pt">
                <option value='博士生导师'>博士生导师</option>
                <option value='教授'>教授</option>
                <option value='副教授'>副教授</option>
                <option value='讲师'>讲师</option>
        </select>
        </tr>
	</li-->
	<li>
        <tr>
        <td>研究方向</td>
        <td><input type=text name='search'></td>
        </tr>
	</li>
	<li>
        <tr>
        <td>学生人数</td>
        <td><input type=text name='count'></td>
        </tr>
	</li>
	<li>
        <tr>
        <td>性别</td>
        <!--td><input type=text name='sex'></td-->
                <select name="sex">
                        <option value='男'>男</option>
                        <option value='女'>女</option>
                </select>
        </tr>
        </li>
        <li>
        <tr>
        <td>身份</td>
        <!--td><input type=text name='status'></td-->
                <select name="status">
                        <option value='教师'>教师</option>
                        <option value='学生'>学生</option>
                        <option value='管理员'>管理员</option>
                </select>
        </tr>
        </li>
        <li>
        <tr>
        <td>职称</td>
        <!--td><input type=text name='pt'></td-->
        <select name="pt">
                <option value='博士生导师'>博士生导师</option>
                <option value='教授'>教授</option>
                <option value='副教授'>副教授</option>
                <option value='讲师'>讲师</option>
        </select>
        </tr>
        </li>


<input type=submit name='submit' value='提交'><br /></form>

