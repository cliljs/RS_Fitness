<?php

require_once '../../autoload.php';
require_once CONTROLLER_PATH . 'DataController.php';

class WorkoutModel {
    private $base_table = "rs_workout";
    public $data_helper = null;

    public function __construct()
    {
        $this->data_helper = new DataController($this->base_table);
    }

    public function create_workout($payload = [])
    {
        global $db, $common;
        $arr = [
            "user_id"           => $_SESSION['id'],
            "calories_burned"   => $payload['calories_burned'],
        ];
        $fields = $common->get_insert_fields($arr);
        return $db->insert("{$this->base_table} {$fields}", array_values($arr));
    }

    public function update_workout($payload = [], $pk = null)
    {
        return $this->data_helper->update_row($pk, $payload);
    }

    public function remove_workout($pk = null)
    {
        return $this->data_helper->remove_row($pk);
    }
}
$workout_model = new WorkoutModel();