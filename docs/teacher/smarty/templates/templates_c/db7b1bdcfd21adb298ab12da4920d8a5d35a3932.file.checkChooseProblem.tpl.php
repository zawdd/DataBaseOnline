<?php /* Smarty version Smarty-3.1.14, created on 2013-10-01 22:56:50
         compiled from "smarty/templates/templates/checkChooseProblem.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1193068023524ae04adebd18-64620768%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db7b1bdcfd21adb298ab12da4920d8a5d35a3932' => 
    array (
      0 => 'smarty/templates/templates/checkChooseProblem.tpl',
      1 => 1380639407,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1193068023524ae04adebd18-64620768',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_524ae04ae73436_19434517',
  'variables' => 
  array (
    'examlist' => 0,
    'item' => 0,
    'i' => 0,
    'j' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_524ae04ae73436_19434517')) {function content_524ae04ae73436_19434517($_smarty_tpl) {?>
<html>
<?php echo $_smarty_tpl->getSubTemplate ("checkExamHead.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body oncopy="alert('对不起,本网页禁止复制!');return false;">

<div class="container">
<p style='color:red'>单选题，每题有唯一答案。</p>
<center>
<form action='changeNormalScore.php' method=POST>
<table class="table table-bordered" border='1'>

<tr>
<td><center>题号</center></td>
<td><center>题目内容</center></td>
<td><center>作答答案</center></td>
<td><center>标准答案</center></td>
<td><center>分值</center></td>
<td><center>得分</center></td>
<td><center>操作</center></td>
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
		<!--td><center><?php echo $_smarty_tpl->tpl_vars['item']->value[5];?>
分</center></td-->
		<td><center><input type=text size="2" name='cscore' value="<?php echo $_smarty_tpl->tpl_vars['item']->value[5];?>
"></center></td>
		<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['item']->value[0], null, 0);?>
		<?php $_smarty_tpl->tpl_vars['cno'] = new Smarty_variable(0, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['j'] = new Smarty_variable($_smarty_tpl->tpl_vars['item']->value[5], null, 0);?>
		<?php $_smarty_tpl->tpl_vars['cscore'] = new Smarty_variable(0, null, 0);?>
		<td><center><a href="/docs/teacher/changeNormalScore.php?$cscore=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
&$cno=<?php echo $_smarty_tpl->tpl_vars['j']->value;?>
">修改得分</a></center></td>
	</tr>
	<?php } ?>
</table>
</form>
</center>
<hr>
<p style='color:red'>修改的题目务必点击"修改得分"进行保存！</p>
<p style='color:red'>全部修改完成后点击提交退出！</p>
</div>
</body>
<html>
	

<?php }} ?>