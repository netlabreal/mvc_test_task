<?php
include_once 'lib/db.php';
class Model_Main extends Model{
    public function get_data()
    {
        $db = new Db();
        $r = $db->row('select * from tasks');
        return $r;
    }
}