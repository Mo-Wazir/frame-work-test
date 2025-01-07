<?php

namespace Mowazir\Framework\Http;

use function FastRoute\simpleDispatcher;


class Kernel
{

	public function handle(Request $request): Response
	{

		$dispatcher = simpleDispatcher(function (RouteCollector $routeCollector) {


		$routes = include BASE_PATH . '/routes/web.php';

			foreach ($routes as $route) {
				$routeCollector->addRoute(...$route);
			}

		// 	$routeCollector->addRoute('GET', '/', function() {
		// 	$content = "Kernel world";

		// 	return new Response($content);

		// 	});


		// $routeCollector->addRoute('GET', '/posts/{id:\d+}', function($routeParams) {

		// $content = "Kernel Post type {$routeParams['id']} ";

		// return new Response($content);

		// 	});


		});

		$routeInfo = $dispatcher->dispatch(
			$request->getMethod(),
			$request->getPathInfo(),
		
			);


		[$status, [$controller, $method], $vars] = $routeInfo;

		$response = call_user_func([new Controller, $method], $vars );	

		return $response;

	} 

}