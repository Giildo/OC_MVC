<?php

namespace Jojotique\OC_MVC\model;

use \Jojotique\OC_MVC\lib\framework\Security;

include_once(__DIR__ . '/../lib/framework/Security.php');

abstract class Manager
{
	protected $pass_db;

	public function __construct() {
		$security = new Security();

		$this->pass_db = $security->pass_db();
	}

    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=OC_MVC;charset=utf8', 'root', $this->pass_db);
        return $db;
    }
}