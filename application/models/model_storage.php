<?
define("team", "team_data");
define("history", "history_data");

class Storage {
    
    static function is_value_set($name){
        return isset($_SESSION[$name]);
    }
    
    static function save($name, $value){
        $_SESSION[$name] = $value;
    }
    
    static function read($name){
            $value = $_SESSION[$name];
            return $value;
    }
}
?>