<?
class Route
{
	static function start()
	{
		// контроллер и действие по умолчанию
		$controller_name = 'start_page';
		$action_name = 'run'; // экшен по умолчанию
		$problems = 0;
		
		$routes = explode('/', $_SERVER['REQUEST_URI']);

		// получаем имя контроллера
		if ( !empty($routes[1]) )
		{	
			$controller_name = $routes[1];
		}
		
		// получаем имя экшена
		if ( !empty($routes[2]) )
		{
			$action_name = $routes[2];
		}

		// добавляем префиксы
		$model_name = 'Model_'.$controller_name;
		$controller_name = 'Controller_'.$controller_name;
		$action_name = 'action_'.$action_name;

		// подцепляем модель

		$model_file = strtolower($model_name).'.php';
		$model_path = "application/models/".$model_file;
		if(file_exists($model_path))
		{
			include "application/models/".$model_file;
		}

		// подцепляем контроллер
		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "application/controllers/".$controller_file;
		if(file_exists($controller_path))
		{
			include "application/controllers/".$controller_file;
			// создаем контроллер
		    $controller = new $controller_name;
		    $action = $action_name;
		
		    if(method_exists($controller, $action))
		    {
		    	// вызываем действие контроллера
			    $controller->$action();
		    }
		    else $problems++;
		}
		else
		{
			$problems++;
		}
		
		    
		// выводим ошибку если не понравился request    
		if(!$problems == 0){
		    include "application/controllers/controller_404_page.php";
		    
		    $controller_name = 'Controller_404_page';
		    $controller = new $controller_name;
		    $action = 'action_run';
		    $controller->$action();
		}
	
	}
}
?>