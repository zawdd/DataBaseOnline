<?php /* Smarty version Smarty-3.1.14, created on 2013-09-29 10:24:04
         compiled from "/var/www/templates/addProgramProblem.tpl" */ ?>
<?php /*%%SmartyHeaderCode:153229343851d2d885e333a3-62367192%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd9541dd91928acb864941edfbb1feb42450a0440' => 
    array (
      0 => '/var/www/templates/addProgramProblem.tpl',
      1 => 1379318800,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '153229343851d2d885e333a3-62367192',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_51d2d88627d5c0_41153080',
  'variables' => 
  array (
    'chapterlist' => 0,
    'item' => 0,
    'knowledgelist' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51d2d88627d5c0_41153080')) {function content_51d2d88627d5c0_41153080($_smarty_tpl) {?> 
<html>
<?php echo $_smarty_tpl->getSubTemplate ("adminhead.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
	<td><textarea type=text name='econtent' rows="10" cols="30"></textarea></td>
	</tr></li>
	<li><td>answer</td>
	<td><textarea type=text name='answer' rows="10" cols="30"></textarea></td>
	</tr></li>
	<li><td>score</td>
	<td><input type=number name='score' min=1></td>
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