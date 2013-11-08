{* Smarty *}
<html>
{include file="studenthead.tpl"}   
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<div class="container">
<center>
<form action='selectExam.php' method=POST>
<table class="table table-bordered table-striped" border="1">
	{$b=1}
	<tr><td><center>序号</center></td>
	<td><center>作业名称</center></td>
	<td><center>截止日期</center></td>
	<td><center>操作</center></td></tr>
        {foreach $examlist as $item}
	<tr>
	<td><center>{$b++}</center></td>
	<td><center>{$item[1]}</center></td>
	<td><center>{$item[2]}</center></td>
        {assign var=i value=$item[0]}
        {$examid=0}
    <td><center><a href="/docs/chooseProblem.php?$examid={$i}">开始</a></center></td>
	</tr>
        {/foreach}
</table>
</form>
</center>
<hr>
<p style="color:red">请在截止日期之前进行答题。</p>
</div>

</html>
