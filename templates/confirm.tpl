<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;UTF-8">
</head>
<body>
<h1>問い合わせ</h1>
<h2>確認</h2>
<dl>
    <dt>氏名</dt>
    <dd>{$msg->name|escape}</dd>
    <dt>性別</dt>
    <dd>{$msg->gender|escape}</dd>
    <dt>〒</dt>
    <dd>{$msg->zip|escape}</dd>
    <dt>メッセージ</dt>
    <dd>{$msg->message|escape|nl2br}</dd>
</dl>
<form action="?ctl=messages&act=save" method="post">
    <input type="submit" value="登録">
</form>
<form action="?ctl=messages&act=edit" method="post">
    <input type="submit" value="修正">
</form>
</body>
</html>
