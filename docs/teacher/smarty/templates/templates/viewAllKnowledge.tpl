{* Smarty *}
<html>
{include file="teacherHead.tpl"}

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<div class="container">
<center>
<form action='viewAllStudentScoreByKnowledge.php' method=POST>
<table class="table table-bordered table-striped" border="1">
	<tr><td><center>知识点号</center></td>
	<td><center>知识点名称</center></td>	
	<td><center>统计</center></td></tr>
	{foreach $knowledgelist as $item}
	<tr>
	<td><center>{$item[0]}</center></td>
	<td><center>{$item[1]}</center></td>
	<td><center><input type="checkbox" name="kno[]" value={$item[0]}></center></td>
	</tr>
	{/foreach}
</table>
<input class="btn btn-primary" type=submit name='submit' value="查看考试情况"><br /> 
<!--ul>
<li>
	<th>知识点号</th>
	<th>知识点名</th>
</li>

{foreach $knowledgelist as $item}
        <li>
        {foreach $item as $key=>$value}
                <th>{$value}</th>
        {/foreach}
        </li>
{/foreach}
</ul>
