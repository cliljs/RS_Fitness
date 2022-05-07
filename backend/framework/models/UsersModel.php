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

    public function get_user_gmail($email = null)
    {
        global $db;
        return $db->get_row("SELECT * FROM {$this->base_table} WHERE gmail_address = ?", [$email]);
    }

    public function create_users($payload = [])
    {
        global $db, $common;
       
        $payload['gmail_address'] = $_SESSION['google_email'];

        $has_user = $this->get_user_gmail($payload['gmail_address']);
        if (empty($has_user)) 
        {
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

            return $last_id > 0 ? true : false;
        }
        //$_SESSION = $has_user;
        return false;
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
