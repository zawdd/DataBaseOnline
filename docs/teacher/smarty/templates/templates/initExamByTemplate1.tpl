{* Smarty *}
Exam List

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<ul>
{foreach $examlist as $item}
        <li>
        {foreach $item as $key=>$value}
                <th>{$value}</th>
        {/foreach}
        </li>
{/foreach}
</ul>


Template List
<li>
 <th>模版id</th>
 <th>模版名称</th>
 <th>章节数组</th>
 <th>知识点数组</th>
 <th>难度系数</th>
 <th>单选题数目</th>
 <th>多选题数目</th>
 <th>填空题数目</th>
 <th>操作题数目</th>
 <th>简答题数目</th>
</li>
<br />
<ul>
{foreach $template as $item}
	<li>
	{foreach $item as $key=>$value}
		<th>{$value}</th>
	{/foreach}
	</li>
{/foreach}
</ul>

<form action='initExamByTemplate.php' method=POST>
	<li>
	 <tr>
	 <td>选择试卷模版</td>
	 <td><input type=text name='templatename'></td>
	 </tr>
	</li>

	<li>
	 <tr>
	 <td>截止日期</td>
	 <td><input type=text name='deadline'></td>
	 </tr>
	</li>

        <li>
         <tr>
         <td>考试时间</td>
         <td><input type=text name='time'></td>
         </tr>
        </li>

        <li>
         <tr>
         <td>考试名称</td>
         <td><input type=text name='ename'></td>
         </tr>
        </li>

<input type=submit name='submit' value='提交'><br /></form>
