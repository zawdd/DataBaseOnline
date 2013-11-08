{* Smarty *}
{include file="teacherHead.tpl"}
Student Exam Infomation List

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<form action='checkStudentExam.php' method=POST>

          <tr>
          <td>请输入需要查询的考试编号</td>
          <td><input type=text name='eno'></td>
          </tr>


<input type=submit name='submit' value='确定'><br/></form>

<ul>
{foreach $studentinfolist as $item}
        <li>
        {foreach $item as $key=>$value}
                <th>{$value}</th>
        {/foreach}
        </li>
{/foreach}
</ul>

