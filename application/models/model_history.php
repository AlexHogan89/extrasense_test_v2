<?

class History implements JsonSerializable
{
    static $history; //array(number, gueses)
    
    public function jsonSerialize(){
            return self::get_history();
    }
    
    static function history_from_JSON($JSON_history){
        self::$history = json_decode($JSON_history, true);
    }
        
    static function history_to_JSON(){
        return json_encode(self::$history, true);
    }
    
    static function get_history(){
        return self::$history;
    }
    
    static function add_record($usernumber, $array_of_extragueses){
        self::$history[] = [
            'usernumber' => $usernumber,
            'extragueses' => $array_of_extragueses
            ];
    }
    
    static function get_records_ammount(){
        return count(self::$history);
    }
    
    
}

?>