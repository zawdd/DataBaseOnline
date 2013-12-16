<?php /* Smarty version Smarty-3.1.14, created on 2013-09-22 12:57:41
         compiled from "/var/www/templates/mchooseProblem.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11557519555236c2742bb582-90585395%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '77b1ff0278fb975ec06b31f5a5359ab0b21206c9' => 
    array (
      0 => '/var/www/templates/mchooseProblem.tpl',
      1 => 1379768607,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11557519555236c2742bb582-90585395',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5236c27434bfe6_42120668',
  'variables' => 
  array (
    'blanklist' => 0,
    'i' => 0,
    'exercisenumber' => 0,
    'item' => 0,
    'userid' => 0,
    'hno' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5236c27434bfe6_42120668')) {function content_5236c27434bfe6_42120668($_smarty_tpl) {?>
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
<p style='color:red'>多选题，每题至少有两个答案。</p>
<center>
<form action='mchooseProblem.php' method=POST>
<table class="table table-bordered" border='1'>

<tr>
<td><center>题号</center></td>
<td><center>题目内容</center></td>
<td><center>分值</center></td>
</tr>

   		<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?>	
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['blanklist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
	<tr><td><center><?php echo $_smarty_tpl->tpl_vars['exercisenumber']->value[$_smarty_tpl->tpl_vars['i']->value++];?>
<center></td>
 		<td><?php echo $_smarty_tpl->tpl_vars['item']->value[3];?>
<br/>
        <input type="checkbox" name="<?php echo $_smarty_tpl->tpl_vars['item']->value[0];?>
_<?php echo $_smarty_tpl->tpl_vars['userid']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['hno']->value;?>
[]"  value="A">A
        <input type="checkbox" name="<?php echo $_smarty_tpl->tpl_vars['item']->value[0];?>
_<?php echo $_smarty_tpl->tpl_vars['userid']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['hno']->value;?>
[]"  value="B">B
        <input type="checkbox" name="<?php echo $_smarty_tpl->tpl_vars['item']->value[0];?>
_<?php echo $_smarty_tpl->tpl_vars['userid']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['hno']->value;?>
[]"  value="C">C
        <input type="checkbox" name="<?php echo $_smarty_tpl->tpl_vars['item']->value[0];?>
_<?php echo $_smarty_tpl->tpl_vars['userid']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['hno']->value;?>
[]"  value="D">D
		<br/>
		</td>
		<td><center><?php echo $_smarty_tpl->tpl_vars['item']->value[2];?>
分<center></td>       
	</tr>
<?php } ?>
        
</table>
<input class="btn btn-primary" onclick='confirm()' type=submit name='submit' value='保存'><br/></form>
</center>
<hr>
<p style='color:red'>答题完后务必点击保存，否则不计入成绩！</p>
<p style='color:red'>全部答完后点击提交，否则点击放弃返回。</p>
</div>
</body>
</html>

<?php }} ?>