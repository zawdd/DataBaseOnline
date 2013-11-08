<?php /* Smarty version Smarty-3.1.14, created on 2013-09-22 11:57:14
         compiled from "/var/www/templates/studenthead.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17166447520f1be20c9916-82009492%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b66f418d1b9c86a7a38607c51064c9f504f681f6' => 
    array (
      0 => '/var/www/templates/studenthead.tpl',
      1 => 1379768090,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17166447520f1be20c9916-82009492',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_520f1be20ee832_32009874',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520f1be20ee832_32009874')) {function content_520f1be20ee832_32009874($_smarty_tpl) {?>
<html>
<link href="/dist/css/bootstrap.css" rel="stylesheet">
 <link href="/dist/css/justified-nav.css" rel="stylesheet">
<script src="/code.jquery.com/jquery.js"></script>
<script src="/dist/js/bootstrap.min.js"></script>


<div class="container">

      <div class="masthead">
        <h3 class="text-muted">数据库在线答题系统</h3>
        <ul class="nav nav-justified">
		  <li><a href="/docs/selectExam.php">作业</a></li>
          <li><a href="/docs/selectFinalExam.php">考试</a></li>
          <li><a href="/docs/lookOverAnswer.php">历史记录</a></li>
          <li><a href="/docs/showSelfInformation.php">个人信息</a></li>
          <li><a href="/docs/updateSelfInformation.php">修改信息</a></li>
          <li><a href="/docs/logout.php">注销</a></li>
        </ul>
	</div>
</div>
      
<hr>
</html>
<?php }} ?>