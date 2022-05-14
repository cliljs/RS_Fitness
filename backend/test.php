<?php
include_once './autoload.php';
include_once './seeds/mealplan.php';
$act = !empty($_GET["action"]) ? $_GET["action"] : null;

$seeds = [
    [
        "gmail_address" => "rs.malofit@gmail.com",
        "firstname"     => "RS Malofit",
        "middlename"    => '',
        "lastname"      => "Administrator",
        "birthdate"      => "1997-05-29",
        "gender"        => "Male",
        "height"        => 180.34,
        "weight"        => 198.41,
        "bmi"           => 45.21,
        "is_admin"      => 1
    ]
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

        foreach ($mealplan_seed as $key => $mealplan) {
            $mealplan_arr = [ 
                "plan_name"        => $mealplan['plan_name'],
                "plan_description" => $mealplan['plan_description'],
                "plan_category"    => $mealplan['plan_category'],
                "created_by"       => $mealplan['created_by']
            ];
            $has_meal = $db->get_row("SELECT plan_name FROM rs_mealplan WHERE plan_name = ? AND created_by = ?", [$mealplan_arr['plan_name'], 1]);

            if (empty($has_meal)) {
                $meal_fields   = $common->get_insert_fields($mealplan_arr);
                $last_meal_id = $db->insert("rs_mealplan {$meal_fields}", array_values($mealplan_arr));
                echo "<br />" . $last_meal_id .  " MEAL PLAN --- " . $mealplan['plan_name'] . " CREATED <br />";

                foreach ($mealplan['ingredients'] as $key => $ingredient) {
                   $ing_arr = [
                        "ingredient_name" => $ingredient['ingredient_name'],
                        "calories"        => $ingredient['calories'],
                        "created_by"      => 1,
                        "meal_id"         => $last_meal_id
                   ];
                   $ing_fields = $common->get_insert_fields($ing_arr);
                   $db->insert("rs_meal_ingredients {$ing_fields}", array_values($ing_arr));

                   echo "<br />" . $last_meal_id . " INGREDIENT ---- " . $ing_arr['ingredient_name'] . " CREATED <br />";
                   
                }
            } else {
                echo "<br />" . $mealplan_arr['plan_name'] . " Already Exists <br />";
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
