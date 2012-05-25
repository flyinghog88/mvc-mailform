<?php
/**
 * Messages コントローラー
 * 
 */
// Messageクラスの読み込み
require_once "../lib/message.php";
class Messages {
    /**
     * 一覧 
     * 
     */
    public function index() {
        // メッセージ一覧データを取得
        $list = Message::getList();
        // データをテンプレートに登録
        Init::$smarty->assign("list", $list);
        // メッセージ一覧画面を出力
        Init::$smarty->display("list.tpl");
    }
    /**
     * 登録フォーム 
     * 
     */
    public function form() {
        $msg = new Message();
        Init::$smarty->display("form.tpl");
    }
    /**
     * 確認
     * 
     */
    public function confirm() {
        // Messageオブジェクト生成
        $msg = new Message($_POST);
        // テンプレートにオブジェクトをアサイン
        Init::$smarty->assign("msg", $msg);
        // エラーの有無を確認
        if (Message::$error) {
            // エラーがあればフォームを表示
            Init::$smarty->assign("error", Message::$error);
            Init::$smarty->display("form.tpl");
            return;
        }
        // 確認画面を表示出力
        Init::$smarty->display("confirm.tpl");
        // Messageオブジェクトをセッションに保存
        $_SESSION["Message"] = serialize($msg);
    }
    /**
     * 保存
     *  
     */
    public function save() {
        // Messageオブジェクトをセッションから復元
        $msg = unserialize($_SESSION["Message"]);
        // データをデータベースに挿入
        $msg->save();
        // メールの送信
        $msg->sendmail();
        // テンプレート出力
        Init::$smarty->display("save.tpl");
    }
    /**
     * 修正
     *  
     */
    public function edit() {
        // セッションからオブジェクトを復元
        $msg = unserialize($_SESSION["Message"]);
        // テンプレートにオブジェクトをアサイン
        Init::$smarty->assign("msg", $msg);
        // フォームを表示
        Init::$smarty->display("form.tpl");
    }
    /**
     * 更新フォーム
     *  
     */
    public function update() {
        // 指定IDのMessageオブジェクトを取得
        $msg = new Message($_GET["id"]);
        // テンプレートにオブジェクトをアサイン
        Init::$smarty->assign("msg", $msg);
        // テンプレート出力
        Init::$smarty->display("form.tpl");
    }
    /**
     * 詳細
     *  
     */
    public function detail() {
        // 指定IDのMessageオブジェクトを取得
        $msg = new Message($_GET["id"]);
        // テンプレートにオブジェクトをアサイン
        Init::$smarty->assign("msg", $msg);
        // テンプレート出力
        Init::$smarty->display("detail.tpl");
    }
    /**
     * 削除
     *  
     */
    public function delete() {
        // 指定IDのMessageオブジェクトを取得
        $msg = new Message($_GET["id"]);
        // データの削除
        $msg->delete();
        // テンプレート出力
        Init::$smarty->display("delete.tpl");
    }
}