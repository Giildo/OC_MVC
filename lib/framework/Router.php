<?php

namespace Jojotique\OC_MVC\lib\framework;

include_once('Route.php');

class Router
{
	private $uri, $routes = [], $route, $var;

	public function __construct (string $uri) {
		$this->uri = $uri;

		$xml = new \DOMDocument();
		$xml->load(__DIR__ . '/../config/routes.xml');

		$routes = $xml->getElementsByTagName('route');

		foreach ($routes as $route) {
			$this->routes[] = new Route($route->getAttribute('uri'), $route->getAttribute('action'), $route->getAttribute('var'));
		}
	}

	public function uriChecker () {
		foreach ($this->routes as $route) {
			if (preg_match('#^' . $route->uri() . '$#', $this->uri, $var)) {
				$this->route = $route;

				if (isset($var[1])) {
					$this->var = $var[1];
				}
				
				return $this;
			}
		}

		return false;
	}

	public function route() { return $this->route; }
	public function var() { return $this->var; }
}