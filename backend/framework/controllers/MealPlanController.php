<?php
require_once '../models/MealPlanModel.php';

// FOR TEST SA BACKEND
// json_decode(file_get_contents("php://input")

$act = !empty($_GET["action"]) ? $_GET["action"] : null;

switch ($act) {

    case "create_mealplan":
        $files = !empty($_FILES) ? $_FILES[0] : [];
        echo json_encode(
            [
                "action"  => $_SERVER['REQUEST_URI'],
                "success" => 1,
                "data"    => $mealplan_model->create_mealplan($_POST, $files)
            ]
        );
        break;

    case "update_mealplan":
        $files = !empty($_FILES) ? $_FILES[0] : [];
        echo json_encode(
            [
                "action"  => $_SERVER['REQUEST_URI'],
                "success" => 1,
                "data"    => $mealplan_model->update_mealplan($_GET['id'], $_POST, $files)
            ]
        );
        break;

    case "remove_mealplan":
        echo json_encode(
            [
                "action"  => $_SERVER['REQUEST_URI'],
                "success" => 1,
                "data"    => $mealplan_model->remove_mealplan($_GET['id'])
            ]
        );
        break;

    case "get_user_mealplan":
        echo json_encode(
            [
                "action"  => $_SERVER['REQUEST_URI'],
                "success" => 1,
                "data"    => $mealplan_model->get_user_mealplan()
            ]
        );
        break;

    default:

        break;
}
