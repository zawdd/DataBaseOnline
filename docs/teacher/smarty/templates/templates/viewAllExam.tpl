{* Smarty *}
<html>
{include file="teacherHead.tpl"}

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<div class="container">
<center>
<table class="table table-bordered table-striped" border="1">
	<tr><td><center>序号</center></td>
	<td><center>名称</center></td>
	<td><center>章节</center></td>
	<td><center>知识点</center></td>
	<td><center>难度</center></td>
	<td><center>发布时间</center></td>
	<td><center>截止时间</center></td>
	<td><center>操作</center></td>
	</tr>
	{$b=1}
	{foreach $examlist as $item}
	<tr>
	<td><center>{$b++}</center></td>
	<td><center>{$item[1]}</center></td>
	<td><center>{$item[2]}</center></td>
	<td><center>{$item[3]}</center></td>
	<td><center>{$item[4]}</center></td>
	<td><center>{$item[5]}</center></td>
	<td><center>{$item[6]}</center></td>
	{assign var=i value=$item[0]}
	{$examid=0}
	<td><center><a href="/docs/teacher/viewStudentScore.php?$examid={$i}">查看</a></center></td>
	</tr>
	{/foreach}
</table>
</form>
</center>
<hr>
</div>
</html>
<!--ul>
<li>
	<th>考试号</th>
	<th>名称</th>
	<th>章节</th>
	<th>知识点</th>
	<th>难度</th>
	<th>发布时间</th>
	<th>截止时间</th>
	<th>考试用时</th>
</li>

{foreach $examlist as $item}
        <li>
        {foreach $item as $key=>$value}
                <th>{$value}</th>
        {/foreach}
        </li>
{/foreach}
</ul-->
