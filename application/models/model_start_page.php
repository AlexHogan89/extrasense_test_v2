<?

class Model_start_page extends Model
{
    public function initialize(){
        if(Storage::is_value_set(team)){
            ExtraSense::team_from_JSON(Storage::read(team));
	        define("selectedamountofextra", ExtraSense::get_amount_of_team_members());
	    }
	    else define("selectedamountofextra", mt_rand(minofextra, maxofextra));
	   
	    if(Storage::is_value_set(history)){
	        History::history_from_JSON(Storage::read(history));
	    }
    }
    
    public function check_usernumber($usernumber){
		    ExtraSense::check_guesses($usernumber);
		    History::add_record($usernumber, ExtraSense::get_gueses_array());
		    Storage::save(team, ExtraSense::team_to_JSON());
		    Storage::save(history,History::history_to_JSON());
    }



    public function get_data(){
        foreach(ExtraSense::$extrasense_team as $member){
            $team_members[] = [
                    'name' => $member->get_name(),
                    'luck' => $member->PercentOfLuck(History::get_records_ammount())
                    ];
        }
        return [
        'history' => (array)History::get_history(),
        'team_members' => $team_members
        ];
    }

}
?>