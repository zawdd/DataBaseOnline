{* Smarty *}
<html>
{include file="teacherHead.tpl"}

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<div class="container">
<center>
<form action='viewAllExamOfaStudent.php' method=POST>
<table class="table table-bordered table-striped" border="1">
	<tr><td><center>学号</center></td>
	<td><center>姓名</center></td>
	<td><center>操作</center></td></tr>
	{foreach $studentlist as $item}
	<tr>
	<td><center>{$item[0]}</center></td>
	<td><center>{$item[1]}</center></td>
	{assign var=i value=$item[0]}
	{$snum=0}
	<td><center><a href="/docs/teacher/viewAllExamOfaStudent.php?$snum={$i}">查看考试情况</a></center></td>
	</tr>
	{/foreach}
</table>
</form>
</center>
<hr>
</div>
          <!--tr>
      	  <td>按学号查询其所有考试</td>
      	  <td><input type=text name='snum'></td>
      	  </tr-->
<!--input type=submit name='submit' value='提交'><br/></form-->

<!--tr>学号</tr><tr>姓名</tr>
{foreach $studentlist as $item}
	<tr>
        <li>
        {foreach $item as $key=>$value}
                <tr>{$value}</tr>
        {/foreach}
        </li>
{/foreach}
</ul-->
</html>
