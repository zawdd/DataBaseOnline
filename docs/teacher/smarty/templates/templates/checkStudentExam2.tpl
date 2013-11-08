{* Smarty *}
<html>
{include file="teacherHead.tpl"}	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script>
function confirm()
{
        alert("修改成功!")
}
</script>
<!--form action='changeNormalScore.php' method=POST>

        <li>
          <tr>
          <td>请输入需要修改的题号</td>
          <td><input type=text name='cno'></td>
          </tr>
        </li>
        <li>
          <tr>
          <td>请输入需要修改的分数(不得大于题目分值)</td>
          <td><input type=text name='cscore'></td>
          </tr>
        </li>
<input type=submit name='submit' value='确定'><br/></form-->

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
<!--td><center>修改得分</center></td-->
</tr>

{foreach $examlist as $item}
	<tr><td><center>{$item[0]}</center></td>
		<td>{$item[1]}</td>
		<td><center>{$item[4]}</center></td>
		<td><center>{$item[2]}</center></td>
		<td><center>{$item[3]}分</center></td>
		<!--td><center>{$item[5]}</center></td-->
		<td><center><input type=text size=2 name="{$item[0]}_{$snum}_{$eno}" value="{$item[5]}"><center></td>
		
	</tr>
{/foreach}
</table>
<input onclick='confirm()' class="btn btn-primary" type=submit name='submit' value='提交修改'><br />
</form>
</center>
<hr>
<p style='color:red'>全部修改完后务必点击"提交修改"进行保存!</p>
</div>
</body>
</html>
<!--form action='changeNormalScore.php' method=POST>
	<li>
          <tr>
          <td>请输入需要修改的题号</td>
          <td><input type=text name='cno'></td>
          </tr>
	</li>
	<li>
          <tr>
          <td>请输入需要修改的分数(不得大于题目分值)</td>
          <td><input type=text name='cscore'></td>
          </tr>
	</li>
<input type=submit name='submit' value='确定'><br/></form-->

<!--ul>
<li>
<th>题号</th>
<th>内容</th>
<th>标准答案</th>
<th>分值</th>
<th>作答答案</th>
<th>得分</th>
</li>
</ul>






</ul>

<ul>
{foreach $examlist as $item}
        <li>
        {foreach $item as $key=>$value}
                <th>{$value}</th>
        {/foreach}
        </li>
{/foreach}
</ul-->

