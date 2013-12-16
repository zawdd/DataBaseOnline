<?php /* Smarty version Smarty-3.1.14, created on 2013-11-08 20:18:56
         compiled from "/var/www/templates/uploadFile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1136918430527cc5fa0521d8-32002683%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ec2d29f4cbfd04207df76521b34da684c0b7d346' => 
    array (
      0 => '/var/www/templates/uploadFile.tpl',
      1 => 1383913128,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1136918430527cc5fa0521d8-32002683',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_527cc5fa094664_65541595',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_527cc5fa094664_65541595')) {function content_527cc5fa094664_65541595($_smarty_tpl) {?>
<html>
<?php echo $_smarty_tpl->getSubTemplate ("examhead.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
   
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body >
<div class="container">
<script>
function confirm()
{
	//alert("保存成功！");
}
</script>
<form action='uploadFile.php' method=POST enctype="multipart/form-data">

<p style='color:red'>选择文件上传到服务器,大小不能超过8MB</p>

<input class="btn" type="file" name="infile" id="infile" />
<center><input onclick='confirm()' class="btn btn-primary" 	type=submit name='submit' value='保存'></center>
<br/>

</form>

</div>
</body>
</html>

<?php }} ?>