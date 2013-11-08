<?php /* Smarty version Smarty-3.1.14, created on 2013-09-16 16:12:06
         compiled from "smarty/templates/templates/teacherViewAllStudent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14651250351da9ca375e003-65454639%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b63a9f5bf120d5a6c5e5545aec5909d1586517a9' => 
    array (
      0 => 'smarty/templates/templates/teacherViewAllStudent.tpl',
      1 => 1379318801,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14651250351da9ca375e003-65454639',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_51da9ca37bac26_10533164',
  'variables' => 
  array (
    'studentlist' => 0,
    'item' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51da9ca37bac26_10533164')) {function content_51da9ca37bac26_10533164($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ("teacherHead.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<form action='viewAllExamOfaStudent.php' method=POST>
          <tr>
      	  <td>按学号查询其所有考试</td>
      	  <td><input type=text name='snum'></td>
      	  </tr>
<input type=submit name='submit' value='提交'><br/></form>

<tr>学号</tr><tr>姓名</tr>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['studentlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
                <tr><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</tr>
        <?php } ?>
        </li>
<?php } ?>
</ul>

<?php }} ?>