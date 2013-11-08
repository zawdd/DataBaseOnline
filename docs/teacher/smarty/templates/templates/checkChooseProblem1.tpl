{* Smarty *}
<html>
{include file="checkExamHead.tpl"}
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body oncopy="alert('对不起,本网页禁止复制!');return false;">
<script>
function confirm()
{
	alert("保存成功!请选择下一类题目查看分数")
}
</script>
<div class="container">
<p style='color:red'>单选题，每题有唯一答案。</p>
<center>
<form action='checkChooseProblem.php' method=POST>
<table class="table table-bordered" border='1'>

<tr>
<td><center>题号</center></td>
<td><center>题目内容</center></td>
<td><center>作答答案</center></td>
<td><center>标准答案</center></td>
<td><center>分值</center></td>
<td><center>得分</center></td>
<!--td><center>操作</center></td-->
</tr>

{foreach $examlist as $item}
	<tr><td><center>{$item[0]}</center></td>
		<td>{$item[1]}</td>
		<td><center>{$item[4]}</center></td>
		<td><center>{$item[2]}</center></td>
		<td><center>{$item[3]}分</center></td>
		<td><center><input type=text size="2" name="{$item[0]}_{$snum}_{$eno}" value="{$item[5]}"></center></td><-->
	<!--p>	{assign var=i value=$item[0]}
		{$cno=0}</p-->
		<td><center><a href="/docs/teacher/changeNormalScore.php?$cno={$i}">修改得分</a></center></td>
	</tr>
	{/foreach}
</table>
<input onclick='confirm()' class="btn btn-primary" type=submit name='submit' value='提交修改'><br />
</form>
</center>
<hr>
<p style='color:red'>全部修改完后务必点击"提交修改"进行保存！</p>
</div>
</body>
</html>
	

