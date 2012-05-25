<html>
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
    {foreach $list as $message}
    <tr>
        <td>{$message->id|escape}</td>
        <td><a href="?ctl=messages&act=detail&id={$message->id|escape}">{$message->name|escape}</a></td>
        <td>{$message->gender|escape}</td>
        <td><a href="?ctl=messages&act=update&id={$message->id|escape}">更新</a></td>
        <td><a href="?ctl=messages&act=delete&id={$message->id|escape}" onclick="return deleteConfirm();">削除</a></td>
    </tr>
    {/foreach}
</table>
<a href="?ctl=messages&act=form">新規登録</a>
</body>
</html>
