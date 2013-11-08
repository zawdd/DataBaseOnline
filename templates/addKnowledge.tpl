{* Smarty *}
<html>
{include file="adminhead.tpl"}
Knowledge List

<ul>
{foreach $knowledgelist as $item}
	<li>
	{foreach $item as $key=>$value}
		<th>{$value}</th>
	{/foreach}
	</li>
{/foreach}
</ul>
<form action='addKnowledge.php' method=POST>
      	  <tr>
      	  <td>请输入需要增加的知识点</td>
      	  <td><input type=text name='kname'></td>
      	  </tr>
      	 
    
 <input type=submit name='submit' value='提交'><br/></form>
 </html>