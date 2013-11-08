{* Smarty *}
<ul>
{foreach $psrow as $key=>$value}
	<li>{$value}</li>
{/foreach}
</ul>

<form action='updateProblem.php' method=POST>

	<li><td>problemid</td>
	<td><input type=text name='pid'></td>
	</tr></li>
	<li><td>chaptername</td>
	<td><input type=text name='chaptername'></td>
	</tr></li>
	<li><td>knowledgename</td>
	<td><input type=text name='knowledgename'></td>
	</tr></li>
	<li><td>econtent</td>
	<td><input type=text name='econtent'></td>
	</tr></li>
	<li><td>answer</td>
	<td><input type=text name='answer'></td>
	</tr></li>
	<li><td>intxt</td>
	<td><input type=text name='intxt'></td>
	</tr></li>
	<li><td>outtxt</td>
	<td><input type=text name='outtxt'></td>
	</tr></li>
	<li><td>score</td>
	<td><input type=text name='score'></td>
	</tr></li>
	<li><td>stage</td>
	<td><input type=text name='stage'></td>
	</tr></li>

 <input type=submit name='submit' value='提交'><br/></form>
