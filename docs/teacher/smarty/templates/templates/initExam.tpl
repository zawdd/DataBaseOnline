{* Smarty *}
<html>
{include file="teacherHead.tpl"}
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<div class="container">
<body><center>
<form name="initForm" class="well" action='initExam.php' method=POST>
<table class="table table-bordered" border="1">
	<tr>
	<td>章节编号</td>
	<td>
	{foreach $chapterlist as $item}
	<input type="checkbox" name="cnum[]" value={$item[0]} />{$item[1]}
	{/foreach}
	</td>
	</tr>
	
	<tr>
	<td>知识点编号</td>
	<td>
	{foreach $knowledgelist as $item}
	<input type="checkbox" name="knum[]" value={$item[0]} />{$item[1]}
	{/foreach}
	</td>
	</tr>

	<tr>
	<td>试卷名称</td>
	<td><input class="form-control" type=text name='name'></td>
	</tr>

	<tr>
	<td>截止日期(0000-00-00)</td>
	<td><input class="form-control" type=text name='deadline'></td>
	</tr>

	<tr>
	<td>考试时间</td>
	<td><input class="form-control" type=text name='time'></td>
	</tr>

	<tr>
	<td>单选题数目</td>
	<td><input class="form-control" type=number name="numa" min=0></td>
	</tr>

	<tr>
	<td>多选题数目</td>
	<td><input class="form-control" type=number name="numb" min=0></td>
	</tr>

	<tr>
	<td>填空题数目</td>
	<td><input class="form-control" type=number name="numc" min=0></td>
	</tr>

	<tr>
	<td>考试难度</td>
	<td><input type="radio" name="stage" value="A" checked>A
		<input type="radio" name="stage" value="B">B
		<input type="radio" name="stage" value="C">C
		<input type="radio" name="stage" value="D">D</td>
	</tr>

	<tr>
	<td>试卷类型</td>
	<td><input type="radio" name="final" value="1">考试
		<input type="radio" name="final" value="0">作业</td>
	</tr>

</table>

<input class="btn btn-primary" type=submit name='submit' value="生成试卷"><br />
</form>
</center>
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

<form action='initExam.php' method=POST>
        <li><td>章节编号</td>
        <br />
        {foreach $chapterlist as $item}
                {$item[1]}
                <input type="checkbox" name="cnum[]" value={$item[0]} />
                <br />
        {/foreach}
        </tr></li>

        <li><td>知识点编号</td>
        <br />
        {foreach $knowledgelist as $item}
                {$item[1]}
                <input type="checkbox" name="knum[]" value={$item[0]} />
                <br />
        {/foreach}
        </tr></li>

	<li>
      	  <tr>
      	  <td>考试名称</td>
      	  <td><input type=text name='name'></td>
      	  </tr>
	</li>
        
	<li>
          <tr>
          <td>截止日期(0000-00-00)</td>
          <td><input type=text name='deadline'></td>
          </tr>
        </li>

        <li>
          <tr>
          <td>考试用时</td>
          <td><input type=text name='time'></td>
          </tr>
        </li>
        
	<li><td>考试难度</td>
        <select name='stage'>
                <option value='A'>A</option>
                <option value='B'>B</option>
                <option value='C'>C</option>
                <option value='D'>D</option>
        </select>
        </tr></li>

        <li>
          <tr>
          <td> 单选题数目</td>
          <td><input type=number name="numa" min=0></td>
          </tr>
        </li>

        <li>
          <tr>
          <td> 多选题数目</td>
          <td><input type=number name="numb" min=0></td>
          </tr>
        </li>

        <li>
          <tr>
          <td> 填空题数目</td>
          <td><input type=number name="numc" min=0></td>
          </tr>
        </li>

        <li>
          <tr>
          <td> 简答题数目</td>
          <td><input type=number name="short" min=0></td>
          </tr>
        </li>

        <li>
          <tr>
          <td> 操作题数目</td>
          <td><input type=number name="operate" min=0></td>
          </tr>
        </li>


 <input type=submit name='submit' value='提交'><br/></form-->
