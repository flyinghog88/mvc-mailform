<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;UTF-8">
</head>
<body>
<h1>問い合わせ</h1>
<h2>フォーム</h2>
<form action="?ctl=messages&act=confirm" method="post">
    <input type="hidden" name="id" value="{$msg->id}">
<dl>
    <dt>氏名</dt>
    {if $error.name_empty}<dd>氏名を入力してください</dd>{/if}
    <dd><input type="text" name="name" value="{$msg->name|escape}"></dd>
    <dt>性別</dt>
    {if $error.gender_empty}<dd>性別を選択してください</dd>{/if}
    {if $error.gender_select}<dd>性別を正しく入力してください</dd>{/if}
    <dd>
        <input type="radio" name="gender" value="男" {if $msg->gender == "男"}checked{/if}>男
        <input type="radio" name="gender" value="女" {if $msg->gender == "女"}checked{/if}>女
    </dd>
    <dt>〒</dt>
    {if $error.zip_empty}<dd>〒を入力してください</dd>{/if}
    {if $error.zip_format}<dd>〒を正しく入力してください</dd>{/if}
    <dd><input type="text" name="zip" value="{$msg->zip|escape}"></dd>
    <dt>メッセージ</dt>
    {if $error.message_empty}<dd>メッセージを入力してください</dd>{/if}
    <dd><textarea name="message" rows="5" cols="40">{$msg->message|escape}</textarea></dd>
</dl>
<input type="submit" value="確認">
</form>
</body>
</html>
