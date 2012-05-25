<?php /* Smarty version Smarty-3.1.8, created on 2012-05-25 17:33:41
         compiled from "../templates/list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11556194004fbf43e526d276-71246534%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c63c4e722d610db91a72130e0215108793d26872' => 
    array (
      0 => '../templates/list.tpl',
      1 => 1337855326,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11556194004fbf43e526d276-71246534',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4fbf43e52a60b3_25706208',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fbf43e52a60b3_25706208')) {function content_4fbf43e52a60b3_25706208($_smarty_tpl) {?><html>
<head>
    <meta http-equiv="Content-Type" content="text/html;UTF-8">
    <script type="text/javascript" src="js/main.js"></script>
</head>
<body>
<h1>問い合わせ</h1>
<h2>問い合わせ一覧</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>氏名</th>
        <th>性別</th>
        <th>更新</th>
        <th>削除</th>
    </tr>
    <?php  $_smarty_tpl->tpl_vars['message'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['message']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['message']->key => $_smarty_tpl->tpl_vars['message']->value){
$_smarty_tpl->tpl_vars['message']->_loop = true;
?>
    <tr>
        <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['message']->value->id, ENT_QUOTES, 'UTF-8', true);?>
</td>
        <td><a href="?ctl=messages&act=detail&id=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['message']->value->id, ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['message']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a></td>
        <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['message']->value->gender, ENT_QUOTES, 'UTF-8', true);?>
</td>
        <td><a href="?ctl=messages&act=update&id=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['message']->value->id, ENT_QUOTES, 'UTF-8', true);?>
">更新</a></td>
        <td><a href="?ctl=messages&act=delete&id=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['message']->value->id, ENT_QUOTES, 'UTF-8', true);?>
" onclick="return deleteConfirm();">削除</a></td>
    </tr>
    <?php } ?>
</table>
<a href="?ctl=messages&act=form">新規登録</a>
</body>
</html>
<?php }} ?>