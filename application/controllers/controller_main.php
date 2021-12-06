<?
const minofextra = 2;
const maxofextra = 10;



class Controller_Main extends Controller
{
    private function GuessButton_Click()
	{
	    $this->view->generate('guesses_view.php', 'template_view.php',$this->model->get_data());
	}
	
	function action_index()
	{
	    //$extrasense = array();
	    $this->model = new Model_main();
	    
        //Нажата кнопка установки колличества экстрасенсов
	   if(isset($_POST['CountOfExtraButton'])){
	       define("selectedamountofextra", $_POST['AmountOfExtra']);
	       $this->model->restart();
	       $this->model->GenExtraSenses(selectedamountofextra);
	       //echo "selected ammount-".selectedamountofextra;
	   }
	   //Если новая сессия генерим рандомное количесво экстрасенсов
	   elseif(!isset($_SESSION['Data'])){
	       define("selectedamountofextra", mt_rand(minofextra, maxofextra));
            $this->model->GenExtraSenses(selectedamountofextra);
            //echo "genered ammount-".selectedamountofextra;
	   }
	   //Вытаскиваем количество экстрасенсов из сохраненных данных
	   else{
	       //extract($this->model->data);
	       define("selectedamountofextra", $this->model->get_amount());
	       //echo "data found ammount-".selectedamountofextra;
	   }
	   
	   
	   //Обработка нажатия кнопки загадал
		if(isset($_POST['GuessButton'])){
		    $this->model->generate_guesses();
		    $this->GuessButton_Click();
		}
		//Обработка кнопки подтверждения введения загаданного значения
		else if(isset($_POST['NumInput'])){ 
		    $this->model->set_number($_POST['NumInput']);
		    $this->model->check_guesses();
		    $this->model->save_values();
		    $this->view->generate('main_view.php', 'template_view.php',$this->model->get_data());
        }
        else $this->view->generate('main_view.php', 'template_view.php',$this->model->get_data());
	    //echo 'amount of gueses'.$this->model->get_gues_ammount();
    }
	

}
?>