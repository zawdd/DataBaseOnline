{* Smarty *}
<html>
{include file="examhead.tpl"}   
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<div class="container">
<script>
function confirm()
{
	alert("保存成功！点击提交完成测试。");
}
</script>

<p style='color:red'>操作题，把结果上传到服务器上。</p>
<center>
<form action='fillInTheBlank.php' method=POST>
<table class="table table-bordered" border='1'>

<tr>
<td>题号</td>
<td>题目内容</td>
<td>分值</td>
</tr>

   		{assign var=i value=0}	
{foreach $blanklist as $item}
	<tr><td>{$exercisenumber[$i++]}</td>
 		<td>{$item[3]}<br/>
		<input type="file" name="$userid_$item[0]" id="infile" />		
		<br/>
		</td>
		<td>{$item[2]}分</td>       
	</tr>
{/foreach}
        
</table>
<input onclick='confirm()' class="btn btn-primary" 	type=submit name='submit' value='保存'><br/></form>
</center>
<hr>

<p style='color:red'>答题完后务必点击保存，否则不计入成绩！</p>
<p style='color:red'>全部答完后点击提交，否则点击放弃返回。</p>
</div>
</html>

