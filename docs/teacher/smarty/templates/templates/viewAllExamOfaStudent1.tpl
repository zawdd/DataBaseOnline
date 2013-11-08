{* Smarty *}
<html>
{include file="teacherHead.tpl"}

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<div class="container">
<center>
<form action='viewAllExamOfaStudent.php' method=POST>
<!--form action='checkStudentExam.php' method=POST-->
<table class="table table-bordered table-striped" border="1">
	{$b=1}
	<tr><td><center>序号</center></td>
	<td><center>学号</center></td>
	<td><center>姓名</center></td>
	<td><center>考试名称</center></td>
	<td><center>提交时间</center></td>
	<td><center>考试成绩</center></td>
	<td><center>操作</center></td></tr>

	{foreach $studentinfolist as $item}
	<tr>
	<td><center>{$b++}</center></td>
	<td><center>{$item[0]}</center></td>
	<td><center>{$item[1]}</center></td>
	<td><center>{$item[3]}</center></td>
	<td><center>{$item[4]}</center></td>
	<td><center>{$item[5]}</center></td>
	{assign var=i value=$item[2]}
	{$eno=0}
	<!--td><center><a href="/docs/teacher/checkStudentExam.php?$eno={$i}">查看</a></center></td-->
	<td><center><a href="/docs/teacher/checkStudentExam.php?$eno={$i}">查看</a></center></td>
	</tr>
	{/foreach}
</table>
</form>
</center>
<hr>
</div>
          <!--tr>
          <td>请输入需要查询的考试编号</td>
          <td><input type=text name='eno'></td>
          </tr>


<input type=submit name='submit' value='确定'><br/></form>

<ul>
{foreach $studentinfolist as $item}
        <li>
        {foreach $item as $key=>$value}
                <th>{$value}</th>
        {/foreach}
        </li>
{/foreach}
</ul-->
</html>

