<?

class Route
{

	static function start()
	{
		$controller_name = 'SignupController';
		$action_name = 'Index';

		$routes = explode('/', $_SERVER['REQUEST_URI']);
		
		if ( !empty($routes[1]) )
		{	
			$controller_name = $routes[1];
		}
		
		if ( !empty($routes[2]) )
		{
			$action_name = $routes[2];
		}

		$model_name = strtolower(str_replace("Controller","",$controller_name));
		$controller_name = $controller_name;
		$action_name = 'action'.$action_name;

		
		echo "Model: $model_name <br>";
		echo "Controller: $controller_name <br>";
		echo "Action: $action_name <br>";
	

		$model_file = $model_name.'.php';
		$model_path = "application/models/".$model_file;
		if(file_exists($model_path))
		{
			include $model_path;
		}
        
		$controller_file = $controller_name.'.php';		
		$controller_path = "application/controllers/".$controller_file;	
		if(file_exists($controller_path))
		{
			include $controller_path;
		}
		else
		{
			echo "404 Page not found"; //add exсeption
		}
		

		$controller = new $controller_name;
		$action = $action_name;
		
		if(method_exists($controller, $action))
		{
			$controller->$action();
		}
		else
		{
			echo "404 Page not found"; //add exсeption 
		}

}

}

    
