<?
class View{
    public $data;
    
	function generate($content_view, $template_view, $data_array = null)
	{
		if(isset($data_array)) {
			$this->data = $data_array; 
		}
		include 'application/views/'.$template_view;
	}
}
?>