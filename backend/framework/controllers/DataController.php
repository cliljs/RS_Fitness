<?php

include_once '../../autoload.php';

class DataController {
    private $base_table = null;

    public function __construct($tbl = null)
    {
        $this->base_table = $tbl;
    }

    public function update_row($pk = null, $payload = [])
    {
        global $db, $common;
        $update_fields = $common->get_update_fields($payload);
        $updated       = $db->update("{$this->base_table} {$update_fields} WHERE id = {$pk}", array_values($payload));
        return $updated ? $this->get_row_details($pk) : false;
    }

    public function remove_row($pk = null)
    {
       global $db, $common;
       $tobe_deleted = $this->get_row_details($pk);
       $deleted      = $db->delete("{$this->base_table} WHERE id = {$pk}");
       return $deleted ? $tobe_deleted : false;
    }

    public function get_row_details($pk = null)
    {
        global $db;
        return $db->get_row("SELECT * FROM {$this->base_table} WHERE id = ?", [$pk]);
    }
}