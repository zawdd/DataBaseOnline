{*Smarty*}

<html>
<link href="/dist/css/bootstrap.css" rel="stylesheet">
<link href="/dist/css/justified-nav.css" rel="stylesheet">
<script src="/code.jquery.com/jquery.js"></script>
<script src="/dist/js/bootstrap.mim.js"></script>

<div class="container">

	<div class="masthead">
	  <h3 class="text-muted">数据库在线答题系统</h3>
	  <ul class="nav nav-justified">
		<li><a href="/docs/teacher/teacherViewAllStudent.php">查看学生</a></li>
		<!--li><a href="/docs/teacher/viewAllChapter.php">按章节统计成绩</a></li>	
		<li><a href="/docs/teacher/viewAllKnowledge.php">按知识点统计成绩</a></li-->
		<li><a href="/docs/teacher/viewAllExam.php">查看考试</a></li>
                <li><a href="/docs/teacher/viewAllChapter.php">按章节统计成绩</a></li>       
                <li><a href="/docs/teacher/viewAllKnowledge.php">按知识点统计成绩</a></li>
		<!--li><a href="/docs/teacher/viewAllStudentScoreByChapter.php">章节统计</a></li-->
		<!--li><a href="/docs/teacher/viewAllStudentScoreByKnowledge.php">知识点统计</a></li-->
		<li><a href="/docs/teacher/initExam.php">直接发布考试</a></li>
		<li><a href="/docs/teacher/initExamByTemplate.php">模版发布考试</a></li>
		<li><a href="/docs/teacher/logout.php">注销</a></li>
	     </ul>
	     </div>
</div>

<hr>
</html>
