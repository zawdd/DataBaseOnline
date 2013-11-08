<?php /* Smarty version Smarty-3.1.14, created on 2013-09-16 16:11:32
         compiled from "smarty/templates/templates/addTeacher.tpl" */ ?>
<?php /*%%SmartyHeaderCode:176844772051da4c19afa5b4-81578671%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8709f26a135da47bd038cb22788ef238cb08d4ba' => 
    array (
      0 => 'smarty/templates/templates/addTeacher.tpl',
      1 => 1379318801,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '176844772051da4c19afa5b4-81578671',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_51da4c19b48329_00973631',
  'variables' => 
  array (
    'teacherlist' => 0,
    'item' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51da4c19b48329_00973631')) {function content_51da4c19b48329_00973631($_smarty_tpl) {?>
Teacher List

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<ul>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['teacherlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
<form action='addTeacher.php' method=POST>
	<li>
	<tr>
	<td>帐号</td>
	<td><input type=text name='id'></td>
	</tr>
	</li>
	<li>
        <tr>
        <td>姓名</td>
        <td><input type=text name='name'></td>
        </tr>
	</li>
	<!--li>
        <tr>
        <td>性别</td>
        <td><input type=text name='sex'></td>
		<select name="sex">
                	<option value='男'>男</option>
                	<option value='女'>女</option>
        	</select>
        </tr>
	</li-->
	<li>
        <tr>
        <td>年龄</td>
        <td><input type=text name='age'></td>
        </tr>
	</li>
	<li>
        <tr>
        <td>民族</td>
        <td><input type=text name='nation'></td>
        </tr>
	</li>
	<li>
        <tr>
        <td>籍贯</td>
        <td><input type=text name='bp'></td>
        </tr>
	</li>
	<li>
        <tr>
        <td>密码</td>
        <td><input type=password name='password'></td>
        </tr>
	</li>
	<li>
        <tr>
        <td>学校</td>
        <td><input type=text name='school'></td>
        </tr>
	</li>
	<li>
        <tr>
        <td>Email</td>
        <td><input type=text name='email'></td>
        </tr>
        </li>
        <li>
        <tr>
        <td>电话</td>
        <td><input type=text name='phone'></td>
        </tr>
        </li>

	<!--li>
        <tr-->
        <!--td>身份</td>
        <td><input type=text name='status'></td>
	        <select name="status">
                	<option value='教师'>教师</option>
                	<option value='学生'>学生</option>
                	<option value='管理员'>管理员</option>
        	</select>
        </tr>
	</li-->
	<!--li>
        <tr>
        <td>职称</td>
        <td><input type=text name='pt'></td>
        <select name="pt">
                <option value='博士生导师'>博士生导师</option>
                <option value='教授'>教授</option>
                <option value='副教授'>副教授</option>
                <option value='讲师'>讲师</option>
        </select>
        </tr>
	</li-->
	<li>
        <tr>
        <td>研究方向</td>
        <td><input type=text name='search'></td>
        </tr>
	</li>
	<li>
        <tr>
        <td>学生人数</td>
        <td><input type=text name='count'></td>
        </tr>
	</li>
	<li>
        <tr>
        <td>性别</td>
        <!--td><input type=text name='sex'></td-->
                <select name="sex">
                        <option value='男'>男</option>
                        <option value='女'>女</option>
                </select>
        </tr>
        </li>
        <li>
        <tr>
        <td>身份</td>
        <!--td><input type=text name='status'></td-->
                <select name="status">
                        <option value='教师'>教师</option>
                        <option value='学生'>学生</option>
                        <option value='管理员'>管理员</option>
                </select>
        </tr>
        </li>
        <li>
        <tr>
        <td>职称</td>
        <!--td><input type=text name='pt'></td-->
        <select name="pt">
                <option value='博士生导师'>博士生导师</option>
                <option value='教授'>教授</option>
                <option value='副教授'>副教授</option>
                <option value='讲师'>讲师</option>
        </select>
        </tr>
        </li>


<input type=submit name='submit' value='提交'><br /></form>

<?php }} ?>