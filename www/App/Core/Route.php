<?php

/*
Класс-маршрутизатор для определения запрашиваемой страницы.
> цепляет классы контроллеров и моделей;
> создает экземпляры контролеров страниц и вызывает действия этих контроллеров.
*/
class Route
{

	static function start()
	{
		// контроллер и действие по умолчанию
		$controller_name = 'Home';
		$action_name = 'Index';
		
		$routes = explode('/', $_SERVER['REQUEST_URI']);

		$routes2 = explode('?', $routes[1]);
		// получаем имя контроллера
		if ( !empty($routes2[0]) )
		{	
			$controller_name = $routes2[0];
		}
		if (!empty($routes[2]))
		$routes3 = explode('?', $routes[2]);
		// получаем имя экшена
		if ( !empty($routes3[0]) )
		{
			$action_name = $routes3[0];
		}

		// добавляем префиксы
		$model_name = $controller_name.'Model';
		$controller_name = $controller_name.'Controller';
		$action_name = 'Action'.$action_name;

		/*
		echo "Model: $model_name <br>";
		echo "Controller: $controller_name <br>";
		echo "Action: $action_name <br>";
		*/

		// подцепляем файл с классом модели (файла модели может и не быть)

		$model_file = strtolower($model_name).'.php';
		$model_path = "App/Model/".$model_file;
		if(file_exists($model_path))
		{
			include "App/Model/".$model_file;
		}

		// подцепляем файл с классом контроллера
		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "App/Controllers/".$controller_file;
		if(file_exists($controller_path))
		{
			include "App/Controllers/".$controller_file;
		}
		else
		{
			/*
			правильно было бы кинуть здесь исключение,
			но для упрощения сразу сделаем редирект на страницу 404
			*/
			Route::ErrorPage404();
		}
		
		// создаем контроллер
		$controller = new $controller_name;
		$action = $action_name;
		
		if(method_exists($controller, $action))
		{
			// вызываем действие контроллера
			$controller->$action();
		}
		else
		{
			// здесь также разумнее было бы кинуть исключение
			Route::ErrorPage404();
		}
	
	}

	function ErrorPage404()
	{
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		
		header('Location:'.$host.'Error404');
    }
	
	function Home()
	{
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
		
		header('Location:'.$host.'');
	}
    
}
