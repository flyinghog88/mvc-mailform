<?php /* Smarty version Smarty-3.1.8, created on 2012-05-25 17:33:43
         compiled from "../templates/form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8581981554fbf43e70e6a53-93025687%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '34da5acd125a8138d776c10e8c218218267238ea' => 
    array (
      0 => '../templates/form.tpl',
      1 => 1337853787,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8581981554fbf43e70e6a53-93025687',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4fbf43e7148769_13957170',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fbf43e7148769_13957170')) {function content_4fbf43e7148769_13957170($_smarty_tpl) {?><html>
<head>
    <meta http-equiv="Content-Type" content="text/html;UTF-8">
</head>
<body>
<h1>問い合わせ</h1>
<h2>フォーム</h2>
<form action="?ctl=messages&act=confirm" method="post">
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['msg']->value->id;?>
">
<dl>
    <dt>氏名</dt>
    <?php if ($_smarty_tpl->tpl_vars['error']->value['name_empty']){?><dd>氏名を入力してください</dd><?php }?>
    <dd><input type="text" name="name" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['msg']->value->name, ENT_QUOTES, 'UTF-8', true);?>
"></dd>
    <dt>性別</dt>
    <?php if ($_smarty_tpl->tpl_vars['error']->value['gender_empty']){?><dd>性別を選択してください</dd><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['error']->value['gender_select']){?><dd>性別を正しく入力してください</dd><?php }?>
    <dd>
        <input type="radio" name="gender" value="男" <?php if ($_smarty_tpl->tpl_vars['msg']->value->gender=="男"){?>checked<?php }?>>男
        <input type="radio" name="gender" value="女" <?php if ($_smarty_tpl->tpl_vars['msg']->value->gender=="女"){?>checked<?php }?>>女
    </dd>
    <dt>〒</dt>
    <?php if ($_smarty_tpl->tpl_vars['error']->value['zip_empty']){?><dd>〒を入力してください</dd><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['error']->value['zip_format']){?><dd>〒を正しく入力してください</dd><?php }?>
    <dd><input type="text" name="zip" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['msg']->value->zip, ENT_QUOTES, 'UTF-8', true);?>
"></dd>
    <dt>メッセージ</dt>
    <?php if ($_smarty_tpl->tpl_vars['error']->value['message_empty']){?><dd>メッセージを入力してください</dd><?php }?>
    <dd><textarea name="message" rows="5" cols="40"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['msg']->value->message, ENT_QUOTES, 'UTF-8', true);?>
</textarea></dd>
</dl>
<input type="submit" value="確認">
</form>
</body>
</html>
<?php }} ?>