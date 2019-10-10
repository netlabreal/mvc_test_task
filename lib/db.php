<?php


class Db{
    protected $db;

    public function __construct()
    {
        $conf = require 'config/db.php';
        $this->db = new PDO('mysql:host='.$conf['host'].';dbname='.$conf['dbname'].'', $conf['username'], $conf['password']);
    }

    public function query($sql, $params=[]){
        $st = $this->db->prepare($sql);

        if(!empty($params)){
            foreach ($params as $key=>$value){
                $st->bindValue(':'.$key, $value);
            }
        }
        $st->execute();
        #$q = $this->db->query($sql);
        return $st;
    }

    public function row($sql, $params=[]){
        $res = $this->query($sql, $params);
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function column($sql, $params=[]){
        $res = $this->query($sql, $params);
        return $res->fetchColumn();
    }
}