{* Smarty *}
<html>
{include file="teacherHead.tpl"}
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<div class="container">
<center>
<table class="table table-bordered table-striped" border="1">
	<tr><td><center>学生号</center></td>
	<td><center>学生姓名</center></td>
	<td><center>提交时间</center></td>
	<td><center>考试成绩</center></td>
	</tr>
	{foreach $scorelist as $item}
	<tr>
	<td><center>{$item[0]}</center></td>
	<td><center>{$item[1]}</center></td>
	<td><center>{$item[2]}</center></td>
	<td><center>{$item[3]}</center></td>
	</tr>
	{/foreach}
</table>
<input onClick="location='viewAllExam.php'" class="btn btn-primary" type=button name='btn' value="返回">
</center>
</div>
</html>
