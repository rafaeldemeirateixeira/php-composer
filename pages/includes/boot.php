<?php

require_once dirname(__DIR__) . '../../vendor/autoload.php';

use Dotenv\Dotenv;

session_start();

header('Content-type: text/html; charset=UTF-8');
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache");
header("Pragma: no-cache");

date_default_timezone_set('America/Sao_Paulo');

$dotEnv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotEnv->load();
