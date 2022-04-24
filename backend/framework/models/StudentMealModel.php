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
        $arr = [
            "user_id"            => $_SESSION['id'],
            "meal_name"          => $payload['meal_name'],
            "calories_obtained"  => $payload['calories_obtained'],
        ];
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

    public function get_user_meals($pk= null)
    {
        global $db, $common;
        return $db->get_list("SELECT * FROM {$this->base_table} WHERE user_id = ?", [$_SESSION['id']]);
    }
}

$student_meal_model =  new StudentMealModel();