<?php

class Generate
{
    private $model_path = '/fitness_app/backend/framework/models/';
    private $controller_path = '/fitness_app/backend/framework/controllers/';

    public function create_model($filename)
    {
        $file_path = $_SERVER['DOCUMENT_ROOT'] . $this->model_path . "{$filename}Model.php";
        if (!file_exists($file_path)) {
            $fp = fopen($file_path, 'a'); //opens file in append mode  
            fwrite($fp, implode(PHP_EOL . PHP_EOL, $this->model_boiler_plate($filename)));
            fclose($fp);
            echo "$filename Model Created successfully <br/>";
        } else {
            echo "$filename Model Already Exists <br/>";
        }
    }

    public function create_controller($filename)
    {
        $file_path = $_SERVER['DOCUMENT_ROOT'] . $this->controller_path . "{$filename}Controller.php";
        if (!file_exists($file_path)) {
            $fp = fopen($file_path, 'a'); //opens file in append mode  
            fwrite($fp, implode(PHP_EOL . PHP_EOL, $this->controller_boiler_plate()));
            fclose($fp);
            echo "$filename Controller Created successfully <br/>";
        } else {
            echo "$filename Controller Already Exists <br/>";
        }
    }

    private function model_boiler_plate($filename)
    {
        return [
            "<?php",
            "require_once '../../autoload.php';",
            "class {$filename}Model {",
            'private $base_table = "tbl name here";',
            '}',
        ];
    }

    private function controller_boiler_plate()
    {
        return [
            '<?php',
            '$act = !empty($_GET["action"]) ? $_GET["action"] : null;',
            'switch ($act) {',
            'case "value":',
            ' break;',
            'default:',
            ' break;',
            '}',
        ];
    }
}

$generate_instance = new Generate();
