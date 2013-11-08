<?php /* Smarty version Smarty-3.1.14, created on 2013-09-16 16:11:49
         compiled from "smarty/templates/templates/initExamByTemplate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13008317995236bd45a795f1-91896156%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ac2515b3182f6485b95acb6338af0ffaed11028' => 
    array (
      0 => 'smarty/templates/templates/initExamByTemplate.tpl',
      1 => 1379318801,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13008317995236bd45a795f1-91896156',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'examlist' => 0,
    'item' => 0,
    'value' => 0,
    'template' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5236bd45ad5766_93096326',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5236bd45ad5766_93096326')) {function content_5236bd45ad5766_93096326($_smarty_tpl) {?>
Exam List

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<ul>
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

<input type=submit name='submit' value='提交'><br /></form>
<?php }} ?>