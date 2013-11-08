{* Smarty *}
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
