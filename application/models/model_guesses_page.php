<?
class Model_guesses_page extends Model
{
    public function initialize($amount_of_extra){
        define("selectedamountofextra", $amount_of_extra);
        if(Storage::is_value_set(team)){
	        
	        ExtraSense::team_from_JSON(Storage::read(team));
	        
	        if(selectedamountofextra != ExtraSense::get_amount_of_team_members()){
	            ExtraSense::create_new_team(selectedamountofextra);
	            Storage::save(history,NULL);
	        }
	    }
	    else{
	        ExtraSense::create_new_team(selectedamountofextra);
	    }
    }
    
    public function make_gueses(){
        ExtraSense::team_generate_gueses();
	    Storage::save(team, ExtraSense::team_to_JSON());
    }
    
    public function get_data(){
        foreach(ExtraSense::$extrasense_team as $member){
            $data[] = [
                'name' => $member->get_name(),
                'guess' => $member->get_guess()
                ]; 
        }
	    return $data;
	}
	
	
}
?>