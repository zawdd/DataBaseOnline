{*Smarty*}
<html>
<link href="/dist/css/bootstrap.css" rel="stylesheet">
 <link href="/dist/css/justified-nav.css" rel="stylesheet">
<script src="/dist/js/jquery.js"></script>
<script src="/dist/js/bootstrap.min.js"></script>
<head>
<script language=javascript>
document.oncontextmenu=new function("event.returnvalue=false;"); //禁止右键菜单,单击右键将无任何反应
document.onselectstart=new function("event.returnvalue=false;"); //禁止拖选、全选,造成网页内容无法用 ctrl+c 快捷键复制
</script>
</head>
<div class="container">

      <div class="masthead">
        <h3 class="text-muted">数据库在线答题系统</h3>
        <ul class="nav nav-justified">
          <li><a href="/docs/chooseProblem.php">单选题</a></li>
          <li><a href="/docs/mchooseProblem.php">多选题</a></li>
          <li><a href="/docs/fillInTheBlank.php">填空题</a></li>
          <li><a href="/docs/calculateScore.php">提交</a></li>
          <li><a href="/docs/showSelfInformation.php">放弃</a></li>
        </ul>
	</div>
</div>
      
<hr>

</html>
