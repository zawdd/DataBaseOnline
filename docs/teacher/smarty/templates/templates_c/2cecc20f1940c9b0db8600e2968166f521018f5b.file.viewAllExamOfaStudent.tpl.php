<?php /* Smarty version Smarty-3.1.14, created on 2013-10-02 21:17:14
         compiled from "smarty/templates/templates/viewAllExamOfaStudent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:159082671151dd76598de815-70947862%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2cecc20f1940c9b0db8600e2968166f521018f5b' => 
    array (
      0 => 'smarty/templates/templates/viewAllExamOfaStudent.tpl',
      1 => 1380713892,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '159082671151dd76598de815-70947862',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_51dd7659942337_66044098',
  'variables' => 
  array (
    'studentinfolist' => 0,
    'b' => 0,
    'item' => 0,
    'i' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51dd7659942337_66044098')) {function content_51dd7659942337_66044098($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ("teacherHead.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<div class="container">
<center>
<form action='viewAllExamOfaStudent.php' method=POST>
<!--form action='checkStudentExam.php' method=POST-->
<table class="table table-bordered table-striped" border="1">
	<?php $_smarty_tpl->tpl_vars['b'] = new Smarty_variable(1, null, 0);?>
	<tr><td><center>序号</center></td>
	<td><center>学号</center></td>
	<td><center>姓名</center></td>
	<td><center>考试名称</center></td>
	<td><center>提交时间</center></td>
	<td><center>考试成绩</center></td>
	<td><center>操作</center></td></tr>

	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['studentinfolist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
	<tr>
	<td><center><?php echo $_smarty_tpl->tpl_vars['b']->value++;?>
</center></td>
	<td><center><?php echo $_smarty_tpl->tpl_vars['item']->value[0];?>
</center></td>
	<td><center><?php echo $_smarty_tpl->tpl_vars['item']->value[1];?>
</center></td>
	<td><center><?php echo $_smarty_tpl->tpl_vars['item']->value[3];?>
</center></td>
	<td><center><?php echo $_smarty_tpl->tpl_vars['item']->value[4];?>
</center></td>
	<td><center><?php echo $_smarty_tpl->tpl_vars['item']->value[5];?>
</center></td>
	<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['item']->value[2], null, 0);?>
	<?php $_smarty_tpl->tpl_vars['eno'] = new Smarty_variable(0, null, 0);?>
	<!--td><center><a href="/docs/teacher/checkStudentExam.php?$eno=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
">查看</a></center></td-->
	<td><center><a href="/docs/teacher/checkStudentExam.php?$eno=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
">查看</a></center></td>
	</tr>
	<?php } ?>
</table>
</form>
</center>
<hr>
</div>
</html>
          <!--tr>
          <td>请输入需要查询的考试编号</td>
          <td><input type=text name='eno'></td>
          </tr>


<input type=submit name='submit' value='确定'><br/></form>

<ul>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['studentinfolist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
</ul>

<?php }} ?>