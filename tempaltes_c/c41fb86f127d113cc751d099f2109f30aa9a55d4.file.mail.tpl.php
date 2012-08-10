<?php /* Smarty version Smarty-3.1.8, created on 2012-05-26 18:15:02
         compiled from "../templates/mail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12058721164fc09f16e764c1-99600300%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c41fb86f127d113cc751d099f2109f30aa9a55d4' => 
    array (
      0 => '../templates/mail.tpl',
      1 => 1338023590,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12058721164fc09f16e764c1-99600300',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4fc09f16eef903_21316596',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fc09f16eef903_21316596')) {function content_4fc09f16eef903_21316596($_smarty_tpl) {?>問い合わせ内容は以下の通りです。

氏名：<?php echo $_smarty_tpl->tpl_vars['msg']->value->name;?>

性別：<?php echo $_smarty_tpl->tpl_vars['msg']->value->gender;?>

〒：<?php echo $_smarty_tpl->tpl_vars['msg']->value->zip;?>

メッセージ：
<?php echo $_smarty_tpl->tpl_vars['msg']->value->message;?>

<?php }} ?>