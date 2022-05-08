<?php

require_once '../../autoload.php';
require_once CONTROLLER_PATH . 'DataController.php';

class StudentMealModel
{
    private $base_table  = "rs_student_meal";
    public  $data_helper = null;
    public function __construct()
    {
        $this->data_helper = new DataController($this->base_table);
    }

    public function create_student_meal($payload = [])
    {
        global $db, $common;
        $arr = [];
        if (array_key_exists('mealplan_id', $payload)) {
            $meal_info = $db->get_row("SELECT plan_name, plan_description, plan_category FROM rs_mealplan WHERE id = ?", [$payload['mealplan_id']]);
            $calories  = $db->get_row("SELECT SUM(calories) AS total_calories FROM rs_meal_ingredients WHERE meal_id = ?", [$payload['mealplan_id']]);

            $arr = [
                "user_id"            => $_SESSION['id'],
                "meal_name"          => $meal_info['plan_name'],
                "meal_description"   => $meal_info['plan_description'],
                "meal_category"      => $meal_info['plan_category'],
                "calories_obtained"  => $calories['total_calories'],
            ];
        } else {
            $arr = [
                "user_id"            => $_SESSION['id'],
                "meal_name"          => $payload['meal_name'],
                "meal_date"          => $payload['meal_date'],
                "meal_description"   => $payload['meal_description'],
                "meal_category"      => $payload['meal_category'],
                "calories_obtained"  => $payload['calories_obtained'],
            ];
        }

        $fields = $common->get_insert_fields($arr);
        return $db->insert("{$this->base_table} {$fields}", array_values($arr));
    }

    public function update_student_meal($payload = [], $pk= null)
    {
        return $this->data_helper->update_row($pk, $payload);
    }

    public function remove_student_meal($pk= null)
    {
        return $this->data_helper->remove_row($pk);
    }

    public function get_user_meals($payload = [])
    {
        global $db, $common;
        return $db->get_list("SELECT * FROM {$this->base_table} WHERE user_id = ? and meal_date = ?", [$_SESSION['id'],$payload['date_taken']]);
    }
}

$student_meal_model =  new StudentMealModel();