<?php

require_once '../../autoload.php';
require_once CONTROLLER_PATH . 'DataController.php';
require_once MODEL_PATH . 'MealIngredientsModel.php';

class MealPlanModel
{
    private $base_table = "rs_mealplan";
    public $data_helper = null;

    public function __construct()
    {
        $this->data_helper = new DataController($this->base_table);
    }

    public function create_mealplan($payload = [], $file = [])
    {
        global $db, $common, $ingredient_model;
        
        $arr = [
            "plan_name"        => $payload['plan_name'],
            "plan_description" => $payload['plan_description'],
            "plan_category"    => $payload['plan_category'],
            "plan_picture"     => !empty($file) ? $common->upload($file) : null,
            "created_by"       => $_SESSION['id'],
        ];

        $fields = $common->get_insert_fields($arr);
        $last_id = $db->insert("{$this->base_table} {$fields}", array_values($arr));

        foreach ($payload['ingredients'] as $key => $ingredient) {
            $ingredient_model->create_ingredient([
                "meal_id"         => $last_id,
                "ingredient_name" => $ingredient['name'],
                "calories"        => $ingredient['calories']
            ]);
        }

        return $last_id; 
    }

    public function update_mealplan($pk, $payload, $file)
    {
        global $common;
        if (!empty($file)) {
            $payload['plan_picture'] = $common->upload($file);
            $old_image = $this->data_helper->get_row_details($pk);
            if ($old_image['plan_picture']) {
                unlink($old_image['plan_picture']);
            }
        }
        return $this->data_helper->update_row($pk, $payload);
    }

    public function remove_mealplan($pk = null)
    {
        return $this->data_helper->remove_row($pk);
    }

    public function get_user_mealplan()
    {
        global $db;
        return $db->get_list("SELECT * FROM {$this->base_table} WHERE created_by = ?", [$_SESSION['id']]);
    }
}
$mealplan_model = new MealPlanModel();