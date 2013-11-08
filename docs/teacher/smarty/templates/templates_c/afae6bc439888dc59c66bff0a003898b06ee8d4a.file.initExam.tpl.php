<?php /* Smarty version Smarty-3.1.14, created on 2013-10-03 22:19:44
         compiled from "smarty/templates/templates/initExam.tpl" */ ?>
<?php /*%%SmartyHeaderCode:202977979251df98d26c1a28-77240902%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'afae6bc439888dc59c66bff0a003898b06ee8d4a' => 
    array (
      0 => 'smarty/templates/templates/initExam.tpl',
      1 => 1380809831,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '202977979251df98d26c1a28-77240902',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_51df98d28be9a5_56255313',
  'variables' => 
  array (
    'chapterlist' => 0,
    'item' => 0,
    'knowledgelist' => 0,
    'examlist' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51df98d28be9a5_56255313')) {function content_51df98d28be9a5_56255313($_smarty_tpl) {?>
<html>
<?php echo $_smarty_tpl->getSubTemplate ("teacherHead.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<div class="container">
<body><center>
<form name="initForm" class="well" action='initExam.php' method=POST>
<table class="table table-bordered" border="1">
	<tr>
	<td>章节编号</td>
	<td>
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['chapterlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
	<input type="checkbox" name="cnum[]" value=<?php echo $_smarty_tpl->tpl_vars['item']->value[0];?>
 /><?php echo $_smarty_tpl->tpl_vars['item']->value[1];?>

	<?php } ?>
	</td>
	</tr>
	
	<tr>
	<td>知识点编号</td>
	<td>
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['knowledgelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
	<input type="checkbox" name="knum[]" value=<?php echo $_smarty_tpl->tpl_vars['item']->value[0];?>
 /><?php echo $_smarty_tpl->tpl_vars['item']->value[1];?>

	<?php } ?>
	</td>
	</tr>

	<tr>
	<td>试卷名称</td>
	<td><input class="form-control" type=text name='name'></td>
	</tr>

	<tr>
	<td>截止日期(0000-00-00)</td>
	<td><input class="form-control" type=text name='deadline'></td>
	</tr>

	<tr>
	<td>考试时间</td>
	<td><input class="form-control" type=text name='time'></td>
	</tr>

	<tr>
	<td>单选题数目</td>
	<td><input class="form-control" type=number name="numa" min=0></td>
	</tr>

	<tr>
	<td>多选题数目</td>
	<td><input class="form-control" type=number name="numb" min=0></td>
	</tr>

	<tr>
	<td>填空题数目</td>
	<td><input class="form-control" type=number name="numc" min=0></td>
	</tr>

	<tr>
	<td>考试难度</td>
	<td><input type="radio" name="stage" value="A" checked>A
		<input type="radio" name="stage" value="B">B
		<input type="radio" name="stage" value="C">C
		<input type="radio" name="stage" value="D">D</td>
	</tr>

	<tr>
	<td>试卷类型</td>
	<td><input type="radio" name="final" value="1">考试
		<input type="radio" name="final" value="0">作业</td>
	</tr>

</table>

<input class="btn btn-primary" type=submit name='submit' value="生成试卷"><br />
</form>
</center>
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

<form action='initExam.php' method=POST>
        <li><td>章节编号</td>
        <br />
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['chapterlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                <?php echo $_smarty_tpl->tpl_vars['item']->value[1];?>

                <input type="checkbox" name="cnum[]" value=<?php echo $_smarty_tpl->tpl_vars['item']->value[0];?>
 />
                <br />
        <?php } ?>
        </tr></li>

        <li><td>知识点编号</td>
        <br />
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['knowledgelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                <?php echo $_smarty_tpl->tpl_vars['item']->value[1];?>

                <input type="checkbox" name="knum[]" value=<?php echo $_smarty_tpl->tpl_vars['item']->value[0];?>
 />
                <br />
        <?php } ?>
        </tr></li>

	<li>
      	  <tr>
      	  <td>考试名称</td>
      	  <td><input type=text name='name'></td>
      	  </tr>
	</li>
        
	<li>
          <tr>
          <td>截止日期(0000-00-00)</td>
          <td><input type=text name='deadline'></td>
          </tr>
        </li>

        <li>
          <tr>
          <td>考试用时</td>
          <td><input type=text name='time'></td>
          </tr>
        </li>
        
	<li><td>考试难度</td>
        <select name='stage'>
                <option value='A'>A</option>
                <option value='B'>B</option>
                <option value='C'>C</option>
                <option value='D'>D</option>
        </select>
        </tr></li>

        <li>
          <tr>
          <td> 单选题数目</td>
          <td><input type=number name="numa" min=0></td>
          </tr>
        </li>

        <li>
          <tr>
          <td> 多选题数目</td>
          <td><input type=number name="numb" min=0></td>
          </tr>
        </li>

        <li>
          <tr>
          <td> 填空题数目</td>
          <td><input type=number name="numc" min=0></td>
          </tr>
        </li>

        <li>
          <tr>
          <td> 简答题数目</td>
          <td><input type=number name="short" min=0></td>
          </tr>
        </li>

        <li>
          <tr>
          <td> 操作题数目</td>
          <td><input type=number name="operate" min=0></td>
          </tr>
        </li>


 <input type=submit name='submit' value='提交'><br/></form-->
<?php }} ?>