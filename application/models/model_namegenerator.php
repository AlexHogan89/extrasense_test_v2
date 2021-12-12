<?
class NameGenerator {
    const names = array(
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
	  
	static function GetName(){
        static $name_index = 0;
        $name_index++;
        return self::names[$name_index];
    }
}

?>