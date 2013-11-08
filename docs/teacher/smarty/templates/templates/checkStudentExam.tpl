{* Smarty *}
<html>
{include file="teacherHead.tpl"}	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<div class="container">
<center>
<form action='changeNormalScore.php' method=POST>
<table class="table table-bordered" border='1'>

<tr>
<td><center>题号</center></td>
<td><center>题目内容</center></td>
<td><center>作答答案</center></td>
<td><center>标准答案</center></td>
<td><center>分值</center></td>
<td><center>修改得分</center></td>
</tr>

{foreach $examlist as $item}
	<tr><td><center>{$item[0]}</center></td>
		<td>{$item[1]}</td>
		<td><center>{$item[4]}</center></td>
		<td><center>{$item[2]}</center></td>
		<td><center>{$item[3]}分</center></td>
		<td><center><input type=text size=2 name="{$item[0]}_{$snum}_{$eno}" style='color:red' value="{$item[5]}"><center></td>
		
	</tr>
{/foreach}
</table>
<input class="btn btn-primary" type=submit name='submit' value='提交修改'><br />

</form>
</center>
<hr>
<p style='color:red'>全部修改完后务必点击"提交修改"进行保存!</p>
</div>
</body>
</html>
