{* Smarty *}
View All Student Score By Chapter

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<form action='viewAllStudentScoreByChapter.php' method=POST>
          <!--tr>
          <td>请输入需要查询的章节编号</td>
          <td><input type=text name='cno'></td>
          </tr-->
        <!--li><td>要查询的章节编号</td>
        <select name='cno'>
                {foreach $chapterlist as $item}
                        <option value={$item[0]}>{$item[1]}</option>
                {/foreach}
        </select>
        </tr></li-->
        <li><td>请输入需要查询的章节编号</td>
        <br />
        {foreach $chapterlist as $item}
                {$item[1]}
                <input type="checkbox" name="cno[]" value={$item[0]} />
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
</ul>
