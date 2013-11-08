{* Smarty *}
<html>
{include file="teacherHead.tpl"}
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<div class="container">
<body>
<form action='initExamByTemplate.php' class="well" name="templateForm" method=POST>
<table class="table table-bordered table-striped" border="1">
	{$b=1}
	<tr><td><center>模版id</center></td>
	<td><center>模版名称</center></td>
	<td><center>章节数组</center></td>
	<td><center>知识点数组</center></td>
	<td><center>难度系数</center></td>
	<td><center>单选题数目</center></td>
	<td><center>多选题数目</center></td>
	<td><center>填空题数目</center></td>
	<td><center>选择模版</center></td>
		</tr>
	{foreach $template as $item}
	<tr>
	<td><center>{$b++}</center></td>
	<td><center>{$item[1]}</center></td>
	<td><center>{$item[2]}</center></td>
	<td><center>{$item[3]}</center></td>
	<td><center>{$item[4]}</center></td>
	<td><center>{$item[5]}</center></td>
	<td><center>{$item[6]}</center></td>
	<td><center>{$item[7]}</center></td>
	<td><center><input type="radio" name="templatename" value={$item[0]}></center></td>
	</tr>
	{/foreach}
</table>

<tr>
<td>考试名称<input class="form-control" type=text name='ename'></td>
</tr>
<br />
<tr>
<td>考试时间</td>
<td><input class="form-control" type=text name='time'></td>
</tr>
<br />
<tr>
<td>截止日期</td>
<td><input class="form-control" type=text name='deadline'></td>
</tr>

<br />
<tr>
<td>试卷类型</td>
<td><input type="radio" name="final" value="1">考试
	<input type="radio" name="final" value="0">作业</td>
</tr>
<br />
<br />
<br />
<center><input class="btn btn-primary" type=submit name='submit' value="生成试卷"></center><br /></form>
<hr>
</body>
</html>

<!--ul>
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

<input type=submit name='submit' value='提交'><br /></form-->
