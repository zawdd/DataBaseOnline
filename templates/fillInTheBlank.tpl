{* Smarty *}
<html>
{include file="examhead.tpl"}   
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body  oncopy="alert('对不起，本网页禁止复制！');return false;">
<div class="container">
<script>
function confirm()
{
	alert("保存成功！点击提交完成测试。");
}
</script>

<p style='color:red'>填空题, 根据空的编号填入对应输入框中。</p>
<center>
<form action='fillInTheBlank.php' method=POST>
<table class="table table-bordered" border='1'>

<tr>
<td><center>题号</center></td>
<td><center>题目内容</center></td>
<td><center>分值</center></td>
</tr>

   		{assign var=i value=0}	
{foreach $blanklist as $item}
	<tr><td><center>{$exercisenumber[$i++]}</center></td>
 		<td>{$item[3]}<br/>
		{section name=arr start=0 loop=$item[4] step=1}
		[{$smarty.section.arr.index+1}]
		<input type=text size=10 name="{$item[0]}_{$userid}_{$hno}_{$smarty.section.arr.index}"><br/>
		{/section}
		<br/>
		</td>
		<td><center>{$item[2]}分</center></td>       
	</tr>
{/foreach}
        
</table>
<input onclick='confirm()' class="btn btn-primary" 	type=submit name='submit' value='保存'><br/></form>
</center>
<hr>

<p style='color:red'>答题完后务必点击保存，否则不计入成绩！</p>
<p style='color:red'>全部答完后点击提交，否则点击放弃返回。</p>
</div>
</body>
</html>

