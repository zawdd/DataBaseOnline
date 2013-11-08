{* Smarty *}
{include file="teacherHead.tpl"}
Exam List

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<ul>
<li>
	<th>考试号</th>
	<th>名称</th>
	<th>章节</th>
	<th>知识点</th>
	<th>难度</th>
	<th>发布时间</th>
	<th>截止时间</th>
	<th>考试用时</th>
</li>

{foreach $examlist as $item}
        <li>
        {foreach $item as $key=>$value}
                <th>{$value}</th>
        {/foreach}
        </li>
{/foreach}
</ul>
