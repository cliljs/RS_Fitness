<?php
require_once '../models/WorkoutModel.php';
$act = !empty($_GET["action"]) ? $_GET["action"] : null;

switch ($act) {
    case "create_workout":
        echo json_encode([
            "action"  => $_SERVER['REQUEST_URI'],
            "success" => 1,
            "data"    => $workout_model->create_workout($_POST)
        ]);
        break;
        
    case "update_workout":
        echo json_encode([
            "action"  => $_SERVER['REQUEST_URI'],
            "success" => 1,
            "data"    => $workout_model->update_workout($_POST, $_GET['id'])
        ]);
        break;
        
    case "remove_workout":
        echo json_encode([
            "action"  => $_SERVER['REQUEST_URI'],
            "success" => 1,
            "data"    => $workout_model->remove_workout($_GET['id'])
        ]);
        break;
        
    case "get_user_workout":
        echo json_encode([
            "action"  => $_SERVER['REQUEST_URI'],
            "success" => 1,
            "data"    => $workout_model->get_user_workout()
        ]);
        break;
        case "get_workout_info":
            echo json_encode([
                "action"  => $_SERVER['REQUEST_URI'],
                "success" => 1,
                "data"    => $workout_model->get_workout_info($_GET['id'])
            ]);
            break;
    default:
        break;
}
