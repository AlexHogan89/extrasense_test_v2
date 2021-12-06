<?
include 'application/extra.php';


class Model_main extends Model
{
    private $data;
    private $extrasense; //array((object)extra0, (object)extra1, ...)
    private $usernumbers;
    private $gueses; //array(extra0_guess, extra1_guess, ...)
    private $NumHistory; //array(number, gueses)
    private $number = 0;
    
    public function get_gues_ammount(){
        return count($this->NumHistory);
    }
    
    public function set_number($user_number){
       $this->number = $user_number;
    }
    
    public function __construct(){
        if(isset($_SESSION['Data'])){
            $this->data = unserialize($_SESSION['Data']);
            $this->extrasense = $this->data[0];
            $this->NumHistory = $this->data[1];
           //print_r($this->data);
        }
    }
    
    public function __destruct(){
        $this->data = serialize(array($this->extrasense, $this->NumHistory));
        $_SESSION['Data'] = $this->data;
    }
    
    public function restart(){
        $this->extrasense = NULL;
        $this->NumHistory = NULL;
    }
    
    public function get_amount(){
        return count($this->extrasense);
    }
    
    public function GenExtraSenses($n){
        $this->extrasense = NULL;
        while($n>0){
            $this->extrasense[] = new ExtraSense();
            $n--;
        }
    }
    
    public function check_guesses(){
        foreach($this->extrasense as $item){
            $this->gueses[] = $item->get_guess();
            if($this->number == $item->get_guess()) $item->inc_truth();
        }
    }
    
    public function generate_guesses(){
        foreach($this->extrasense as $item){
            $item->set_guess(mt_rand(10,99));
        }
    }
    
    public function save_values(){
        $this->NumHistory[] = [$this->number, $this->gueses];
    }
    
    public function get_gueses(){
        return $this->$gueses;
    }
    
	public function get_data()
	{	
		return array($this->extrasense, $this->NumHistory, $this->get_gues_ammount());
	}
}
?>