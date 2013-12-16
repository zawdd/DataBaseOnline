<?php /* Smarty version Smarty-3.1.14, created on 2013-10-03 18:15:46
         compiled from "smarty/templates/templates/viewAllExam.tpl" */ ?>
<?php /*%%SmartyHeaderCode:73450787351dd03fe7eba72-34731555%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd1b403bdba1d40fe87a663f2dc50011dfc8e506' => 
    array (
      0 => 'smarty/templates/templates/viewAllExam.tpl',
      1 => 1380795343,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '73450787351dd03fe7eba72-34731555',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_51dd03feabe7e6_85635730',
  'variables' => 
  array (
    'examlist' => 0,
    'b' => 0,
    'item' => 0,
    'i' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51dd03feabe7e6_85635730')) {function content_51dd03feabe7e6_85635730($_smarty_tpl) {?>
<html>
<?php echo $_smarty_tpl->getSubTemplate ("teacherHead.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<div class="container">
<center>
<table class="table table-bordered table-striped" border="1">
	<tr><td><center>序号</center></td>
	<td><center>名称</center></td>
	<td><center>章节</center></td>
	<td><center>知识点</center></td>
	<td><center>难度</center></td>
	<td><center>发布时间</center></td>
	<td><center>截止时间</center></td>
	<td><center>操作</center></td>
	</tr>
	<?php $_smarty_tpl->tpl_vars['b'] = new Smarty_variable(1, null, 0);?>
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['examlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
	<tr>
	<td><center><?php echo $_smarty_tpl->tpl_vars['b']->value++;?>
</center></td>
	<td><center><?php echo $_smarty_tpl->tpl_vars['item']->value[1];?>
</center></td>
	<td><center><?php echo $_smarty_tpl->tpl_vars['item']->value[2];?>
</center></td>
	<td><center><?php echo $_smarty_tpl->tpl_vars['item']->value[3];?>
</center></td>
	<td><center><?php echo $_smarty_tpl->tpl_vars['item']->value[4];?>
</center></td>
	<td><center><?php echo $_smarty_tpl->tpl_vars['item']->value[5];?>
</center></td>
	<td><center><?php echo $_smarty_tpl->tpl_vars['item']->value[6];?>
</center></td>
	<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['item']->value[0], null, 0);?>
	<?php $_smarty_tpl->tpl_vars['examid'] = new Smarty_variable(0, null, 0);?>
	<td><center><a href="/docs/teacher/viewStudentScore.php?$examid=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
">查看</a></center></td>
	</tr>
	<?php } ?>
</table>
</form>
</center>
<hr>
</div>
</html>
<!--ul>
<li>
	<th>考试号</th>
	<th>名称</th>
	<th>章节</th>
	<th>知识点</th>
	<th>难度</th>
	<th>发布时间</th>
	<th>截止时间</th>
	<th>考试用时</th>
</li>

<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['examlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
        <li>
        <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
                <th><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</th>
        <?php } ?>
        </li>
<?php } ?>
</ul-->
<?php }} ?>