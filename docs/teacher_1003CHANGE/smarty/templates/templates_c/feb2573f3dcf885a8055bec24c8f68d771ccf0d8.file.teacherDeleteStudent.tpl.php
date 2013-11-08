<?php /* Smarty version Smarty-3.1.14, created on 2013-07-08 19:32:44
         compiled from "smarty/templates/templates/teacherDeleteStudent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:85521969851daa35c5ce454-62953427%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'feb2573f3dcf885a8055bec24c8f68d771ccf0d8' => 
    array (
      0 => 'smarty/templates/templates/teacherDeleteStudent.tpl',
      1 => 1373283151,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '85521969851daa35c5ce454-62953427',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_51daa35c618417_23621995',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51daa35c618417_23621995')) {function content_51daa35c618417_23621995($_smarty_tpl) {?>

Teacher Delete One Student

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<form action='teacherDeleteOneStudent.php' method=POST>
        <li>
          <tr>
          <td>教师帐号</td>
          <td><input type=text name='tno'></td>
          </tr>
        </li>
        <li>
          <tr>
          <td>删除学生帐号</td>
          <td><input type=text name='sno'></td>
          </tr>
        </li>

 <input type=submit name='submit' value='提交'><br/></form>



<?php }} ?>