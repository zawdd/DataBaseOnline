{* Smarty *}
{include file="teacherHead.tpl"}	

ExamAnswerForStudent
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<form action='changeNormalScore.php' method=POST>
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
<input type=submit name='submit' value='确定'><br/></form>

<ul>
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
</ul>

