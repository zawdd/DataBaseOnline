{* Smarty *}
<html>
{include file="examhead.tpl"}   
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body  oncopy="alert('对不起，本网页禁止复制！');return false;">
<script>
function confirm()
{
	alert("保存成功！请选择下一类题目，继续答题。");
}
</script>
<div class="container">
<p style='color:red'>单选题，每题有唯一答案。</p>
<center>
<form action='chooseProblem.php' method=POST>
<table class="table table-bordered" border='1'>

<tr>
<td><center>题号</center></td>
<td><center>题目内容</center></td>
<td><center>分值</center></td>
</tr>

   		{assign var=i value=0}	
{foreach $chooselist as $item}
	<tr><td><center>{$exercisenumber[$i++]}</center></td>
 		<td>{$item[3]}<br/>
		<input type="radio" name="{$item[0]}_{$userid}_{$hno}" value="A" checked>A
		<input type="radio" name="{$item[0]}_{$userid}_{$hno}" value="B">B
		<input type="radio" name="{$item[0]}_{$userid}_{$hno}" value="C">C
		<input type="radio" name="{$item[0]}_{$userid}_{$hno}" value="D">D
		<br/>
		</td>
		<td><center>{$item[2]}分</center></td>       
	</tr>
{/foreach}
        
</table>
<input onclick='confirm()' class="btn btn-primary" type=submit name='submit' value='保存'><br/></form>
</center>
<hr>
<p style='color:red'>答题完后务必点击保存，否则不计入成绩！</p>
<p style='color:red'>全部答完后点击提交，否则点击放弃返回。</p>
</div>
</body>
</html>

