<?php /* Smarty version Smarty-3.1.14, created on 2013-07-08 11:19:29
         compiled from "smarty/templates/templates/showAllProblem.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18299752451da2a29c02553-59759239%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2348fe4d2d9726b4df6a54c58e6a1f54113ce198' => 
    array (
      0 => 'smarty/templates/templates/showAllProblem.tpl',
      1 => 1373252284,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18299752451da2a29c02553-59759239',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_51da2a29dbb012_47994544',
  'variables' => 
  array (
    'pc' => 0,
    'problemlist' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51da2a29dbb012_47994544')) {function content_51da2a29dbb012_47994544($_smarty_tpl) {?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


Problem List


<table>
<?php if ($_smarty_tpl->tpl_vars['pc']->value=='Cexercise'){?>
<tr><th>exerciseno</th><th>exercisename</th><th>content</th><th>answer</th><th>score</th><th>stage</th><th>chaptername</th><th>knowledgename</th></tr>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['problemlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
	<tr><td><?php echo $_smarty_tpl->tpl_vars['item']->value[0];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value[2];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value[3];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value[4];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value[5];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value[7];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value[9];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value[11];?>
</td></tr>
<?php } ?>
<?php }elseif($_smarty_tpl->tpl_vars['pc']->value=='Pexercise'){?>
<tr><th>exerciseno</th><th>content</th><th>answer</th><th>intxt</th><th>outtxt</th><th>score</th><th>stage</th><th>chaptername</th><th>knowledgename</th></tr>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['problemlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
	<tr><td><?php echo $_smarty_tpl->tpl_vars['item']->value[0];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value[2];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value[3];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value[4];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value[5];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value[6];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value[7];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value[10];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value[12];?>
</td></tr>
<?php } ?>
<?php }?>
</table>

<form action='showAllProblem.php' method=POST>
      	  <tr>
      	  <td>请输入题目类型</td>
      	  	<select name="pc">
				<option value='Cexercise'>Cexercise</option>
				<option value='Pexercise'>Pexercise</option>
			</select>
      	  </tr>
      	  <tr>
      	  <td>请输入范围起点</td>
      	  <td><input type=number name=beg min=1></td>
      	  </tr>
      	  <tr>
      	  <td>请输入范围结束</td>
      	  <td><input type=number name=end></td>
      	  </tr>
      	 
    
 <input type=submit name='submit' value='提交'><br/></form>
 
 <form action='showAllProblem.php' method=POST>
      	  <tr>
      	  <td>删除题目类型</td>
      	  	<select name="dpc">
				<option value='Cexercise'>Cexercise</option>
				<option value='Pexercise'>Pexercise</option>
			</select>
      	  </tr>
      	  <tr>
      	  <td>ID</td>
      	  <td><input type=text name=pid></td>
      	  </tr>
 <input type=submit name='submit' value='提交'><br/></form>
 
  <form action='updateProblem.php' method=POST>
      	  <tr>
      	  <td>update题目类型</td>
      	  	<select name="upc">
				<option value='Cexercise'>Cexercise</option>
				<option value='Pexercise'>Pexercise</option>
			</select>
      	  </tr>
      	  <tr>
      	  <td>ID</td>
      	  <td><input type=text name=upid></td>
      	  </tr>
 <input type=submit name='submit' value='提交'><br/></form>
<?php }} ?>