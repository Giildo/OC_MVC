<?php

namespace Jojotique\OC_MVC\model;

abstract class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=OC_MVC;charset=utf8', 'root', 'jOn79613226');
        return $db;
    }
}