<?php /* Smarty version Smarty-3.1.14, created on 2013-09-22 12:57:09
         compiled from "/var/www/templates/chooseProblem.tpl" */ ?>
<?php /*%%SmartyHeaderCode:847021121520f358d81d736-90474452%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f239d56eac3c464dd86e000b7d9963fd85aaac6c' => 
    array (
      0 => '/var/www/templates/chooseProblem.tpl',
      1 => 1379768599,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '847021121520f358d81d736-90474452',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_520f358d86d8f5_86805599',
  'variables' => 
  array (
    'chooselist' => 0,
    'i' => 0,
    'exercisenumber' => 0,
    'item' => 0,
    'userid' => 0,
    'hno' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520f358d86d8f5_86805599')) {function content_520f358d86d8f5_86805599($_smarty_tpl) {?>
<html>
<?php echo $_smarty_tpl->getSubTemplate ("examhead.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
   
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body  oncopy="alert('对不起，本网页禁止复制！');return false;">
<script>
function confirm()
{
	alert("保存成功！请选择下一类题目，继续答题。");
}
</script>
<div class="container">
<p style='color:red'>单选题，每题有唯一答案。</p>
<center>
<form action='chooseProblem.php' method=POST>
<table class="table table-bordered" border='1'>

<tr>
<td><center>题号</center></td>
<td><center>题目内容</center></td>
<td><center>分值</center></td>
</tr>

   		<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?>	
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['chooselist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
	<tr><td><center><?php echo $_smarty_tpl->tpl_vars['exercisenumber']->value[$_smarty_tpl->tpl_vars['i']->value++];?>
</center></td>
 		<td><?php echo $_smarty_tpl->tpl_vars['item']->value[3];?>
<br/>
		<input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['item']->value[0];?>
_<?php echo $_smarty_tpl->tpl_vars['userid']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['hno']->value;?>
" value="A" checked>A
		<input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['item']->value[0];?>
_<?php echo $_smarty_tpl->tpl_vars['userid']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['hno']->value;?>
" value="B">B
		<input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['item']->value[0];?>
_<?php echo $_smarty_tpl->tpl_vars['userid']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['hno']->value;?>
" value="C">C
		<input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['item']->value[0];?>
_<?php echo $_smarty_tpl->tpl_vars['userid']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['hno']->value;?>
" value="D">D
		<br/>
		</td>
		<td><center><?php echo $_smarty_tpl->tpl_vars['item']->value[2];?>
分</center></td>       
	</tr>
<?php } ?>
        
</table>
<input onclick='confirm()' class="btn btn-primary" type=submit name='submit' value='保存'><br/></form>
</center>
<hr>
<p style='color:red'>答题完后务必点击保存，否则不计入成绩！</p>
<p style='color:red'>全部答完后点击提交，否则点击放弃返回。</p>
</div>
</body>
</html>

<?php }} ?>