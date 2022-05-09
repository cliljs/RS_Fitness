<?php

require_once '../../autoload.php';
require_once CONTROLLER_PATH . 'DataController.php';

class UsersModel
{
    private $base_table = "rs_users";
    public $data_helper = null;

    public function __construct()
    {
        $this->data_helper = new DataController($this->base_table);
    }

    public function get_users_history($payload = [])
    {
        global $db, $common;

        $meal_taken = $db->get_list("SELECT SUM(calories_obtained) AS calories_ob, meal_date 
                                    FROM rs_student_meal 
                                    WHERE YEAR(meal_date) = ? AND MONTH(meal_date) = ? AND user_id = ?
                                    GROUP BY meal_date", [$payload['year'], $payload['month'], $_SESSION['id']]);

        $calories_burned = $db->get_list("SELECT SUM(calories_burned) AS burned, workout_date 
                                          FROM rs_workout
                                          WHERE user_id = ? AND MONTH(workout_date) = ? AND YEAR(workout_date) = ? 
                                          GROUP BY workout_date", [$_SESSION['id'], $payload['month'], $payload['year']]);

        return [
            "meal_taken"      => $meal_taken,
            "calories_burned" => $calories_burned,
        ];
    }

    public function get_user_gmail($email = null)
    {
        global $db;
        return $db->get_row("SELECT * FROM {$this->base_table} WHERE gmail_address = ?", [$email]);
    }
    public function get_all_users()
    {
        global $db;
        return $db->get_list("SELECT * FROM {$this->base_table} WHERE not id = ?", [$_SESSION['id']]);
    }
    public function create_users($payload = [])
    {
        global $db, $common;

        $payload['gmail_address'] = $_SESSION['google_email'];

        $has_user = $this->get_user_gmail($payload['gmail_address']);
        if (empty($has_user)) {
            $w = $payload['weight'] * 0.453592;
            $h = $payload['height'] * 0.01;
            $bmi = $w / ($h * $h);
            $arr = [
                "gmail_address" => $payload['gmail_address'],
                "firstname"     => $payload['firstname'],
                "middlename"    => $payload['middlename'],
                "lastname"      => $payload['lastname'],
                "birthdate"     => $payload['birthdate'],
                "gender"        => $payload['gender'],
                "height"        => $payload['height'],
                "weight"        => $payload['weight'],
                "bmi"           => $bmi
            ];
            $fields  = $common->get_insert_fields($arr);
            $last_id = $db->insert("{$this->base_table} {$fields}", array_values($arr));
            //$_SESSION = $this->data_helper->get_row_details($last_id);
            $_SESSION['is_admin'] = 0;
            $_SESSION['validated'] = 1;
            $_SESSION['user_fullname'] = $payload['firstname'] . ' ' . $payload['middlename'] . ' '  . $payload['lastname'];
            $_SESSION['id'] = $last_id;
            return $last_id > 0 ? true : false;
        }
        return false;
    }
    public function add_other_user($payload = [])
    {
        global $db, $common;
        $retvalue = 0;
        try {
            $has_user = $this->get_user_gmail($payload['gmail']);
            if (empty($has_user)) {
         
                $arr = [
                    "gmail_address" => $payload['gmail'],
                    "firstname"     => $payload['firstname'],
                    "middlename"    => $payload['middlename'],
                    "lastname"      => $payload['lastname'],
                    "birthdate"     => $payload['birthdate'],
                    "gender"        => $payload['gender'],
                    "height"        => 0,
                    "weight"        => 0,
                    "bmi"           => 0
                ];
                $fields  = $common->get_insert_fields($arr);
                $db->insert("{$this->base_table} {$fields}", array_values($arr));
               
                $retvalue = 1;
            } else{
                $retvalue = -1;
            }
        } catch (\Throwable $th) {
            $retvalue = 0;
        }



        return $retvalue;
    }
    public function update_user($payload = [], $pk = null)
    {
        return $this->data_helper->update_row($pk, $payload);
    }

    public function remove_user($pk = null)
    {
        return $this->data_helper->remove_row($pk);
    }
}

$user_model = new UsersModel();
