<?php /* Smarty version Smarty-3.1.14, created on 2013-09-16 16:11:42
         compiled from "smarty/templates/templates/checkStudentExam.tpl" */ ?>
<?php /*%%SmartyHeaderCode:170996943251dd182ea307b4-72363657%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '248f971cc196285a41654e66e51c2312f6e87636' => 
    array (
      0 => 'smarty/templates/templates/checkStudentExam.tpl',
      1 => 1379318801,
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
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51dd182ea7c134_72860904')) {function content_51dd182ea7c134_72860904($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ("teacherHead.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
	

ExamAnswerForStudent
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<form action='changeNormalScore.php' method=POST>
	<li>
          <tr>
          <td>请输入需要修改的题号</td>
          <td><input type=text name='cno'></td>
          </tr>
	</li>
	<li>
          <tr>
          <td>请输入需要修改的分数(不得大于题目分值)</td>
          <td><input type=text name='cscore'></td>
          </tr>
	</li>
<input type=submit name='submit' value='确定'><br/></form>

<ul>
<li>
<th>题号</th>
<th>内容</th>
<th>标准答案</th>
<th>分值</th>
<th>作答答案</th>
<th>得分</th>
</li>
</ul>






</ul>

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

<?php }} ?>