{* Smarty *}
<html>
{include file="examhead.tpl"}     
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
简答题
<form action='shortAnswerQuestions.php' method=POST>
	{assign var=i value=0 }
        {foreach $simplelist as $item}
	<li><tr><td>题号：</td><td>{$exercisenumber[$i++]}</td><br>
        <td>难度系数：</td><td>{$item[1]}</td><br>
        <td>分值：</td><td>{$item[2]}</td><br>
        <td>{$item[3]}</td></tr><br>
        <td>答案</td>
        <td><textarea type=text name="{$item[0]}_{$userid}_{$hno}" rows="10" cols="40"></textarea></td>

	</tr></li>
{/foreach}
        <input type=submit name='submit' value='保存'><br/></form>
</html>
