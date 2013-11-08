{* Smarty *}
<html>
{include file="adminhead.tpl"}
Chapter List

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<ul>
{foreach $chapterlist as $item}
	<li>
	{foreach $item as $key=>$value}
		<th>{$value}</th>
	{/foreach}
	</li>
{/foreach}
</ul>
<form action='addChapter.php' method=POST>
          <tr>
      	  <td>请输入需要增加的章节编号</td>
      	  <td><input type=text name='cno'></td>
      	  </tr>
      	  <tr>
      	  <td>请输入需要增加的章节名</td>
      	  <td><input type=text name='cname'></td>
      	  </tr>
      	 
    
 <input type=submit name='submit value='提交'><br/></form>
 </html>