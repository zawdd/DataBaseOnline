 {* Smarty *}
<html>
{include file="adminhead.tpl"}
<form action='addNormalProblem.php' method=POST>
	
	<li><td>cno</td>
	<select name="cno">
		{foreach $chapterlist as $item}
			<option value={$item[0]}>{$item[1]}</option>
		{/foreach}
	</select>
	</tr></li>
	<li><td>ename</td>
	<select name="ename">
		<option value='选择题'>选择题</option>
		<option value='填空题'>填空题</option>
		<option value='问答题'>问答题</option>
	</select>
	</tr></li>
	<li><td>econtent</td>
	<td><textarea type=text name='econtent' rows="10" cols="30"></textarea></td>
	</tr></li>
	<li><td>answer</td>
	<td><textarea type=text name='answer' rows="10" cols="30"></textarea></td>
	</tr></li>
	<li><td>score</td>
	<td><input type=number name='score' min=1></td>
	</tr></li>
	<li><td>style</td>
	<select name="style">
		{foreach $knowledgelist as $item}
			<option value={$item[0]}>{$item[1]}</option>
		{/foreach}
	</select>
	</tr></li>
	<li><td>stage</td>
	<select name="stage">
		<option value='A'>A</option>
		<option value='B'>B</option>
		<option value='C'>C</option>
		<option value='D'>D</option>
	</select>
	</tr></li>

 <input type=submit name='submit' value='提交'><br/></form>
 </html>