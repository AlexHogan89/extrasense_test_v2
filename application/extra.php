<?

function GenExtraName(){
    $names = array(
        "Зенон Белый",
        "Конрад Темный",
        "Харитон Светлый",
        "Лука Граф",
        "Тимофей Колдун",
        "Яков Огненый",
        "Нестор Дракон",
        "Конрад Вредный",
        "Чеслав Марс",
        "Яромир Лунный",
        "Эльвира Болотная"
	  );
    static $name_index = 0;
    $name_index++;
    return $names[$name_index];
    }
	
class ExtraSense {
        private $name = '-';
        private $truth = 0;
        private $guess = 0;
        
        function __construct(){
            $this->set_name(GenExtraName());
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
        
        function PercentOfLuck($amount){
            if($amount == 0) return '-';
            else{
                $d = round($this->truth*100/$amount, 1);
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
