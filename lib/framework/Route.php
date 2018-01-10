<?php

namespace Jojotique\OC_MVC\lib\framework;

class Route
{
	private $uri, $action, $var;

	public function __construct (string $uri, string $action, string $var) {
		$this->uri = $uri;
		$this->action = $action;
		$this->var = $var;
	}

	public function uri() { return $this->uri; }
	public function action() { return $this->action; }
	public function var() { return $this->var; }
}