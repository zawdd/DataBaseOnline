<?php /* Smarty version Smarty-3.1.14, created on 2013-09-16 16:13:51
         compiled from "smarty/templates/templates/viewAllStudentScoreByKnowledge.tpl" */ ?>
<?php /*%%SmartyHeaderCode:131281530951de633de835a0-62074581%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1d46cf8d500d49afc9e3d72aa0d1641de9df6837' => 
    array (
      0 => 'smarty/templates/templates/viewAllStudentScoreByKnowledge.tpl',
      1 => 1379318801,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '131281530951de633de835a0-62074581',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_51de633df37079_42607695',
  'variables' => 
  array (
    'knowledgelist' => 0,
    'item' => 0,
    'scorelist' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51de633df37079_42607695')) {function content_51de633df37079_42607695($_smarty_tpl) {?>
View All Student Score By Knowledge.

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<form action='viewAllStudentScoreByKnowledge.php' method=POST>
          <!--tr>
          <td>请输入需要查询的知识点编号</td>
          <td><input type=text name='kno'></td>
          </tr-->
        <!--li><td>要查询的知识点编号</td>
        <select name='kno'>
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['knowledgelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                        <option value=<?php echo $_smarty_tpl->tpl_vars['item']->value[0];?>
><?php echo $_smarty_tpl->tpl_vars['item']->value[1];?>
</option>
                <?php } ?>
        </select>
        </tr></li-->

        <li><td>请输入需要查询的知识点编号</td>
        <br />
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['knowledgelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                <?php echo $_smarty_tpl->tpl_vars['item']->value[1];?>

                <input type="checkbox" name="kno[]" value=<?php echo $_smarty_tpl->tpl_vars['item']->value[0];?>
 />
                <br />
        <?php } ?>
        </tr></li>


<input type=submit name='submit' value='提交'><br/></form>

<ul>
<li>
	<th>学生号</th>
	<th>学生姓名</th>
	<th>提交时间</th>
	<th>考试成绩</th>
</li>

<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['scorelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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