<?php

require_once '../../autoload.php';
require_once CONTROLLER_PATH . 'DataController.php';

class MealIngredientsModel
{
    private $base_table = "rs_meal_ingredients";
    public  $data_helper = null;

    public function __construct()
    {
        $this->data_helper = new DataController($this->base_table);
    }

    public function create_ingredient($payload = [])
    {
        global $db, $common;
        $arr = [
            "meal_id"         => $payload['meal_id'],
            "ingredient_name" => $payload['ingredient_name'],
            "calories"        => $payload['calories'],
            "created_by"      => $_SESSION['id']
        ];
        $fields = $common->get_insert_fields($arr);
        return $db->insert("{$this->base_table} {$fields}", array_values($arr));
    }

    public function update_ingredients($pk = null, $payload = []) 
    {
        return $this->data_helper->update_row($pk, $payload);
    }

    public function remove_ingredient($pk = null) 
    {
        return $this->data_helper->remove_row($pk);
    }

    public function get_meal_ingredients($meal_pk = null)
    {
        global $db, $common;
        return $db->get_list("SELECT * FROM {$this->base_table} WHERE meal_id = ? AND created_by = ?", [$meal_pk, $_SESSION['id']]);
    }

}
$ingredient_model = new MealIngredientsModel();