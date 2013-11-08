{* Smarty *}
{include file="teacherHead.tpl"}

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<form action='viewAllExamOfaStudent.php' method=POST>
          <tr>
      	  <td>按学号查询其所有考试</td>
      	  <td><input type=text name='snum'></td>
      	  </tr>
<input type=submit name='submit' value='提交'><br/></form>

<tr>学号</tr><tr>姓名</tr>
{foreach $studentlist as $item}
        <li>
        {foreach $item as $key=>$value}
                <tr>{$value}</tr>
        {/foreach}
        </li>
{/foreach}
</ul>

