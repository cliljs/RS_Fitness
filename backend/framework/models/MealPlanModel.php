<?php

require_once '../../autoload.php';
require_once CONTROLLER_PATH . 'DataController.php';

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
        global $db, $common;
        $arr = [
            "plan_name"     => $payload['plan_name'],
            "plan_category" => $payload['plan_category'],
            "plan_picture"  => !empty($file) ? $common->upload($file) : null,
            "created_by"    => $_SESSION['id'],
        ];
        $fields = $common->get_insert_fields($arr);
        return $db->insert("{$this->base_table} {$fields}", array_values($arr)); 
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