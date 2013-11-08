 {* Smarty *}
<html>
{include file="adminhead.tpl"}

<li>{$psrow[2]}</li>
<li>score {$psrow[6]}</li>
<li>nandu {$psrow[7]}</li>

<form action='answerProgramProblem.php' method=POST>
<textarea type=text name='answer' rows="10" cols="50"></textarea>

<input type=submit name='submit' value='提交'><br/></form>
 
