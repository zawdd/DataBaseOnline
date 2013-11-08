<?php /* Smarty version Smarty-3.1.14, created on 2013-07-08 19:40:34
         compiled from "smarty/templates/templates/teacherDeleteAllStudent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:121137289051daa53241a262-09713652%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4b3e35ae95dc69e931909fd8e2dd1cbf9f55b8cb' => 
    array (
      0 => 'smarty/templates/templates/teacherDeleteAllStudent.tpl',
      1 => 1373283625,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '121137289051daa53241a262-09713652',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_51daa532460844_98006910',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51daa532460844_98006910')) {function content_51daa532460844_98006910($_smarty_tpl) {?>

Teacher Delete All Students

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<form action='teacherDeleteAllStudent.php' method=POST>
        <li>
          <tr>
          <td>教师帐号</td>
          <td><input type=text name='tno'></td>
          </tr>
        </li>

 <input type=submit name='submit' value='删除所有学生'><br/></form>

<?php }} ?>