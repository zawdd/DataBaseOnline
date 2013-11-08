{* Smarty *}
<html>
{include file="studenthead.tpl"} 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<div class="container">
<center>
<table class="table table-bordered table-striped" border="1">
{$i=1}
<tr><td><center>序号</center></td>
<td><center>名称</center></td>
<td><center>成绩</center></td>
<td><center>查看答案</center></td>
<td><center>操作</center></td></tr>
{foreach $examlist as $item}
	<tr>
		<td><center>{$i++}</center></td>
		<td><center>{$item[1]}</center></td>
        <td><center>{$item[2]}</center></td>
      	<td><center><a href="/docs/lookOneExamAnswer.php?$examid={$item[0]}">查看</a></center></td>
		{if $item[3]==0}		
		<td><center><a href="/docs/chooseProblem.php?$examid={$item[0]}">重做</a></center></td>
		{else}
		<td></td>
		{/if}
    </tr>
{/foreach}
</table>
</center>
<hr>
<p style="color:red">平时作业可以重做，考试不能重做。</p>
</div>
</html>
