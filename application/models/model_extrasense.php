<?

class ExtraSense implements JsonSerializable{
    
        static $extrasense_team;
        private $name = '-';
        private $truth = 0;
        private $guess = 0;
        
        public function jsonSerialize(){
            return
                [
                 'name'  => $this->get_name(),
                 'truth'  => $this->get_truth(),
                 'guess' => $this->get_guess()
                ];
        }
        
        
        static function get_amount_of_team_members(){
            return count(ExtraSense::$extrasense_team);
            
        }

        static function get_gueses_array(){
            foreach(ExtraSense::$extrasense_team as $member){
                $extragueses[] = $member->get_guess();
            }
            return $extragueses;
        }


        static function check_guesses($usernumber){
            foreach(ExtraSense::$extrasense_team as $member){
                if($usernumber == $member->get_guess()) $member->inc_truth();
            }
        }
        
        static function create_new_team($amount_of_members){
            ExtraSense::$extrasense_team = NULL;
            while($amount_of_members>0){
                ExtraSense::$extrasense_team[] = new ExtraSense();
                $amount_of_members--;
            }
            
            foreach(ExtraSense::$extrasense_team as $item){
                $item->set_name(NameGenerator::GetName());
            }
        }
        
        static function team_generate_gueses(){
            foreach(ExtraSense::$extrasense_team as $item){
                $item->set_guess(mt_rand(10,99));
            }
        }
        
        static function team_from_JSON($JSON_team){
            $arrayofstdClass = json_decode($JSON_team);
            foreach($arrayofstdClass as $stdObject){
                ExtraSense::$extrasense_team[] = new ExtraSense();
                foreach ($stdObject as $prop => $value) {
                end(ExtraSense::$extrasense_team)->$prop = $value;
                }
            }
        }
        
        static function team_to_JSON(){
            return json_encode(ExtraSense::$extrasense_team);
        }
        
        function set_name($name) {
            $this->name = $name;
        }
        
        function get_name() {
            return $this->name;
        }
        
        function set_truth($truth) {
            $this->truth = $truth;
        }
        
        function inc_truth() {
            $this->truth++;
        }
        
        function get_truth() {
            return $this->truth;
        }
        
        function PercentOfLuck($amount_of_gueses){
            if($amount_of_gueses == 0) return '-';
            else{
                $d = round($this->truth*100/$amount_of_gueses, 1);
                return $d;
            }
        }
        
        function set_guess($guess) {
            $this->guess = $guess;
        }
        
        function get_guess() {
            return $this->guess;
        }
}
?>