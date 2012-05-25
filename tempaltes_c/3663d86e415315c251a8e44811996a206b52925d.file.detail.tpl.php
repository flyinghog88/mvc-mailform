<?php /* Smarty version Smarty-3.1.8, created on 2012-05-25 17:36:42
         compiled from "../templates/detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20144914554fbf449a30d176-01835647%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3663d86e415315c251a8e44811996a206b52925d' => 
    array (
      0 => '../templates/detail.tpl',
      1 => 1337853333,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20144914554fbf449a30d176-01835647',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4fbf449a356e53_35049810',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fbf449a356e53_35049810')) {function content_4fbf449a356e53_35049810($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Users/tsukasa/htdocs/mvc-mailform/lib/smarty/plugins/modifier.date_format.php';
?><html>
<head>
    <meta http-equiv="Content-Type" content="text/html;UTF-8">
</head>
<body>
<h1>問い合わせ</h1>
<h2>表示</h2>
<dl>
    <dt>ID</dt>
    <dd><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['msg']->value->id, ENT_QUOTES, 'UTF-8', true);?>
</dd>
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
    <dt>登録日時</dt>
    <dd><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['msg']->value->created,"%Y年%m月%d日 %H時%M分");?>
</dd>
    <dt>更新日時</dt>
    <dd><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['msg']->value->updated,"%Y年%m月%d日 %H時%M分");?>
</dd>
</dl>
<a href="./">メッセージ一覧</a>
</body>
</html>
<?php }} ?>