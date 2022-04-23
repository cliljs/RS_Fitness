<?php
/* 
    GENERATE MODEL AND CONTROLLER ON DEV ENVIROMENT
*/

include_once './autoload.php';

if (ENV !== 'DEV')  die();
// END IF

$act = !empty($_GET['action']) ? $_GET['action'] : null;

switch ($act) {
    case 'generate_model':
        $generate_instance->create_model($_GET['value']);
        break;
    
    case 'generate_controller':
        $generate_instance->create_controller($_GET['value']);
        break;
    
    case 'controller_model_generate':
        $generate_instance->create_controller($_GET['value']);
        $generate_instance->create_model($_GET['value']);
        break;
    
    default:
        break;
}