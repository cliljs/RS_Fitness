<?php
require_once '../models/MealIngredientsModel.php';

$act = !empty($_GET["action"]) ? $_GET["action"] : null;

switch ($act) {

    case "create_ingredient":
        echo json_encode(
            [
                "action"  => $_SERVER['REQUEST_URI'],
                "success" => 1,
                "data"    => $ingredient_model->create_ingredient($_POST)
            ]
        );
        break;

    case "update_ingredient":
        echo json_encode(
            [
                "action"  => $_SERVER['REQUEST_URI'],
                "success" => 1,
                "data"    => $ingredient_model->update_ingredients($_GET['id'], $_POST)
            ]
        );
        break;

    case "remove_ingredient":
        echo json_encode(
            [
                "action"  => $_SERVER['REQUEST_URI'],
                "success" => 1,
                "data"    => $ingredient_model->remove_ingredient($_GET['id'])
            ]
        );
        break;

    case "get_meal_ingredients":
        echo json_encode(
            [
                "action"  => $_SERVER['REQUEST_URI'],
                "success" => 1,
                "data"    => $ingredient_model->get_meal_ingredients($_GET['meal_pk'])
            ]
        );
        break;

    default:
        break;
}
