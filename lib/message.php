<?php
/**
 * Messageクラス
 *
 */
class Message {
    /**
     * ID
     * @var integer
     */
    private $id;
    /**
     * 氏名
     * @var string
     */
    private $name;
    /**
     * 性別
     * @var string
     */
    private $gender;
    /**
     * 郵便番号
     * @var string 
     */
    private $zip;
    /**
     * メッセージ
     * @var string
     */
    private $message;
    /**
     * 更新日時
     * @var string 
     */
    private $updated;
    /**
     * 登録日時
     * @var string 
     */
    private $created;
    /**
     * バリデーションエラーデータ
     * @var array 
     */
    public static $error = array();
    
    /**
     * コンストラクタ
     * @param mixed $param メッセージIDまたはプロパティデータ配列
     */
    public function __construct($param = NULL) {
        // 数値データならばID指定：指定IDのデータを取得
        if (isset($param) && is_numeric($param)) {
            // SQL文の作成
            $sql = "SELECT * FROM messages WHERE id = :id";
            // SQL実行準備
            $state = Init::$pdo->prepare($sql);
            // バインド
            $state->bindValue(":id", $param);
            // SQL実行
            $state->execute();
            // データの取得 → プロパティにセット
            $state->setFetchMode(PDO::FETCH_INTO, $this);
            $state->fetch();
            
        // 配列ならばプロパティデータ：データをプロパティにセット
        } elseif (isset($param) && is_array($param)) {
            foreach (array("id", "name", "gender", "zip", "message", "created", "updated") as $name) {
                if (!isset($param[$name])) {
                    $param[$name] = NULL;
                }
                $this->__set($name, $param[$name]);
            }
        }
    }
    
    /**
     * マジックセッター
     * @param string $name プロパティ名
     * @param mixed $value セットする値
     * @throws Exception 
     */
    public function __set($name, $value) {
        if (!property_exists($this, $name)) {
            throw new Exception("未定義のプロパティ: {$name}");
        }
        if (method_exists($this, "validate{$name}")) {
	        $this->{"validate{$name}"}($value);
        }
        $this->$name = $value;
    }
    
    /**
     * バリデータ：id
     * @param integer $value チェックする値 
     */
    private function validateId($value) {
    }
    /**
     * バリデータ：name
     * @param string $value チェックする値
     */
    private function validateName($value) {
        // 必須チェック
        if (strlen($value) == 0) {
            static::$error["name_empty"] = TRUE;
        }
    }
    /**
     * バリデータ：gender
     * @param string $value チェックする値
     */
    private function validateGender($value) {
        // 必須チェック
        if (strlen($value) == 0) {
            static::$error["gender_empty"] = TRUE;
        // 入力値チェック
        } elseif ($value != "男" && $value != "女") {
            static::$error["gender_select"] = TRUE;
        }
    }
    /**
     * バリデータ：zip
     * @param string $value チェックする値
     */
    private function validateZip($value) {
        // 必須チェック
        if (strlen($value) == 0) {
            static::$error["zip_empty"] = TRUE;
        // パターンチェック
        } elseif (!preg_match('/^\d{3}-\d{4}$/', $value)) {
            static::$error["zip_format"] = TRUE;
        }
    }
    /**
     * バリデータ：message
     * @param string $value チェックする値
     */
    private function validateMessage($value) {
        // 必須チェック
        if (strlen($value) == 0) {
            static::$error["message_empty"] = TRUE;
        }
    }
    /**
     * バリデータ：updated
     * @param string $value チェックする値
     */
    private function validateUpdated($value) {
    }
    /**
     * バリデータ：created
     * @param string $value チェックする値
     */
    private function validateCreated($value) {
    }
    
    /**
     * マジックゲッター
     * @param string $name プロパティ名
     * @return mixed プロパティ値
     * @throws Exception 
     */
    public function __get($name) {
        if (!property_exists($this, $name)) {
            throw new Exception("未定義のプロパティ: {$name}");
        }
        return $this->$name;
    }

    /**
     * データの保存
     *  
     */
    public function save() {
        // IDの指定があれば更新、無ければ登録
        if ($this->id) {
            // UPDATE文の作成
            $sql  = "UPDATE messages SET name = :name, gender = :gender, zip = :zip, message = :message";
            $sql .= " WHERE id = :id;";
        } else {
            // INSERT文の作成
            $sql  = "INSERT INTO messages(id, name, gender, zip, message, created)";
            $sql .= " VALUES(:id, :name, :gender, :zip, :message, NOW());";
        }
        // SQL実行準備
        $state = Init::$pdo->prepare($sql);
        // 値のバインド
        $state->bindValue(":id", $this->id);
        $state->bindValue(":name", $this->name);
        $state->bindValue(":gender", $this->gender);
        $state->bindValue(":zip", $this->zip);
        $state->bindValue(":message", $this->message);
        // SQL実行
        $state->execute();
    }
    
    /**
     * データの削除
     *  
     */
    public function delete() {
        // DELETE文の作成
        $sql = "DELETE FROM messages WHERE id = :id;";
        // SQL実行準備
        $state = Init::$pdo->prepare($sql);
        // 値のバインド
        $state->bindValue(":id", $this->id);
        // SQL実行
        $state->execute();
    }
    
    /**
     * メールの送信
     *  
     */
    public function sendmail() {
        // メール送信準備
        $to = "tsukasa@koiz.me"; // 宛先
        $from = "php-master@linuxacademy.ne.jp"; // 差出人
        $subject = "問い合わせ"; // 件名
        $body = "問い合わせ内容は以下の通りです。
氏名：{$this->name}
性別：{$this->gender}
〒：{$this->zip}
メッセージ：
{$this->message}
";
        // 差出人設定
        $headers = "From: {$from}";
        $options = "-f{$from}";
        // メール送信
        mb_language("Japanese");
        mb_internal_encoding("UTF-8");
        mb_send_mail($to, $subject, $body, $headers, $options);
    }
    
    /**
     * オブジェクトリストの生成
     * @return array オブジェクトリスト配列
     * @static
     */
    public static function getList() {
        // SQL文の作成
        $sql = "SELECT * FROM messages";
        // SQL文の実行
        $state = Init::$pdo->query($sql);
        // オブジェクトリスト（配列）を返す
        return $state->fetchAll(PDO::FETCH_CLASS, "Message");
    }
}
