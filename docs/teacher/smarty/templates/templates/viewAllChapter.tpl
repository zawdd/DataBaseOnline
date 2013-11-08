{* Smarty *}
<html>
{include file="teacherHead.tpl"}

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<div class="container">
<center>
<form action='viewAllStudentScoreByChapter.php' method=POST>
<table class="table table-bordered table-striped" border="1">
	<tr><td><center>章节号</center></td>
	<td><center>章节名称</center></td>
	<td><center>统计</center></td></tr>
	{foreach $chapterlist as $item}
	<tr>
	<td><center>{$item[0]}</center></td>
	<td><center>{$item[1]}</center></td>
	<td><center><input type="checkbox" name="cno[]" value={$item[0]} /></center></td>
	</tr>
	{/foreach}
</table>
<input class="btn btn-primary" type=submit name='submit' value='查看考试情况'><br />
</form>
</center>
<hr>
<p style='color:red'>在复选框内选择需要查看的章节统计学生成绩。</p>
</div>
</body>
</html>


<!--ul>
<li>
	<th>章节号</th>
	<th>章节名</th>
</li>

{foreach $chapterlist as $item}
        <li>
        {foreach $item as $key=>$value}
                <th>{$value}</th>
        {/foreach}
        </li>
{/foreach}
</ul-->
