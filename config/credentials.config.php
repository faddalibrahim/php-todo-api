<?php

require_once(__DIR__.'/../vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();

define("HOST", $_ENV['HOST']);
define("USERNAME", $_ENV['USERNAME']);
define("PASSWORD", $_ENV['PASSWORD']);
define("DB_NAME", $_ENV['DB_NAME']);

?>