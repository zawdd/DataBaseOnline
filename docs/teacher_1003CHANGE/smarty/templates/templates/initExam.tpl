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


 <input type=submit name='submit' value='提交'><br/></form>
