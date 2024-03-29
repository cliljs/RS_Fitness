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
            "user_id"          => $_SESSION['id'],
            "calories_burned"  => $payload['calories_burned'],
            "workout_duration" => $payload['workout_duration'],
            "description"      => $payload['description'],
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

    public function get_user_workout()
    {
        global $db, $common;
        return $db->get_list("SELECT * FROM {$this->base_table} WHERE user_id = ? order by workout_date asc", [$_SESSION['id']]);
    }
    public function get_workout_info($pk = 0)
    {
        global $db;
        return $db->get_row("SELECT * FROM {$this->base_table} WHERE user_id = ? and id = ?", [$_SESSION['id'],$pk]);
    }
}
$workout_model = new WorkoutModel();