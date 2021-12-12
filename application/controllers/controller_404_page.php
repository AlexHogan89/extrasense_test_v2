<?
class Controller_404_page extends Controller
{
	function action_run()
	{	
		$this->view->generate('404_page_view.php', template ,'template_view.php');
	}
}
?>