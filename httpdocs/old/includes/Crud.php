<?php
class Crud
{
    private static $instance;
    public static function getInstance ($db_host, $db_name, $db_username, $db_password){
        if (!self::$instance){
            self::$instance = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=utf8', $db_username, $db_password);
        }
        return self::$instance;
    }
    public function __construct( $table = '', $db_host = DB_HOST, $db_name=DB_NAME, $db_username=DB_USERNAME, $db_password=DB_PASSWORD)
    {
        $this->table = $table;
        $this->db = $this->getInstance($db_host, $db_name, $db_username, $db_password);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (isset($_SESSION['CRUD_FORM_KEY_'.$this->table]))$this->oldKey = $_SESSION['CRUD_FORM_KEY_'.$this->table];
    }
    //settings
    public function settings($settings=array('formValidation'=>false)){
        foreach ($settings as $key=>$value){
            $settings[$key]=array('value'=>$value);
        }
        if (isset($settings['formValidation'])&&$settings['formValidation']['value']){
            $formKey = hash('sha1',rand(0, 1000)*time());
            $_SESSION['CRUD_FORM_KEY_'.$this->table] = $formKey;
            $settings['formValidation']['response']=$formKey;

        }
        $this->settings = $settings;
        return $settings;
    }
    //Create
    public function insert($rows = array(), $additionals_UNPROTECTED='', $additional_parameters = array()){

        if (!isset($additional_parameters['formKey'])||isset($additional_parameters['formKey'])&&$additional_parameters['formKey']==$this->oldKey){
        if (empty($rows)){
            return 'rows are empty';
        }else{
            $values = '';
            $db_rows='';

            foreach ($rows as $key => $value){
                $values .= ':' . $key . ",";
                $db_rows .= "`".$key . "`,";
            }
            $db_rows = substr(filter_var($db_rows),0,-1);
            $values = substr($values, 0, -1);
            $stmt = $this->db->prepare("INSERT INTO " . $this->table . " (" . $db_rows .") VALUES (".$values.")" . " " . $additionals_UNPROTECTED);
            foreach ($rows as $key => $value){
                $stmt->bindValue($key, $value, PDO::PARAM_STR);
            }
            $stmt->execute();
            return $stmt;
        }}
    }
    //Read
    public function select($rows = array(), $where = array(), $additionals_UNPROTECTED=''){
        if (!empty($rows)){
            $db_rows = implode(',', $rows);
            $db_rows = filter_var($db_rows);
        }else{
            $db_rows = '*';
        }
        $select_querry = '';
        if (!empty($where)){
            $select_querry = "WHERE ";
            foreach ($where as $key => $row){
                $select_querry .= "`" . $key . "`=:" . $key . " AND ";
            }
            $select_querry = substr($select_querry, 0, -5);
        }
        $stmt = $this->db->prepare("SELECT $db_rows FROM `". $this->table ."` " . $select_querry . " " . $additionals_UNPROTECTED);
        if (!empty($where)){
            foreach ($where as $key => $row){
                $stmt->bindValue($key, filter_var($row, FILTER_SANITIZE_STRING), PDO::PARAM_STR);
            }
        }
        $stmt->execute();
        return $stmt;
    }
    //Update

    public function update($rows=array(), $where=array(), $additionals_UNPROTECTED='',$additional_parameters = array()){
        if (!isset($additional_parameters['formKey'])||isset($additional_parameters['formKey'])&&$additional_parameters['formKey']==$this->oldKey){

            if (!empty($rows)&&!empty($where)){
                $db_rows = '';

            $select_querry = '';
                $select_querry = "WHERE ";
                foreach ($where as $key => $row){
                    $select_querry .= "`" . $key . "`=:" . $key . " AND ";
                }
                $select_querry = substr($select_querry, 0, -5);

            foreach ($rows as $key => $row){
                    $db_rows .= "`" . $key . "`=:" . $key . "2,";
                }
                $db_rows = substr($db_rows, 0, -1);

            $stmt = $this->db->prepare("UPDATE `" . $this->table . "` SET $db_rows " . $select_querry . " " . $additionals_UNPROTECTED);
                foreach ($where as $key => $row){
                    $stmt->bindValue($key, filter_var($row, FILTER_SANITIZE_STRING), PDO::PARAM_STR);
                }
                foreach ($rows as $key => $row){
                    $stmt->bindValue($key . '2', filter_var($row, FILTER_SANITIZE_STRING), PDO::PARAM_STR);
                }

            $stmt->execute();
            return $stmt;
        }else{
            return 'rows or conditions are empty';
        }}
    }
    //Delete
    public function delete($where = array(), $additionals_UNPROTECTED='', $additional_parameters = array())
    {
        if (!isset($additional_parameters['formKey'])||isset($additional_parameters['formKey'])&&$additional_parameters['formKey']==$this->oldKey){

            if (!empty($where)){
        $delete_querry = '';
        $delete_querry = "WHERE ";
        foreach ($where as $key => $row){
            $delete_querry .= "`" . $key . "`=:" . $key . " AND ";
        }
            $delete_querry = substr($delete_querry, 0, -5);
                $stmt = $this->db->prepare("DELETE FROM `" . $this->table . "` " . $delete_querry . " " . $additionals_UNPROTECTED);
            foreach ($where as $key => $row){
                $stmt->bindValue($key, filter_var($row, FILTER_SANITIZE_STRING), PDO::PARAM_STR);
            }
            $stmt->execute();
            return $stmt;
    }else{
            return 'conditions are empty';
        }
    }
    }
}
