<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;UTF-8">
</head>
<body>
<h1>問い合わせ</h1>
<h2>表示</h2>
<dl>
    <dt>ID</dt>
    <dd>{$msg->id|escape}</dd>
    <dt>氏名</dt>
    <dd>{$msg->name|escape}</dd>
    <dt>性別</dt>
    <dd>{$msg->gender|escape}</dd>
    <dt>〒</dt>
    <dd>{$msg->zip|escape}</dd>
    <dt>メッセージ</dt>
    <dd>{$msg->message|escape|nl2br}</dd>
    <dt>登録日時</dt>
    <dd>{$msg->created|date_format:"%Y年%m月%d日 %H時%M分"}</dd>
    <dt>更新日時</dt>
    <dd>{$msg->updated|date_format:"%Y年%m月%d日 %H時%M分"}</dd>
</dl>
<a href="./">メッセージ一覧</a>
</body>
</html>
