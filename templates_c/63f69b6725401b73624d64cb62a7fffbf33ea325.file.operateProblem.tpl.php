<?php /* Smarty version Smarty-3.1.14, created on 2013-09-29 10:26:54
         compiled from "/var/www/templates/operateProblem.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1447592346523d2a33735b30-73720546%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '63f69b6725401b73624d64cb62a7fffbf33ea325' => 
    array (
      0 => '/var/www/templates/operateProblem.tpl',
      1 => 1379740381,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1447592346523d2a33735b30-73720546',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_523d2a3377a821_47318689',
  'variables' => 
  array (
    'blanklist' => 0,
    'i' => 0,
    'exercisenumber' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_523d2a3377a821_47318689')) {function content_523d2a3377a821_47318689($_smarty_tpl) {?>
<html>
<?php echo $_smarty_tpl->getSubTemplate ("examhead.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
   
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<div class="container">
<script>
function confirm()
{
	alert("保存成功！点击提交完成测试。");
}
</script>

<p style='color:red'>操作题，把结果上传到服务器上。</p>
<center>
<form action='fillInTheBlank.php' method=POST>
<table class="table table-bordered" border='1'>

<tr>
<td>题号</td>
<td>题目内容</td>
<td>分值</td>
</tr>

   		<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?>	
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['blanklist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
	<tr><td><?php echo $_smarty_tpl->tpl_vars['exercisenumber']->value[$_smarty_tpl->tpl_vars['i']->value++];?>
</td>
 		<td><?php echo $_smarty_tpl->tpl_vars['item']->value[3];?>
<br/>
		<input type="file" name="$userid_$item[0]" id="infile" />		
		<br/>
		</td>
		<td><?php echo $_smarty_tpl->tpl_vars['item']->value[2];?>
分</td>       
	</tr>
<?php } ?>
        
</table>
<input onclick='confirm()' class="btn btn-primary" 	type=submit name='submit' value='保存'><br/></form>
</center>
<hr>

<p style='color:red'>答题完后务必点击保存，否则不计入成绩！</p>
<p style='color:red'>全部答完后点击提交，否则点击放弃返回。</p>
</div>
</html>

<?php }} ?>