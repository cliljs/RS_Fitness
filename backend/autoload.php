<?php
session_start();
define('CONTROLLER_PATH', rtrim(preg_replace('#[/\\\\]{1,}#', '/', realpath(dirname(__FILE__))), '/') . '/framework/controllers/');
define('DB_PATH', rtrim(preg_replace('#[/\\\\]{1,}#', '/', realpath(dirname(__FILE__))), '/') . '/framework/controllers/DatabaseController.php');
define('MODEL_PATH', rtrim(preg_replace('#[/\\\\]{1,}#', '/', realpath(dirname(__FILE__))), '/') . '/framework/models/');
define('UPLOAD_PATH', rtrim(preg_replace('#[/\\\\]{1,}#', '/', realpath(dirname(__FILE__))), '/') . '/framework/uploads/');
define('ENV', 'DEV');
// DEPENDENCIES
include_once DB_PATH;
include_once CONTROLLER_PATH . 'HelperController.php';
include_once CONTROLLER_PATH . 'Generate.php';
$db = new DatabaseController();
date_default_timezone_set('Asia/Manila');
// SERVES REQUEST CONTROLLER
$request_controller = basename(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));

if (file_exists(CONTROLLER_PATH . $request_controller)) {
    include_once  CONTROLLER_PATH .  $request_controller; 
} 
