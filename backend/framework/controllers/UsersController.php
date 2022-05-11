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

    case "add_other_user":
        echo json_encode([
            "action"  => $_SERVER['REQUEST_URI'],
            "success" => 1,
            "data"    => $user_model->add_other_user($_POST)
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

    case "get_all_users":
        echo json_encode([
            "action"  => $_SERVER['REQUEST_URI'],
            "success" => 1,
            "data"    => $user_model->get_all_users()
        ]);
        break;

    case "get_user_history":
        echo json_encode([
            "action"  => $_SERVER['REQUEST_URI'],
            "success" => 1,
            "data"    => $user_model->get_users_history($_GET)
        ]);
        break;

    case "get_admin_criteria":
        echo json_encode([
            "action"  => $_SERVER['REQUEST_URI'],
            "success" => 1,
            "data"    => $user_model->get_admin_criteria($_GET)
        ]);
        break;

    case "get_admin_header":
        echo json_encode([
            "action"  => $_SERVER['REQUEST_URI'],
            "success" => 1,
            "data"    => $user_model->get_admin_header()
        ]);
        break;
    case "get_all_students":
        echo json_encode([
            "action"  => $_SERVER['REQUEST_URI'],
            "success" => 1,
            "data"    => $user_model->get_all_students($_POST)
        ]);
        break;
    case "get_record_meals":
        echo json_encode([
            "action"  => $_SERVER['REQUEST_URI'],
            "success" => 1,
            "data"    => $user_model->get_record_meals($_POST)
        ]);
        break;
    case "get_record_workouts":
        echo json_encode([
            "action"  => $_SERVER['REQUEST_URI'],
            "success" => 1,
            "data"    => $user_model->get_record_workouts($_POST)
        ]);
        break;
    case "get_student_activities":
        echo json_encode([
            "action"  => $_SERVER['REQUEST_URI'],
            "success" => 1,
            "data"    => $user_model->get_student_activities($_POST)
        ]);
        break;
    default:
        break;
}
