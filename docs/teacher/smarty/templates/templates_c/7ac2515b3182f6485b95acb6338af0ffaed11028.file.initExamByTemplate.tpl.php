<?php /* Smarty version Smarty-3.1.14, created on 2013-10-03 22:29:09
         compiled from "smarty/templates/templates/initExamByTemplate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13008317995236bd45a795f1-91896156%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ac2515b3182f6485b95acb6338af0ffaed11028' => 
    array (
      0 => 'smarty/templates/templates/initExamByTemplate.tpl',
      1 => 1380810544,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13008317995236bd45a795f1-91896156',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5236bd45ad5766_93096326',
  'variables' => 
  array (
    'template' => 0,
    'b' => 0,
    'item' => 0,
    'examlist' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5236bd45ad5766_93096326')) {function content_5236bd45ad5766_93096326($_smarty_tpl) {?>
<html>
<?php echo $_smarty_tpl->getSubTemplate ("teacherHead.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<div class="container">
<body>
<form action='initExamByTemplate.php' class="well" name="templateForm" method=POST>
<table class="table table-bordered table-striped" border="1">
	<?php $_smarty_tpl->tpl_vars['b'] = new Smarty_variable(1, null, 0);?>
	<tr><td><center>模版id</center></td>
	<td><center>模版名称</center></td>
	<td><center>章节数组</center></td>
	<td><center>知识点数组</center></td>
	<td><center>难度系数</center></td>
	<td><center>单选题数目</center></td>
	<td><center>多选题数目</center></td>
	<td><center>填空题数目</center></td>
	<td><center>选择模版</center></td>
		</tr>
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['template']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
	<td><center><?php echo $_smarty_tpl->tpl_vars['item']->value[7];?>
</center></td>
	<td><center><input type="radio" name="templatename" value=<?php echo $_smarty_tpl->tpl_vars['item']->value[0];?>
></center></td>
	</tr>
	<?php } ?>
</table>

<tr>
<td>考试名称<input class="form-control" type=text name='ename'></td>
</tr>
<br />
<tr>
<td>考试时间</td>
<td><input class="form-control" type=text name='time'></td>
</tr>
<br />
<tr>
<td>截止日期</td>
<td><input class="form-control" type=text name='deadline'></td>
</tr>

<br />
<tr>
<td>试卷类型</td>
<td><input type="radio" name="final" value="1">考试
	<input type="radio" name="final" value="0">作业</td>
</tr>
<br />
<br />
<br />
<center><input class="btn btn-primary" type=submit name='submit' value="生成试卷"></center><br /></form>
<hr>
</body>
</html>

<!--ul>
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
</ul>


Template List
<li>
 <th>模版id</th>
 <th>模版名称</th>
 <th>章节数组</th>
 <th>知识点数组</th>
 <th>难度系数</th>
 <th>单选题数目</th>
 <th>多选题数目</th>
 <th>填空题数目</th>
 <th>操作题数目</th>
 <th>简答题数目</th>
</li>
<br />
<ul>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['template']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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

<form action='initExamByTemplate.php' method=POST>
	<li>
	 <tr>
	 <td>选择试卷模版</td>
	 <td><input type=text name='templatename'></td>
	 </tr>
	</li>

	<li>
	 <tr>
	 <td>截止日期</td>
	 <td><input type=text name='deadline'></td>
	 </tr>
	</li>

        <li>
         <tr>
         <td>考试时间</td>
         <td><input type=text name='time'></td>
         </tr>
        </li>

        <li>
         <tr>
         <td>考试名称</td>
         <td><input type=text name='ename'></td>
         </tr>
        </li>

<input type=submit name='submit' value='提交'><br /></form-->
<?php }} ?>