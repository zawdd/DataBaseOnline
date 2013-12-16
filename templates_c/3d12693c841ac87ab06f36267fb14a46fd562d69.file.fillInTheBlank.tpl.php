<?php /* Smarty version Smarty-3.1.14, created on 2013-09-22 12:57:54
         compiled from "/var/www/templates/fillInTheBlank.tpl" */ ?>
<?php /*%%SmartyHeaderCode:182794572520f35f683c7e7-85967825%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3d12693c841ac87ab06f36267fb14a46fd562d69' => 
    array (
      0 => '/var/www/templates/fillInTheBlank.tpl',
      1 => 1379768619,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '182794572520f35f683c7e7-85967825',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_520f35f6870536_28788546',
  'variables' => 
  array (
    'blanklist' => 0,
    'i' => 0,
    'exercisenumber' => 0,
    'item' => 0,
    'userid' => 0,
    'hno' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520f35f6870536_28788546')) {function content_520f35f6870536_28788546($_smarty_tpl) {?>
<html>
<?php echo $_smarty_tpl->getSubTemplate ("examhead.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
   
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body  oncopy="alert('对不起，本网页禁止复制！');return false;">
<div class="container">
<script>
function confirm()
{
	alert("保存成功！点击提交完成测试。");
}
</script>

<p style='color:red'>填空题, 根据空的编号填入对应输入框中。</p>
<center>
<form action='fillInTheBlank.php' method=POST>
<table class="table table-bordered" border='1'>

<tr>
<td><center>题号</center></td>
<td><center>题目内容</center></td>
<td><center>分值</center></td>
</tr>

   		<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?>	
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['blanklist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
	<tr><td><center><?php echo $_smarty_tpl->tpl_vars['exercisenumber']->value[$_smarty_tpl->tpl_vars['i']->value++];?>
</center></td>
 		<td><?php echo $_smarty_tpl->tpl_vars['item']->value[3];?>
<br/>
		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['arr'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['arr']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['name'] = 'arr';
$_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['start'] = (int)0;
$_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['item']->value[4]) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['step'] = ((int)1) == 0 ? 1 : (int)1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['loop'];
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['arr']['total']);
?>
		[<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['arr']['index']+1;?>
]
		<input type=text size=10 name="<?php echo $_smarty_tpl->tpl_vars['item']->value[0];?>
_<?php echo $_smarty_tpl->tpl_vars['userid']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['hno']->value;?>
_<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['arr']['index'];?>
"><br/>
		<?php endfor; endif; ?>
		<br/>
		</td>
		<td><center><?php echo $_smarty_tpl->tpl_vars['item']->value[2];?>
分</center></td>       
	</tr>
<?php } ?>
        
</table>
<input onclick='confirm()' class="btn btn-primary" 	type=submit name='submit' value='保存'><br/></form>
</center>
<hr>

<p style='color:red'>答题完后务必点击保存，否则不计入成绩！</p>
<p style='color:red'>全部答完后点击提交，否则点击放弃返回。</p>
</div>
</body>
</html>

<?php }} ?>