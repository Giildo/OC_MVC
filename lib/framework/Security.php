<?php

namespace Jojotique\OC_MVC\lib\framework;

class Security
{
	private $pass_db;

	public function __construct() {
		$xml = new \DOMDocument();
		$xml->load(__DIR__ . "/../config/elements_config.xml");

		$passwords = $xml->getElementsByTagName('pass');

		foreach ($passwords as $pass) {
			if ($pass->getAttribute('target') == 'db') {
				$this->pass_db = $pass->getAttribute('value');
			}
		}
	}

	public function pass_db() { return $this->pass_db; }
}