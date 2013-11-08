{* Smarty *}
<html>
{include file="teacherHead.tpl"}
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<div class="container">
<center>
<!--form action='viewAllStudentScoreByKnowledge.php' method=POST-->
          <!--tr>
          <td>请输入需要查询的知识点编号</td>
          <td><input type=text name='kno'></td>
          </tr-->
        <!--li><td>要查询的知识点编号</td>
        <select name='kno'>
                {foreach $knowledgelist as $item}
                        <option value={$item[0]}>{$item[1]}</option>
                {/foreach}
        </select>
        </tr></li-->

        <!--li><td>请输入需要查询的知识点编号</td>
        <br />
        {foreach $knowledgelist as $item}
                {$item[1]}
                <input type="checkbox" name="kno[]" value={$item[0]} />
                <br />
        {/foreach}
        </tr></li>


<input type=submit name='submit' value='提交'><br/></form>

<ul>
<li>
	<th>学生号</th>
	<th>学生姓名</th>
	<th>提交时间</th>
	<th>考试成绩</th>
</li>

{foreach $scorelist as $item}
        <li>
        {foreach $item as $key=>$value}
                <th>{$value}</th>
        {/foreach}
        </li>
{/foreach}
</ul-->
<table class="table table-bordered table-striped" border="1">
	<tr><td><center>学生号</center></td>
	<td><center>学生姓名</center></td>
	<td><center>提交时间</center></td>
	<td><center>考试成绩</center></td></tr>
	{foreach $scorelist as $item}
	<tr>
	<td><center>{$item[0]}</center></td>
	<td><center>{$item[1]}</center></td>
	<td><center>{$item[2]}</center></td>
	<td><center>{$item[3]}</center></td>
	</tr>
	{/foreach}
</table>
<input onClick="location='viewAllKnowledge.php'" class="btn btn-primary" type=button name='btn' value="返回">
