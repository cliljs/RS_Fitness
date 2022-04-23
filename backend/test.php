<?php
include_once './autoload.php';
$act = !empty($_GET["action"]) ? $_GET["action"] : null;

$seeds = [
    [
        "gmail_address" => "calilchristopher052997@gmail.com",
        "firstname"     => "Calil Christopher",
        "middlename"    => 'null',
        "lastname"      => "Jaudian",
        "birthdate"      => "1997-05-29",
        "gender"        => "Male",
        "height"        => 180.34,
        "weight"        => 198.41,
        "bmi"           => 45.21,
    ],
    [
        "gmail_address" => "bry@gmail.com",
        "firstname"     => "Bryan Nikko",
        "middlename"    => "Vitug",
        "lastname"      => "Barata",
        "birthdate"      => "1994-02-11",
        "gender"        => "Male",
        "height"        => 182.88,
        "weight"        => 176.37,
        "bmi"           => 40.2,
    ],
    [
        "gmail_address" => "patrick@gmail.com",
        "firstname"     => "Ben Patrick",
        "middlename"    => "Vitug",
        "lastname"      => "Chua",
        "birthdate"      => "2004-02-16",
        "gender"        => "Male",
        "height"        => 165.1,
        "weight"        => 154.324,
        "bmi"           => 30.8,
    ],
];

switch ($act) {
    case "seed":
        foreach ($seeds as $key => $seed) {
            $fields   = $common->get_insert_fields($seed);
            $has_seed = $db->get_row("SELECT * FROM rs_users 
                                      WHERE gmail_address = ?", [$seed['gmail_address']]);
            if (empty($has_seed)) {
                $db->insert("rs_users {$fields}", array_values($seed));
                echo "{$seed['gmail_address']} Created <br />";
            } else {
                echo "{$seed['gmail_address']} Already Exists <br />";
            }
        }
        break;
    
    case 'truncate':
        $tables = $db->get_list("SHOW TABLES");
        if (!empty($tables)) {
            foreach ($tables as $key => $table) {
               $db->truncate($table['Tables_in_fitness_app']);
               echo "{$key} - {$table['Tables_in_fitness_app']} TRUNCATED <br/>";
            }
        }
        break;
    default:

        break;
}
