<?php

require_once '../models/StudentMealModel.php';
$act = !empty($_GET["action"]) ? $_GET["action"] : null;

switch ($act) {
    case "create_student_meal":
        echo json_encode(
           [
            "action"  => $_SERVER['REQUEST_URI'],
            "success" => 1,
            "data"    => $student_meal_model->create_student_meal($_POST)
           ]
        );
        break;
        
    case "update_student_meal":
        echo json_encode(
           [
            "action"  => $_SERVER['REQUEST_URI'],
            "success" => 1,
            "data"    => $student_meal_model->update_student_meal($_POST, $_GET['id'])
           ]
        );
        break;

    case "remove_student_meal":
        echo json_encode(
           [
            "action"  => $_SERVER['REQUEST_URI'],
            "success" => 1,
            "data"    => $student_meal_model->remove_student_meal($_GET['id'])
           ]
        );
        break;

    case "get_user_meals":
        echo json_encode(
           [
            "action"  => $_SERVER['REQUEST_URI'],
            "success" => 1,
            "data"    => $student_meal_model->get_user_meals($_POST)
           ]
        );
        break;

    default:
        break;
}
