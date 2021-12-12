<?

class Controller_start_page extends Controller
{
	
	function action_run()
	{
	    $this->model = new Model_start_page();
	    $this->model->initialize();

        if(isset($_POST['NumInput'])){
            $this->model->check_usernumber($_POST['NumInput']);
		    $this->view->generate('start_page_view.php', template, $this->model->get_data());
        }
        else $this->view->generate('start_page_view.php', template);
    }
	

}
?>