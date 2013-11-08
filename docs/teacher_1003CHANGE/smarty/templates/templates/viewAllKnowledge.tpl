{* Smarty *}
{include file="teacherHead.tpl"}
Knowledge List

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<ul>
<li>
	<th>知识点号</th>
	<th>知识点名</th>
</li>

{foreach $knowledgelist as $item}
        <li>
        {foreach $item as $key=>$value}
                <th>{$value}</th>
        {/foreach}
        </li>
{/foreach}
</ul>
