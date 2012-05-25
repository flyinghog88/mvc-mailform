<?php /* Smarty version Smarty-3.1.8, created on 2012-05-25 17:33:58
         compiled from "../templates/confirm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14884067904fbf43f623d7f0-65267862%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '64fe084751bc68c528fb2f174af721de91ed10d5' => 
    array (
      0 => '../templates/confirm.tpl',
      1 => 1337853377,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14884067904fbf43f623d7f0-65267862',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4fbf43f62675d3_23941625',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fbf43f62675d3_23941625')) {function content_4fbf43f62675d3_23941625($_smarty_tpl) {?><html>
<head>
    <meta http-equiv="Content-Type" content="text/html;UTF-8">
</head>
<body>
<h1>問い合わせ</h1>
<h2>確認</h2>
<dl>
    <dt>氏名</dt>
    <dd><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['msg']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</dd>
    <dt>性別</dt>
    <dd><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['msg']->value->gender, ENT_QUOTES, 'UTF-8', true);?>
</dd>
    <dt>〒</dt>
    <dd><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['msg']->value->zip, ENT_QUOTES, 'UTF-8', true);?>
</dd>
    <dt>メッセージ</dt>
    <dd><?php echo nl2br(htmlspecialchars($_smarty_tpl->tpl_vars['msg']->value->message, ENT_QUOTES, 'UTF-8', true));?>
</dd>
</dl>
<form action="?ctl=messages&act=save" method="post">
    <input type="submit" value="登録">
</form>
<form action="?ctl=messages&act=edit" method="post">
    <input type="submit" value="修正">
</form>
</body>
</html>
<?php }} ?>