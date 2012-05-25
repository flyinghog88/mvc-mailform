<?php
try {
    // Initクラスの読み込み
    require_once "../lib/init.php";
    
    // システム初期化処理
    Init::execute();
    
    /**
     * コントローラーのディスパッチ 
     */
    if (!isset($_GET["ctl"])) {
        $controllerName = strtolower(DEFAULT_CONTROLLER);
    } else {
        $controllerName = strtolower($_GET["ctl"]);
    }
    if (!file_exists("../lib/controller_{$controllerName}.php")) {
        throw new Exception("存在しないクラスファイル：{$controllerName}");
    }
    require_once "../lib/controller_{$controllerName}.php";
    if (!class_exists(ucfirst($controllerName))) {
        throw new Exception("未定義のクラス：{$controllerName}");
    }
    $controller = new $controllerName;
    
    /**
     * アクションの実行 
     */
    if (!isset($_GET["act"])) {
        $action = strtolower(DEFAULT_ACTION);
    } else {
        $action = strtolower($_GET["act"]);
    }
    if (!method_exists($controller, $action)) {
        throw new Exception("未定義のアクション：{$action}");
    }
    $controller->$action();
    
} catch (Exception $e) {
    exit($e->getMessage() . " : " . $e->getFile() . " on line " . $e->getLine());
}
