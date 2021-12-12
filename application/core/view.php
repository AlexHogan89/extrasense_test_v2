<?
class View{
    
	function generate($content_view, $template_view, $data_array = null)
	{
		if(isset($data_array)) {
			$this->data = $data_array; 
		}
		include 'application/templates/'.$template_view;
	}
}
?>