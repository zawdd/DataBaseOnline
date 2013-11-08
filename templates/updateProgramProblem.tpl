 
 {* Smarty *}
<html>
{include file="adminhead.tpl"}
{*<ul>
{foreach $psrow as $key=>$value}
	<li>{$value}</li>
{/foreach}
</ul>*}

<form action='updateProblem.php' method=POST>

	<li><td>problemid: {$psrow[0]}</td>
	<td><input type=text name='pid' value={$psrow[0]} style=display:none ></td>
	</tr></li>
	<li><td>chaptername</td>
	<select name="chaptername">
		{foreach $chapterlist as $item}
		{if $item[0] == $psrow[1]}
			<option value={$item[0]} selected="selected">{$item[1]}</option>
		{else}
			<option value={$item[0]}>{$item[1]}</option>
		{/if}
		{/foreach}
	</select>
	</tr></li>
	<li><td>knowledgename</td>
	<select name="knowledgename">
		{foreach $knowledgelist as $item}
		{if $item[0] == $psrow[8]}
			<option value={$item[0]} selected="selected">{$item[1]}</option>
		{else}
			<option value={$item[0]}>{$item[1]}</option>
		{/if}
		{/foreach}
	</select>
	</tr></li>
	<li><td>econtent</td>
	<td><textarea type=text name='econtent' rows="10" cols="30">{$psrow[2]}</textarea></td>
	</tr></li>
	<li><td>answer</td>
	<td><textarea type=text name='answer' rows="10" cols="30">{$psrow[3]}</textarea></td>
	</tr></li>
	<li><td>score</td>
	<td><input type=number name='score' value={$psrow[6]} min=1></td>
	</tr></li>
	<li><td>stage</td>
	<select name="stage">
		<option value='A' {if $psrow[7] == "A"} selected="selected" {/if} >A</option>
		<option value='B' {if $psrow[7] == "B"} selected="selected" {/if} >B</option>
		<option value='C' {if $psrow[7] == "C"} selected="selected" {/if} >C</option>
		<option value='D' {if $psrow[7] == "D"} selected="selected" {/if} >D</option>
	</select>
	</tr></li>

 <input type=submit name='submit' value='提交'><br/></form>
 </html>