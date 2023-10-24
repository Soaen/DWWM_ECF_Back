<?php

class ChangeModel{

    public $db; 
    
    public function __construct(PDO $db){
        $this->db = $db;
    }
}