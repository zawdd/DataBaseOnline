<?php /* Smarty version Smarty-3.1.14, created on 2013-10-03 13:44:09
         compiled from "smarty/templates/templates/checkStudentExam.tpl" */ ?>
<?php /*%%SmartyHeaderCode:170996943251dd182ea307b4-72363657%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '248f971cc196285a41654e66e51c2312f6e87636' => 
    array (
      0 => 'smarty/templates/templates/checkStudentExam.tpl',
      1 => 1380778000,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '170996943251dd182ea307b4-72363657',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_51dd182ea7c134_72860904',
  'variables' => 
  array (
    'examlist' => 0,
    'item' => 0,
    'snum' => 0,
    'eno' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51dd182ea7c134_72860904')) {function content_51dd182ea7c134_72860904($_smarty_tpl) {?>
<html>
<?php echo $_smarty_tpl->getSubTemplate ("teacherHead.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<div class="container">
<center>
<form action='changeNormalScore.php' method=POST>
<table class="table table-bordered" border='1'>

<tr>
<td><center>题号</center></td>
<td><center>题目内容</center></td>
<td><center>作答答案</center></td>
<td><center>标准答案</center></td>
<td><center>分值</center></td>
<td><center>修改得分</center></td>
</tr>

<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['examlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
	<tr><td><center><?php echo $_smarty_tpl->tpl_vars['item']->value[0];?>
</center></td>
		<td><?php echo $_smarty_tpl->tpl_vars['item']->value[1];?>
</td>
		<td><center><?php echo $_smarty_tpl->tpl_vars['item']->value[4];?>
</center></td>
		<td><center><?php echo $_smarty_tpl->tpl_vars['item']->value[2];?>
</center></td>
		<td><center><?php echo $_smarty_tpl->tpl_vars['item']->value[3];?>
分</center></td>
		<td><center><input type=text size=2 name="<?php echo $_smarty_tpl->tpl_vars['item']->value[0];?>
_<?php echo $_smarty_tpl->tpl_vars['snum']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['eno']->value;?>
" style='color:red' value="<?php echo $_smarty_tpl->tpl_vars['item']->value[5];?>
"><center></td>
		
	</tr>
<?php } ?>
</table>
<input class="btn btn-primary" type=submit name='submit' value='提交修改'><br />

</form>
</center>
<hr>
<p style='color:red'>全部修改完后务必点击"提交修改"进行保存!</p>
</div>
</body>
</html>
<?php }} ?>