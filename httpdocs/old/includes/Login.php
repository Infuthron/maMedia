<?php
class Login extends PDO
{
    private static $instance;
    public static function getInstance ($db_host, $db_name, $db_username, $db_password){
        if (!self::$instance){
            self::$instance = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=utf8', $db_username, $db_password);
        }
        return self::$instance;
    }

    private $pass_hash;
    public function __construct( $table = 'users', $id_rowName = 'id', $username_rowName = 'username', $password_rowName = 'password', $key_rowName = 'login_key', $db_host = DB_HOST, $db_name=DB_NAME, $db_username=DB_USERNAME, $db_password=DB_PASSWORD)
    {
        if(session_id() == '') {
            session_start();
        }
        if (isset($_SESSION['LOGIN_FORM_KEY']))$this->oldKey = $_SESSION['LOGIN_FORM_KEY'];
        $this->table = $table;
        $this->id_rowName = $id_rowName;
        $this->username_rowName = $username_rowName;
        $this->password_rowName = $password_rowName;
        $this->key_rowName = $key_rowName;

        $this->db = $this->getInstance($db_host, $db_name, $db_username, $db_password);
//        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(version_compare(phpversion(), '5.5', '<')){
            $this->pass_hash = 0;
        }else{
            $this->pass_hash = 1;
        }

    }
    public function settings($settings=array('formValidation'=>false)){
        foreach ($settings as $key=>$value){
         $settings[$key]=array('value'=>$value);
        }
        if (isset($settings['formValidation'])&&$settings['formValidation']['value']){
                $formKey = hash('sha1',rand(0, 1000)*time());
            $_SESSION['LOGIN_FORM_KEY'] = $formKey;
            $settings['formValidation']['response']=$formKey;
            if (!isset($this->oldKey))$this->oldKey = $formKey;
        }
        $this->settings = $settings;
        return $settings;
    }
    public function loggedin($get_rows_array = array())
    {
            if (!empty($_SESSION['KEY']) && !empty( $_SESSION['ID']) && !empty($_SESSION['IP']) && $_SESSION['KEY'] !== '' && $_SESSION['IP'] == $_SERVER["REMOTE_ADDR"]||isset($_COOKIE['USER_KEY'])&&isset($_COOKIE['USER_ID'])&&$_COOKIE['USER_ID']!=''&&$_COOKIE['USER_ID']!='') {
                    if (isset($_SESSION['KEY'])||isset($_SESSION['ID'])){
                        if (empty($_SESSION['IP'])||$_SESSION['IP']!=$_SERVER['REMOTE_ADDR']){
                            $this->logout();
                            return 0;
                        }
                    }

                $select_string = "";
                if (!empty($get_rows_array)) {
                    $select_string = ",".implode(",", $get_rows_array);
                }
                if (empty($_SESSION['ID'])){
                    $_SESSION['ID'] = filter_var($_COOKIE['USER_ID'],FILTER_SANITIZE_NUMBER_INT);
                }
                $id = filter_var($_SESSION['ID'],FILTER_SANITIZE_NUMBER_INT);
                $stmt = $this->db->prepare("SELECT `" . $this->key_rowName. "` $select_string FROM `$this->table` WHERE `". $this->id_rowName. "`=:id");
                $stmt->bindParam(':id',$id,PDO::PARAM_INT);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if (!empty($_SESSION['KEY'])&&$row[$this->key_rowName] == $_SESSION['KEY']||!empty($_COOKIE['USER_KEY'])&&$row[$this->key_rowName]==$_COOKIE['USER_KEY']){
                    if (!isset($_SESSION['LOGIN_KEY_TIME']))$_SESSION['LOGIN_KEY_TIME'] = time();
                    if($_SESSION['LOGIN_KEY_TIME']+3600<time()){
                        $this->generateKey($id, !empty($_COOKIE['USER_ID']));
                    }




                    $_SESSION['IP'] = $_SERVER["REMOTE_ADDR"];
                    $this->Return_array = array();
                    for ($j = 0; $j<count($get_rows_array); $j++){
                        $this->Return_array[$get_rows_array[$j]] = $row[$get_rows_array[$j]];
                    }

                    return 1;
                }else{
                    $this->logout();
                    return 0;
                }
            } else {
                return 0;
            }
    }

    public function logout($returnLocation = ''){
            if (isset($_COOKIE['USER_ID']))setcookie("USER_ID", "", time() - 3600, '/', $_SERVER['HTTP_HOST'],isset($_SERVER['HTTPS']),true);
            if (isset($_COOKIE['USER_KEY']))setcookie("USER_KEY", "", time() - 3600, '/', $_SERVER['HTTP_HOST'],isset($_SERVER['HTTPS']),true);
        if (isset($_SESSION['ID'])){
            $id = filter_var($_SESSION['ID'],FILTER_SANITIZE_NUMBER_INT);
            $stmt = $this->db->prepare("UPDATE `" . $this->table . "` SET `".$this->key_rowName. "`='' WHERE `". $this->id_rowName ."`=:id");
            $stmt->bindParam(':id',$id,PDO::PARAM_INT);
            $stmt->execute();
        $_SESSION['ID'] = '';
        $_SESSION['KEY'] = '';
        $_SESSION['IP'] = '';
        session_unset();
        session_destroy();
        }

        if ($returnLocation!=''){
        header('location: ' . $returnLocation);
        }
    }

    public function login($username, $password, $get_rows_array = array(), $additional_parameters=array('remember_me'=>false, 'formKey'=>'')){
        if (!isset($this->settings['formValidation'])||!$this->settings['formValidation']['value']||$additional_parameters['formKey']==$this->oldKey){

            $remember_me = isset($additional_parameters['remember_me'])&&$additional_parameters['remember_me'];
            $select_string = "";


        if (!empty($get_rows_array)) {
        $select_string = ",".implode(",", $get_rows_array);
        }
        $stmt = $this->db->prepare("SELECT `" . $this->password_rowName . "`,`" . $this->id_rowName . "` $select_string FROM `" . $this->table . "` WHERE ". $this->username_rowName ." = :username");
        $stmt->bindValue(':username', filter_var($username, FILTER_SANITIZE_STRING), PDO::PARAM_STR);
        if($stmt->execute()){
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $success = 0;
            switch ($this->pass_hash){
                case 1:
                    if(password_verify($password, $row[$this->password_rowName])){
                        $success = 1;
                    }else{
                        $success = 0;
                    }
                    break;
                case 0:
                    if(hash('whirlpool', $password) == $row[$this->password_rowName]){
                        $success = 1;
                    }else{
                        $success = 0;
                    }
                    break;
            }
            if($success){
                $_SESSION['ID'] = $row['id'];
                $_SESSION['IP'] = $_SERVER["REMOTE_ADDR"];
                if ($remember_me){
                    setcookie('USER_ID', $row['id'], time() + 2592000, '/', $_SERVER['HTTP_HOST'], isset($_SERVER['HTTPS']), true);
                };
                $this->generateKey($row['id'],$remember_me);
                $this->Return_array = array();
                for ($j = 0; $j<count($get_rows_array); $j++){
                    $this->Return_array[$get_rows_array[$j]] = $row[$get_rows_array[$j]];
                }
                return 1;
            }else{
                return 0;
            }
        }else{
            return 0;
        }}else{
            if($additional_parameters['formKey']!=$_SESSION['LOGIN_FORM_KEY']){

            }
            return 0;
        }
    }

    public function register($username, $password, $additional_rows_assoc = array(), $additional_parameters=array('formKey'=>'')){
        if (!isset($this->settings['formValidation'])||!$this->settings['formValidation']['value']||$this->settings['formValidation']['value']&&$additional_parameters['formKey']==$this->oldKey){

            switch ($this->pass_hash){
            case 1:
                $password = password_hash($password, PASSWORD_DEFAULT);
                break;
            case 0:
                $password = hash('whirlpool', $password);
                break;
        }
        $rows = '';
        $values = '';
        foreach ($additional_rows_assoc as $key => $value){
        $rows .= ", `$key`";
        $values .= ", :" . str_replace(' ', '_', $key) . "PDO_VALUE";
        }
        $stmt = $this->db->prepare("INSERT INTO `". $this->table ."` (`". $this->username_rowName ."`, `" . $this->password_rowName ."` " . $rows . ") VALUES (:username, '$password' " . $values . ")");
        $stmt->bindValue(':username', filter_var($username, FILTER_SANITIZE_STRING), PDO::PARAM_STR);

        foreach ($additional_rows_assoc as $key => $value) {
            $stmt->bindValue(':' . str_replace(' ', '_', $key) . "PDO_VALUE", filter_var($value, FILTER_SANITIZE_STRING), PDO::PARAM_STR);
        }
        if ($stmt->execute()){
            return 1;
        }else{
            return 0;
        }}else{
            return 0;
        }

    }
    public function getArray(){
        return $this->Return_array;
    }
    private function generateKey($id, $remember_me){
        $id = filter_var($id,FILTER_SANITIZE_NUMBER_INT);
        $login_key = hash('whirlpool', rand(0, 500));
        $_SESSION['KEY'] = $login_key;
        $_SESSION['LOGIN_KEY_TIME'] = time();
        if ($remember_me){
            setcookie('USER_KEY', $_SESSION['KEY'], time() + 2592000, '/', $_SERVER['HTTP_HOST'],isset($_SERVER['HTTPS']),true);
        }
        $stmt = $this->db->prepare("UPDATE `" . $this->table . "` SET `".$this->key_rowName. "`='". $login_key. "' WHERE `". $this->id_rowName ."`=".$id);
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
    }
}
