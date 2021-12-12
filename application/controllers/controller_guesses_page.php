<?
class Controller_guesses_page extends Controller
{
    function action_run()
	{
	    $this->model = new Model_guesses_page();
	    if(isset($_POST['AmountOfExtra'])){
	        $this->model->initialize($_POST['AmountOfExtra']);
	        $this->model->make_gueses();
	        $this->view->generate('guesses_page_view.php', template, $this->model->get_data());
	    }
	    else $this->view->generate('guesses_page_view.php', template);
	}
    
}
?>