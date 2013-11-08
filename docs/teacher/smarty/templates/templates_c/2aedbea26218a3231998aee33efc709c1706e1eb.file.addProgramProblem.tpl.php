<?php /* Smarty version Smarty-3.1.14, created on 2013-07-08 10:53:39
         compiled from "smarty/templates/templates/addProgramProblem.tpl" */ ?>
<?php /*%%SmartyHeaderCode:53297250651da29b327d086-64987644%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2aedbea26218a3231998aee33efc709c1706e1eb' => 
    array (
      0 => 'smarty/templates/templates/addProgramProblem.tpl',
      1 => 1372920021,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '53297250651da29b327d086-64987644',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'chapterlist' => 0,
    'item' => 0,
    'knowledgelist' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_51da29b33446e3_68217975',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51da29b33446e3_68217975')) {function content_51da29b33446e3_68217975($_smarty_tpl) {?> 
<html>
<body>

<ul>



<form action='addProgramProblem.php' method=POST enctype="multipart/form-data">

	<li><td>cno</td>
	<select name="cno">
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['chapterlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
			<option value=<?php echo $_smarty_tpl->tpl_vars['item']->value[0];?>
><?php echo $_smarty_tpl->tpl_vars['item']->value[1];?>
</option>
		<?php } ?>
	</select>
	</tr></li>
	<li><td>econtent</td>
	<td><input type=text name='econtent'></td>
	</tr></li>
	<li><td>answer</td>
	<td><input type=text name='answer'></td>
	</tr></li>
	
	<li><td>score</td>
	<td><input type=text name='score'></td>
	</tr></li>
	<li><td>style</td>
	<select name="style">
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
	</tr></li>
	<li><td>stage</td>
	<select name="stage">
		<option value='A'>A</option>
		<option value='B'>B</option>
		<option value='C'>C</option>
		<option value='D'>D</option>
	</select>
	</tr></li>

 
<li><label for="infile">in:</label>
<input type="file" name="infile" id="infile" /> </li>

<li><label for="outfile">out:</label>
<input type="file" name="outfile" id="outfile" /> </li>

 <input type=submit name='submit' value='提交'>
</form> 

</body>
</html>


<?php }} ?>