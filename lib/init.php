<?php
/**
 * システム初期化処理クラス
 *  
 */
// システム設定項目
require_once "../etc/config.php";
// Smarty
require_once "../lib/smarty/Smarty.class.php";

class Init {
    /**
     * Smartyオブジェクト
     * @var object 
     */
    public static $smarty;
    /**
     * PDOオブジェクト
     * @var object
     */
    public static $pdo;
    /**
     * 初期化
     *  
     */
    public static function execute() {
        // セッションの開始
        session_start();
        // マルチバイト文字列設定
        mb_language("Japanese");
        mb_internal_encoding("UTF-8");
        // Smartyのインスタンス化と設定
        static::$smarty = new Smarty;
        static::$smarty->error_reporting  = E_ALL & ~ E_NOTICE;
        static::$smarty->template_dir     = TEMPLATE_DIR;
        static::$smarty->compile_dir      = COMPILE_DIR;
        
        // データベースに接続する
        static::$pdo = new PDO(
            "mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME, // DSN
            DB_USER, // ユーザー名
            DB_PASSWORD, // パスワード
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES " . DB_ENCODING) // ドライバオプション
        );
        // PDO例外処理設定
        static::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
