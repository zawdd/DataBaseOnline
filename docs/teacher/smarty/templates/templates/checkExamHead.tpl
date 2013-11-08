{*Smarty*}
<html>
<link href="/dist/css/bootstrap.css" rel="stylesheet">
<link href="/dist/css/justified-nav.css" rel="stylesheet">
<script src="/code.jquery.com/jquery.js"></script>
<script src="/dist/js/bootstrap.min.js"></script>
<head>
<script language=javascript>
document.oncontexmenu=new function("envent.returnvalue=false;"); //禁止右键菜单,单击右键将无反应
document.onselectstart=new function("envent.returnvalue=false;"); //禁止拖选,全选,造成网页内容无法用ctrl+c快捷键复制
</script>
</head>
<div class="container">

	<div class="masthead">
	  <h3 class="text-muted">数据库在线答题系统</h3>
	  <ul class="nav nav-justified">
		<li><a href="/docs/teacher/checkChooseProblem.php">查看单选题</a></li>
		<li><a href="/docs/teacher/checkMultiChooseProblem.php">查看多选题</a></li>
		<li><a href="/docs/teacher/checkFillProblem.php">查看填空题</a></li>
	  </ul>
	  </div>
</div>

<hr>

</html>
