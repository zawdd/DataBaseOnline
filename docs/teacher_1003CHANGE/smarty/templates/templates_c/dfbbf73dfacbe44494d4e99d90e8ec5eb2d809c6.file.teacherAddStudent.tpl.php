<?php /* Smarty version Smarty-3.1.14, created on 2013-09-29 17:41:28
         compiled from "smarty/templates/templates/teacherAddStudent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:52272622051da8202cbd119-33451193%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dfbbf73dfacbe44494d4e99d90e8ec5eb2d809c6' => 
    array (
      0 => 'smarty/templates/templates/teacherAddStudent.tpl',
      1 => 1379318800,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '52272622051da8202cbd119-33451193',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_51da8202d22f64_12574326',
  'variables' => 
  array (
    'Studentlist' => 0,
    'item' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51da8202d22f64_12574326')) {function content_51da8202d22f64_12574326($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ("teacherHead.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

Add Student

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Studentlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
<form action='teacherAddStudent.php' method=POST>
	<li>
          <tr>
          <td>教师帐号</td>
          <td><input type=text name='tno'></td>
          </tr>
	</li>
        <li>
          <tr>
          <td>学生帐号</td>
          <td><input type=text name='sno'></td>
          </tr>
        </li>
        <li>
          <tr>
          <td>所在学校</td>
          <td><input type=text name='uschool'></td>
          </tr>
        </li>



 <input type=submit name='submit' value='提交'><br/></form>

<?php }} ?>