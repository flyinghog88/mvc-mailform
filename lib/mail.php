<?php
/**
 * メール送信処理クラス
 *  
 */
class Mail {
    /**
     * メールテンプレート用Smartyオブジェクト
     * @var object 
     */
    public static $smarty;
    
    /**
     * メール送信の準備
     * @static
     */
    public static function prepare() {
        // Smartyのインスタンス化と設定
        static::$smarty = new Smarty;
        static::$smarty->template_dir    = TEMPLATE_DIR;
        static::$smarty->compile_dir     = COMPILE_DIR;
        static::$smarty->error_reporting = E_ALL & ~ E_NOTICE;
    }
    /**
     * メール送信
     * @static
     * @param string $to       宛先メールアドレス
     * @param string $from     差出人メールアドレス
     * @param string $subject  題名
     * @param string $template メール本文テンプレート
     */
    public static function send($to, $from, $subject, $template) {
        // 差出人アドレスの設定
        $header = "From: <{$from}>";
        $option = "-f{$from}";
        // テンプレートのコンパイル
        $body = static::$smarty->fetch($template);
        // メール送信
        mb_send_mail($to, $subject, $body, $header, $option);
    }
}