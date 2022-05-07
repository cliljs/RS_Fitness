<?php
require_once '../models/UsersModel.php';

$act = !empty($_GET["action"]) ? $_GET["action"] : null;

switch ($act) {
    case "login_user":
        echo json_encode([
            "action"  => $_SERVER['REQUEST_URI'],
            "success" => 1,
            "data"    => $user_model->create_users($_POST)
        ]);
        break;

    case "update_user":
        // CHANGE KO PA VALIDATION NETO
        echo json_encode([
            "action"  => $_SERVER['REQUEST_URI'],
            "success" => 1,
            "data"    => $user_model->update_user($_POST, $_GET['id'])
        ]);
        break;

    case "remove_user":
        echo json_encode([
            "action"  => $_SERVER['REQUEST_URI'],
            "success" => 1,
            "data"    => $user_model->remove_user($_GET['id'])
        ]);
        break;
    
    case "logout_user":
        echo json_encode([
            "action"  => $_SERVER['REQUEST_URI'],
            "success" => 1,
            "data"    => session_destroy()
        ]);
        break;
    
    // GET 1 ROW FROM DB
    case "get_user":
        echo json_encode([
            "action"  => $_SERVER['REQUEST_URI'],
            "success" => 1,
            "data"    => $user_model->data_helper->get_row_details($_GET['id'])
        ]);
        break;

    default:
        break;
}
