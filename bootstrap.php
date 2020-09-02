<?php
require 'vendor/autoload.php';
use Dotenv\Dotenv;

use Src\System\DatabaseConnector;

//$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv = new Dotenv(__DIR__);
$dotenv->load();

$dbConnection = (new DatabaseConnector())->getConnection();