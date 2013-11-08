<?php /* Smarty version Smarty-3.1.14, created on 2013-09-22 11:57:27
         compiled from "/var/www/templates/updateSelfInformation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:41356058520f10d9dba8b2-12604354%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2d9392579839d277bdaff0bd703f4c70f9340e82' => 
    array (
      0 => '/var/www/templates/updateSelfInformation.tpl',
      1 => 1379769910,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '41356058520f10d9dba8b2-12604354',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_520f10d9dd8772_10814051',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520f10d9dd8772_10814051')) {function content_520f10d9dd8772_10814051($_smarty_tpl) {?>
<html>
<?php echo $_smarty_tpl->getSubTemplate ("studenthead.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<div class="container">
<body><center>
<form class="well" action='updateSelfInformation.php' method=POST>
<table class="table table-bordered" border="1">
		  <tr>
          <td>姓名*  </td>
      	  <td><input class="form-control"type=text name='Uname'></td>
      	  </li></tr>
  
      	  <tr>
      	  <td>性别  </td>
      	  <td><input type="radio" name="Usex" value="男" checked>Boy
			<input type="radio" name="Usex" value="女">Girl</td>
      	  </tr>

          <tr>
      	  <td>年龄  </td>
      	  <td><input class="form-control" type=text name='Uage'></td>
      	  </tr>

          <tr>
      	  <td>民族  </td>
      	  <td><input class="form-control" type=text name='Unation' ></td>
      	  </tr>

          <tr>
      	  <td>籍贯  </td>
      	  <td><input class="form-control" type=text name='UBP'></td>
      	  </tr>
 
      	  <tr>
      	  <td>密码*  </td>
      	  <td><input class="form-control" type=password name='Upassword1'></td>
      	  </tr>

          <tr>
      	  <td>重复密码*</td>
      	  <td><input class="form-control" type=password name='Upassword2'></td>
      	  </tr>
 
          <tr>
      	  <td>所在学校</td>
      	  <td><input class="form-control" type=text name='Uschool' value="中山大学"></td>
      	  </tr>

          <tr>
      	  <td>电子邮件*</td>
      	  <td><input class="form-control" type=text name='Uemail'></td>
      	  </tr>
     
          <tr>
      	  <td>电话*</td>
      	  <td><input class="form-control" type=text name='Uphone'></td>
      	  </tr>
</table>
<input  class="btn btn-primary" type=submit name='submit' value='提交修改'><br/></form>
</center>
<hr>
<p style="color:red">每次提交会更新上表的所有信息。</p>
<p style="color:red">星号选项必填。</p>
</body>
</div>
</html>
<?php }} ?>